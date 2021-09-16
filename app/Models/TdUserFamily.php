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
            'other_doc_1',
            'other_doc_2',
            'other_doc_3',
            'other_doc_4',
            'afghan_id ',
            'phone',
            'register_stage',
    ];
}
