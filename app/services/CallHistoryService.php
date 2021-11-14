<?php

/**
 * Class CallHistoryService
 * User: amelexik
 * Date: 14.11.2021
 */
class CallHistoryService
{
    private CallHistoryModel $model;

    /**
     * CallHistoryService constructor.
     */
    public function __construct()
    {
        $this->model = new CallHistoryModel();
    }

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
                $this->model->add(
                    $datum[0],
                    $datum[1],
                    $datum[2],
                    $datum[3],
                    $datum[4],
                );
            }
        }
    }
}