<?php

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;

if (!function_exists('set_active')) {
    function set_active($uri, $output = 'active'){
        if (is_array($uri)) {
            foreach ($uri as $u) {
                if (Route::is($u)) return $output;
            }
        } else {
            if (Route::is($uri)) return $output;
        }
    }
}

if(!function_exists('rupiah')){
    function rupiah($money){
      return  number_format($money, 0, ".", ".");
    }
}

if(!function_exists('listProvinsi')){
    function listProvinsi(){
       return  Cache::remember('listProvinsi', 60*60*24*30*6, function () {
            $response = Http::get(config('app.rajaongkir_url'). '/province',['key' => config('app.rajaongkir_key')]);
            if($response->successful()){
                $data = json_decode($response->body());
                return $data->rajaongkir->results;
            }
        });
    }
}

if(!function_exists('listCityID')){
    function listCityID($id){
       return  Cache::remember('listCityID'.$id, 60*60*24*30*6, function () use ($id){
            $response = Http::get(config('app.rajaongkir_url').'/city',['key' => config('app.rajaongkir_key'),'province'=>$id]);
            if($response->successful()){
                $data = json_decode($response->body());
                return $data->rajaongkir->results;
            }
        });
    }
}

if(!function_exists('searchCost')){
    function listsearchCostCityID($idcity,$kurir,$berat){
       return  Cache::remember('listCityID'. $idcity.'-'.$kurir.'-'.$berat, 60*60*24*30*6, function () use ($idcity,$berat,$kurir){
            $response = Http::post(config('app.rajaongkir_url'). '/cost',['key' => config('app.rajaongkir_key'), 'origin'=> '501', 'destination'=>$idcity, 'weight'=>$berat, 'courier'=>$kurir]);
            if($response->successful()){
                $data = json_decode($response->body());
                return $data->rajaongkir->results[0]->costs;
            }
        });
    }
}

