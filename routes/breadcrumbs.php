<?php

Breadcrumbs::register('index', function($breadcrumbs) {
    $breadcrumbs->push(env('ARTCC').' ARTCC', route('index'));
});

Breadcrumbs::register('pilots.routes.index', function($breadcrumbs) {
    $breadcrumbs->push(env('ARTCC').' ARTCC', route('index'));
    $breadcrumbs->push('Pilots');
    $breadcrumbs->push('Routes Analyzer');
});

Breadcrumbs::register('pilots.weather.index', function($breadcrumbs) {
    $breadcrumbs->push(env('ARTCC').' ARTCC', route('index'));
    $breadcrumbs->push('Pilots');
    $breadcrumbs->push('Weather');
});

Breadcrumbs::register('pilots.airport.index', function($breadcrumbs) {
    $breadcrumbs->push(env('ARTCC').' ARTCC', route('index'));
    $breadcrumbs->push('Pilots');
    $breadcrumbs->push('Airports');
});

Breadcrumbs::register('pilots.airport.airport', function($breadcrumbs, $airport) {
    $breadcrumbs->push(env('ARTCC').' ARTCC', route('index'));
    $breadcrumbs->push('Pilots');
    $breadcrumbs->push('Airports', route('pilots.airport.index'));
    $breadcrumbs->push($airport->iata);
});