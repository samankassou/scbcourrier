<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Courier extends Model
{
    use HasFactory;

    protected $fillable = [
        'sender',
        'object',
        'recipient_id',
        'category_id',
        'status',
        'created_by',
        'updated_by',
        'deleted_by',
        'restored_by'
    ];

    public function recipient()
    {
        return $this->belongsTo(User::class, 'recipient_id');
    }

    public function category()
    {
        return $this->belongsTo(User::class, 'recipient_id');
    }
}
