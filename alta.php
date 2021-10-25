<?php

    //IMPORTACIONES
    require_once 'clases/empleado.php';
    require_once 'elementoshtml.php';

    //Se envian los datos al método
    if (isset($_POST['enviar']))
        if (!empty($_POST['dni']) && !empty($_POST['nombre']) && !empty($_POST['telf'])) {
            $empleado = new Empleado();

            //Validar si correo viene vacío
            if($_POST['correo'] != '')
                $_POST['correo'] = '\''.$_POST['correo'].'\'';
            else
                $_POST['correo'] = 'NULL';
            
            //Consulta SQL para añadir una fila nueva a la tabla empleado
            $sql =  "INSERT INTO empleado(dni, nombre, correo, telefono)".
                "VALUES('".$_POST['dni']."', '".$_POST['nombre']."', ".$_POST['correo'].", '".$_POST['telf']."');";
            
            //Mandar la consulta a la Base de Datos
            $resultado = $empleado->consultar($sql);        
            
            //Cerrar conexión
            $empleado->cerrarConexion();

            //Enviar a página de correcto o error, depende el resultado
            if($resultado)
                header('location:correcto.php');
            else header('location:error.php');
        }

?>

<!DOCTYPE html>
<html lang="es">
    <?php

        //Variables
        $titulo = 'Añadir | BDEmpleados';
        $css = 'alta';

        cabeceraPrincipal($titulo, $css);

    ?>
	<body>
        <header>
            <h1>HEADER</h1>
        </header>
        <nav>
            <h1>NAV</h1>
        </nav>
        <main>
            <?php

                //Variables
                $pagina = 'alta';

                barraLateral($pagina);

            ?>
            <section>
                <h1>ALTA</h1>
                <!-- FORMULARIO DE ALTA A EMPLEADO -->
                <form action="alta.php" method="post">
                    <!-- DNI -->
                    <div>
                        <label for="dni">DNI: </label>
                        <input type="text" name="dni" required />
                    </div>
                    <!-- NOMBRE -->
                    <div>
                        <label for="nombre">Nombre: </label>
                        <input type="text" name="nombre" required />
                    </div>
                    <!-- CORREO -->
                    <div>
                        <label for="correo">Correo: </label>
                        <input type="text" name="correo" />
                    </div>
                    <!-- TELÉFONO -->
                    <div>
                        <label for="telf">Teléfono: </label>
                        <input type="text" name="telf" required />
                    </div>
                    <!-- BOTONES -->
                    <div id="botones">
                        <input type="submit" name="enviar" value="ENVIAR" />
                        <input type="reset" name="cancelar" value="CANCELAR" />
                    </div>
                </form>
            </section>
        </main>
        <footer>
            <h1>FOOTER</h1>
        </footer>
    </body>
</html>