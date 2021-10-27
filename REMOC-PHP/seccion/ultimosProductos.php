 <!-- Ultimos Productos -->
 <div class="Products/p20.webp-container ultProd">
    <h2 class="Titulo">Ultimos Productos</h2>
        <div class="row">
            <?php foreach($resultado_nuevos as $prod): ?>
                    <div class="col-4" href="ProdAmpliado.php">  
                        
                        <div>
                            <img class="zoom img" loading="lazy" 
                            src="<?php echo $prod['Imagen']; ?>" 
                            alt="<?php echo $prod['NombreProd'] ?>">
                            
                            <br>

                            <h4><?php echo utf8_encode($prod['NombreProd']);?></h4>                                    
                                <div class="rating">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                </div>
                            <h4> 
                                <span>
                                    ₡ <?php echo $prod['Precio'];?>
                                </span>
                            </h4> 

                            <br>

                            <a href="Cotizar.php?id=<?php echo $prod['IDProd']?>" class="boton"\
                                style="text-decoration:none; color: #fff;"
                            >Cotizar</a>
                        </div>

                    </div>
                
            <?php endforeach; ?>
        </div>
</div>
