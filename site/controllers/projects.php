<?php

return function ($site, $pages, $page) {
    $filterTags = param('tag');
    $projects = $page->children()->visible();

    if ($filterTags) {
        $projects = $projects->filterBy('tags', $filterTags, ',');
    }

    return compact('projects', 'filterTags');
};