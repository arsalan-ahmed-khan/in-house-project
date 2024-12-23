<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseWorkshop extends Model
{
    use HasFactory;

    // Define the table associated with the model (optional if your table name matches the pluralized model name)
    protected $table = 'course_workshops';

    // Define the fillable attributes
    protected $fillable = [
        'type', 'title', 'organizing_institute', 'location', 'duration', 'start_date', 'end_date','document_path', 'user_id'
    ];

    // Define the relationship with the User model (assuming User has many course/workshop entries)
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
