<?php

use App\Models\System\Settings;
use Illuminate\Support\Facades\Schema;

if(Schema::hasTable('system_settings')) {
    if(Settings::find(1)) {
        $settings = Settings::find(1);
    } else {
        $settings = new Settings;
        $settings->save();
    }
} else {
    $settings = new StdClass;
}


Breadcrumbs::register('index', function($breadcrumbs) use ($settings) {
    $breadcrumbs->push($settings->artcc_code.' ARTCC', route('index'));
});

//pilots breadcrumbs
require base_path('routes/_breadcrumbs/pilots.php');

//artcc breadcrumbs
require base_path('routes/_breadcrumbs/artcc.php');

//training breadcrumbs
require base_path('routes/_breadcrumbs/training.php');

//admin breadcrumbs
require base_path('routes/_breadcrumbs/admin.php');

//system breadcrumbs
require base_path('routes/_breadcrumbs/system.php');

//forum breadcrumbs
require base_path('routes/_breadcrumbs/forum.php');