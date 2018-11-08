<?php

namespace metaxiii\blog;

class UserDAO {

    protected $db;

    public function __construct()
    {
        $this->db = Database::getPdo();
    }

    public function get(array $data = null) {
        $name = $data['name'];
        $password = sha1($data['password']);
        $query = "SELECT * FROM user WHERE username = :username AND password = :password";
        $req = $this->db->prepare($query);
        $req->bindValue(':username', $name);
        $req->bindValue(':password', $password);
        $req->execute();
        if ($req->rowCount()) {
            setFlash("Vous êtes maintenant connecté", "success");
            $_SESSION['Auth'] = $req->rowCount();
            header('location: ' .ROOT . 'admin');
            die();
        }
        else {
            setFlash("Mauvaise combinaison username / password", "danger");
            header('location: ' .ROOT . 'login');
            die();
        }
    }
}
