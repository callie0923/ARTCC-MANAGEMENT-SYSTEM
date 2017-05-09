<?php

namespace App\VATSIM;

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
        return $this->vatusa->get('roster');
    }

    /**
     * @return mixed
     */
    public function getTransfers()
    {
        return $this->vatusa->get('transfer');
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
        if($action == 'accept') {
            $data = ['action' => $action, 'by' => $staff];
        } else {
            $data = ['action' => $action, 'by' => $staff, 'reason' => $reason];
        }
        return $this->vatusa->post('transfer/'.$id, $data);
    }

    /**
     * @param $cid
     * @return mixed
     */
    public function getController($cid)
    {
        return $this->vatusa->get('controller/'.$cid);
    }

    /**
     * @param $cid
     * @param $staff
     * @param $reason
     * @return mixed
     */
    public function removeController($cid, $staff, $reason)
    {
        $data = ['by' => $staff, 'msg' => $reason];
        return $this->vatusa->deleteRoster($cid, $data);
    }

    /**
     * @param $cid
     * @param $position
     * @param $expiry
     * @return mixed
     */
    public function processSoloCert($cid, $position, $expiry)
    {
        $data = ['expiry' => $expiry];
        return $this->vatusa->post('solo/'.$cid.'/'.$position, $data);
    }

    /**
     * @param $cid
     * @param $position
     * @return mixed
     */
    public function removeSoloCert($cid, $position)
    {
        return $this->vatusa->deleteSoloCert($cid, $position);
    }

}