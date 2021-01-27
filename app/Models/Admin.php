<?php

namespace App\Models;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;


class Admin extends Authenticatable
{
    use Notifiable;
    protected $guard= 'admin';
    protected $fillable =[
        'email','password','name','type','mobile','image','status',
    ];
    protected $hidden = [
        'password','remember_token',
    ];
    use HasFactory;

}
