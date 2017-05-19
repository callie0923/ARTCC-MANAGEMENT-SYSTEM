<?php

Breadcrumbs::register('pilots.routes.index', function($breadcrumbs) use ($settings) {
    $breadcrumbs->push($settings->artcc_code.' ARTCC', route('index'));
    $breadcrumbs->push('Pilots');
    $breadcrumbs->push('Routes Analyzer');
});

Breadcrumbs::register('pilots.weather.index', function($breadcrumbs) use ($settings) {
    $breadcrumbs->push($settings->artcc_code.' ARTCC', route('index'));
    $breadcrumbs->push('Pilots');
    $breadcrumbs->push('Weather');
});

Breadcrumbs::register('pilots.airport.index', function($breadcrumbs) use ($settings) {
    $breadcrumbs->push($settings->artcc_code.' ARTCC', route('index'));
    $breadcrumbs->push('Pilots');
    $breadcrumbs->push('Airports');
});

Breadcrumbs::register('pilots.airport.airport', function($breadcrumbs, $airport) use ($settings) {
    $breadcrumbs->push($settings->artcc_code.' ARTCC', route('index'));
    $breadcrumbs->push('Pilots');
    $breadcrumbs->push('Airports', route('pilots.airport.index'));
    $breadcrumbs->push($airport->iata);
});