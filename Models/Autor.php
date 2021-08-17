<?php

class Autor {
    
    private $id;
    private $userName;
    private $password;
    private $email;
    private $photo;
    private $about;
    
    function __construct($id, $userName, $password, $email, $photo, $about) {
        $this->id = $id;
        $this->userName = $userName;
        $this->password = $password;
        $this->email = $email;
        $this->photo = $photo;
        $this->about = $about;
    }

    function getId() {
        return $this->id;
    }

    function getUserName() {
        return $this->userName;
    }

    function getPassword() {
        return $this->password;
    }

    function getEmail() {
        return $this->email;
    }

    function getPhoto() {
        return $this->photo;
    }

    function getAbout() {
        return $this->about;
    }

    function setId($id): void {
        $this->id = $id;
    }

    function setUserName($userName): void {
        $this->userName = $userName;
    }

    function setPassword($password): void {
        $this->password = $password;
    }

    function setEmail($email): void {
        $this->email = $email;
    }

    function setPhoto($photo): void {
        $this->photo = $photo;
    }

    function setAbout($about): void {
        $this->about = $about;
    }

}
