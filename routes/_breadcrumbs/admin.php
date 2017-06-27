<?php

Breadcrumbs::register('admin.staff.index', function($breadcrumbs) use ($settings) {
    $breadcrumbs->push($settings->artcc_code.' ARTCC', route('index'));
    $breadcrumbs->push('Admin', '#');
    $breadcrumbs->push('Staff', '#');
});

Breadcrumbs::register('admin.transfer.index', function($breadcrumbs) use ($settings) {
    $breadcrumbs->push($settings->artcc_code.' ARTCC', route('index'));
    $breadcrumbs->push('Admin', '#');
    $breadcrumbs->push('Transfers', '#');
});

Breadcrumbs::register('admin.roster.index', function($breadcrumbs) use ($settings) {
    $breadcrumbs->push($settings->artcc_code.' ARTCC', route('index'));
    $breadcrumbs->push('Admin', '#');
    $breadcrumbs->push('Roster', '#');
});

Breadcrumbs::register('admin.roster.controller', function($breadcrumbs, $user) use ($settings) {
    $breadcrumbs->push($settings->artcc_code.' ARTCC', route('index'));
    $breadcrumbs->push('Admin', '#');
    $breadcrumbs->push('Roster', route('admin.roster.index'));
    $breadcrumbs->push($user->full_name, '#');
});