<?php

function generateBreadcrumbs($activeRoute) {
    $breadcrumbs[] = ['title' => 'ZJX ARTCC', 'route' => 'index'];

    if($activeRoute == 'pilots.routes.index') {
        $breadcrumbs[] = ['title' => 'Pilots'];
        $breadcrumbs[] = ['title' => 'Routes Analyzer'];
    }

    return $breadcrumbs;
}