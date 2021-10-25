<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class TdUserDetails extends Model
{
    use HasFactory, Notifiable;
    protected $table="td_user_details";
    protected $fillable = [
        'id',
        'generate_user_id',
            'surname',
            'givenname',
            'gender',
            'date_of_birth' ,
            'afghan_id',
            'birth_place',
            'birth_country' ,
            'nationality' ,
            'previous_nationality' ,
            'add_1',
            'add_2',
            'city',
            'county',
            'postcode',
            'country',
            'country_code',
            'phone',
            'marital_status' ,
            'religion' ,
            'profession' ,
            'father_name' ,
            'father_nationality' ,
            'father_prev_nationality',
            'father_place_birth',
            'father_birth_country' ,
            'mother_name',
            'mother_nationality',
            'mother_prev_nationality',
            'mother_place_birth',
            'mother_birth_country',
            'email' ,
            'other_info',   
            'doc_1',
            'doc_1_name',
            'doc_2',
            'doc_2_name',
            'doc_3',
            'doc_3_name',
            'doc_4',
            'doc_4_name',
            'doc_5',
            'doc_5_name',
            'doc_6',
            'doc_6_name',
            'doc_7',
            'doc_7_name',
            'doc_8',
            'doc_8_name',
            'doc_9',
            'doc_9_name',
            'doc_10',
            'doc_10_name',
            'user_active',
            'gurudwara_id',
            'purpose',
            'remark',
            'user_logo',
            'register_stage',
    ];
}
