<?php

return function ($site, $pages, $page) {
    $links = array();

    foreach ($page->links()->yaml() as $entry) {
        $link = array(
            'content' => $entry['link']
        );

        preg_match('/\(([^:]+):.+\)/', $link['content'], $matches);

        if (count($matches) > 1) {
            $link['type'] = $matches[1];

            if ($link['type'] == 'link') {
                preg_match('/\/\/(?:.+\.)?(.+)\..+(?:\/|$)/', $link['content'], $matches);

                if (count($matches) > 1) {
                    $link['hostname'] = $matches[1];
                }
            }

            preg_match('/<a(.+)>(.*)<\/a>/', kirbytext($link['content']), $matches);

            $link['attrs'] = $matches[1];
            $link['text'] = $matches[2];

            array_push($links, $link);
        }
    }

    return compact('links');
};