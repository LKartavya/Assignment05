<?php

class Create extends Controller {

    public function index() {		
	    $this->view('create/index');
    }

    public function register() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = trim($_POST['username']);
            $password = $_POST['password'];
            $confirm = $_POST['confirm_password'];

            if (strlen($password) < 6) {
                $_SESSION['register_error'] = 'Password must be at least 6 characters.';
                header('Location: /create');
                exit;
            }
            
            if ($password !== $confirm) {
                $_SESSION['register_error'] = 'Passwords do not match.';
                header('Location: /create');
                exit;
            }

            $user = $this->model('User');
            $result = $user->register($username, $password);
            if ($result === true) {
                $_SESSION['register_success'] = 'Account created. Please log in.';
                header('Location: /login');
                exit;
            } else {
                $_SESSION['register_error'] = $result;
                header('Location: /create');
                exit;
            }
        } else {
            header('Location: /create');
            exit;
        }
    }
}
