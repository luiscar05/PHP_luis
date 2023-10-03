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
<body class="bg-gradient">
<button class="btn btn-outline-secondary border-secundary mx-4 mt-3">
    <a href="http://localhost/PHP_luis/championframework/home" class="d-flex align-items-center">
        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-unindent" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M13 8a.5.5 0 0 0-.5-.5H5.707l2.147-2.146a.5.5 0 1 0-.708-.708l-3 3a.5.5 0 0 0 0 .708l3 3a.5.5 0 0 0 .708-.708L5.707 8.5H12.5A.5.5 0 0 0 13 8Z"/>
            <path fill-rule="evenodd" d="M3.5 4a.5.5 0 0 0-.5.5v7a.5.5 0 0 0 1 0v-7a.5.5 0 0 0-.5-.5Z"/>
        </svg>
        <span class="ms-2">Regresar</span>
    </a>
</button>



<h1 class="text-center text-danger px-5 ">Cliente </h1>
    <?php

    $iden=$_GET['iden'];

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
            echo '
                <div class="card container shadow p-3 mb-5 bg-secundary rounded" style="width: 380px; margin:auto;">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item text-center">' . $data['identificacion'] .'</li>
                        <li class="list-group-item text-center">' . $data['nombres'] .'</li>
                        <li class="list-group-item text-center">' . $data['apellidos'] .'</li>
                        <li class="list-group-item text-center">' . $data['telefono'] .'</li>
                        <li class="list-group-item text-center">' . $data['email'] .'</li>
                        <li class="list-group-item text-center">' . $data['direccion'] .'</li>
                        <li class="list-group-item text-center">' . $data['nit'] .'</li>
                        <li class="list-group-item text-center">' . $data['nombrefiscal'] .'</li>
                        <li class="list-group-item text-center">' . $data['direccionfiscal'] .'</li>
                        <li class="list-group-item text-center">' . $data['datecreated'] .'</li>
                    </ul>
                </div>
            ';

            
        } else {
            echo "La respuesta no es un JSON válido";
        }
    }

    curl_close($curl);
    ?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>