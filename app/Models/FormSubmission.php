<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class FormSubmission extends Model
{
    use HasFactory;

    protected $table = 'form_submissions'; 
    protected $fillable = [
        'name', 'contact', 'age', 'email', 'location', 'symptoms', 'ambulance_needed', 'police_needed', 'advice',
    ];
}
