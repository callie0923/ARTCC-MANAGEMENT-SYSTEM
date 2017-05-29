<?php

namespace App\VATSIM;

use App\Models\System\Settings;

class VATUSARoster
{
    private $vatusa;

    /**
     * Roster constructor.
     * @param VATUSAConnection $connection
     */
    public function __construct(VATUSAConnection $connection)
    {
        $this->vatusa = $connection;
    }

    /**
     * @return mixed
     */
    public function getRoster()
    {
        $settings = Settings::find(1);
        return $this->vatusa->get($settings->vatusa_api_key, 'roster');
    }

    /**
     * @return mixed
     */
    public function getTransfers()
    {
        $settings = Settings::find(1);
        return $this->vatusa->get($settings->vatusa_api_key, 'transfer');
    }

    /**
     * @param $id
     * @param $action
     * @param $staff
     * @param null $reason
     * @return mixed
     */
    public function processTransfer($id, $action, $staff, $reason = null)
    {
        $settings = Settings::find(1);
        if($action == 'accept') {
            $data = ['action' => $action, 'by' => $staff];
        } else {
            $data = ['action' => $action, 'by' => $staff, 'reason' => $reason];
        }
        return $this->vatusa->post($settings->vatusa_api_key, 'transfer/'.$id, $data);
    }

    /**
     * @param $cid
     * @return mixed
     */
    public function getController($cid)
    {
        $settings = Settings::find(1);
        return $this->vatusa->get($settings->vatusa_api_key, 'controller/'.$cid);
    }

    /**
     * @param $cid
     * @param $staff
     * @param $reason
     * @return mixed
     */
    public function removeController($cid, $staff, $reason)
    {
        $settings = Settings::find(1);
        $data = ['by' => $staff, 'msg' => $reason];
        return $this->vatusa->deleteRoster($settings->vatusa_api_key, $cid, $data);
    }

    /**
     * @param $cid
     * @param $position
     * @param $expiry
     * @return mixed
     */
    public function processSoloCert($cid, $position, $expiry)
    {
        $settings = Settings::find(1);
        $data = ['expiry' => $expiry];
        return $this->vatusa->post($settings->vatusa_api_key, 'solo/'.$cid.'/'.$position, $data);
    }

    /**
     * @param $cid
     * @param $position
     * @return mixed
     */
    public function removeSoloCert($cid, $position)
    {
        $settings = Settings::find(1);
        return $this->vatusa->deleteSoloCert($settings->vatusa_api_key, $cid, $position);
    }

}