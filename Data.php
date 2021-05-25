<?php

class Data{
    public static $url_states = "https://cdn-api.co-vin.in/api/v2/admin/location/states";
    public static $url_district_by_id = "https://cdn-api.co-vin.in/api/v2/admin/location/districts/";
    public static $url_slots_by_pin_range = "https://cdn-api.co-vin.in/api/v2/appointment/sessions/public/calendarByPin/";
    public static $url_slots_by_dist_range = "https://cdn-api.co-vin.in/api/v2/appointment/sessions/public/calendarByDistrict/";

    function curl_fetch_get($url){

        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

        $headers = array(
        "accept: application/json",
        "Accept-Language: hi_IN",
        );
        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
        $resp = curl_exec($curl);
        curl_close($curl);
        // var_dump($resp);
        return json_decode($resp, true);
    }

    function getStates(){
        return $this->curl_fetch_get(self::$url_states);
    }

    function getDistrictByStateId($state_id){
        $url = self::$url_district_by_id . $state_id;
        return $this->curl_fetch_get($url);
    }

    function getSlotsByPinRange($pin, $date){
        $url = self::$url_slots_by_pin_range . "?pincode=$pin&date=$date";
        return $this->curl_fetch_get($url);
    }

    function getSlotsByDistRange($dist_id, $date){
        $url = self::$url_slots_by_dist_range . "?district_id=$dist_id&date=$date";
        return $this->curl_fetch_get($url);
    }


}

?>