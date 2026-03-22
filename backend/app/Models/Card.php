<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Card extends Model
{
    use HasFactory;

    protected $fillable = [
        'list_id',
        'title',
        'description',
        'position',
        'due_date',
        'created_by',
        'cover_image',
    ];

    protected $casts = [
        'due_date' => 'datetime',
    ];

    public function taskList(): BelongsTo
    {
        return $this->belongsTo(TaskList::class, 'list_id');
    }

    public function createdBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function cardAssignees(): HasMany
    {
        return $this->hasMany(CardAssignee::class);
    }

    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class);
    }

    public function attachments(): HasMany
    {
        return $this->hasMany(Attachment::class);
    }

    public function cardLabels(): HasMany
    {
        return $this->hasMany(CardLabel::class);
    }

    public function labels(): BelongsToMany
    {
        return $this->belongsToMany(Label::class, 'card_labels');
    }
}
