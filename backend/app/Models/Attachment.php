<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Attachment extends Model
{
    use HasFactory;

    const UPDATED_AT = null;

    protected $fillable = [
        'card_id',
        'file_url',
        'file_name',
        'uploaded_by',
    ];

    public function card(): BelongsTo
    {
        return $this->belongsTo(Card::class);
    }

    public function uploadedBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'uploaded_by');
    }
}
