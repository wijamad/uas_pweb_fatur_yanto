<?php

class Login extends Controller {
    public function index()
    {
        if ( isset($_COOKIE["userId"]) && isset($_COOKIE["username"]) ) {
            $dataUser = $this->model('User_model')->getUserById($_COOKIE["userId"]);
      
            if ( $_COOKIE["username"] === $dataUser["username"] ) {
              $_SESSION["login"] = true;
              $_SESSION["id"] = $dataUser["accountID"];
            }
        }
      
        if ( isset($_SESSION["login"]) ) {
            header('Location: ' . BASEURL . '/home');
            exit;
        }

        $data['titleHal'] = 'Login';
        $this->view('login/index', $data);
        $this->view('templates/foother');
    }

    public function loginPermission()
    {
        if ( $this->model('User_model')->userCount($_POST) > 0 ) {
            $dataUser = $this->model('User_model')->getUserByUsernameAndPassword($_POST);
            $_SESSION["login"] = true;
            $_SESSION["id"] = $dataUser["accountID"];
            

            if ( isset($_POST["remember"]) ) {
                $dataUser = $this->model('User_model')->userLogin($_POST);
                setcookie('userId', $dataUser['accountID'], time()+600, BASEURL);
                setcookie('username', $dataUser['username'], time()+600, BASEURL);
            }

            header('Location: ' . BASEURL . '/home');
        } else {
            header('Location: ' . BASEURL . '/login');
        }
    }
}
