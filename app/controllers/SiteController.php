<?php

/**
 * Class SiteController
 * User: amelexik
 * Date: 13.11.2021
 */
class SiteController extends Controller
{

    /**
     * @var CallHistoryService
     */
    private CallHistoryService $callHistoryService;

    public function __construct($data = array())
    {
        parent::__construct($data);
        $this->callHistoryService = new CallHistoryService();

    }

    public function actionIndex()
    {
        if (Sf::app()->Request->isPost()) {
            $csvFile = Sf::app()->Request->getFile('csv');

            if ($csvFile['error']) {
                $this->setData([
                    'error' => 'file error php'
                ]);
                return;
            }

            if ($csvFile['type'] !== 'text/csv') {
                $this->setData([
                    'error' => 'file type'
                ]);
                return;
            }
            try {
                $this->callHistoryService->processFile($csvFile['tmp_name']);
            } catch (Exception $e) {
                $this->setData([
                    'error' => $e->getMessage()
                ]);
            }
            header('location:/');
        }


        $callStatistic = $this->callHistoryService->getStatistic();
        $this->setData([
            'result' => $callStatistic
        ]);

    }


}
