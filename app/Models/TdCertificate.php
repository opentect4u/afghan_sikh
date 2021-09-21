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
        'approved',
        'gurdwara_id' ,
        'date_of_issue' ,
        'generate_number',
        'admin_remark',
        'created_by',
        'updated_by' ,
           
    ];
}
