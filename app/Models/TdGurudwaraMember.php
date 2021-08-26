<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class TdGurudwaraMember extends Model
{
    use HasFactory, Notifiable;
    protected $table="td_gurudwara_member";
    protected $fillable = [
        'gurudwara_id',
        'name',
        'dob',
        'email',
        'phone' ,
        'designation',
        'current_nationality' ,
        'previous_nationality' ,
        'address' ,
        'photo' ,
        'created_by' ,
        'updated_by' ,
    ];
}
