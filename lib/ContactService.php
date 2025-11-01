<?php
require_once 'Bitrix24API.php';

class ContactService extends Bitrix24API {

    public function findContact($phone, $email) {
        // Ищем по телефону, затем по email, если не найдено
        $contact = $this->sendRequest('crm.contact.list', ['filter' => ['PHONE' => $phone], 'select' => ['ID']]);

        if (!empty($contact)) {
            return $contact[0];
        }

        return $this->sendRequest('crm.contact.list', ['filter' => ['EMAIL' => $email], 'select' => ['ID']])[0] ?? null;
    }

    public function createContact($name, $email, $phone) {
        return $this->sendRequest('crm.contact.add', [
            'fields' => [
                'NAME' => $name,
                'EMAIL' => [['VALUE' => $email, 'VALUE_TYPE' => 'WORK']],
                'PHONE' => [['VALUE' => $phone, 'VALUE_TYPE' => 'WORK']]
            ]
        ]);
    }
}
