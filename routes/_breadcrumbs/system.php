<?php

Breadcrumbs::register('system.roles.index', function($breadcrumbs) use ($settings) {
    $breadcrumbs->push($settings->artcc_code.' ARTCC', route('index'));
    $breadcrumbs->push('System', '#');
    $breadcrumbs->push('Roles', '#');
});

Breadcrumbs::register('system.settings.index', function($breadcrumbs) use ($settings) {
    $breadcrumbs->push($settings->artcc_code.' ARTCC', route('index'));
    $breadcrumbs->push('System', '#');
    $breadcrumbs->push('Settings', '#');
});

Breadcrumbs::register('system.airports.index', function($breadcrumbs) use ($settings) {
    $breadcrumbs->push($settings->artcc_code.' ARTCC', route('index'));
    $breadcrumbs->push('System', '#');
    $breadcrumbs->push('Airports', '#');
});

