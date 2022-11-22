<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Batasan extends Model
{
    use HasFactory;
    protected $table = 'batasan';
    protected $guarded =[''];
    public $timestamp = false;
}
