<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejemplo MVC con PHP</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" >
    <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script type="text/javascript" src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    <style>
        .bg-gradient {
            background: linear-gradient(to right,RGB(220, 220, 220),RGB(192, 192, 192)); 
        }
        a{
            text-decoration: none;
        }
        a:hover{
            color:white;
            transition: color 0.5s;
        }
    </style>
</head>
<?php
$iden = isset($_GET['id']) ? $_GET['id'] : '';
?>
<body class="bg-gradient">
<button class="btn btn-outline-secondary border-secundary mx-3 mt-3">
    <a href="http://localhost/PHP_luis/championframework/Views/Buscar.php?iden=<?php echo $iden; ?>" class="d-flex align-items-center">
        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-unindent" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M13 8a.5.5 0 0 0-.5-.5H5.707l2.147-2.146a.5.5 0 1 0-.708-.708l-3 3a.5.5 0 0 0 0 .708l3 3a.5.5 0 0 0 .708-.708L5.707 8.5H12.5A.5.5 0 0 0 13 8Z"/>
            <path fill-rule="evenodd" d="M3.5 4a.5.5 0 0 0-.5.5v7a.5.5 0 0 0 1 0v-7a.5.5 0 0 0-.5-.5Z"/>
        </svg>
        <span class="ms-1">Regresar</span>
    </a>
</button>


<h2 class="text-center text-danger px-5 h1"> Actualizar Cliente </h2>
<?php
        if (isset($_POST["btnActualizar"])) {
        // URL del endpoint para actualizar el usuario
        $url = "http://localhost/PHP_luis/championframework/Cliente/Actualizar?id=$iden"; 

        // Datos del usuario que deseas actualizar
        $datos_usuario = array(
            'identificacionUp'=>$_POST['identificacionUp'],
            'nombresUP'=>$_POST['nombresUP'],
            'apellidosUp'=>$_POST['apellidosUp'],
            'telefonoUp'=>$_POST['telefonoUp'],
           'emailUp'=>$_POST['emailUp'],
            'direccionUp'=>$_POST['direccionUp'], 
           'nitUp'=>$_POST['nitUp'],
            'nombrefiscalUp'=>$_POST['nombrefiscalUp'], 
            'direccionfiscalUp'=>$_POST['direccionfiscalUp'] 
        );
      
        $curl = curl_init($url);

        // Configura la solicitud cURL
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "PUT"); // Método PUT
        curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($datos_usuario)); // Datos del usuario en formato JSON
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        /* curl_setopt($curl, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json',
            'Authorization: Bearer tu_token_de_autorizacion' // Cambia esto por tu token de autorización
        )); */

        // Realiza la solicitud
        $response = curl_exec($curl);

        // Cierra la sesión cURL
        curl_close($curl);

        // Verifica la respuesta
        if ($response) {
            echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
            <strong>¡Éxito!</strong> El registro se ha actualizado correctamente.
            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
          </div>"
          ;
        } else {
            echo "Hubo un error al actualizar el usuario: " . curl_error($curl);
        }
    }
    
    ?>
    <?php


    $url = "http://localhost/PHP_luis/championframework/Cliente/Buscar?id=$iden";
    $curl = curl_init($url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($curl);

    if ($response === false) {
        $error = curl_error($curl);
        echo "Error al hacer la solicitud: " . $error;
    } else {
        
        $data = json_decode($response, true);

        if ($data !== null) {
            
            echo"<div class='card container shadow p-3 mb-5 bg-secundary rounded' style='width: 380px; margin:auto;'>
    <div class='mb-3'>
        <form id='registro-form' method='POST'>
            <input type='hidden' name='_method' value='PUT'>
            <!-- <input type='hidden' name='IdUsuer'> -->
            <label for='formGroupExampleInput' class='form-label'>Identificacion</label>
            <input type='number' class='form-control' name='identificacionUp' id='formGroupExampleInput' value='". htmlspecialchars($data['identificacion'], ENT_QUOTES)."'>
    </div>
    <div class='mb-3'>
        <label for='formGroupExampleInput2' class='form-label'>Nombre</label>
        <input type='text' class='form-control' name='nombresUP' id='formGroupExampleInput2' value='".htmlspecialchars($data['nombres'], ENT_QUOTES)."'>
    </div>
    <div class='mb-3'>
        <label for='formGroupExampleInput2' class='form-label'>Apellido</label>
        <input type='text' class='form-control' name='apellidosUp' id='formGroupExampleInput2' value='".htmlspecialchars($data['apellidos'], ENT_QUOTES)."'>
    </div>
    <div class='mb-3'>
        <label for='formGroupExampleInput2' class='form-label'>Telefono</label>
        <input type='number' class='form-control' name='telefonoUp' id='formGroupExampleInput2' value='".htmlspecialchars($data['telefono'], ENT_QUOTES)."'>
    </div>
    <div class='mb-3'>
        <label for='formGroupExampleInput2' class='form-label'>Email</label>
        <input type='text' class='form-control' name='emailUp' id='formGroupExampleInput2' value='". htmlspecialchars($data['email'], ENT_QUOTES)."'>
    </div>
    <div class='mb-3'>
        <label for='formGroupExampleInput2' class='form-label'>Direccion</label>
        <input type='text' class='form-control' name='direccionUp' id='formGroupExampleInput2' value='". htmlspecialchars($data['direccion'], ENT_QUOTES)."'>
    </div>
    <div class='mb-3'>
        <label for='formGroupExampleInput2' class='form-label'>Nit</label>
        <input type='text' class='form-control' name='nitUp' id='formGroupExampleInput2' value='".htmlspecialchars($data['nit'], ENT_QUOTES)."'>
    </div>
    <div class='mb-3'>
        <label for='formGroupExampleInput2' class='form-label'>Nombre Fiscal</label>
        <input type='text' class='form-control' name='nombrefiscalUp' id='formGroupExampleInput2' value='".htmlspecialchars($data['nombrefiscal'], ENT_QUOTES)."'>
    </div>
    <div class='mb-3'>
        <label for='formGroupExampleInput2' class='form-label'>Direccion Fiscal</label>
        <input type='text' class='form-control' name='direccionfiscalUp' id='formGroupExampleInput2' value='".htmlspecialchars($data['direccionfiscal'], ENT_QUOTES)."'>
    </div>
    <div class='col-auto container'>
        <button type='submit' class='btn btn-primary' name='btnActualizar' >Actualizar</button>
    </div>  
    </form> 
</div>

            </div>";


        } else {
            echo "La respuesta no es un JSON válido";
        }
    }


    curl_close($curl);
    ?>
    
    
<script>
    function cargarClientes() {
        
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            var response = this.responseText;
            var parser = new DOMParser();
            var doc = parser.parseFromString(response, "text/html");
            var formularioRegistro = doc.getElementById("registro-form");

            var formularioActual = document.getElementById("registro-form");
            formularioActual.innerHTML = formularioRegistro.innerHTML;
        }
    };
    xmlhttp.open("GET", "http://localhost/PHP_luis/championframework/Views/actualizar.php?id<?php echo $iden; ?>", true);
    xmlhttp.send(); 
}

window.onload = cargarClientes;

</script>




        
            



    
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>