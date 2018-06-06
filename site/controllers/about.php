<?php

return function ($site, $pages, $page) {
    $galleryImages = array();

    foreach ($page->gallery()->toStructure() as $entry) {
        array_push($galleryImages, $page->image($entry));
    }

    return compact('galleryImages');
};