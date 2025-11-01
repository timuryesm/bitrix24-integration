<?php
require_once 'Bitrix24API.php';

class DealService extends Bitrix24API {

    public function createDeal($contactId, $subject, $message) {
        return $this->sendRequest('crm.deal.add', [
            'fields' => [
                'TITLE' => $subject,
                'CONTACT_ID' => $contactId,
                'COMMENTS' => $message
            ]
        ]);
    }

    public function updateDealPriority($dealId, $priorityId) {
        return $this->sendRequest('crm.deal.update', [
            'id' => $dealId,
            'fields' => [
                'UF_CRM_1730111989' => $priorityId
            ]
        ]);
    }
}
