<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Database
 *
 * @author Alin
 */
class Database {
    
    // local
    private static $hostName = "localhost";
    private static $userName = "root";
    private static $password = "";
    private static $dbName = "blogpoezii";
    
    private static $db=null;
    
    /**
     * 
     * @return object the connection made with the database
     */
    public static function connect(){
        if(self::$db === null){
            self::$db = new mysqli(self::$hostName, self::$userName, self::$password, self::$dbName);
            self::$db -> query("set names utf8");
        }
        return self::$db;
    }
    
    /**
     * @return boolean true if the connection was sucesfully closed and false otherwise
     */
    public static function closeConnection(){
        if(self::$db != null){
            self::$db->close();
            return true;
        }
        else{
            return false;
        }
    }
    
}
