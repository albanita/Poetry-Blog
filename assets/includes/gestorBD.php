<?php
    // returns an array of last 4 poems ordered by the date of publication, posted on the blog and stored in the database. 
    function last4Poems($conexion)
    {
        $sql = "select * from poezie order by dataAdaugare desc limit 4";
        $poezii = mysqli_query($conexion, $sql);
        $result = array();
        if($poezii && mysqli_num_rows($poezii) >= 1){
            $result = $poezii;
        }
        return $result;
    }

    // returns an array of all the poems from the databse ordered by the date of publication
    function getAllPoems($conexion)
    {
        $sql = "select * from poezie order by dataAdaugare desc";
        $poezii = mysqli_query($conexion, $sql);
        $result = array();
        if($poezii && mysqli_num_rows($poezii) > 0){
            $result = $poezii;
        }
        return $result;
    }

    // return a string with the name of a collection of books given an id, stored in the DB
    function collectionName($conexion, $idCollection)
    {
        $sql = "select titlu from carte where id = $idCollection";
        $nume = mysqli_query($conexion, $sql);
        $result = '';
        if(!empty($nume))
        {
            $result = $nume;
        }
        return $result;
    }

    // returns an array of all the names of books stored in the DB
    function bookNames($conexion)
    {
        $sql = "select titlu from carte order by titlu asc";
        $carti = mysqli_query($conexion, $sql);
        $result = array();
        if($carti && mysqli_num_rows($carti) >= 1)
        {
            $result = $carti;
        }
        return $result;
    }

    // returns an array of books
    function bookList($conexion)
    {
        $sql = "select * from carte";
        $carti = mysqli_query($conexion, $sql);
        $result = array();
        if($carti && mysqli_num_rows($carti) >= 1)
        {
            $result = $carti;
        }
        return $result;
    }

    // returns a poem by a given title
    function getPoemByTitle($conexion, $title)
    {
        $sql = "select * from poezie where titlu = '$title'";
        $resultat = mysqli_query($conexion, $sql);
        $result = mysqli_fetch_assoc($resultat);
        return $result;
    }

    // returns a poem by a given ID
    function getPoemByID($conexion, $id)
    {
        $sql = "select * from poezie where id = '$id'";
        $resultat = mysqli_query($conexion, $sql);
        $result = mysqli_fetch_assoc($resultat);
        return $result;
    }

    // returns a book by a given title
    function getBook($conexion, $title)
    {
        $sql = "select * from carte where titlu = '$title'";
        $res = mysqli_query($conexion, $sql);
        $result = mysqli_fetch_assoc($res);
        return $result;
    }

    // returns an array of poems from a book with a given book title
    function poemsListFromBook($conexion, $bookTitle)
    {
        $sql = "select p.* from poezie p join carte c on p.idCarte = c.id where c.titlu = '$bookTitle'";
        $res = mysqli_query($conexion, $sql);
        $result = array();
        if($res && mysqli_num_rows($res) >= 1){
            $result = $res;
        }
        return $result;
    }

    // returns the data of the autor; in this case, the only person who is using the blog
    function getAutor($conexion)
    {
        $sql = "select * from autor";
        $res = mysqli_query($conexion, $sql);
        $result = mysqli_fetch_assoc($res);
        return $result;
    }

    // returns an array of visible comments for a poem by an ids poem given
    function getVisibleComments($conexion, $poemID)
    {
        $sql = "select nume, comentariu, dataAdaugare from comentariu where vizibil is true and idPoezie = '$poemID'";
        $res = mysqli_query($conexion, $sql);
        $result = array();
        if($res && mysqli_num_rows($res) >= 1)
        {
            $result = $res;
        }
        return $result;
    }

    // returns an array of invizible comments for a poem by an ids poem given
    function getInvizibleComments($conexion, $poemID)
    {
        $sql = "select id, nume, comentariu, dataAdaugare from comentariu where vizibil is not true and idPoezie = '$poemID'";
        $res = mysqli_query($conexion, $sql);
        $result = array();
        if($res && mysqli_num_rows($res) >= 1)
        {
            $result = $res;
        }
        return $result;
    }

    // makes a comment vizible for an ids comment given
    function setCommentVisible($conexion, $commentID)
    {
        $sql = "update comentariu set vizibil = true where id = '$commentID'";
        $res = mysqli_query($conexion, $sql);
        return $res;
    }

    // remove permanently a comment from the database, by an id comment given
    function deleteComment($conexion, $commentID)
    {
        $sql = "delete from comentariu where id = '$commentID'";
        $res=mysqli_query($conexion, $sql);
        return $res;
    }

    // returns an array of titles of all poems in the database
    function listPoemsTitle($conexion)
    {
        $sql = "select titlu from poezie";
        $res = mysqli_query($conexion, $sql);
        $resultat = array();
        $res1='|';
        while($resultat = mysqli_fetch_assoc($res)){
            $res1 .= "|". $resultat['titlu'];
        }
        return $res1;
    }
?>