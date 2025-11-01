<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Форма обратной связи</title>
    <link rel="stylesheet" href="assets/css/styles.css"> <!-- если потребуется стилизация -->
</head>
<body>
<h2>Форма обратной связи</h2>

<!-- Форма отправляется на PHP-скрипт для обработки данных -->
<form action="scripts/handle_form.php" method="POST">

    <!-- Поле для имени (текст) -->
    <label for="name">Имя:</label>
    <input type="text" id="name" name="name" required>

    <!-- Поле для email (валидируемое email-поле) -->
    <label for="email">Email:</label>
    <input type="email" id="email" name="email" required>

    <!-- Поле для номера телефона (для удобства можно задать pattern) -->
    <label for="phone">Телефон:</label>
    <input type="tel" id="phone" name="phone" required pattern="^\+\d{1,3}\s\d{3}\s\d{6,7}$">
    <small>Формат: +7 702 1234567</small>

    <!-- Списковое поле для выбора темы обращения -->
    <label for="subject">Тема обращения:</label>
    <select id="subject" name="subject" required>
        <option value="Вопрос по продукту">Вопрос по продукту</option>
        <option value="Техническая поддержка">Техническая поддержка</option>
        <option value="Сотрудничество">Сотрудничество</option>
    </select>

    <!-- Поле для выбора приоритета -->
    <label for="priority">Приоритет:</label>
    <select id="priority" name="priority" required>
        <option value="Низкий">Низкий</option>
        <option value="Средний">Средний</option>
        <option value="Высокий">Высокий</option>
    </select>

    <!-- Поле для сообщения (текстовое многострочное поле) -->
    <label for="message">Сообщение:</label>
    <textarea id="message" name="message" rows="5" required></textarea>

    <!-- Кнопка отправки данных -->
    <button type="submit">Отправить</button>
</form>
</body>
</html>
