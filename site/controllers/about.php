<?php

return function ($site, $pages, $page) {
    $teamMembers = $page->members()->toStructure();
    $galleryImages = array();

    foreach ($page->gallery()->toStructure() as $entry) {
        array_push($galleryImages, $page->image($entry));
    }

    return compact('teamMembers', 'galleryImages');
};