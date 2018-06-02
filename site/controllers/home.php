<?php

return function ($site, $pages, $page) {
    $tags = array();

    foreach ($pages->visible()->filterBy('template', 'projects') as $projectsPage) {
        $visibleProjects = $projectsPage->children()->visible();
        $pageTags = $visibleProjects->pluck('tags', ',', true);

        foreach ($pageTags as $tag) {
            $tagProjects = $visibleProjects->filterBy('tags', $tag, ',');
            $tagCover = $tagProjects->first()->images()->sortBy('sort', 'asc')->first();

            if (count($tagProjects) == 1) {
                $linkUrl = $tagProjects->first()->url();
            } else {
                $linkUrl = url($projectsPage->url() . '/' . url::paramsToString(['tag' => $tag]));
            }

            array_push($tags, array(
                'title' => $tag,
                'url' => $linkUrl,
                'cover' => $tagCover
            ));
        }
    }

    return compact('tags');
};