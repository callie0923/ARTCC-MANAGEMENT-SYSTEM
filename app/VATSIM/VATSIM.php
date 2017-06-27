<?php

namespace App\VATSIM;

use App\Models\System\Rating;
use GuzzleHttp\Client;
use SimpleXMLElement;

class VATSIM
{
    /**
     * @param $cid
     * @return mixed
     */
    public function getCertData($cid)
    {
        $client = new Client;
        $url = 'https://cert.vatsim.net/vatsimnet/idstatus.php?cid='.$cid;
        $result = new SimpleXMLElement($client->get($url)->getBody());
        $rating = Rating::where('rating_long', (string)$result->user->rating)->first();
        $data = ['first_name' => (string)$result->user->name_first, 'last_name' => (string)$result->user->name_last, 'email' => (string)$result->user->email, 'region' => (string)$result->user->region, 'rating' => (string)$rating->id];
        return json_encode($data);
    }
}