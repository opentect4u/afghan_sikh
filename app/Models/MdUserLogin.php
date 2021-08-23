<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class MdUserLogin extends Model
{
    use HasFactory, Notifiable;
    protected $table="md_user_login";
    protected $fillable = [
        'user_id',
        'password',
        'user_type',
        'name',
        'active' ,
        'created_by',
        'updated_by' ,
           
    ];
}
