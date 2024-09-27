<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class News extends Model
{
    protected $table = 'news';
    protected $fillable = ['title', 'body', 'created_at'];

    // overriding the creation of timestamp updated_at column 
    public $timestamps = false;

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $casts = [
        'created_at' => 'datetime',
    ];

    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class, 'news_id', 'id');
    }

    // protected function asDateTime($value)
    // {
    //     return parent::asDateTime($value)->format('y-m-d H:m:s');
    // }
}
