<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Comment
 *
 * @author Alin
 */
class Comment {
    
    private $id;
    private $idPoem;
    private $idBook;
    private $name;
    private $comment;
    private $date;
    private $visible;
    
    function __construct($id, $idPoem, $idBook, $name, $comment, $date, $visible) {
        $this->id = $id;
        $this->idPoem = $idPoem;
        $this->idBook = $idBook;
        $this->name = $name;
        $this->comment = $comment;
        $this->date = $date;
        $this->visible = $visible;
    }
    
    function getId() {
        return $this->id;
    }

    function getIdPoem() {
        return $this->idPoem;
    }

    function getIdBook() {
        return $this->idBook;
    }

    function getName() {
        return $this->name;
    }

    function getComment() {
        return $this->comment;
    }

    function getDate() {
        return $this->date;
    }

    function getVisible() {
        return $this->visible;
    }

    function setId($id): void {
        $this->id = $id;
    }

    function setIdPoem($idPoem): void {
        $this->idPoem = $idPoem;
    }

    function setIdBook($idBook): void {
        $this->idBook = $idBook;
    }

    function setName($name): void {
        $this->name = $name;
    }

    function setComment($comment): void {
        $this->comment = $comment;
    }

    function setDate($date): void {
        $this->date = $date;
    }

    function setVisible($visible): void {
        $this->visible = $visible;
    }
}
