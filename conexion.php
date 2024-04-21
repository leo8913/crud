<?php

class crud{
    public static function conect()
    {
        try {
        $con=new PDO('mysql:localhost=host; dbname=tareacrud','root','');
        return $con;
    } catch (PDOException $error1){
        echo 'No se ha conectado a la base de datos'.$error1->getMessage();
        
    }catch (Exception $error2){
        echo 'Error generico'.$error2->getMessage();
    }
}

public static function seleccionardato()
{
    $dato=array();
    $p=self::conect()->prepare('SELECT * FROM crudtable');
    $p->execute();
    $dato=$p->fetchAll(PDO::FETCH_ASSOC);
    return $dato;
}
    

public static function eliminar($id)
{
    $p=crud::conect()->prepare('DELETE FROM crudtable WHERE id=:id');
    $p->bindValue(':id',$id);
    $p->execute();
}
}



?>