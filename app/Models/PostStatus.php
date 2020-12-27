<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;

/**
 * Class PostStatus
 *
 * @package App\Models
 */
class PostStatus extends Model
{
    /**
     * Fillable fields.
     * @var string[]
     */
    protected $fillable = [
        'slug'
    ];

    /**
     * Status slugs.
     */
    const DRAFT = 'draft';
    const PUBLISHED = 'published';

    /**
     * Status ids.
     */
    const DRAFT_ID = 1;
    const PUBLISHED_ID = 2;
}
