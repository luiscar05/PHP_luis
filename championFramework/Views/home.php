<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejemplo MVC con PHP</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" >
    <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script type="text/javascript" src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    
</head>
<body>
    <h1 class="text-center">Página principal Home</h1>
     <p>Nombre página: <?= $data['page_title'] ?> </p>
    <p>
    <h1>Data desde la vista</h1>
        <?php
        
            dep($data);
        ?>
    </p> 

   <h2 class="h1 text-center ">Clientes</h2>
    <div class="container">
        <table id="clientes-table" class="table table-striped text-center">
        <thead>
            <tr>
                
                <th class="text-center">Identificacion</th>
                <th class="text-center">Nombre</th>
                <th class="text-center">Apellido</th>
                <th class="text-center">Telefono</th>
                <th class="text-center" colspan="3">Opciones</th>
            </tr> 
        </thead>
        <tbody>
            <?php
            $url = "http://localhost/PHP_luis/championframework/Cliente/Clientes";
            $curl = curl_init($url);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            $response = curl_exec($curl);
            if (isset($_POST['eliminar'])) {
                
               echo 
               "<div class='alert alert-danger d-flex justify-content-center align-items-center' role='alert'>
                    <span class'col-12'>
                    Seguro Que Deseas Eliminar Este Usuario
                    </span>
                    <form method='post'>
                        <button type='submit' name='ActDelet' class='col-6 btn btn-small btn-danger ml-5'>Eliminar</button>
                        <button type='submit' name='Cancelar' class='col-6 btn btn-small btn-secundary text-white'>Cancelar</button>
                        <input type='hidden' name='idClienteEliminar' value='" . $_POST['idClienteEliminar'] . "'>
                    </form>
                </div>"; 
                

            }
            

            
            
            if ($response === false) {
                $error = curl_error($curl);
                echo "Error al hacer la solicitud: " . $error;
            } else {
                $data = json_decode($response, true);

                for ($i = 0; $i < count($data); $i++) {
                    echo "<tr>
                        
                        <td>" . $data[$i]['identificacion'] . "</td>
                        <td>" . $data[$i]['nombres'] . "</td>
                        <td>" . $data[$i]['apellidos'] . "</td>
                        <td>" . $data[$i]['telefono'] . "</td>
                        <td>
                            <a href='Views/Buscar.php?iden=" . $data[$i]['idcliente']. "' class='btn btn-small btn-secondary'>
                                <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-search' viewBox='0 0 16 16'>
                                    <path d='M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z'/>
                                </svg> 
                            </a>
                        </td>
                        <td>
                            <a href='Views/actualizar.php?id=" . $data[$i]['idcliente']. "' class='btn btn-small btn-warning'>
                            <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-pencil-fill' viewBox='0 0 16 16'>
                                <path d='M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z'/>
                            </svg>   
                            </a> 
                        </td>
                        <td >
                            <form method='post'>  
                                <button type='submit' name='eliminar' class='btn btn-small btn-danger' href='PHP_luis/championframework/home?id=".$data[$i]['idcliente']."' >
                                    
                                        <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-trash3' viewBox='0 0 16 16'>
                                            <path d='M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z'/>
                                        </svg>
                                  
                                </button> 
                                <input type='hidden' name='idClienteEliminar' value='" . $data[$i]['idcliente'] . "'> 
                            </form>
                            
                        </td>
                        </tr>";
                }
                
                if (isset($_POST['ActDelet'])) {
                    $curl = curl_init();
    
                    $url = "http://localhost/PHP_luis/championframework/Cliente/Eliminar"; // URL del recurso que quieres eliminar
    
                    $idClienteAEliminar = $_POST['idClienteEliminar']; // El ID del cliente que deseas eliminar
    
                    curl_setopt($curl, CURLOPT_URL, $url . "?id=" . $idClienteAEliminar);
                    curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "DELETE");
                    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    
                    $response = curl_exec($curl);
                    if ($response === false) {
                        $error = curl_error($curl);
                        echo "Error al hacer la solicitud: " . $error;
                    } else {
                        $httpCode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
                        if ($httpCode == 200) {
                            echo "
                            <div class='alert alert-success   role='alert'>
                                <p class='text-white'>Cliente eliminado exitosamente.</p>
                            </div>";
                        } else {
                            echo "Error al eliminar el cliente. Código HTTP: " . $httpCode;
                        }
                        
                    } 
                    curl_close($curl); 
                    
                }       
            }  
            ?>
            
            
        </tbody>
        </table>
        <script>
