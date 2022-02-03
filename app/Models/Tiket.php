<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tiket extends Model
{
    use HasFactory;
    protected $table = 'tikets';
    protected $fillable = [
        'user_id',
        'amount',
        'payment_by',
        'paymet_reciver_name',
        'paymet_reciver_number',
        'bkash_transaction_id',
        'bkash_three_digit',
        'bank_transaction_id',
        'bank_name',
        'date',
        'status',
    ];
}
