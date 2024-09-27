<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = 'comment';
    protected $fillable = ['body', 'created_at', 'news_id'];

    function news()
    {
        return $this->belongsTo(News::class);
    }
}
