<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class TdUserFamily extends Model
{
    use HasFactory, Notifiable;
    protected $table="td_user_family_details";
    protected $fillable = [
            'user_details_id',
            'email',
            'first_name',
            'middle_name',
            'last_name',
            'gender' ,
            'relation',
            'current_citizenship',
            'previous_citizenship' ,
            'passport_no' ,
            'passport_date_of_issue' ,
            'passport_date_of_expiry',
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
            'afghan_id ',
            'phone',
            'register_stage',
    ];
}
