<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Status extends Model
{
    use HasFactory;
    protected $fillable = ['name'];
    const NEW = 1;
    const COMPLETED = 2;
    const FAILD = 3;
    const CANCELED = 4;
    const IN_PROGRESS = 5;
}