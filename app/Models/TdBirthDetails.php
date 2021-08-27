<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class TdBirthDetails extends Model
{
    use HasFactory, Notifiable;
    protected $table="td_birth_details";
    protected $fillable = [
        'generate_number',
        'name_of_baby',
        'gender_of_baby',
        'place_of_birth',
        'date_of_birth' ,
        'baby_of_shri' ,
        'baby_of_shrimati' ,
        'name_of_gurdwara' ,
        'date_of_issue' ,
        'created_by',
        'updated_by' ,
           
    ];
}
