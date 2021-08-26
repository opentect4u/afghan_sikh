<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class TdMarriageDetails extends Model
{
    use HasFactory, Notifiable;
    protected $table="td_marriage_details";
    protected $fillable = [
        'generate_number',
        'ceremony_of_shri',
        'son_of_shri',
        'with_shrimati',
        'daughter_of_shri' ,
        'at_gurdwara',
        'date_of_marriage' ,
        'shri_photo' ,
        'shrimati_photo' ,
        'created_date' ,
        'created_by',
        'updated_by',
    ];
}
