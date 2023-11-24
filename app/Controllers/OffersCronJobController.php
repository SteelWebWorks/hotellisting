<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use Config\Database;

class OffersCronJobController extends BaseController
{
    private $offers = [];

    private $maxRetry = 3;

    private $db;
    private $builder;

    public function process()
    {

        $this->init();
        $this->deleteData();
        $this->getData();
        $this->saveData();
        log_message('info', "Successfully finished the process");
    }

    private function init()
    {
        log_message('info', "Data processing started");
        try {
            $this->db = Database::connect();
            $this->builder = $this->db->table('offers');
        } catch (\Throwable $th) {
            log_message('alert', "There was an error during connecting the database: " . $th->getMessage());
            die();
        }
        log_message('info', "Successfully connected to database");
    }

    private function getData()
    {
        $client = \Config\Services::curlrequest([
            'headers' => [
                'User-Agent' => 'testing/1.0',
                'Accept' => 'application/json',
                'X-API-KEY' => env('curlrequest.apikey', ''),
            ],
        ]);

        $done = false;
        $retry = 0;

        while (!$done && $retry < $this->maxRetry) {
            $response = $client->request('GET', 'http://testapi.swisshalley.com/hotels/');
            $code = $response->getStatusCode();
            $error = json_decode($response->getBody(), true)['error'];
            $done = $code == '200' && !$error;
            if (!$done) {
                $retry++;
                log_message('error', "There was an error during getting the data, retry");
            }

        }

        if (!$done) {
            log_message('error', "The process run on an error, terminating");
            die();
        }

        $this->offers = json_decode($response->getBody(), true)['data']['hotels'];
        log_message('info', "Successfully retrived the offers");
    }

    private function saveData()
    {
        try {
            $this->builder->insertBatch($this->offers);
        } catch (\Throwable $th) {
            log_message('error', "There was an error during saving the offers: " . $th->getMEssage());
            die();
        }
        log_message('info', "Successfully saved the offers");
    }

    private function deleteData()
    {
        $query = $this->builder->get();

        if ($query->getNumRows() > 0) {
            try {
                $query = $this->db->query('TRUNCATE TABLE `hotellisting`.`offers`');
            } catch (\Throwable $th) {
                log_message('error', "There was an error during emptying the cache table: " . $th->getMessage());
                die();
            }
        }
        log_message('info', "Successfully emptied the cache table");
    }
}
