<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Book
 *
 * @author Alin
 */
class Book {
    
    private $id;
    private $title;
    private $photo;
    
    function __construct($id, $title, $photo) {
        $this->id = $id;
        $this->title = $title;
        $this->photo = $photo;
    }

    function getId() {
        return $this->id;
    }

    function getTitle() {
        return $this->title;
    }

    function getPhoto() {
        return $this->photo;
    }

    function setId($id): void {
        $this->id = $id;
    }

    function setTitle($title): void {
        $this->title = $title;
    }

    function setPhoto($photo): void {
        $this->photo = $photo;
    }


}
