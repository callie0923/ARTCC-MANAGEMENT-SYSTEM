<?php

use App\Http\Models\Airport;

Breadcrumbs::register('index', function($breadcrumbs) {
    $breadcrumbs->push('ZJX ARTCC', route('index'));
});

Breadcrumbs::register('pilots.routes.index', function($breadcrumbs) {
    $breadcrumbs->push('ZJX ARTCC', route('index'));
    $breadcrumbs->push('Pilots');
    $breadcrumbs->push('Routes Analyzer');
});

Breadcrumbs::register('pilots.weather.index', function($breadcrumbs) {
    $breadcrumbs->push('ZJX ARTCC', route('index'));
    $breadcrumbs->push('Pilots');
    $breadcrumbs->push('Weather');
});

Breadcrumbs::register('pilots.airport.index', function($breadcrumbs) {
    $breadcrumbs->push('ZJX ARTCC', route('index'));
    $breadcrumbs->push('Pilots');
    $breadcrumbs->push('ZJX Airports');
});

Breadcrumbs::register('pilots.airport.airport', function($breadcrumbs, $airport) {
    $breadcrumbs->push('ZJX ARTCC', route('index'));
    $breadcrumbs->push('Pilots');
    $breadcrumbs->push('ZJX Airports', route('pilots.airport.index'));
    $breadcrumbs->push($airport->iata);
});