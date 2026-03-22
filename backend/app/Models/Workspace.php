<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Workspace extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name',
        'description',
    ];

    public function owner(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function workspaceMembers(): HasMany
    {
        return $this->hasMany(WorkspaceMember::class);
    }

    public function boards(): HasMany
    {
        return $this->hasMany(Board::class);
    }
}
