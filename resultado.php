<?php

    //IMPORTACIONES
    require_once 'elementoshtml.php';

?>

<!DOCTYPE html>
<html lang="es">
    <?php

        //Variables
        if($_GET['result'] == 'ok')
            $titulo = 'Correcto | BDEmpleados';
        else $titulo = 'Error | BDEmpleados';
        $css = 'resultado';

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
                $pagina = 'resultado';

                barraLateral($pagina);

            ?>
            <section>
                <?php
                    if($_GET['result'] == 'ok'){
                        echo '<img src="img/icons/ok.png" alt="OK" />'.
                        '<h1>La operación se ha realizado con éxito</h1>';
                    }else{
                        echo '<img src="img/icons/error.png" alt="ERROR" />';
                        switch($_GET['errno']){
                            case '1062':
                                echo '<h1>El DNI introducido ya existe</h1>';
                                break;
                            default:
                                echo '<h1>Ha ocurrido un error inesperado</h1>';
                                break;
                        }
                    }
                    echo '<a href="index.php" id="'.$_GET['result'].'">'.
                        'Volver a la Página Principal <i class="fa fa-angle-right" aria-hidden="true"></i>'.
                    '</a>';
                ?>
            </section>
        </main>
        <footer>
            <h1>FOOTER</h1>
        </footer>
    </body>
</html>