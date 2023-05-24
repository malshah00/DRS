<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;      


class Complaint extends Model
{
    use HasFactory;

    // Define the fillable attributes (columns)
    protected $fillable = [
        'name',
        'phone',
        'room_number',
        'complaint_type',
        'complaint_description',
        'file_upload',
    ];

    // Optionally, define any relationships, for example:
    // public function user()
    // {
    //     return $this->belongsTo(User::class);
    // }

    // Optionally, define any additional logic or methods for the Complaint model
}
