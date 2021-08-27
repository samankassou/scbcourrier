<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    use HasFactory;

    protected $fillable = ['text', 'courier_id', 'user_id'];

    protected static function booted()
    {
        static::creating(function ($note) {
            $note->user_id = auth()->user()->id;
        });
    }

    public function courier()
    {
        return $this->belongsTo(Courier::class);
    }

    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
