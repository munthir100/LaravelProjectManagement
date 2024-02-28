<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Account extends Authenticatable
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'password'
    ];

    protected $hidden = [
        'password',
    ];

    protected $casts = [
        'password' => 'hashed',
    ];

    public function projects()
    {
        return $this->hasMany(Project::class);
    }

    // Define other relationships here

    // Example of a method to get all tasks associated with the account
    public function tasks()
    {
        return $this->hasManyThrough(Task::class, Project::class);
    }
}
