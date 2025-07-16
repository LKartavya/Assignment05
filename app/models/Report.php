<?php

class Report {

    public function __construct() {

    }

    public function getReportsData() {
        $db = db_connect();
        $reminders = $db->query("SELECT notes.*, users.username FROM notes JOIN users ON notes.user_id = users.id ORDER BY notes.created_at DESC")->fetchAll(PDO::FETCH_ASSOC);
        $user_counts = $db->query("SELECT users.username, COUNT(*) as count FROM notes JOIN users ON notes.user_id = users.id GROUP BY users.username")->fetchAll(PDO::FETCH_ASSOC);

        $most_reminders = null;
        if ($user_counts && count($user_counts) > 0) {
            $most_reminders = $user_counts[0];
            foreach ($user_counts as $uc) {
                if ($uc['count'] > $most_reminders['count']) {
                    $most_reminders = $uc;
                }
            }
        }

        $logins = $db->query("SELECT username, COUNT(*) as count FROM log WHERE attempt = 'good' GROUP BY username")->fetchAll(PDO::FETCH_ASSOC);

        return [
            'reminders' => $reminders,
            'user_counts' => $user_counts,
            'most_reminders' => $most_reminders,
            'logins' => $logins
        ];
    }
} 