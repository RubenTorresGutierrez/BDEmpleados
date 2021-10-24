<?php

    //IMPORTACIONES
    require_once 'elementoshtml.php';

?>

<!DOCTYPE html>
<html lang="es">
    <?php

        //Variables
        $titulo = 'Correcto | BDEmpleados';
        $css = 'resultadooperacion';

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
                $pagina = 'correcto';

                barraLateral($pagina);

            ?>
            <section>
                <img src="img/icons/ok.png" alt="OK" />
                <h1>La operación se ha realizado con éxito</h1>
                <a href="index.php" id="correcto">
                    Volver a la Página Principal <i class="fa fa-angle-right" aria-hidden="true"></i>
                </a>
            </section>
        </main>
        <footer>
            <h1>FOOTER</h1>
        </footer>
    </body>
</html>