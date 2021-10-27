<!-- PAGINACION -->
<section class="contenedor paginacion NoSubra">

    <?php
        $Url = $_SERVER['PHP_SELF']; 
    ?>	
    <nav aria-label="Page navigation example">
        <ul class="paginacion">
        
            <!-- primera pag -->
            <li class="page-item
                <?php echo $_GET['pagina']<=1 ? 'disabled' : "" ?>">
                <a class="page-link" 
                    href="<?php echo $Url."?pagina=" . ($_GET['pagina']-1)?>" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                </a>
            </li>
            
            <!-- CENTRO -->
            <?php for ($i=1; $i <= ceil($resultado_productos[0]['rs'] / 15); $i++): ?> 	
                <li class="espacios page-item 
                                <!-- ↓ El siguiente codigo es para que se note en cual pagina esta actualmente -->
                                <?php echo $_GET['pagina']== $i ? 'active' : "" ?>
                            "
                    >
                    <a class="page-link" 
                        href="<?php echo $Url."?pagina=".$i?>"> 
                        <?php echo "$i";?>
                    </a>
                </li>
            <?php endfor?> 
            
            <!-- ultima pag -->
            <li class="espacios page-item
                                                                            /* rs seria el alias para contar registros de artesanas*/
                    <?php echo $_GET['pagina']>= ceil($resultado_productos[0]['rs'] / 15) ? 'disabled' : "" ?>"
                >
                <a class="page-link" 
                    href="<?php echo $Url. "?pagina=" . ($_GET['pagina']+1)?>" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                </a>
            </li>
            
        </ul>
    </nav>

</section>

