<?php
class AuthController extends Controller {
    public function login() {
        session_start();
        $message = '';
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $userModel = $this->model('User');
            $user = $userModel->getByUsername($_POST['username']);
            if ($user && password_verify($_POST['password'], $user['password'])) {
                $_SESSION['user'] = $user['username'];
                header('Location: /');
                exit;
            } else {
                $message = 'Invalid credentials';
            }
        }
        $this->view('auth/login', ['message' => $message]);
    }

    public function register() {
        session_start();
        $message = '';
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $userModel = $this->model('User');
            try {
                $userModel->register($_POST['username'], $_POST['password']);
                header('Location: /?url=auth/login');
                exit;
            } catch (Exception $e) {
                $message = 'Username already taken';
            }
        }
        $this->view('auth/register', ['message' => $message]);
    }

    public function logout() {
        session_start();
        session_destroy();
        header('Location: /');
    }
}
