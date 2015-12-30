<?php

use Illuminate\Database\Seeder;
use App\Store;
use GuzzleHttp\Client;

class AddressTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $api_id = "AIzaSyBlrchX9elMViPeAvmcqaN74sftBGKNMNs";
        $client = new Client();
        $request = $client->request("GET","https://maps.googleapis.com/maps/api/place/textsearch/json",[
            'query' => ['query' => 'Drugstores in Philippines', 'key' => $api_id]
        ]);

        $result = $request->body();
        foreach($result in $result->results) {
            $store = new Store();
            $store->name = $result->name;
            $store->address = $result->formatted_address;
            $store->url = $result->icon;
            $store->lat = $result->geometry->location->lat;
            $store->long = $result->geoemtry->location-lng;
            $store->save();
        }
    }
}
