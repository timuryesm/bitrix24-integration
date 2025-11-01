<?php
require_once 'ContactService.php';
require_once 'DealService.php';

class FormHandler {
    private $contactService;
    private $dealService;

    public function __construct($contactService, $dealService) {
        $this->contactService = $contactService;
        $this->dealService = $dealService;
    }

    public function handleForm($formData) {
        $name = $formData['name'] ?? '';
        $email = $formData['email'] ?? '';
        $phone = $formData['phone'] ?? '';
        $subject = $formData['subject'] ?? '';
        $priority = $formData['priority'] ?? '';
        $message = $formData['message'] ?? '';

        if (empty($name) || empty($email) || empty($phone)) {
            throw new Exception('Заполните все обязательные поля.');
        }

        // Ищем или создаем контакт
        $contact = $this->contactService->findContact($phone, $email);
        $contactId = $contact['ID'] ?? $this->contactService->createContact($name, $email, $phone);

        // Создаем сделку
        $dealId = $this->dealService->createDeal($contactId, $subject, $message);

        // Обновляем приоритет сделки
        $priorityId = $this->mapPriorityToBitrixId($priority);
        $this->dealService->updateDealPriority($dealId, $priorityId);

        return "Сделка успешно создана и приоритет обновлен!";
    }

    private function mapPriorityToBitrixId($priority) {
        $mapping = [
            'Низкий' => '44',
            'Средний' => '46',
            'Высокий' => '48'
        ];
        return $mapping[$priority] ?? '1';
    }
}
