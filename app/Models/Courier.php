<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Courier extends Model
{
    use HasFactory;

    protected $fillable = [
        'date',
        'code',
        'sender',
        'object',
        'recipient_id',
        'category_id',
        'status',
        'comments',
        'created_by',
        'updated_by',
        'deleted_by',
        'restored_by',
        'restored_at'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'date' => 'datetime:Y-m-d',
        'restored_at' => 'datetime',
    ];

    public function recipient()
    {
        return $this->belongsTo(User::class, 'recipient_id');
    }

    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function updatedBy()
    {
        return $this->belongsTo(User::class, 'updated_by');
    }

    public function category()
    {
        return $this->belongsTo(User::class, 'recipient_id');
    }

    public function scopePending($query)
    {
        $query->where('status', 'En cours');
    }

    public function scopeProcessed($query)
    {
        $query->where('status', 'Traité');
    }

    public function scopeRejected($query)
    {
        $query->where('status', 'Rejeté');
    }
}
