<?php

return function ($site, $pages, $page) {
    $filterTags = param('tag');
    $visibleProjects = $page->children()->visible();

    $availableTags = $visibleProjects->pluck('tags', ',', true);

    if ($filterTags) {
        $visibleProjects = $visibleProjects->filterBy('tags', $filterTags, ',');
    }

    return compact('visibleProjects', 'filterTags', 'availableTags');
};