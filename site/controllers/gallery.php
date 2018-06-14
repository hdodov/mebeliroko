<?php

return function ($site, $pages, $page) {
    $allImages = array();

    $imageNames = array();
    $hideDuplicates = ($page->hide_duplicates() == 'true');

    foreach ($site->index()->filterBy('template', 'project') as $project) {
        $images = $project->images()->sortBy('sort', 'asc');

        foreach ($images as $image) {
            if ($hideDuplicates) {
                $name = $image->name();

                if (array_search($name, $imageNames) === false) {
                    array_push($imageNames, $name);
                } else {
                    continue;
                }
            }

            array_push($allImages, $image);
        }
    }

    return compact('allImages');
};