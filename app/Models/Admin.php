<?php

namespace App\Models;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
//use Illuminate\Foundation\Auth\Admin as Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Authenticatable as AuthenticatableTrait; //para poder usar el login desde esta tabla

class Admin extends Model implements Authenticatable
{

    use AuthenticatableTrait;
    use HasFactory;


    protected $table = 'adminis';
    protected $fillable = ['nombre_completo', 'password', 'correo'];
}
