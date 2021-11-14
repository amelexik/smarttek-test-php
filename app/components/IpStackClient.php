<?php
/**
 * User: amelexik
 * Date: 14.11.2021
 */

class IpStackClient
{
    private string $apiKey;

    /**
     * IpStackClient constructor.
     * @param string $apiKey
     */
    public function __construct(string $apiKey)
    {
        $this->apiKey = $apiKey;
    }

    /**
     * @param string|array $ip
     * @return mixed
     */
    public function getData($ip)
    {

        if(is_array($ip)){
            $ip = implode(',',$ip);
        }

        $ch = curl_init('http://api.ipstack.com/' . $ip . '?access_key=' . $this->apiKey . '');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $json = curl_exec($ch);
        curl_close($ch);

        return json_decode($json, true);
    }


}