<?php

namespace App\Models;

use App\Constants\Table;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = Table::ORDERS;

    protected $fillable = [
        'customer_name',
        'order_date',
        'delivered_at',
        'status'
    ];
}
