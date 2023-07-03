<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    const ADMIN_ID = 2;

    const ROLE_NAMES = [
        1 => 'User',
        2 => 'Admin',
        3 => 'Seller',
    ];

    const ROLE_COLORS = [
        1 => '#ccc',
        2 => 'red',
        3 => 'blue',
    ];

    protected $guarded = [];

    public static function getName($id) {
        return Role::ROLE_NAMES[$id];
    }

    public static function getColor($id) {
        return Role::ROLE_COLORS[$id];
    }
}
