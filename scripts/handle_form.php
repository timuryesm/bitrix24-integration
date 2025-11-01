<?php
require_once '../config/api_config.php';
require_once '../lib/FormHandler.php';

try {
    $contactService = new ContactService(BITRIX24_WEBHOOK_URL);
    $dealService = new DealService(BITRIX24_WEBHOOK_URL);
    $formHandler = new FormHandler($contactService, $dealService);

    echo $formHandler->handleForm($_POST);
} catch (Exception $e) {
    echo "Ошибка: " . $e->getMessage();
}
