<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    use HasFactory;

    // ここで指定された属性のみ大量割り当て可能
    protected $fillable = ['name', 'description'];
}
