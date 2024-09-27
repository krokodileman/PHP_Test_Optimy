<?php

namespace App\Dtos;

class CommentData
{
	public function __construct(
		public readonly int $id,
		public readonly string $body,
		public readonly ?string $created_at,
		public readonly int $news_id
	) {}
}
