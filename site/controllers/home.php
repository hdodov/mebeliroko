<?php

return function ($site, $pages, $page) {
    $tags = array();

    foreach ($pages->visible()->filterBy('template', 'projects') as $projectsPage) {
        $visibleProjects = $projectsPage->children()->visible();
        $pageTags = $visibleProjects->pluck('tags', ',', true);

        foreach ($pageTags as $tag) {
            array_push($tags, array(
                'title' => $tag,
                'url' => url($projectsPage->url() . '/' . url::paramsToString(['tag' => $tag])),
                'cover' => $visibleProjects->first()->images()->first()
            ));
        }
    }

    return compact('tags');
};