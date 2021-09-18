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
        'certificates_type_id',
        'application_date',
        'doc_1',
        'doc_2' ,
        'doc_3' ,
        'doc_4' ,
        'approved',
        'gurdwara_id' ,
        'date_of_issue' ,
        'created_by',
        'updated_by' ,
           
    ];
}
