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
        'gurudwara_dial_code',
        'gurudwara_phone_no',
        'gurudwara_charity_reg_no',
        'website' ,
        'gurudwara_address',
        'gurudwara_address_2',
        'city' ,
        'county',
        'post_code',
        'country',
        'gurudwara_photo',
        'gurudwara_doc_1',
        'gurudwara_doc_1_name',
        'gurudwara_doc_2',
        'gurudwara_doc_2_name',
        'gurudwara_doc_3',
        'gurudwara_doc_3_name',
        'gurudwara_doc_4',
        'gurudwara_doc_4_name',
        'gurudwara_doc_5',
        'gurudwara_doc_5_name',
        'gurudwara_doc_6',
        'gurudwara_doc_6_name',
        'gurudwara_doc_7',
        'gurudwara_doc_7_name',
        'gurudwara_doc_8',
        'gurudwara_doc_8_name',
        'gurudwara_doc_9',
        'gurudwara_doc_9_name',
        'gurudwara_doc_10',
        'gurudwara_doc_10_name',


        'gurudwara_head_name' ,
        'gurudwara_head_address',
        'gurudwara_head_phone_no' ,   
        'gurudwara_head_email',
        'gurudwara_head_photo',
        'gurudwara_letter_head',
        'other_doc',
        'doc_1',
        'doc_2',
        'doc_3',
        'doc_4',
        'register_stage',
        'remark',
        'created_by' ,
        'updated_by',
    ];
}
