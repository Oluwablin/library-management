<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Record extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['title', 'description', 'library_id'];

    /**
     * Get library where a record belongs to
     *
     * @return Library
     */
    public function library()
    {
        return $this->belongsTo(Library::class, 'library_id', 'id');
    }
}
