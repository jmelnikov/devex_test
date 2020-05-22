<?php


class CYandexApi
{
    private $hintList;

    public function getHints($request)
    {
        $this->makeHints($request);

        return json_encode($this->hintList, JSON_UNESCAPED_UNICODE);
    }
    
    private function makeHints($request)
    {
        $curl = curl_init('https://geocode-maps.yandex.ru/1.x?apikey=8e528e52-b4eb-4378-9d13-5c3b01a2e762&format=json&'.http_build_query(['geocode' => $request]));
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $jsonData = json_decode(curl_exec($curl), true);
        curl_close($curl);

        for($i=0; $i<6; $i++) {
            if(!empty($jsonData['response']['GeoObjectCollection']['featureMember'][$i]['GeoObject']['metaDataProperty']['GeocoderMetaData']['text'])) {
                $this->hintList[] = ['name' => $jsonData['response']['GeoObjectCollection']['featureMember'][$i]['GeoObject']['metaDataProperty']['GeocoderMetaData']['text']];
            }
        }
    }
}
