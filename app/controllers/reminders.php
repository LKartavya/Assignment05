<?php
require_once 'app/core/Controller.php';
require_once 'app/database.php';
require_once 'app/core/config.php';
require_once 'app/models/Reminder.php';
require_once 'app/models/Report.php';

class Reminders extends Controller {

    public function index() {
        $reminder = $this->model('Reminder');
        $reminders = $reminder->getReminders();
        $this->view('reminders/index', ['reminders' => $reminders]);
    }

    public function create() {
        $title = $_REQUEST['reminder-title'];
        $description = $_REQUEST['reminder-description'] ?? '';
        $due_date = $_REQUEST['reminder-due'];
        $priority = $_REQUEST['reminder-priority'] ?? 'medium';
        $reminder = $this->model('Reminder');
        $reminder->createReminder($title, $description, $due_date, $priority);
    }

    public function delete() {
        $id = $_REQUEST['id'];
        $reminder = $this->model('Reminder');
        $reminder->deleteReminder($id);
    }

    public function complete() {
        $id = $_REQUEST['id'];
        $value = $_REQUEST['completed'];
        $value = ($value == '1') ? 1 : 0;
        $reminder = $this->model('Reminder');
        $reminder->completeReminder($id, $value);
    }
} 