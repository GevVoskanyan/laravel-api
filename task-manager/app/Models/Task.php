<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Database\Query\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Task extends Model
{
    use HasFactory;

    protected $fillable = [
        "title",
        "is_done",
        "project_id",
    ];

    protected $casts = [
        "is_done" => "boolean"
    ];

    protected $hidden = [
        "updated_at",
    ];

    public function creator(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function project(): BelongsTo
    {
        return $this->belongsTo(Project::class);
    }
    static function booted()
    {
        static::addGlobalScope("member", function (Builder $builder) {
            $builder
                ->where("user_id", auth()->id())
                ->orWhereIn('project_id', auth()->user()->memberships->pluck('id'));
        });
    }
}
