<?php

use Illuminate\Database\Seeder;
use App\Store;

class StoreTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('stores')->truncate();
        $page_token = null;
        while(true) {
            $api_id = "AIzaSyCWhdA9YqfE9lIbFlFLLPbyZvEwR8hdyQ4";
            if(is_null($page_token)) {
                $get_data = http_build_query([
                    'query' => 'Drugstores in the Philippines',
                    'key' => $api_id
                ]);           
                $results = file_get_contents('https://maps.googleapis.com/maps/api/place/textsearch/json?' . $get_data ,false);
                $results = json_decode($results);
                foreach($results->results as $result) {
                    $store = new Store();
                    $store->name = $result->name;
                    $store->address = $result->formatted_address;
                    $store->url = $result->icon;
                    $store->lat = $result->geometry->location->lat;
                    $store->long = $result->geometry->location->lng;
                    $store->save();
                }
                $page_token = $results->next_page_token;
            } else {
                $api_id = "AIzaSyBlrchX9elMViPeAvmcqaN74sftBGKNMNs";
                $get_data = http_build_query([
                    'query' => 'Drugstores in Philippines',
                    'key' => $api_id,
                    'pagetoken' => $page_token
                ]);           
                $results = file_get_contents('https://maps.googleapis.com/maps/api/place/textsearch/json?' . $get_data ,false);
                $results = json_decode($results);
                foreach($results->results as $result) {
                    $store = new Store();
                    $store->name = $result->name;
                    $store->address = $result->formatted_address;
                    $store->url = $result->icon;
                    $store->lat = $result->geometry->location->lat;
                    $store->long = $result->geometry->location->lng;
                    $store->save();
                }

                if(is_null($results->next_page_token)) {
                    break;
                } else {
                    $page_token = $results->next_page_token;
                }
            }
        }
    }
}
