<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class TdDonation extends Model
{
    use HasFactory, Notifiable;
    protected $table="td_donation";
    protected $fillable = [
        'gurdwara_id',
        'name',
        'family_name',
        'type_of_amount',
        'amount',
        'date_of_payment',
        'remark',
        'created_by',
        'updated_by',
    ];
}
