<?php

namespace App\Repos;

use App\Models\ARTCC\UserCert;
use App\VATSIM\VATUSA;

class UserRepository
{
    private $vatusa;
    public function __construct(VATUSA $vatusa)
    {
        $this->vatusa = $vatusa;
    }

    public function addToRoster($cid)
    {
        UserCert::create([
            'user_id' => $cid
        ]);

        // send welcome email
    }
}