function cargarClientes() {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            var response = this.responseText;
            var parser = new DOMParser();
            var doc = parser.parseFromString(response, "text/html");
            
            var tablaClientes = doc.getElementById("clientes-table");
            var formularioRegistro = doc.getElementById("registro-form");

            document.getElementById("clientes-table").innerHTML = tablaClientes.innerHTML;
            /* document.getElementById("registro-form").innerHTML = formularioRegistro.innerHTML; */
        }
    };
    xmlhttp.open("GET", 'http://localhost/PHP_luis/championframework/home', true);
    xmlhttp.send();
}

window.onload = cargarClientes;
</script>

    </div>
  
<?php
    if (!empty($_POST["eliminar"])) {
        echo '<div class="alert alert-success " role="alert">SIIIII</div>';
    }
?>
<h3 class="text-center">Registrar </h3>
<div class="container  mb-3 d-block ">
    <form action="" method="post">
        <div class="row mb-2">
            <label for="colFormLabel" class="col-sm-2 col-form-label">Identificacion</label>
            <div class="col-sm-5">
                <input type="text" name="identificacion" class="form-control" id="colFormLabel" placeholder="Identificacion...">
            </div>
        </div>
        <br>
        <div class="row mb-2">
            <label for="colFormLabel" class="col-sm-2 col-form-label">Nombre</label>
            <div class="col-sm-5">
                <input type="text" name="nombres" class="form-control" id="colFormLabel" placeholder="Nombre...">
            </div>
        </div>
        <br>
        <div class="row mb-2">
            <label for="colFormLabel" class="col-sm-2 col-form-label">Apellido</label>
            <div class="col-sm-5">
                <input type="text" name="apellidos" class="form-control" id="colFormLabel" placeholder="Apellido...">
            </div>
        </div>
        <br>

        <div class="row mb-2">
            <label for="colFormLabel" class="col-sm-2 col-form-label">telefono</label>
            <div class="col-sm-5">
                <input type="number" name="telefono" class="form-control" id="colFormLabel" placeholder="Numero Telefono...">
            </div>
        </div>
        <br>
        <div class="row mb-2">
            <label for="colFormLabel" class="col-sm-2 col-form-label">Email</label>
            <div class="col-sm-5">
                <input type="email" name="email" class="form-control" id="colFormLabel" placeholder="email...">
            </div>
        </div>
        <br>
        <div class="row mb-2">
            <label for="colFormLabel" class="col-sm-2 col-form-label">Direccion</label>
            <div class="col-sm-5">
                <input type="text" name="direccion" class="form-control" id="colFormLabel" placeholder="Direccion...">
            </div>
            
        </div>
        <br>
        <div class="row mb-2">
            <label for="colFormLabel" class="col-sm-2 col-form-label">Nit</label>
            <div class="col-sm-5">
                <input type="number" name="nit" class="form-control" id="colFormLabel" placeholder="Nit...">
            </div>
        </div>
        <br>
        <div class="row mb-2">
            <label for="colFormLabel" class="col-sm-2 col-form-label">Nombre Fsical</label>
            <div class="col-sm-5">
                <input type="text" name="nombrefiscal" class="form-control" id="colFormLabel" placeholder="Nombre Fiscal...">
            </div>
        </div>
        <br>
        <div class="row mb-2">
            <label for="colFormLabel" class="col-sm-2 col-form-label">Direccion Fsical</label>
            <div class="col-sm-5">
                <input type="text" name="direccionfiscal" class="form-control" id="colFormLabel" placeholder="Direccion Fiscal...">
            </div>
        </div>
        <input type="submit" name="Boton" class="btn btn-primary d-flex justify-content-center" value="Registrar">
    
    </form>

</div>

<?php
if (!empty($_POST["Boton"])) {
    /* echo $_POST['identificacion']; */
   require_once('C:\xampp\htdocs\PHP_luis\championFramework\Controllers\Cliente.php');
    $registrar = new Cliente();
    $registroExitoso = $registrar->Registro(); 
}
?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
