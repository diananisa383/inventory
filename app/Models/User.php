<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory,Notifiable;
    protected $fillable = [
        'username',
         'password',
          'role_id',
           'status'
        ];

    public function roles()
    {
        return $this->belongsTo(Role::class);
    }
//     public function isAdmin()
// {
//     return $this->roles === 'admin';
// }
}
