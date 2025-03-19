<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
  <div class="offcanvas-header">
    <h5 id="offcanvasRightLabel">Guneen zerrenda</h5>
    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
  </div>
  <div class="offcanvas-body">

    <?php
    require_once(APP_DIR  . '/src/php/connect.php');
    ?>

   <div class="contenido-dinamico">
  <?php
  $result = getZikloak();
  if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
      if($row["active"] == 1){
        echo '<div class="course tu-clase-div" data-id="' . $row["id"] . '">';
        echo '<a href=".?kurtsoa='.$row["id"].'">' . $row["izena"] . " (" . $row["laburbildura"] . ')</a>';
        echo '</div>';
      }
    }
  } else {
    echo 'No se encontraron elementos en la base de datos.';
  }
  require_once(APP_DIR . '/src/views/parts/zozketaEgiteko.php');
  ?>
</div>

    </div>

  </div> <!--no quitar -->

</div>