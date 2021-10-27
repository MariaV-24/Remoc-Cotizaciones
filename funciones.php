<?php

//funciones
    require('database/ConexionDB.php');
    

 /*****************************************************************************************************************************************/
    /*FUNCION PARA OBTENER artesana*/
    $datos_artesana = 'SELECT Imagen, CodigoArtesana, NombreArtesana, ApellidoArtesana 
    from artesanas_imagen
    inner join artesana
    on artesanas_imagen.IDImagenArtesana = artesana.IDArtesana
    where artesana.IDArtesana > 1;'
    ;

    $sentenciaArt = $cnn->prepare($datos_artesana);
    $sentenciaArt->execute();

    $resultadoArt = $sentenciaArt->fetchAll();
    //var_dump($resultadoArt);


    
    /*****************************************************************************************************************************************/
    /*FUNCION PARA OBTENER Eventos*/
    $datos_Eventos = 
        'SELECT * from Evento where IDEvento >= 1;'
    ;

    $sentenciaArt = $cnn->prepare($datos_Eventos);
    $sentenciaArt->execute();

    $resultadoEventos = $sentenciaArt->fetchAll();

 /*****************************************************************************************************************************************/
    /*FUNCION PARA PRODUCTOS DESTACADOS*/
    $ProdDestacados = 
    'SELECT 
        imagen_producto.IDProd, 
        imagen_producto.Imagen, 

        producto.NombreProd,
        producto.IDProd,
        producto.Precio,
        producto.Categoria
        
    FROM imagen_producto

    INNER JOIN producto
    ON producto.IDProd = imagen_producto.IDProd

    WHERE producto.Categoria = "Destacados"
    order by producto.IDProd desc
    '
    ;

    $sentenciaArt = $cnn->prepare($ProdDestacados);
    $sentenciaArt->execute();

    $resultado_destacados = $sentenciaArt->fetchAll();
    //var_dump($resultadoArt);

    /*****************************************************************************************************************************************/
    /*FUNCION PARA PRODUCTOS NUEVOS*/
    $ProdNuevos = 
    'SELECT 
        imagen_producto.IDProd, 
        imagen_producto.Imagen, 

        producto.NombreProd,
        producto.IDProd,
        producto.Precio,
        producto.Categoria
    from imagen_producto

    INNER JOIN producto
    ON producto.IDProd = imagen_producto.IDProd

    WHERE producto.Categoria = "Nuevo"
    order by producto.IDProd desc;'
    ;

    $sentenciaArt = $cnn->prepare($ProdNuevos);
    $sentenciaArt->execute();

    $resultado_nuevos = $sentenciaArt->fetchAll();
    //var_dump($resultadoArt);
    

/****************PROCEDIMIENTOS ALMACENADOS*****************/
    /*FUNCION para listar todos los datos*/

    function ListarDatos($nombreSP){
        require('database/ConexionDB.php'); 
        
        $query = $cnn;
        $query=  $cnn->prepare($nombreSP);
        $query->execute();
        $resultado_productos= $query->fetchAll();
        return $resultado_productos;
    }

    /*FUNCION PARA LISTAR POR ID*/

    function ListarDatosPorID($nombreSP,$id){
        require('database/ConexionDB.php'); 
        
                    /* ↓ llama el sp y con el indice -1, llena o reescribe dentro de la cadenaSP los datos */
        $consulta = substr_replace($nombreSP,$id.")", -1);

        $query = $cnn;
        $query=  $cnn->prepare($consulta);
        $query-> execute();
        $resultado_productos= $query->fetchAll();
        return $resultado_productos;
    }

    /******* Paginacion ********/

    function ListarDatosPaginados($nombreSP){
        require('database/ConexionDB.php');  
        
        $pagina = $_GET['pagina'];

        $registrosPorPagina = 15;
        $iniciar= ($pagina - 1 ) * $registrosPorPagina;
                                            /* ↓ parametro del SP*/
        $nombreSP = substr_replace($nombreSP, $iniciar. ",". $registrosPorPagina.")",-1);
        
        $query = $cnn;              
        $query = $cnn->prepare($nombreSP);
        $query-> execute();
        $resultado_productos = $query->fetchAll();

        if (!empty($resultado_productos)){
            return $resultado_productos;
        }
        else return null;
    }





























?>