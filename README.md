# Project Roof - Bitrix24 Integration
This `README.md` file provides key information, project structure, and setup instructions.

## Project Description

This project is an integration with the Bitrix24 CRM system. Its main purpose is to automatically create deals based on data submitted through a contact form and link them to existing or new contacts in Bitrix24.

The contact form collects user information including name, email, phone number, inquiry subject, priority, and message. After submission:
	1.	The system searches for an existing contact in Bitrix24 by email or phone number.
	2.	If the contact is not found, a new one is created.
	3.	A deal is created and associated with the contact.
	4.	The priority field is set for the deal.
	
## Project Structure

project-roof
├── assets
│   ├── css                # Web page styling files
│   └── js                 # Client-side scripts
├── config
│   └── api_config.php     # Webhook configuration for Bitrix24 API
├── lib
│   ├── Bitrix24API.php        # Main class for Bitrix24 API requests
│   ├── ContactService.php     # Handles finding/creating Bitrix24 contacts
│   ├── DealService.php        # Handles creating/updating Bitrix24 deals
│   └── FormHandler.php        # Processes form data and coordinates API calls
├── scripts
│   └── handle_form.php        # Receives form POST data and triggers logic
├── index.php                  # Main HTML form page
└── README.md                  # Project documentation

## Installation & Configuration

1. Clone the project repository.
2. Open config/api_config.php and define your Bitrix24 webhook URL:
   ```php
   define('BITRIX24_WEBHOOK_URL', 'https://b24-vsijry.bitrix24.kz/rest/1/iqtvi855jk8by88i/');
3. Ensure you are running PHP 8.0+ and have a local web server installed.
   
## Usage

1. Start a local PHP server:
   ```php
    php -S localhost:8000
2. Open http://localhost:8000/index.php, чтобы увидеть форму обратной связи.
3. Fill out and submit the form.
	The script scripts/handle_form.php will:
	•	Process the data
	•	Find or create a contact
	•	Create a deal
	•	Update its priority

5. The result (“deal created” or error message) will be displayed on the screen.

## Main Files & Classes

### lib/Bitrix24API.php

Handles low-level communications with the Bitrix24 REST API.

### lib/ContactService.php

Searches for contacts by phone/email or creates new ones.

### lib/DealService.php

Creates deals and updates priority fields via crm.deal.update.

### lib/FormHandler.php

Coordinates form processing, contact lookup/creation, and deal creation.

### scripts/handle_form.php

Receives form submission and triggers FormHandler.

## Debugging & Testing

For easier debugging, configure Xdebug. PHP error output will assist during API integration testing.

## Requirements

	•	PHP 8.0+
	•	Bitrix24 account with API webhook access
