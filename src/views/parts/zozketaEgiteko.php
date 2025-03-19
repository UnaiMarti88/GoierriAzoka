<br><br>
<?php
if (isset($env["SHOW_RUFFLE"]) && $env["SHOW_RUFFLE"]) {
    ?>

    <div class="zozketaEgitekoZona">
        <a href="<?= HREF_VIEWS_DIR ?>/main/zozketa.php"><input type="button" value="Zozketa egin"></a>
    </div>

    <div class="zozketaEgitekoZona">
        <a href="<?= HREF_VIEWS_DIR ?>/main/laburpena.php"><input type="button" value="Laburpena ikusi"></a>
    </div>

    <div class="zozketaEgitekoZona">
        <a href="<?= HREF_VIEWS_DIR ?>/main/konfigurazioa.php"><input type="button" value="Web-a konfiguratu"></a>
    </div>
    
    <?php
        
}