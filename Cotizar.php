<?php
    require('headerr.php');
    

    if (isset($_GET['id']) ) {
        $id = $_GET['id'];
        if(isset($id) && is_numeric($id))
        {
            require_once('funciones.php');
            $prod = ListarDatosPorID('Call SP_ConsultarProductosPorID()',$id);
        }
    }
?>

<div class="small-container carrito-pag">        
        <table >
            <tr>
                <th>Imagen</th>
                <th>Nombre</th>
            </tr>

            <tr>
                <td class="carrito-info"> 
                    
                    <img id="imagenProducto" 
                        src="<?php echo $prod[0]['Imagen']; ?>"
                        alt="<?php isset($prod[0]['NombreProd']) ?
                            print($prod[0]['NombreProd']) :
                            print(" Imagen")  ?>"

                        
                    >                 
                </td>

                <td>
                    <p><b>
                        <?php isset($prod[0]['NombreProd']) ?
                            print($prod[0]['NombreProd']) :
                            print("Nombre del Producto")  ?>
                    </b></p>
                </td>
            </tr>
        </table>

        <br><br><br><br><br>


        <section>
            <!-- DISEÑO DE UN FORMULARIO -->
            <form action='CorreoCotizar.php' method="post" class="formulario">
                <fieldset>
                    <legend>Para Cotizar un Producto, Llene el Siguiente Formulario</legend>
                    
                    <div class="contenedor-campos">
                        <div class="campo">
                            <label for="nombre">Nombre</label>
                            <input 
                                class="input-text" 
                                type="text" 
                                name="nombre"
                                placeholder="Nombre"
                                id="nombre"
                                onblur="ValidarNombre()">  

                            <img id="nombreAlert" 
                                src="images/iconos/alert.png" 
                                class="icon-hide" 
                                alt="alert.pngaValidacion" 
                                title="Este campo es necesario" />              
                        </div>

                        <div class="campo">
                            <label for="telefono">Telefono</label>
                            <input 
                                class="input-text" 
                                type="tel" 
                                name="telefono"
                                placeholder="Telefono"
                                id="telefono"
                                onblur="ValidarTelefono()">

                                <img id="telefonoAlert" 
                                src="images/iconos/alert.png" 
                                class="icon-hide" 
                                alt="alert.pngaValidacion" 
                                title="Digite un teléfono válido" />
                        </div>

                        <div class="campo">
                            <label for="nombreProducto">Nombre de Producto a Cotizar</label>
                            <input 
                                class="input-text" 
                                type="text" 
                                name="nombreProducto"
                                placeholder="<?php echo $prod[0]['NombreProd'];?>"
                                id="nombreProducto"
                                value="<?php isset($prod[0]['NombreProd']) ?
                                            print($prod[0]['NombreProd']): 
                                            print("Producto")?>" 
                                readonly
                            >
                                
                                <img id="asuntoAlert" 
                                    src="images/iconos/alert.png" 
                                    class="icon-hide" 
                                    alt="alert.pngaValidacion" 
                                    title="Este campo es necesario" />           
                        </div>

                        <div class="campo">
                            <label for="email">Correo</label>
                            <input 
                                class="input-text" 
                                type="email" 
                                name="correo"
                                placeholder="Correo"
                                id="email"
                                onblur="ValidarCorreo()" >
                                    
                                <img id="emailAlert" 
                                src="images/iconos/alert.png" 
                                class="icon-hide" 
                                alt="alert.pngaValidacion" 
                                title="Este campo es necesario" />
                        </div>
                        
                        <div class="campo">
                            <label for="mensaje">Mensaje</label>
                            <textarea 
                                class="input-text" 
                                name="msj"
                                id="mensaje" 
                                onblur="ValidarMensaje()"></textarea>    

                            <img id="mensajeAlert" 
                                src="images/iconos/alert.png" 
                                class="icon-hide" 
                                alt="alert.pngaValidacion" 
                                title="Este campo es necesario" />
                        </div>
                    </div>


                    <div class="alinear-derecha flex">
                        <input
                            id="btnEnviar"
                            type="submit"
                            name="enviar"
                            value="Enviar"
                            class="boton" 
                            onclick="return ValidarCotizar()"
                        >
                    </div>
                    
                </fieldset>
            </form>
        </section>
</div>

<script src="js/cotizar.js"></script>

<?php
    require('footer.php');
?>