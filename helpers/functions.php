<?php

if (! function_exists('titleGenerator')) {
    function titleGenerator($title = ''): string
    {
        $baseTitle = config('app.name');

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

if (! function_exists('dateFormat')) {
    function dateFormat($date): string
    {
        return date('F j, Y', strtotime($date));
    }
}
