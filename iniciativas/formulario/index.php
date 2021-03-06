<!doctype html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <meta http-equiv="Content-Language" content="es">

  <title>CIVICS Formulario Iniciativas</title>
  <meta name="description" content="Formulario para introducir nuevas actividades en el sistema">
  <meta name="author" content="CIVICS">

  <link rel="stylesheet" href="./css/form_styles.css?v=1.0">

	<!-- MAP PICKER Dependencies: JQuery and GMaps API should be loaded first -->
	<script src="./js/jquery-1.7.2.min.js"></script>
	<!--<script src="js/formScript.js"></script>-->
	<script src="http://maps.googleapis.com/maps/api/js?sensor=false"></script>

	<!-- CSS and JS for our code -->
	<link rel="stylesheet" type="text/css" href="./css/mappicker.css"/>

	<script src="./js/jquery-gmaps-latlon-picker.js"></script>

    <?php //modificado CS?>
     <script src="./js/jquery-ui.custom.js"></script>
     <link rel="stylesheet" href="./css/themes-jquery-iu/base/jquery.ui.all.css">
	 <script src="./js/jquery-ui-timepicker-addon.js"></script>
     <link href="./css/jquery-ui-timepicker-addon.css" rel="stylesheet" type="text/css">

		<script  src="./js/selector_fecha.js" ></script>
        <?php //FIN modificado CS  ?>

	<?php
		include('functions.php');
    //$ciudad_activa = strip_tags($_POST['ini_city']);
    //$ciudad_activa = 'Mexico DF';
    global $ciudadURL;
    $ciudadURL = $_GET['city'];
    $ciudad_activa=$ciudadURL;
    if ($ciudadURL == 'MexicoDF'){
      $ciudad_activa ='Mexico DF';
    }
	?>


  <!--[if lt IE 9]>
  <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
  <![endif]-->
</head>

