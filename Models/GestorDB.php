<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of GestorDB
 *
 * @author Alin
 */
class GestorDB {
    
    public static $db;
    
    public function __construct() {
        self::$db = Database::connect();
    }
    
    public function closeConnection(){
        return Database::closeConnection();
    }
    
    /**
     * @return array all the poems from the database ordered descending by their add date
     */
    public static function getAllPoems($start, $end){
        
        $sql = "select * from poezie order by id desc limit $start, $end";
        $poems = self::$db->query($sql);
        return $poems;
    }
    
    public static function countPoems($id_book = null){
        if($id_book == null){
            $sql = "select count(*) as num from poezie";
        }
        else{
            $sql = "select count(*) as num from poezie where idCarte = $id_book";
        }
        $num = self::$db->query($sql);
        return $num->fetch_object()->num;
    }
    
    public static function getBookName($poem){
        $sql = "select titlu from carte where id = '$poem->idCarte'";
        $name = self::$db->query($sql);
        return $name->fetch_object()->titlu;
    }
    
    public static function getPoemById($id){
        $sql = "select * from poezie where id = $id";
        $poem = self::$db->query($sql);
        return $poem->fetch_object();
    }
    
    public static function getPoemByTitle($title){
        $sql = "select * from poezie where titlu = '$title'";
        $poem = self::$db->query($sql);
        if($poem != null){
            return $poem->fetch_object();
        }
        else{
            return null;
        }
    }
    
    public static function getComments($idPoem){
        $sql = "select * from comentariu where idPoezie = $idPoem";
        $comment = self::$db->query($sql);
        if($comment){
            return $comment;
        }
        else{
            return null;
        }
    }
    
    public static function getAllBooks(){
        $sql = "select * from carte";
        $books = self::$db->query($sql);
        return $books;
    }
    
    public static function addBook($book){
        $sql = "insert into carte values (null, '{$book->getTitle()}', '{$book->getPhoto()}')";
        $result = self::$db -> query($sql);
        return $result;
    }
    
    public static function getPoemsByBook($bookID, $start=null, $end=null){
        if($start != null && $end != null){
            $sql = "select * from poezie where idCarte = $bookID order by id desc limit $start, $end";
        }
        else{
            $sql = "select * from poezie where idCarte = $bookID order by id desc";
        }
        $poems = self::$db->query($sql);
        return $poems;
    }
    
    public static function savePoem($p){
        $sql = "insert into poezie values(null, '{$p->getTitle()}', '{$p->getIdBook()}', '{$p->getPhoto()}', '{$p->getContent()}', CURDATE())";
        $result = self::$db -> query($sql);
        if($result){
            return true;
        }
        else{
            return false;
        }
    }
    
    public static function deletePoem($id){
        $sql = "delete from poezie where id = $id";
        $result = self::$db -> query($sql);
        if($result){
            return true;
        }
        else{
            return false;
        }
    }
    
    public static function updatePoem($poem){
        $sql = "update poezie set "
                . "titlu = '{$poem->getTitle()}', "
                . "idcarte = '{$poem->getIdBook()}', "
                . "poza = '{$poem->getPhoto()}', "
                . "continut = '{$poem->getContent()}' "
                . "where id = '{$poem->getId()}'";
        $result = self::$db->query($sql);
        if($result){
            return true;
        }
        else{
            return false;
        }
    }
    
    public static function insertComment($comment){
        $sql = "insert into comentariu values (null, "
                . "'{$comment->getIdPoem()}', "
                . "'{$comment->getIdBook()}', "
                . "'{$comment->getName()}', "
                . "'{$comment->getComment()}', "
                . "CURDATE(), "
                . "false)";
        $result = self::$db->query($sql);
        if($result){
            return true;
        }
        else{
            return false;
        }
    }
    
    // validate the comment with the id given
    public static function validateComment($id){
        $sql = "update comentariu set vizibil = true where id = $id";
        $result = self::$db->query($sql);
        if($result){
            return true;
        }
        else{
            return false;
        }
    }
    
    // delete the comment with the id given
    public static function deleteComment($id){
        $sql = "delete from comentariu where id = $id";
        $result = self::$db->query($sql);
        if($result){
            return true;
        }
        else{
            return false;
        }
    }
    
    public static function getAutor($usrName, $password){
        $sql = "select * from autor where numeUtilizator like '$usrName'";
        $result = self::$db->query($sql);
        if($result -> num_rows == 1){
            $usr = $result->fetch_object();
            if(password_verify($password, $usr->parola)){
                $autor = new Autor($usr->id, $usr->numeUtilizator, $usr->parola, $usr->email, $usr->poza, $usr->despre);
                return $autor;
            }
            else{
                return false;
            }
        }
        else{
            return false;
        }
    }
    
    public static function getAutorInfo(){
        $sql = "select * from autor";
        $result = self::$db->query($sql);
        if($result -> num_rows == 1){
            $usr = $result->fetch_object();
            $autor = new Autor($usr->id, $usr->numeUtilizator, $usr->parola, $usr->email, $usr->poza, $usr->despre);
            return $autor;
        }
        else{
            return null;
        }
    }
    
    public static function addAutor($usrName, $pass){
        $password = password_hash($pass, PASSWORD_BCRYPT, ['cost' => 12]);
        $sql = "insert into autor values (null, '{$usrName}', '{$password}', '', '', '')";
        $result = self::$db->query($sql);
        if($result){
            return true;
        }
        else{
            return false;
        }
    }
    
    public static function updateAutor($autor){
        $about = self::$db->real_escape_string($autor->getAbout());
        $sql = "update autor set "
                . "email = '{$autor->getEmail()}', "
                . "poza = '{$autor->getPhoto()}', "
                . "despre = '{$about}'";
                
        $result = self::$db->query($sql);
        if($result){
            return true;
        }
        else{
            return false;
        }
    }
    
    public static function getAutorEmail(){
        $sql = "select email from autor";
        $result = self::$db->query($sql);
        $email = $result->fetch_object();
        return $email->email;
    }
    
    public static function addFallower($email){
        $sql = "insert into abonati values ('$email')";
        $result = self::$db->query($sql);
        if($result){
            return true;
        }
        else{
            return false;
        }
    }
    
    public static function deleteFallower($email){
        $sql = "delete from abonati where email = '$email'";
        $result = self::$db->query($sql);
        if($result){
            return true;
        }
        else{
            return false;
        }
    }
    
    public static function getAllFallowers(){
        $sql = "select email from abonati";
        $result = self::$db->query($sql);
        if($result != null){
            return $result;
        }
        else{
            return null;
        }
    }
    
    public static function lastPoemId(){
        $sql = "select max(id) as lastId from poezie";
        $result = self::$db -> query($sql);
        $res = $result->fetch_object();
        return $res -> lastId;
    }
    
    public static function getAllPoemTitles() {
        $sql = "select titlu from poezie";
        
        //$res = mysqli_query($conexion, $sql);
        $res = self::$db -> query($sql);
        $resultat = array();
        $res1='|';
        while($resultat = mysqli_fetch_assoc($res)){
            $res1 .= "|". $resultat['titlu'];
        }
        return $res1;
    }
}
