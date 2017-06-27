<?php

namespace App\VATSIM;

class VATUSA
{
    private $connection;

    /**
     * Roster constructor.
     * @param Connection $connection
     */
    public function __construct(Connection $connection)
    {
        $this->connection = $connection;
    }

    /**
     * @return mixed
     */
    public function getRoster()
    {
        return $this->connection->getRoster();
    }

    /**
     * @return mixed
     */
    public function getTransfers()
    {
        return $this->connection->getTransfers();
    }

    /**
     * @param $cid
     * @return mixed
     */
    public function getController($cid)
    {
        return $this->connection->getController($cid);
    }

    /**
     * @param $id
     * @param $data
     * @return mixed
     */
    public function processTransfer($id, $data)
    {
        return $this->connection->processTransfer($id, $data);
    }

    /**
     * @param $cid
     * @param $data
     * @return mixed
     */
    public function removeController($cid, $data)
    {
        return $this->connection->deleteRoster($cid, $data);
    }

    /**
     * @param $cid
     * @param $position
     * @param $expiry
     * @return mixed
     */
    public function addSoloCert($cid, $position, $expiry)
    {
        $data = [
            'form_data' => [
                'expiry' => $expiry
            ]
        ];
        return $this->connection->addSolo($cid, $position, $data);
    }

    /**
     * @param $cid
     * @param $position
     * @return mixed
     */
    public function removeSoloCert($cid, $position)
    {
        return $this->connection->deleteSolo($cid, $position);
    }

}