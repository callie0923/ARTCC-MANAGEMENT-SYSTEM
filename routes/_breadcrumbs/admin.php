<?php

Breadcrumbs::register('admin.staff.index', function($breadcrumbs) use ($settings) {
    $breadcrumbs->push($settings->artcc_code.' ARTCC', route('index'));
    $breadcrumbs->push('Admin');
    $breadcrumbs->push('Staff');
});