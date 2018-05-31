<?php

return function ($site, $pages, $page) {
    $projectTags = $page->tags();
    $projectTags = !empty($projectTags->value())
        ? explode(',', $projectTags)
        : null;

    $mainContent = $page->text();

    return compact('projectTags', 'mainContent');
};