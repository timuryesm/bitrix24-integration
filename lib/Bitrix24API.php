<?php

class Bitrix24API {
    protected $webhookUrl;

    public function __construct($webhookUrl) {
        $this->webhookUrl = $webhookUrl;
    }

    // Метод для отправки запросов к API
    public function sendRequest($method, $params = []) {
        $url = $this->webhookUrl . $method;
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($params));
        $response = curl_exec($ch);
        curl_close($ch);

        $data = json_decode($response, true);

        if (!$data || !isset($data['result'])) {
            throw new Exception('Ошибка при обращении к API Битрикс24');
        }

        return $data['result'];
    }
}
