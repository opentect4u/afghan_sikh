<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class TdDeathDetails extends Model
{
    use HasFactory, Notifiable;
    protected $table="td_death_details";
    protected $fillable = [
        'generate_number',
        'name',
        'date_of_death',
        'age',
        'sex' ,
        'cause_of_death' ,
        'name_of_gurdwara' ,
        'spouse_husband_son_daughter' ,
        'date_of_issue' ,
        'created_by',
        'updated_by' ,
    ];
}
