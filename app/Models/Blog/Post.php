<?php

namespace App\Models\Blog;

use App\Models\Comment;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Spatie\Tags\HasTags;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Post extends Model
{
    use HasFactory;
    use HasTags;

    /**
     * @var string
     */
    protected $table = 'blog_posts';
    protected $appends = ['image_url'];

    /**
     * @var array<string, string>
     */
    protected $casts = [
        'published_at' => 'date',
    ];

    protected function imageUrl(): Attribute
    {
        return new Attribute(
            get: fn() => $this->image ? asset('storage/' . $this->image) : null,
        );
    }

    /** @return BelongsTo<Author,self> */
    public function author(): BelongsTo
    {
        return $this->belongsTo(Author::class, 'blog_author_id');
    }

    /** @return BelongsTo<Category,self> */
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'blog_category_id');
    }

    /** @return MorphMany<Comment> */
    public function comments(): MorphMany
    {
        return $this->morphMany(Comment::class, 'commentable');
    }

    public function getAllowedFields(): array
    {
        return ['blog_category_id'];
    }

    public function getAllowedSorts(): array
    {
        return [];
    }

    // Which fields can be used to filter the results through the query string
    public function getAllowedFilters(): array
    {
        return ['blog_category_id'];
    }
}