<body>

  <div id="contact-form">

   <h1>¡Registra tu iniciativa!</h1>
   <h2>Usa el formulario para incluir vuestra iniciativa en el mapa de </h2>

   <p id="failure">Oops... Algo anduvo mal.</p>
   <p id="success">Gracias, tu mensaje ha sido enviado correctamente.</p>

   <form method="post" action="processFormData.php">

    <!--Initiative data-->
    <h3>Comprueba primero si tu iniciativa está ya registrada. </h3>
    <h3></h3>

    <label for="ini_name_registered">Nombre (iniciativa o persona) ya registrado: <span class="required">*</span></label>
 		<select id="ini_name_registered" name="ini_name_registered" required>
    <option value="ini_other">Aun no registrada</option>
 	 	<?php
 	 		$iniciativasOptions = getListIniciativesForHtmlForm();
			if(count($iniciativasOptions) > 0)
				echo($iniciativasOptions);
     	?>

     	</select>
      <h4>Para añadir una nueva iniciativa indica "Aún no registrada" en el desplegable anterior y rellena el siguiente formulario. </h4>

      <label for="ini_name">Nombre (iniciativa o persona) <span class="required">*</span></label>
      <input type="text" id="ini_name" name="ini_name" value="" placeholder="Nombre de tu iniciativa, organización, etc" autofocus required/>

      <label for="ini_descri">Descripción de la iniciativa <span class="required">*</span></label>
      <textarea rows="4" cols="50" maxlength="500" id="ini_descri" name="ini_descri" value="" placeholder="Escribe aquí una breve descripción (menos de 500 caracteres)" autofocus required></textarea>


      <!--Iniciative category data-->
      <!--TEMATICA-->
      <label for="ini_topic">Temática de la Iniciativa <span class="required">*</span></label>
       <select id="ini_topic" name="ini_topic">
         <option value="Apoyo Mutuo y Cuidados">Apoyo Mutuo y Cuidados</option>
         <option value="Arte Urbano">Arte Urbano</option>
         <option value="Cultura Libre">Cultura Libre</option>
         <option value="Deporte">Deporte</option>
         <option value="Derechos e Igualdad">Derechos e Igualdad</option>
         <option value="Ecología Urbana y Consumo">Ecología Urbana y Consumo</option>
         <option value="Economía Colaborativa">Economía Colaborativa</option>
         <option value="Educación Expandida">Educación Expandida</option>
         <option value="Mediación y Facilitación">Mediación y Facilitación</option>
         <option value="Movilidad Sostenible">Movilidad Sostenible</option>
         <option value="Política y Gobernanza">Política y Gobernanza</option>
         <option value="Urbanismo y Patrimonio">Urbanismo y Patrimonio</option>
         <option value="Otra">Otra</option>
      </select>

    <!--Tipo de espacio-->
      <label for="ini_space">Tipo de Espacio de Reunión<span class="required">*</span></label>
      <select id="ini_space" name="ini_space">
         <option value="Centro Social">Centro Social</option>
         <option value="Derivas y Rutas Urbanas">Derivas y Rutas Urbanas</option>
         <option value="Despensas Solidarias y Bancos de Intercambio">Despensas Solidarias y Bancos de Intercambio</option>
         <option value="Digital">Digital</option>
         <option value="Encuentro Diálogo y Corresponsabilidad">Encuentro Diálogo y Corresponsabilidad</option>
         <option value="Escuela Popular">Escuela Popular</option>
         <option value="Huerto">Huerto</option>
         <option value="Infraestructuras y/o Intervenciones Urbanas">Infraestructuras y/o Intervenciones Urbanas</option>
         <option value="Medios de Comunicación Vecinales">Medios de Comunicación Vecinales</option>
         <option value="Mercado Social">Mercado Social</option>
         <option value="Solares y Espacios Recuperados">Solares y Espacios Recuperados</option>
         <option value="Trabajo Colaborativo">Trabajo Colaborativo</option>
         <option value="Otros">Otros</option>
      </select>

      <!--Tipo de Agente Impulsor-->
      <label for="ini_agent">Tipo de Agente Impulsor<span class="required">*</span></label>
      <select id="ini_agent" name="ini_agent">
         <option value="Administración Pública">Administración Pública</option>
         <option value="Asambleas Populares, Mareas, Plataformas y Grupos de Trabajo">Asambleas Populares, Mareas, Plataformas y Grupos de Trabajo</option>
         <option value="Conquistas Ciudadanas del Pasado">Conquistas Ciudadanas del Pasado</option>
         <option value="Empresa Social">Empresa Social</option>
         <option value="Iniciativa Ciudadana">Iniciativa Ciudadana</option>
         <option value="Organizaciones y Asociaciones de Vecinos">Organizaciones y Asociaciones de Vecinos</option>
      </select>

      <label for="ini_mail">Dirección Email de la iniciativa. No introduzcas una dirección personal<span class="required">*</span></label>
      <input type="email" id="ini_mail" name="ini_mail" value="" placeholder="iniciativa@email.com"/>

      <label for="ini_web">Website <span class="required">*</span></label>
      <input type="web" id="ini_web" name="ini_web" value="" placeholder="www.yourWeb.com"/>

      <label for="ini_facebook">Facebook</label>
      <input type="web" id="ini_facebook" name="ini_facebook" value="" placeholder="www.facebook.com/yourprofile"/>

      <label for="ini_web">Twitter </label>
      <input type="web" id="ini_twitter" name="ini_twitter" value="" placeholder="@yourprofile"/>

      <!--Iniciative geoposition data-->
      <h3>Localiza la Iniciativa</h3>
      <label for="ini_city" class="" name="ini_city">Ciudad</label>
      <input type="text" id="ini_city" name="ini_city" value="<?php echo $ciudad_activa ?>" placeholder="<?php echo $ciudad_activa ?>"/>
      <h4>Elige la dirección y pincha el botón "Search".</h4>
      <p>Si no la encuentras siempre puedes hacer zoom y arrastrar el "marcador" o introducir las coordenadas (latitud y longitud) y presionar "Update Map".
        <br/><br/>No obstante, deja introducida una dirección para que la gente pregunte al llegar a la zona, por si acaso.  </p>

     <!--MAP PICKER geoposition data for iniciatives-->
     <fieldset class="gllpLatlonPicker">
        <label for="addres">Dirección Postal: <span class="required">*</span></label>
        <input type="text" id="ini_addres" name="ini_addres" class="gllpSearchField"  value="" placeholder="Calle X, 12, 5ºH, Ciudad, País" autofocus required/>

    <input type="button" class="gllpSearchButton" value="search">

    <div class="gllpMap">Google Maps</div>
    <br/>

      <label for="ini_latitude" class="gllMapValues">Latitud</label>
      <input type="text" id="ini_latitude" name="ini_latitude" class="gllMapValues gllpLatitude" value="40.416"/>

      <label for="ini_longitude" class="gllMapValues">Longitud</label>
      <input type="text"  id="ini_longitude" name="ini_longitude" class="gllMapValues gllpLongitude" value="-3.683"/>

      <label for="ini_zoom" class="gllMapValues">Zoom</label>
      <input type="text" id="ini_zoom" name="ini_zoom" class="gllMapValues gllpZoom" value="10"/>
      <input type="button" id="ini_updateButton" class="gllMapValues gllpUpdateButton" value="update map">
    <br/>
  </fieldset>

  <h3>Licencia de los datos</h3>
  <p>Los datos recopilados se encuentran disponibles bajo una <a href="http://opendatacommons.org/licenses/odbl/summary/">licencia ODbL</a>
  <p><span class="required">*</span>DOY MI CONSENTIMIENTO EXPRESO A QUE LOS DATOS QUE RELLENO EN ESTE FORMULARIO SEAN PUBLICADOS EN INTERNET Y, POR TANTO, SERÁN VISIBLES PÚBLICAMENTE Y EN TODO MOMENTO Y ACCESIBLES A CUALQUIER USUARIO:</p>
  <input type="checkbox" id="accept" name="acepto" value="acepto" autofocus required/>
  <input type="submit" value="Registrar" id="submit" />
  </form>
</div>
	<script language="javascript">

