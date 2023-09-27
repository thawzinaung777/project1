<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    
     protected $fillable = [
        'orderid',
        'order_date',
        'order_list',
        'total',
        'customer_name',
        'customer_email',
        'customer_phone',
        'customer_address',
        'payment_type',
        'payment_receipt',
        'order_confirm',
        'order_status',
        'arrival_date',
        'rider_name',
        'rider_contact',

       
      
    ];
}
