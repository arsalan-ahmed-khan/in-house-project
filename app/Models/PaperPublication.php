<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaperPublication extends Model
{
    use HasFactory;

    // Define the table associated with the model (optional if your table name matches the pluralized model name)
    protected $table = 'paper_publications';

    // Define the fillable attributes
    protected $fillable = [
        'paper_title', 'conference_journal_name', 'national_international', 'year_of_publication', 'isbn_issn_no',
        'publisher_name', 'indexing', 'other', 'paper_weblink', 'doi', 'user_id'
    ];

    // Define the relationship with the User model (assuming User has many paper publications)
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}