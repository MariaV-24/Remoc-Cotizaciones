<!-- Carrucel -->
<div id="carrucel" class="small-container">
    <h2 class="Titulo">Productos Destacados</h2>

        <div class=" contenedor owl-carousel owl-theme">
            <?php foreach($resultado_destacados as $prod): ?>                
                <div class="item">
                
                    <img class="zoom img carrucelAjustes" loading="lazy" 
                        src="<?php echo $prod['Imagen']; ?>"
                        alt="<?php echo $prod['NombreProd'] ?>"
                    >
                    <br>

                    <h4><?php echo $prod['NombreProd'];?></h4>
                </div>  
            <?php endforeach; ?>
        </div>
</div>