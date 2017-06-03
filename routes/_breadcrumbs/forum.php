<?php

Breadcrumbs::register('forum.index', function($breadcrumbs) use ($settings) {
    $breadcrumbs->push($settings->artcc_code.' ARTCC', route('index'));
    $breadcrumbs->push('Forum');
});

Breadcrumbs::register('forum.category', function($breadcrumbs, $category) use ($settings) {
    $breadcrumbs->push($settings->artcc_code.' ARTCC', route('index'));
    $breadcrumbs->push('Forum', route('forum.index'));
    $breadcrumbs->push($category->name);
});

Breadcrumbs::register('forum.board', function($breadcrumbs, $category, $board) use ($settings) {
    $breadcrumbs->push($settings->artcc_code.' ARTCC', route('index'));
    $breadcrumbs->push('Forum', route('forum.index'));
    $breadcrumbs->push($board->category->name, route('forum.category', $board->category));
    $breadcrumbs->push($board->name);
});