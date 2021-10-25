<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class TdCertificate extends Model
{
    use HasFactory, Notifiable;
    protected $table="td_certificate";
    protected $fillable = [
        'user_id',
        'family_details_id',
        'certificates_type_id',
        'remark',
        'application_date',
        'ceremony_of_shri',
        'son_of_shri',
        'with_shrimati',
        'daughter_of_shri',
        'date_of_marriage',
        'doc_1',
        'doc_2' ,
        'doc_3' ,
        'doc_4' ,
        'doc_1_name',
        'doc_2_name',
        'doc_3_name',
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
        'approved',
        'gurdwara_id' ,
        'date_of_issue' ,
        'generate_number',
        'admin_remark',
        'created_by',
        'updated_by' ,
           
    ];
}
