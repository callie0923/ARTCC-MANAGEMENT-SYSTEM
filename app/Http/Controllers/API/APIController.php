<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\VATSIM\VATSIM;
use App\VATSIM\VATUSA;

class APIController extends Controller
{
    protected $vatusa;
    protected $vatsim;

    public function __construct(VATUSA $vatusa, VATSIM $vatsim)
    {
        $this->vatusa = $vatusa;
        $this->vatsim = $vatsim;
        parent::__construct();
    }

    public function roster()
    {
        dd($this->vatusa->getRoster());
    }

    public function transfers()
    {
        dd($this->vatusa->getTransfers());
    }

    public function vatusaController($cid)
    {
        dd($this->vatusa->getController($cid));
    }

    public function vatsimController($cid)
    {
        dd($this->vatsim->getCertData($cid));
    }
}