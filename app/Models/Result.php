<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'test_id', 'score', 'completed_at'
    ];

    /**
     * Get the user that owns the result.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the test that owns the result.
     */
    public function test()
    {
        return $this->belongsTo(Test::class);
    }
}
