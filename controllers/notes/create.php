<?php

use KTS\src\Core\Database;
use KTS\src\Core\Validator;

$dbConfig = require __DIR__ . '/../../config/database.php';

$currentUserId = (int) $dbConfig['test_user_id'];

$db = new Database($dbConfig, $dbConfig['user'], $dbConfig['pass']);

$disabled = $_ENV['APP_ENV'] === 'production';

$errors = [];

if ($_SERVER["REQUEST_METHOD"] == "POST" && ! $disabled) {

    if (! Validator::string($_POST['body'], $dbConfig['note_body_char_min'], $dbConfig['note_body_char_max'])) {
        $errors['body'] = "The body must contain between {$dbConfig['note_body_char_min']} and {$dbConfig['note_body_char_max']} characters";
    }

    if (empty($errors)) {
        $db->query("INSERT INTO notes (body, user_id) VALUES (:body, :user_id)",
            [
                'body' => $_POST['body'],
                'user_id' => $currentUserId,
            ]);

        unset($_POST['body']);

        $notes = $db->query("SELECT * FROM notes WHERE user_id = $currentUserId")->get();

        view('notes/index.view.php', [
            'heading' => 'My Notes',
            'notes' => $notes,
        ]);
    }
}

if ($disabled) {
    view('notes/index.view.php', [
        'heading' => 'My Notes',
        'notes' => [],
    ]);
}

view('notes/create.view.php', [
    'heading' => 'Create Note',
    'errors' => $errors,
]);
