<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./registrarse.css">
    <title>Registro</title>
</head>
<body>
    <?php
            require('./conexion.php');
            if (isset($_POST['Registrarse'])){
                $nombre=$_POST['nombre'];
                $apellido=$_POST['apellido'];
                $telefono=$_POST['telefono'];
                $correo=$_POST['correo'];
                $clave=$_POST['clave'];
                $confirmarclave=$_POST['confirmarclave'];

                
                if(!empty($_POST['nombre'])&& !empty($_POST['apellido'])&& !empty($_POST['telefono'])&& !empty($_POST['correo'])&& !empty($_POST['clave'])&& !empty($_POST['confirmarclave'])) {
                    if($clave==$confirmarclave){
                $p=crud::conect()->prepare('INSERT INTO crudtable(nombre,apellido,telefono,correo,clave,confirmarclave) VALUES(:n,:a,:t,:c,:cl,:cc)');
                $p->bindValue(':n',$nombre);
                $p->bindValue(':a',$apellido);
                $p->bindValue(':t',$telefono);
                $p->bindValue(':c',$correo);
                $p->bindValue(':cl',$clave);
                $p->bindValue(':cc',$confirmarclave);
                $p->execute();
                echo 'Registro realizado con exíto';
            }else{
                    echo 'La contraseña no coincide';
            }
        }
    }

    ?>
    <div class="form">
    <div class="title">
        <p>Formulario de registro</p>
    </div>
        <form action="" method="post">
            <input type="text" name="nombre" placeholder="Nombre">
            <input type="text" name="apellido" placeholder="Apellido">
            <input type="text" name="telefono" placeholder="Número de telefono">
            <input type="email" name="correo" placeholder="Correo electronico">
            <input type="password" name="clave" placeholder="Contraseña">
            <input type="password" name="confirmarclave" placeholder="Confirmar contraseña">
            <input type="submit" value="Registrarse" name="Registrarse">
        </form>
    </div>
</body>
</html>