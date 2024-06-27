<?php

namespace App\Services;

use GuzzleHttp\Client;

class SupabaseService
{
    protected $client;
    protected $url;
    protected $key;

    public function __construct()
    {
        $this->client = new Client();
        $this->url = rtrim(env('SUPABASE_URL'), '/') . '/rest/v1';
        $this->key = env('SUPABASE_KEY');

        //debug
        if (empty($this->url) || empty($this->key)) {
            throw new \Exception('Supabase URL or Key is not set. URL: ' . $this->url . ' Key: ' . $this->key);
        }
    }

    public function get($endpoint, $queryParams = [])
    {
        try {
            $response = $this->client->request('GET', $this->url . $endpoint, [
                'headers' => [
                    'Authorization' => 'Bearer ' . $this->key,
                    'apikey' => $this->key,
                ],
                'query' => $queryParams,
            ]);

            return json_decode($response->getBody(), true);
        } catch (\Exception $e) {
            return ['error' => $e->getMessage()];
        }
    }

    public function post($endpoint, $data)
    {
        try {
            $response = $this->client->request('POST', $this->url . $endpoint, [
                'headers' => [
                    'Authorization' => 'Bearer ' . $this->key,
                    'apikey' => $this->key,
                    'Content-Type' => 'application/json',
                ],
                'body' => json_encode($data),
            ]);

            return json_decode($response->getBody(), true);
        } catch (\Exception $e) {
            return ['error' => $e->getMessage()];
        }
    }
}
