<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HealthOfficer extends Model
{
    use HasFactory;
    protected $fillable = [
        'officer_name',
        'Username',
        'Gender',
        'hospital_id'
    ];
}
