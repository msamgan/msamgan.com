<?php

namespace App;

use Illuminate\Support\Facades\Http;

class Service
{
    const BASE_URL = 'https://msamgan.dev/api/';

    public static function getPostsPaginated(int $page = 1, string $query = '')
    {
        return Http::get(self::BASE_URL . 'post/list/paginated', ['page' => $page, 'query' => $query])->json();
    }

    public static function getPost(string $slug)
    {
        return Http::get(self::BASE_URL . 'post/' . $slug)->json();
    }

    public static function getTagList()
    {
        return Http::get(self::BASE_URL . 'tag/list')->json();
    }

    public static function getTagPosts(string $slug, string $query = '')
    {
        return Http::get(self::BASE_URL . 'post/tag/' . $slug, [
            'query' => $query,
        ])->json();
    }
}
