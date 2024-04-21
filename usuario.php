<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./tabla.css"
    <title>Document</title>
</head>
<body>
    
    <table>
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Teléfono</th>
                <th>Correo electronico</th>
                <th>Contraseña</th>
                <th>Confirmar contraseña</th>
                <th>Eliminar</th>
                <th>Editar</th>
            </tr>
        </thead>
        <tbody>

                <?php
                require('./conexion.php');            
                $p=crud::seleccionardato();
                if(isset($_GET['id']))
                {
                    $id=$_GET['id'];
                    $e=crud::eliminar($id);
                }
                if(count($p)>0)
                {
                    for($i=0; $i<count($p); $i++)
                    {
                        echo '<tr>';
                        foreach($p[$i] as $key => $value)
                        {
                            if($key!='id')
                            {
                                echo'<td>'.$value.'</td>';
                            }
                        }
                        ?>
                        <td><a href="usuario.php?id=<?php echo $p[$i]['id']?>"><img src="./eliminar.png" alt="" srcset=""></a></td>
                        <td><a href="editar.php"><img src="./editar.jpg" alt="" srcset=""></a></td>
                        <?php
                        echo '</tr>';
                    }
                }
                ?>

        </tbody>
    </table>
</body>
</html>