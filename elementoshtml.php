<?php

    /*** HEAD ***/
    function cabeceraPrincipal($titulo, $css){
        echo '<head>'.
                '<meta charset="utf-8" />'.
                '<meta name="author" content="rtorresgutierrez.guadalupe@alumnado.fundacionloyola.net" />'.
                '<title>'.$titulo.'</title>'.
                '<link rel="stylesheet" href="css/style.css" type="text/css" />'.
                '<link rel="stylesheet" href="css/'.$css.'.css" type="text/css" />'.
            '</head>';
    }

    /*** NAVBAR ***/
    function barraNavegacion($pagina){

        //Variables
        $elementos = array(
        array('index', 'AÑADIR'),
        array('mostrar', 'MOSTRAR'),
        array('buscar', 'BUSCAR')
        );

        echo '<nav>'.
                '<ul>';
                    foreach ($elementos as $elemento){
                        if($elemento == $pagina){
                            echo '<li>'.
                                    '<a href="#" class="selected">'.
                                        //ucfirst = Upper Case First (Primera letra en mayúscula)
                                        $elemento[1] .
                                    '</a>'.
                                '</li>';
                        }else{
                            echo '<li>'.
                                    '<a href="'.$elemento[0].'.php">' .
                                        $elemento[1] .
                                    '</a>'.
                                '</li>';
                        }
                    }
                echo '</ul>'.
            '</nav>';
    }

?>