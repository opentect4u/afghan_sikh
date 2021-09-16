<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class TdServiceDetails extends Model
{
    use HasFactory, Notifiable;
    protected $table="td_service_details";
    protected $fillable = [
        'generate_user_id',
        'surname',
        'givenname',
        'gender',
        'date_of_birth' ,
        'birth_place',
        'birth_country' ,
        'nationality' ,
        'previous_nationality' ,
        'marital_status' ,
        'religion' ,
        'present_address' ,
        'profession' ,
        'father_name' ,
        'father_nationality' ,
        'father_prev_nationality',
        'father_birth_country' ,
        'mobile' ,
        'email' ,
        'other_info',   
        'active',
        'gurudwara_id',
        'purpose',
        'remark',
        'application_date',
        'created_by',
        'updated_by',
    ];
}
