<?php

/**
 * Class CallHistoryService
 * User: amelexik
 * Date: 14.11.2021
 */
class CallHistoryService
{
    private CallHistoryModel $model;
    private IpStackClient $ipStackClient;
    private GeoIpClient $geoIpClient;

    /**
     * CallHistoryService constructor.
     */
    public function __construct()
    {
        $this->model = new CallHistoryModel();
        $this->geoIpClient = new GeoIpClient();
        $ipStackApiKey = Sf::app()->getParam('ipStackApiKey');
        $this->ipStackClient = new IpStackClient($ipStackApiKey);
    }

    /**
     * @param $filePath
     */
    public function processFile($filePath)
    {

        $open = fopen($filePath, "r");
        $data = [];
        while (($row = fgetcsv($open, 1000, ",")) !== FALSE) {
            $data[] = $row;
        }

        if ($data) {
            $this->model->truncate();
            foreach ($data as $datum) {


                $phoneCountry = null;
                $phoneContinent = null;
                if ($datum[3] && $phoneData = $this->geoIpClient->getCountryByPhone($datum[3])) {
                    $phoneCountry = $phoneData['ISO'];
                    $phoneContinent = $phoneData['Continent'];
                }


                $costumerCountry = null;
                $costumerContinent = null;
                if ($datum[4] && $customerData = $this->ipStackClient->getData($datum[4])) {
                    $costumerCountry = $customerData['country_code'];
                    $costumerContinent = $customerData['continent_code'];
                }


                $this->model->add(
                    $datum[0],
                    $datum[1],
                    $datum[2],
                    $datum[3],
                    $phoneCountry,
                    $phoneContinent,
                    $datum[4],
                    $costumerCountry,
                    $costumerContinent
                );
            }
        }
    }


    public function getStatistic()
    {
        return $this->model->getAll(100);
    }
}