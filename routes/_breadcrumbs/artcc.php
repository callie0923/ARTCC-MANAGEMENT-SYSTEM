<?php

Breadcrumbs::register('artcc.management.index', function($breadcrumbs) use ($settings) {
    $breadcrumbs->push($settings->artcc_code.' ARTCC', route('index'));
    $breadcrumbs->push('ARTCC', '#');
    $breadcrumbs->push('Management', '#');
});

Breadcrumbs::register('artcc.roster.index', function($breadcrumbs) use ($settings) {
    $breadcrumbs->push($settings->artcc_code.' ARTCC', route('index'));
    $breadcrumbs->push('ARTCC', '#');
    $breadcrumbs->push('Roster', '#');
});
