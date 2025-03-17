<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Test extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'description', 'duration', 'created_by', 'verified'
    ];

    /**
     * Get the user that created the test.
     */
    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    /**
     * Get the questions for the test.
     */
    public function questions()
    {
        return $this->hasMany(Question::class);
    }

    /**
     * Get the results for the test.
     */
    public function results()
    {
        return $this->hasMany(Result::class);
    }
}
