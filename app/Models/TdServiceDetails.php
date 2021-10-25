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
        'self_id',
        'other_info', 
        'self_or_family',  
        'family_details_id',
        'active',
        'gurudwara_id',
        'service_type',
        'remark',
        'application_date',
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
        'admin_remark',
        'created_by',
        'updated_by',
    ];
}
