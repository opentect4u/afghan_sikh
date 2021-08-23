<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class MdCountry extends Model
{
    use HasFactory, Notifiable;
    protected $table="md_country";
    protected $fillable = [
        'name',
    ];
}
