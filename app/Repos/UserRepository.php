<?php

namespace App\Repos;

use App\Models\ZJX\UserCert;
use App\VATSIM\VATUSARoster;

class UserRepository
{
    private $vatusa;
    public function __construct(VATUSARoster $vatusa)
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