<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    const PURCHASE_TYPE = 'purchase';
    const REPLENISH_TYPE = 'replenish';

    const TYPES = [
        self::PURCHASE_TYPE,
        self::REPLENISH_TYPE,
    ];

    protected $guarded = [];
}
