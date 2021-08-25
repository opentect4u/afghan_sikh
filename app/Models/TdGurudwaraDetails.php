<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class TdGurudwaraDetails extends Model
{
    use HasFactory, Notifiable;
    protected $table="td_gurudwara_details";
    protected $fillable = [
        'id',
        'gurudwara_name',
        'gurudwara_email',
        'gurudwara_phone_no',
        'website' ,
        'gurudwara_address',
        'city' ,
        'state',
        'country',
        'gurudwara_photo',
        'gurudwara_head_name' ,
        'gurudwara_head_address',
        'gurudwara_head_phone_no' ,   
        'gurudwara_head_email',
        'gurudwara_head_photo',
        'gurudwara_letter_head',
        'created_by' ,
        'updated_by',
    ];
}
