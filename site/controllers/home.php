<?php

return function ($site, $pages, $page) {
    $tags = array();

    foreach ($pages->visible()->filterBy('template', 'projects') as $projectsPage) {
        $visibleProjects = $projectsPage->children()->visible();
        $pageTags = $visibleProjects->pluck('tags', ',', true);
        $tagsMeta = $projectsPage->tags_meta()->yaml();

        foreach ($pageTags as $tag) {
            $tagCover = false;

            foreach ($tagsMeta as $meta) {
                if (strpos($meta['tag_name'], $tag) !== false && !empty($meta['image'])) {
                    $tagCover = $projectsPage->image($meta['image']);
                    break;
                }
            }
 
            if (!$tagCover) {
                $tagCover = $visibleProjects->filterBy('tags', $tag, ',')->first()->images()->first();
            }

            array_push($tags, array(
                'title' => $tag,
                'url' => url($projectsPage->url() . '/' . url::paramsToString(['tag' => $tag])),
                'cover' => $tagCover
            ));
        }
    }

    return compact('tags');
};