<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class MdCertificateType extends Model
{
    use HasFactory, Notifiable;
    protected $table="md_certificate_type";
    protected $fillable = [
        'name',
        'url',
        'active',
        'created_by',
        'updated_by' ,
           
    ];
}
