<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Poem
 *
 * @author Alin
 */
class Poem {
    
    private $id;
    private $title;
    private $idBook;
    private $photo;
    private $content;
    private $date;
    
    function __construct($id, $title, $idBook, $photo, $content, $date) {
        $this->id = $id;
        $this->title = $title;
        $this->idBook = $idBook;
        $this->photo = $photo;
        $this->content = $content;
        $this->date = $date;
    }
    
    function getId() {
        return $this->id;
    }

    function getTitle() {
        return $this->title;
    }

    function getIdBook() {
        return $this->idBook;
    }

    function getPhoto() {
        return $this->photo;
    }

    function getContent() {
        return $this->content;
    }

    function getDate() {
        return $this->date;
    }

    function setId($id): void {
        $this->id = $id;
    }

    function setTitle($title): void {
        $this->title = $title;
    }

    function setIdBook($idBook): void {
        $this->idBook = $idBook;
    }

    function setPhoto($photo): void {
        $this->photo = $photo;
    }

    function setContent($content): void {
        $this->content = $content;
    }

    function setDate($date): void {
        $this->date = $date;
    }

}
