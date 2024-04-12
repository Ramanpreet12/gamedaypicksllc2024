<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Client;
use Exception;


class CloverController extends Controller
{
    public function getTaxRates()
    {
        // $clientId = '19b39e5c5aa5bbefe7acdff48f05b3cb';
        // $clientSecret = 'bf692d75-0bc6-221b-28eb-4f09888645cf';

        // // Obtain access token
        // $response = Http::post('https://api.clover.com/oauth/token', [
        //     'client_id' => $clientId,
        //     'client_secret' => $clientSecret,
        //     'grant_type' => 'client_credentials'
        // ]);
        // dd($response);

        // $accessToken = $response->json('access_token');

        // Fetch tax rates
        // $response = Http::withHeaders([
        //     'Authorization' => 'Bearer ' . '854b1383-48d3-0cb5-f1c8-843740c1f8af',
        // ])->get('https://api.clover.com/v3/merchants/372185380881/tax_rates');
        $client = new \GuzzleHttp\Client();
        $response = $client->request('GET', 'https://api.clover.com/v3/merchants/372185380881/tax_rates', [
            'headers' => [
              'accept' => 'application/json',
              'authorization' => 'Bearer 19b39e5c5aa5bbefe7acdff48f05b3cb',
            ],
          ]);

        dd($response);
        // $taxRates = $response->json();

        return $taxRates;
    }
}
