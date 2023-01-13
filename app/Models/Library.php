<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Library extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['name'];

    /**
     * Get all users associated with a library
     *
     * @return User
     */
    public function students()
    {
        return $this->hasMany(User::class, 'library_id', 'id');
    }

    /**
     * Get all records associated with a library
     *
     * @return Record
     */
    public function records()
    {
        return $this->hasMany(Record::class, 'library_id', 'id');
    }
}
