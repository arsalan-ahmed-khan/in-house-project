<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Achievement extends Model
{
    use HasFactory;

    // Define the table associated with the model (optional if your table name matches the pluralized model name)
    protected $table = 'achievements';

    // Define the fillable attributes
    protected $fillable = [
        'title', 'description', 'document_path','user_id'
    ];
}

