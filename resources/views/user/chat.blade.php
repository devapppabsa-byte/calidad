@extends('plantilla')
@section('contenido')
@section('title', 'Chat IA - QualiTrack')

<style>
    html, body { height: 100%; overflow: hidden; background: #fafafa; }
    #chatContainer { height: calc(100vh - 60px); display: flex; flex-direction: column; }
    #chatBody { flex: 1; overflow-y: auto; }
    #chatMessages { display: flex; flex-direction: column; gap: 10px; padding: 10px 0; }
    .msg-user { align-self: flex-end; background: #fff; color: #333; max-width: 70%; padding: 12px 16px; border-radius: 16px 16px 4px 16px; font-size: 14px; white-space: pre-wrap; word-wrap: break-word; border: 1px solid #e0e0e0; box-shadow: 0 1px 4px rgba(0,0,0,0.06); }
    .msg-ai { align-self: flex-start; background: #fff; color: #333; max-width: 70%; padding: 12px 16px; border-radius: 16px 16px 16px 4px; font-size: 14px; word-wrap: break-word; border: 1px solid #e0e0e0; box-shadow: 0 1px 4px rgba(0,0,0,0.06); line-height: 1.6; }
    .msg-thinking { align-self: flex-start; background: #fff; color: #bbb; max-width: 70%; padding: 12px 16px; border-radius: 16px; font-size: 14px; font-style: italic; border: 1px solid #e0e0e0; box-shadow: 0 1px 4px rgba(0,0,0,0.06); }
    .msg-ai p { margin: 0 0 8px 0; }
    .msg-ai p:last-child { margin-bottom: 0; }
    .msg-ai strong { font-weight: 600; }
    .msg-ai em { font-style: italic; color: #555; }
    .msg-ai code { background: #f0f0f0; padding: 2px 6px; border-radius: 4px; font-size: 13px; font-family: 'Courier New', monospace; border: 1px solid #e0e0e0; }
    .msg-ai pre { background: #f8f8f8; padding: 12px; border-radius: 8px; border: 1px solid #e0e0e0; overflow-x: auto; margin: 8px 0; }
    .msg-ai pre code { background: none; padding: 0; border: none; font-size: 13px; }
    .msg-ai ul, .msg-ai ol { padding-left: 20px; margin: 8px 0; }
    .msg-ai li { margin-bottom: 4px; }
    .msg-ai table { border-collapse: collapse; width: 100%; margin: 8px 0; font-size: 13px; }
    .msg-ai th, .msg-ai td { border: 1px solid #e0e0e0; padding: 6px 10px; text-align: left; }
    .msg-ai th { background: #f5f5f5; font-weight: 600; }
    .msg-ai h1, .msg-ai h2, .msg-ai h3, .msg-ai h4 { font-size: 15px; font-weight: 600; margin: 10px 0 6px 0; }
    .msg-ai blockquote { border-left: 3px solid #ddd; padding-left: 12px; color: #666; margin: 8px 0; }
</style>

@if (Auth()->user()->area == 'CALIDAD')
    @include('assets.nav_user')
@else
    @include('assets.nav')
@endif

<div id="chatContainer" class="d-flex flex-column">

    <!-- Header -->
    <div class="d-flex align-items-center justify-content-between px-4 py-3 bg-white" style="box-shadow: 0 1px 3px rgba(0,0,0,0.06);">
        <div class="d-flex align-items-center">
            <div class="rounded-circle d-flex align-items-center justify-content-center me-3 bg-light" style="width:40px; height:40px; box-shadow: 0 1px 3px rgba(0,0,0,0.08);">
                <i class="fas fa-robot text-dark"></i>
            </div>
            <div>
                <h6 class="mb-0 fw-semibold">Asistente QualiTrack</h6>
                <small class="text-muted">Planta {{Auth()->user()->planta}}</small>
            </div>
        </div>
        <a href="{{ route('user.perfil') }}" class="btn btn-sm btn-outline-secondary rounded-pill px-3">
            <i class="fas fa-arrow-left me-1"></i> Volver
        </a>
    </div>

    <!-- Disclaimer - always visible -->
    <div class="px-4 py-2 bg-white" style="border-bottom: 1px solid #eee;">
        <div class="alert alert-light border mb-0 py-2 px-3 text-center" style="font-size:12px; color:#888; box-shadow: 0 1px 3px rgba(0,0,0,0.04);">
            <i class="fas fa-info-circle me-1"></i>
            Este asistente consulta unicamente la informacion que le pidas. Se cargan los 10 formatos mas recientes de tu planta (FMP, FPNC, FVU) ya que el modelo de IA es de prueba.
            Para mejores resultados hay que contratar un plan de algun modelo mejor o adquirir una pc con las caracteristicas necesarias para correr un modelo de IA localmente.
        </div>
    </div>

    <!-- Messages area -->
    <div id="chatBody" class="flex-grow-1 px-4 py-3" style="background: #fafafa;">
        <div id="chatMessages">
            <div class="text-center my-5">
                <div class="rounded-circle d-inline-flex align-items-center justify-content-center mb-3 bg-light" style="width:70px; height:70px; box-shadow: 0 1px 4px rgba(0,0,0,0.06);">
                    <i class="fas fa-comments fa-2x text-muted"></i>
                </div>
                <p class="text-muted mb-0">Pregúntale a la IA sobre los formatos de tu planta</p>
            </div>
        </div>
    </div>

    <!-- Input bar -->
    <div class="px-4 py-3 bg-white mb-2" style="box-shadow: 0 -1px 3px rgba(0,0,0,0.04);">
        <div class="d-flex align-items-center gap-2">
            <input id="chatInput" type="text" class="form-control rounded-pill"
                   placeholder="Escribe tu pregunta..."
                   style="border: 1px solid #e0e0e0; background: #fafafa;"
                   onkeydown="if(event.key==='Enter') sendChat()">
            <button class="btn rounded-pill px-4" onclick="sendChat()" id="chatSendBtn"
                    style="background: #fff; color: #333; border: 1px solid #e0e0e0; box-shadow: 0 1px 3px rgba(0,0,0,0.08);">
                <i class="fas fa-paper-plane"></i>
            </button>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/marked/marked.min.js"></script>
<script>
let chatHistoryLoaded = false;

marked.setOptions({
    breaks: true,
    gfm: true,
    headerIds: false,
    mangle: false
});

function stripEmojis(text) {
    return text.replace(/[\u{1F300}-\u{1F9FF}]|[\u{2600}-\u{26FF}]|[\u{2700}-\u{27BF}]|[\u{1FA00}-\u{1FA6F}]|[\u{1FA70}-\u{1FAFF}]|[\u{FE00}-\u{FE0F}]|[\u{200D}]|[\u{20E3}]|[\u{E0020}-\u{E007F}]/gu, '').trim();
}

function renderMarkdown(text) {
    let clean = stripEmojis(text);
    let html = marked.parse(clean);
    let div = document.createElement('div');
    div.innerHTML = html;
    let scripts = div.querySelectorAll('script');
    scripts.forEach(s => s.remove());
    return div.innerHTML;
}

window.addEventListener('load', function(){
    fetch('{{ route("user.chat.history") }}', {
        credentials: 'same-origin',
        headers: {
            'Accept': 'application/json',
            'X-Requested-With': 'XMLHttpRequest',
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
        }
    })
    .then(r => r.json())
    .then(data => {
        if(data.messages && data.messages.length > 0){
            const container = document.getElementById('chatMessages');
            container.innerHTML = '';
            data.messages.forEach(m => {
                try { addMessage(m.message, m.role === 'user'); } catch(e) { console.error('Msg error:', e); }
            });
        }
        chatHistoryLoaded = true;
    })
    .catch(err => {
        console.error('History error:', err);
        chatHistoryLoaded = true;
    });
});

function addMessage(text, isUser){
    const div = document.getElementById('chatMessages');
    const bubble = document.createElement('div');
    bubble.className = isUser ? 'msg-user' : 'msg-ai';
    if(isUser){
        bubble.textContent = text;
    } else {
        bubble.innerHTML = renderMarkdown(text);
    }
    div.appendChild(bubble);
    document.getElementById('chatBody').scrollTop = document.getElementById('chatBody').scrollHeight;
}

function sendChat(){
    const input = document.getElementById('chatInput');
    const msg = input.value.trim();
    if(!msg) return;

    addMessage(msg, true);
    input.value = '';
    document.getElementById('chatSendBtn').disabled = true;

    const thinking = document.createElement('div');
    thinking.id = 'chatThinking';
    thinking.className = 'msg-thinking';
    thinking.textContent = 'Pensando...';
    document.getElementById('chatMessages').appendChild(thinking);
    document.getElementById('chatBody').scrollTop = document.getElementById('chatBody').scrollHeight;

    const deepTimer = setTimeout(() => {
        if(document.getElementById('chatThinking')) {
            thinking.textContent = 'Pensando a profundidad...';
        }
    }, 30000);

    fetch('{{ route("user.chat") }}', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': '{{ csrf_token() }}',
            'Accept': 'application/json',
        },
        body: JSON.stringify({ mensaje: msg })
    })
    .then(r => r.json())
    .then(data => {
        clearTimeout(deepTimer);
        const t = document.getElementById('chatThinking');
        if(t) t.remove();
        document.getElementById('chatSendBtn').disabled = false;
        if(data.reply){
            addMessage(data.reply, false);
        } else if(data.error){
            addMessage('Error: ' + data.error, false);
        }
    })
    .catch(err => {
        clearTimeout(deepTimer);
        const t = document.getElementById('chatThinking');
        if(t) t.remove();
        document.getElementById('chatSendBtn').disabled = false;
        addMessage('Error de conexión', false);
    });
}
</script>

@endsection
