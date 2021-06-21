<?php
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

    function getPoem($conexion, $title)
    {
        $sql = "select * from poezie where titlu = '$title'";
        $resultat = mysqli_query($conexion, $sql);
        $result = mysqli_fetch_assoc($resultat);
        return $result;
    }

    function getPoemByID($conexion, $id)
    {
        $sql = "select * from poezie where id = '$id'";
        $resultat = mysqli_query($conexion, $sql);
        $result = mysqli_fetch_assoc($resultat);
        return $result;
    }

    function getBook($conexion, $title)
    {
        $sql = "select * from carte where titlu = '$title'";
        $res = mysqli_query($conexion, $sql);
        $result = mysqli_fetch_assoc($res);
        return $result;
    }

    function poemsListFromBook($conexion, $poemTitle)
    {
        $sql = "select p.* from poezie p join carte c on p.idCarte = c.id where c.titlu = '$poemTitle'";
        $res = mysqli_query($conexion, $sql);
        $result = array();
        if($res && mysqli_num_rows($res) >= 1){
            $result = $res;
        }
        return $result;
    }

    function getAutor($conexion)
    {
        $sql = "select * from autor";
        $res = mysqli_query($conexion, $sql);
        $result = mysqli_fetch_assoc($res);
        return $result;
    }

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

    function setCommentVisible($conexion, $commentID)
    {
        $sql = "update comentariu set vizibil = true where id = '$commentID'";
        $res = mysqli_query($conexion, $sql);
        return $res;
    }

    function deleteComment($conexion, $commentID)
    {
        $sql = "delete from comentariu where id = '$commentID'";
        $res=mysqli_query($conexion, $sql);
        return $res;
    }

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