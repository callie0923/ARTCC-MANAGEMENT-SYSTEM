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


Breadcrumbs::register('artcc.roster.member', function($breadcrumbs, $user) use ($settings) {
    $breadcrumbs->push($settings->artcc_code.' ARTCC', route('index'));
    $breadcrumbs->push('ARTCC', '#');
    $breadcrumbs->push('Roster', route('artcc.roster.index'));
    $breadcrumbs->push($user->full_name, '#');
});

Breadcrumbs::register('profile', function($breadcrumbs) use ($settings) {
    $breadcrumbs->push($settings->artcc_code.' ARTCC', route('index'));
    $breadcrumbs->push('Profile', '#');
});

