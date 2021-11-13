<?php

/**
 * Class SiteController
 * User: amelexik
 * Date: 13.11.2021
 */
class SiteController extends Controller
{

    public function actionIndex()
    {

        $csvFile = Sf::app()->Request->getFile('csv');

        if (!$csvFile) {
            return;
        }


    }


}
