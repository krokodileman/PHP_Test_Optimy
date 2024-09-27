<?php

declare(strict_types=1);

namespace App\Dtos;

use Illuminate\Support\Collection;

class NewsData
{
	/**
	 * set public params to readonly to avoid modification during process
	 */
	public function __construct(
		public readonly int $id,
		public readonly ?string $title,
		public readonly ?string  $body,
		public readonly ?string $createdAt,
		public readonly ?Collection $comment,
	) {}
}
