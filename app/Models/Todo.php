<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    use HasFactory;

    protected $fillable = [
        'todo',
        'isCompleted',
        'user_id'
    ];

    protected $attributes = [
        'isCompleted' => false
    ];

    protected $casts = [
        'created_at' => 'date: M d, Y'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
