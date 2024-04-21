<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./registrarse.css">
    <title>Registro</title>

    <style>
        .form {
            width: 230px;
            height: 280px;
        }
    </style>    
</head>
<body>

        <?php
            require('./conexion.php');
            session_start();
            if(isset($_POST['Ingresar']))
            {
                $_SESSION['validate']=false;
                $nombre=$_POST['nombre'];
                $clave=$_POST['clave'];
                $p=crud::conect()->prepare('SELECT * FROM crudtable WHERE nombre=:n AND clave=:cl');
                $p->bindValue(':n', $nombre);
                $p->bindValue(':cl', $clave);
                $p->execute();
                $d=$p->fetchAll(PDO::FETCH_ASSOC);
                if($p->rowCount()>0)
                    {
                        $_SESSION['nombre']=$nombre;
                        $_SESSION['clave']=$clave;
                        $_SESSION['validate']=true;
                        header('location:home.php');
                    } else{
                            echo 'Inicio de sesión fallido, asegurate de estar registrado';
                          }
                
            }  
        
        
        ?>
    <div class="form">
    <div class="title">
        <p>Inicio de sesión</p>
    </div>
        <form action="" method="post">
            <input type="text" name="nombre" placeholder="Nombre">
            <input type="text" name="clave" placeholder="Contraseña">
            <input type="submit" value="Ingresar" name="Ingresar">
        </form>
    </div>
</body>
</html>