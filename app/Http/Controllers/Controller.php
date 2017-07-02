<?php

namespace App\Http\Controllers;

use App\Repos\NotificationRepository;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected $notification;
    public function __construct()
    {
        $notification = new NotificationRepository;
        $this->notification = $notification;
    }
}
