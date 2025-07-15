<?php

class User {

    public $username;
    public $password;
    public $auth = false;

    public function __construct() {
        
    }

    public function test () {
      $db = db_connect();
      $statement = $db->prepare("select * from users;");
      $statement->execute();
      $rows = $statement->fetch(PDO::FETCH_ASSOC);
      return $rows;
    }

    public function logLoginAttempt($username, $result) {
        $db = db_connect();
        $statement = $db->prepare("INSERT INTO log (username, attempt, time) VALUES (:username, :attempt, NOW())");
        $statement->bindValue(':username', $username);
        $statement->bindValue(':attempt', $result);
        $statement->execute();
    }

    public function authenticate($username, $password) {
        $username = strtolower($username);
        $db = db_connect();

        // Lockout check
        if (isset($_SESSION['lockout_until']) && time() < $_SESSION['lockout_until']) {
            $_SESSION['login_error'] = 'Too many failed attempts. Please try again in ' . ($_SESSION['lockout_until'] - time()) . ' seconds.';
            $this->logLoginAttempt($username, 'locked');
            header('Location: /login');
            die;
        }

        $statement = $db->prepare("select * from users WHERE username = :name;");
        $statement->bindValue(':name', $username);
        $statement->execute();
        $rows = $statement->fetch(PDO::FETCH_ASSOC);
        if ($rows && ($password === $rows['password'] || password_verify($password, $rows['password']))) {
            $_SESSION['auth'] = 1;
            $_SESSION['username'] = ucwords($username);
            unset($_SESSION['failedAuth']);
            unset($_SESSION['lockout_until']);
            $this->logLoginAttempt($username, 'good');
            header('Location: /home');
            die;
        } else {
            if(isset($_SESSION['failedAuth'])) {
                $_SESSION['failedAuth'] ++; //increment
            } else {
                $_SESSION['failedAuth'] = 1;
            }
            if ($_SESSION['failedAuth'] >= 3) {
                $_SESSION['lockout_until'] = time() + 60;
                $_SESSION['failedAuth'] = 0;
                $_SESSION['login_error'] = 'Too many failed attempts. Please try again in 60 seconds.';
            } else {
                $_SESSION['login_error'] = 'Invalid username or password.';
            }
            $this->logLoginAttempt($username, 'bad');
            header('Location: /login');
            die;
        }
    }

    public function register($username, $password) {
        $username = strtolower($username);
        $db = db_connect();
        // Check if username exists
        $statement = $db->prepare("SELECT * FROM users WHERE username = :name;");
        $statement->bindValue(':name', $username);
        $statement->execute();
        $row = $statement->fetch(PDO::FETCH_ASSOC);
        if ($row) {
            return 'Username already exists.';
        }
        // Hash password and insert
        $hash = password_hash($password, PASSWORD_DEFAULT);
        $statement = $db->prepare("INSERT INTO users (username, password) VALUES (:name, :pass);");
        $statement->bindValue(':name', $username);
        $statement->bindValue(':pass', $hash);
        if ($statement->execute()) {
            return true;
        } else {
            return 'Registration failed. Please try again.';
        }
    }

}
