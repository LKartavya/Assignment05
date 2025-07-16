<?php

class Reminder {

    public function __construct() {

    }

    public function getReminders() {
        $db = db_connect();
        $user_id = $_SESSION['user_id'] ?? null;
        if ($user_id) {
            $query = $db->prepare("SELECT * FROM notes WHERE user_id = :user_id ORDER BY created_at DESC");
            $query->execute(['user_id' => $user_id]);
        } else {
            $query = $db->prepare("SELECT * FROM notes ORDER BY created_at DESC");
            $query->execute();
        }
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    public function createReminder($title, $description, $due_date, $priority) {
        $db = db_connect();
        $user_id = $_SESSION['user_id'] ?? null;
        if (!$user_id) {
            $_SESSION['alert'] = [
                'type' => 'error',
                'message' => 'You must be logged in to create a reminder.'
            ];
            header('Location: /reminders');
            return;
        }

        $query = $db->prepare("INSERT INTO notes (user_id, title, description, due_date, priority, completed, created_at) VALUES (:user_id, :title, :description, :due_date, :priority, 0, NOW())");
        $query->execute([
            'user_id' => $user_id,
            'title' => $title,
            'description' => $description,
            'due_date' => $due_date,
            'priority' => $priority
        ]);
        $_SESSION['alert'] = [
            'type' => 'success',
            'message' => 'Reminder is added!'
        ];
        header('Location: /reminders');
    }

    public function deleteReminder($id) {
        $db = db_connect();
        $user_id = $_SESSION['user_id'] ?? null;
        $query = $db->prepare("DELETE FROM notes WHERE id = :id AND user_id = :user_id");
        $query->execute(['id' => $id, 'user_id' => $user_id]);
        $_SESSION['alert'] = [
            'type' => 'success',
            'message' => 'Reminder is deleted!'
        ];
        header('Location: /reminders');
    }

    public function completeReminder($id, $value) {
        $db = db_connect();
        $user_id = $_SESSION['user_id'] ?? null;
        $query = $db->prepare("UPDATE notes SET completed = :value WHERE id = :id AND user_id = :user_id");
        $query->execute(['id' => $id, 'value' => $value, 'user_id' => $user_id]);
        $_SESSION['alert'] = [
            'type' => 'success',
            'message' => 'Reminder is completed!'
        ];
        header('Location: /reminders');
    }
} 