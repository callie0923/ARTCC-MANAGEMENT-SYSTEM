<?php

namespace App\Notification;

use Illuminate\Http\Request;

class Notification
{
    public function sendNewMemberNotification(Request $request)
    {
        // SEND EMAIL TO ATM, DATM AND TA


        return;
    }

    public function sendRosterRemovalNotification()
    {
        // SEND EMAIL TO ATM AND DATM

        return;
    }

    public function sendFeedbackReceivedNotification()
    {
        // SEND EMAIL TO ATM AND DATM

        return;
    }

    public function sendFeedbackAcceptedNotification($feedback)
    {
        // SEND EMAIL TO CONTROLLER ON FEEDBACK

        return;
    }

    public function sendTrainingAcceptedNotification($trainingId)
    {
        // SEND EMAIL TO CONTROLLER AND MENTOR

        return;
    }

    public function sendTrainingCancelledNotification(Request $request, $trainingId)
    {
        // SEND EMAIL TO CONTROLLER, MENTOR AND TA

        return;
    }

    public function sendVisitingRequestTwoWeekNotification($visitReqId)
    {
        // SEND EMAIL TO EMAIL IN REQUEST

        return;
    }

    public function sendVisitingRequestDeniedNotification(Request $request, $visitReqId)
    {
        // SEND EMAIL TO EMAIL IN REQUEST

        return;
    }
}