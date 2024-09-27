<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class News extends Model
{
    protected $table = 'news';
    protected $fillable = ['title', 'body', 'created_at'];

    /**
     * since im not adding the migration library
     * I set datetime (updated_at) creation/insertion requirement to false
     */
    public $timestamps = false;

    /**
     * mutate to datatime.
     */
    protected $casts = [
        'created_at' => 'datetime',
    ];

    /**
     * added the relationship 
     */
    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class, 'news_id', 'id');
    }
}
