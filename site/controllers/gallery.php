<?php

return function ($site, $pages, $page) {
    $allImages = array();

    foreach ($site->index()->filterBy('template', 'project') as $project) {
        $images = $project->images()->sortBy('sort', 'asc');

        foreach ($images as $image) {
            array_push($allImages, $image);
        }
    }

    return compact('allImages');
};