<?php

namespace App\Dtos;

class CommentData
{
	/**
	 * set public params to readonly to avoid modification during process
	 */
	public function __construct(
		public readonly int $id,
		public readonly ?string $body,
		public readonly ?string $created_at,
		public readonly ?int $news_id
	) {}
}
