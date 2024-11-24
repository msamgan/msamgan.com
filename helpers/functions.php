<?php

if (! function_exists('titleGenerator')) {
    function titleGenerator($title = ''): string
    {
        $baseTitle = config('app.name') . '.com';

        return $title === '' ? $baseTitle : $title . ' | ' . $baseTitle;
    }
}

if (! function_exists('getStaticData')) {
    function getStaticData(): array
    {
        return json_decode(
            file_get_contents(storage_path('data.json')),
            true,
        );
    }
}

if (! function_exists('getDefaultImageUrl')) {
    function getDefaultImageUrl(): string
    {
        return 'https://msamgan.dev/storage/images/MNn9limQxw66kpBfxjnXQ4jvdndLXom3bh7oeMvc.png';
    }
}

if (! function_exists('dateFormat')) {
    function dateFormat($date): string
    {
        return date('F j, Y', strtotime($date));
    }
}
