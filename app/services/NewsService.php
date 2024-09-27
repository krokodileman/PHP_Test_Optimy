<?php

namespace App\Services;

use App\Dtos\CommentData;
use App\Dtos\NewsData;
use App\Repository\NewsRepository;
use Illuminate\Support\Collection;

class NewsService
{

	public function __construct(private NewsRepository $newsRepository) {}

	public function mapData(): ?Collection
	{
		return $this->newsRepository
			->lists()
			->map(function ($news) {

				$commentCollection = $news
					->comments()
					->get()
					->map(function ($item) {

						return new CommentData(
							$item->id,
							$item->body,
							$item->news_id
						);
					});

				return new NewsData(
					$news->id,
					$news->title,
					$news->body,
					$commentCollection,
				);
			});
	}
}
