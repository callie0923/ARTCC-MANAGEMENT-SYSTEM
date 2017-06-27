<?php

namespace App\Repos;

use App\Models\Entrust\RolesToUsers;
use App\Models\System\Notifications;
use App\Models\System\UserNotifications;
use App\Models\User;

class NotificationRepository
{
    public function makeNotification($class, $title, $message)
    {
        $notification = new Notifications;
        $notification->class = $class;
        $notification->title = $title;
        $notification->message = $message;
        $notification->save();
        return $notification->id;
    }

    public function notifySeniorStaff($class, $title, $message)
    {
        $notification_id = $this->makeNotification($class, $title, $message);
        $users_roles = RolesToUsers::where('role_id', 1)->orWhere('role_id', 2)->orWhere('role_id', 3)->get();
        $ids = $users_roles->pluck('user_id')->all();
        $ids = array_unique($ids);
        foreach($ids as $id) {
            UserNotifications::create([
                'user_id' => $id,
                'notification_id' => $notification_id,
                'read_status' => 0
            ]);
        }
    }

    public function notifyStaff($class, $title, $message)
    {
        $notification_id = $this->makeNotification($class, $title, $message);
        $users_roles = RolesToUsers::where('role_id', 1)->orWhere('role_id', 2)->orWhere('role_id', 3)
            ->orWhere('role_id', 4)->orWhere('role_id', 5)->orWhere('role_id', 6)
            ->orWhere('role_id', 7)->orWhere('role_id', 8)->orWhere('role_id', 9)->get();
        $ids = $users_roles->pluck('user_id')->all();
        $ids = array_unique($ids);
        foreach($ids as $id) {
            UserNotifications::create([
                'user_id' => $id,
                'notification_id' => $notification_id,
                'read_status' => 0
            ]);
        }
    }

    public function notifyTrainingStaff($class, $title, $message)
    {
        $notification_id = $this->makeNotification($class, $title, $message);
        $users_roles = RolesToUsers::where('role_id', 10)->orWhere('role_id', 11)->get();
        $ta = RolesToUsers::where('role_id', 3)->first();
        if($ta) {
            $users_roles->add($ta);
        }
        $ata = RolesToUsers::where('role_id', 7)->first();
        if($ata) {
            $users_roles->add($ata);
        }

        $ids = $users_roles->pluck('user_id')->all();
        $ids = array_unique($ids);
        foreach($ids as $id) {
            UserNotifications::create([
                'user_id' => $id,
                'notification_id' => $notification_id,
                'read_status' => 0
            ]);
        }
    }

    public function notifyHomeControllers($class, $title, $message)
    {
        $homeControllers = User::where('visitor', 0)->where(function($q) {
            $q->where('status', 0)->orWhere('status', 2);
        })->get();
        $notification_id = $this->makeNotification($class, $title, $message);
        foreach($homeControllers as $homeController) {
            UserNotifications::create([
                'user_id' => $homeController->id,
                'notification_id' => $notification_id,
                'read_status' => 0
            ]);
        }
    }

    public function notifyAllControllers($class, $title, $message)
    {
        $controllers = User::where('status', 0)->orWhere('status', 2)->get();
        $notification_id = $this->makeNotification($class, $title, $message);
        foreach($controllers as $controller) {
            UserNotifications::create([
                'user_id' => $controller->id,
                'notification_id' => $notification_id,
                'read_status' => 0
            ]);
        }
    }
}