<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Notifications\Notifiable;

/**
 * Class Post
 *
 * @package App\Models
 */
class Post extends Model
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'content',
        'title'
    ];

    /**
     * Get post status.
     *
     * @return BelongsTo
     */
    public function status (): BelongsTo
    {
        return $this->belongsTo(PostStatus::class, 'status_id', 'id');
    }

    /**
     * Get post author.
     *
     * @return BelongsTo
     */
    public function author (): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
