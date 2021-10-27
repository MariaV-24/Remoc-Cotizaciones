<h1 class="Titulo" style="margin-bottom: 25px;">Nuestras Artesanas</h1>

<?php
    if(isset($_GET['pagina'])&& is_numeric($_GET['pagina'])){
        require('funciones.php');  
    }
?>

<section class="row" style="margin-bottom: 25px;">
    <div class="artesana">              
        <?php foreach($resultadoArt as $artes): ?>    
                <div class="polaroid containerrr">
                    <img class="img" loading="lazy" 
                    src="<?php echo $artes['Imagen'];?>" 
                    alt="Img">
                    <p><?php echo $artes['CodigoArtesana'];?></p>
                    <p><?php echo $artes['NombreArtesana'] ." ";?><?php echo $artes['ApellidoArtesana'];?></p>
                </div>                    
        <?php endforeach; ?>          
    </div>
</section>
