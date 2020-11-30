<?php
// Leemos y traemos los datos del .json
$datos = file_get_contents("./data-1.json");
$inmuebles = json_decode($datos, true);
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link type="text/css" rel="stylesheet" href="css/materialize.min.css" media="screen,projection" />
  <link type="text/css" rel="stylesheet" href="css/customColors.css" media="screen,projection" />
  <link type="text/css" rel="stylesheet" href="css/ion.rangeSlider.css" media="screen,projection" />
  <link type="text/css" rel="stylesheet" href="css/ion.rangeSlider.skinFlat.css" media="screen,projection" />
  <link type="text/css" rel="stylesheet" href="css/index.css" media="screen,projection" />
  <link type="text/css" rel="stylesheet" href="css/tarjeta.css" />
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Formulario</title>
</head>

<body>
  <video src="img/video.mp4" id="vidFondo"></video>

  <div class="contenedor">
    <div class="card rowTitulo">
      <h1>Bienes Intelcost</h1>
    </div>
    <div class="colFiltros">
      <form action="" method="post" id="formulario">
        <div class="filtrosContenido">
          <div class="tituloFiltros">
            <h5>Filtros</h5>
          </div>
          <div class="filtroCiudad input-field">
            <p><label for="selectCiudad">Ciudad:</label><br></p>
            <select name="ciudad" id="selectCiudad">
              <option value="" selected>Elige una ciudad</option>
              <!-- Imprimimos las ciudades -->
              <?php
              // Arreglamos el array con ciudades unicas
              for ($i = 0; $i <= 1; $i++) {
                foreach ($inmuebles as $ciudad) {
                  $ciudades[] = $ciudad["Ciudad"];
                }
              }
              $ciudades = array_unique($ciudades);
              // Imprimimo las cidades en el select
              foreach ($ciudades as $ciudad) {
                echo "" ?>
                <option value="<?php echo $ciudad ?>"><?php echo $ciudad ?></option>
              <?php } ?>
              <!-- Fin de las ciudades -->
            </select>
          </div>
          <div class="filtroTipo input-field">
            <p><label for="selecTipo">Tipo:</label></p>
            <br>
            <select name="tipo" id="selectTipo">
              <option value="">Elige un tipo</option>
              <!-- Imprimimos las tipos -->
              <?php
              // Arreglamos el array con tipos unicos
              for ($i = 0; $i <= 1; $i++) {
                foreach ($inmuebles as $tipo) {
                  $tipos[] = $tipo["Tipo"];
                }
              }
              $tipos = array_unique($tipos);
              // Imprimimo los tipos en el select
              foreach ($tipos as $tipo) {
                echo "" ?>
                <option value="<?php echo $tipo ?>"><?php echo $tipo ?></option>
              <?php } ?>
              <!-- Fin de los tipos -->
            </select>
          </div>
          <div class="filtroPrecio">
            <label for="rangoPrecio">Precio:</label>
            <input type="text" id="rangoPrecio" name="precio" value="" />
          </div>
          <div class="botonField">
            <input type="button" class="btn white" value="Buscar" id="submitButton" onclick="obtenerDatos();">
          </div>
        </div>
      </form>
    </div>
    <div id="tabs" style="width: 75%;">
      <ul>
        <li><a href="#tabs-1">Bienes disponibles</a></li>
        <li><a href="#tabs-2">Mis bienes</a></li>
      </ul>
      <div id="tabs-1">
        <div class="colContenido" id="divResultadosBusqueda">
          <div class="tituloContenido card" style="justify-content: center;">
            <h5>Resultados de la búsqueda: <div id="numResultados"></div></h5>
            <div class="divider">
            </div>
            <!-- Estilo de la tarjeta agregado -->
            <div class="tarjeta">
              <div class="row">
                <!-- Agregamos los datos del .json -->
                <?php
                foreach ($inmuebles as $inmueble) {
                  echo "" ?>
                  <div id="<?php echo $inmueble["Id"] ?>">
                    <div class="col s3 imagen">
                      <img src="./img/home.jpg" width="100px">
                    </div>
                    <div class="col s9">
                      Direccion: <?php echo $inmueble["Direccion"] ?><br>
                      Ciudad: <?php echo $inmueble["Ciudad"] ?><br>
                      Telefono: <?php echo $inmueble["Telefono"] ?><br>
                      Codigo_Postal: <?php echo $inmueble["Codigo_Postal"] ?><br>
                      Tipo: <?php echo $inmueble["Tipo"] ?><br>
                      Precio: <?php echo $inmueble["Precio"] ?><br>
                      <a href=""></a>
                    </div>
                  </div>
                  <hr>
                <?php
                }
                ?>
              </div>
            </div>
            <!-- Final de datos .json -->
            <!-- Mostrando datos de busqueda -->
            <div id="busqueda">
              <!-- Se insertan los datos desde js -->
            </div>
            <!-- Final de datos de busqueda -->
          </div>
        </div>
      </div>

      <div id="tabs-2">
        <div class="colContenido" id="divResultadosBusqueda">
          <div class="tituloContenido card" style="justify-content: center;">
            <h5>Bienes guardados:</h5>
            <div class="divider"></div>
          </div>
        </div>
      </div>
    </div>


    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>

    <script type="text/javascript" src="js/ion.rangeSlider.min.js"></script>
    <script type="text/javascript" src="js/materialize.min.js"></script>
    <script type="text/javascript" src="js/index.js"></script>
    <script type="text/javascript" src="js/buscador.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script type="text/javascript">
      $(document).ready(function() {
        $("#tabs").tabs();
      });
    </script>
</body>

</html>