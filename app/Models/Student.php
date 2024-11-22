<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Student extends Model
{
    use HasFactory, Notifiable;
    protected $fillable = ['name', 'email', 'phone'];
}
