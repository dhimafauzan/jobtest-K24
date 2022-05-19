<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Code extends Model
{
    use HasFactory;
    public $incrementing = false;
    protected $guarded = [];

    protected $primaryKey = 'code_cd';
}
