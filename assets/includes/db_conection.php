<?php
    // local
    $server='localhost';
    $username='root';
    $password='';
    $database = 'blogpoezii';

    $db = mysqli_connect($server, $username, $password, $database);
    mysqli_query($db, "set names 'utf8'");

    // iniciar la sesion
    if(!isset($_SESSION)){
        session_start();
    }

    function getURL()
    {
        if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on') 
            $link = "https"; 
        else
            $link = "http"; 
                            
        // Here append the common URL characters. 
        $link .= "://"; 
                            
        // Append the host(domain name, ip) to the URL. 
        $link .= $_SERVER['HTTP_HOST']; 
                            
        // Append the requested resource location to the URL 
        $link .= $_SERVER['REQUEST_URI'];

        return $link;
    }
?>