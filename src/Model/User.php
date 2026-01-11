<?php

class User {
    public $id;
    public $email;
    public $password_hash;
    private $created_at;

    public function getCreatedAt() {
        $date = new DateTime($this->created_at);

        return $date->modify("+1 week")->format('Y-m-d H:i:s');
    }
}