//Detecta si en la url se indica la ciudad a visualizar

var ciudad;
//var centro = new L.LatLng(40.41075,-3.69366);
var cadVariables = location.search.substring(1,location.search.length);
//var ciudadactiva="Madrid";
var ciudadactiva="<?php echo $ciudad_activa ?>";

if (cadVariables.length>0){
  var arrVariables = cadVariables.split("&");
  for (i=0; i<arrVariables.length; i++){

        arrVariableActual = arrVariables[i].split("=");
        if (isNaN(parseFloat(arrVariableActual[1])))
          eval(arrVariableActual[0]+"='"+unescape(arrVariableActual[1])+"';");
        else{
          eval(arrVariableActual[0]+"="+arrVariableActual[1]+";");
        }
    }

    ciudad = city;
    switch (ciudad){
        case "MexicoDF":
            ciudadactiva = "Mexico DF";
            $('.gllpLatitude').val('19.434997') ;
            $('.gllpLongitude').val('-99.132633');
            break;
        case "Quito":
            ciudadactiva = "Quito";
            $('.gllpLatitude').val('-0.2108') ;
            $('.gllpLongitude').val('-78.4747');
            break;
        case "Santos":
            ciudadactiva = "Santos";
            $('.gllpLatitude').val('-23.96083') ;
            $('.gllpLongitude').val('-46.33389');
            break;
        case "RioJaneiro":
            ciudadactiva = "Rio de Janeiro";
            $('.gllpLatitude').val('-22.9549') ;
            $('.gllpLongitude').val('-43.3919');
            break;
        case "SaoPaulo":
            ciudadactiva = "São Paulo";
            $('.gllpLatitude').val('-23.5506507') ;
            $('.gllpLongitude').val('-46.6333824');
            break;
        case "BuenosAires":
            ciudadactiva = "Buenos Aires";
            $('.gllpLatitude').val('-34.6143905') ;
            $('.gllpLongitude').val('-58.4460879');
            break;
        case "Rosario":
            ciudadactiva = "Rosario";
            $('.gllpLatitude').val('-32.9595004') ;
            $('.gllpLongitude').val('-60.6615415');
            break;
        case "SantaFe":
            ciudadactiva = "Santa Fe";
            $('.gllpLatitude').val('-31.61846') ;
            $('.gllpLongitude').val('-60.70298');
            break;
        case "Montevideo":
            ciudadactiva = "Montevideo";
            $('.gllpLatitude').val('-34.9059039') ;
            $('.gllpLongitude').val('-56.1913569');
            break;
        case "Zaragoza":
            ciudadactiva = "Zaragoza";
            $('.gllpLatitude').val('41.6541') ;
            $('.gllpLongitude').val('-0.8782');
            break;
        case "Bogota":
            ciudadactiva = "Bogotá";
            $('.gllpLatitude').val('4.6481') ;
            $('.gllpLongitude').val('-74.0801');
            break;
        case "Quibdo":
            ciudadactiva = "Quibdó";
            $('.gllpLatitude').val('5.6877') ;
            $('.gllpLongitude').val('-76.6541');
            break;
        case "Medellin":
            ciudadactiva = "Medellín";
            $('.gllpLatitude').val('6.2444') ;
            $('.gllpLongitude').val('-75.5736');
            break;
        case "SanJose":
            ciudadactiva = "Ciudad de San José";
            $('.gllpLatitude').val('9.9314') ;
            $('.gllpLongitude').val('-84.0771');
            break;
        case "Managua":
            ciudadactiva = "Managua";
            $('.gllpLatitude').val('12.1378') ;
            $('.gllpLongitude').val('-86.2755');
            break;
        case "SanSalvador":
            ciudadactiva = "San Salvador";
            $('.gllpLatitude').val('13.6903') ;
            $('.gllpLongitude').val('-89.2033');
            break;
        case "Tegucigalpa":
            ciudadactiva = "Tegucigalpa";
            $('.gllpLatitude').val('14.0855') ;
            $('.gllpLongitude').val('-87.2012');
            break;
        case "Guatemala":
            ciudadactiva = "Ciudad de Guatemala";
            $('.gllpLatitude').val('14.6343') ;
            $('.gllpLongitude').val('-90.5074');
            break;
        case "Cartagena":
            ciudadactiva = "Cartagena de Indias";
            $('.gllpLatitude').val('10.4227') ;
            $('.gllpLongitude').val('-75.4932');
            break;
        case "Guadalajara":
            ciudadactiva = "Guadalajara, México";
            $('.gllpLatitude').val('20.676143') ;
            $('.gllpLongitude').val('-103.3469982');
            break;
        case "Madrid":
            ciudadactiva = "Madrid";
            break;
    };
};

$(document).ready( function() {
		 //alert('Ciudad activa: ' + ciudadactiva);
  console.log('Ciudad activa: ' + ciudadactiva);
  $('#contact-form').find('h2').append(ciudadactiva);
  $('#contact-form').find('#ini_city').val(ciudadactiva);
  $ciudad_activa = ciudadactiva;
});
	</script>

</body>
</html>
