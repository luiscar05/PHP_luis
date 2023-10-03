<?php
    class Cliente extends Controllers {

        public function __construct()
        {
            parent::__construct();
        }

        public function Registro()
        {
            try {
                $mettod=$_SERVER["REQUEST_METHOD"];
               
                /* $response=[];
                $arrayCliente=[]; */
                if ($mettod=="POST"){
                    
                    /* $_POST = json_decode(file_get_contents('php://input'), true);   */

                    if (empty($_POST['identificacion'])) {
                       /*  echo $_POST['identificacion']; */
                        $response=array(
                            'status'=>FALSE,
                            "msg"=>"La identificacion es Requerida"
                        );
                        $code=200;

                        JsonResponse($response,$code);
                        die();
                    }
                     if (!testString($_POST['nombres'])) {
                        $response=array(
                            'status'=>FALSE,
                            "msg"=>"Error en los nombres",
                        ); 
                        $code=200;
                        JsonResponse($response,$code);
                        die();
                    }
                     if (!testString($_POST['apellidos'])) {
                        $response=array(
                            'status'=>FALSE,
                            "msg"=>"Error en los apellidos"
                        ); 
                        $code=200;
                        JsonResponse($response,$code);
                        die();
                    }
                    if (testNumber($_POST['telefono'])) {
                        $response=array(
                            'status'=>FALSE,
                            "msg"=>"Error en el telefono"
                        ); 
                        $code=200;
                        JsonResponse($response,$code);
                        die();
                    }
                     if (!testEmail($_POST['email'])) {
                        $response=array(
                            'status'=>FALSE,
                            "msg"=>"Error en el email"
                        ); 
                        $code=200;
                        JsonResponse($response,$code);
                        die();
                    }
                    if (empty($_POST['direccion'])) {
                        $response=array(
                            'status'=>FALSE,
                            "msg"=>"La direccion es requerida"
                        ); 
                        $code=200;
                        JsonResponse($response,$code);
                        die();
                    }
                    
                    $strIdentificacion=$_POST['identificacion'];
                    $strNombres=ucwords(strtolower($_POST['nombres']));
                    $strApellidos=ucwords(strtolower($_POST['apellidos']));
                    $intTelefono=$_POST['telefono'];
                    $strEmail=strtolower($_POST['email']);
                    $strDireccion=$_POST['direccion'];
                    $strNit=!empty($_POST['nit'])? strClean($_POST['nit']):"";
                    $strNomFiscal=!empty($_POST['nombrefiscal']) ? strClean($_POST['nombrefiscal']):"";
                    $strDirFiscal=!empty($_POST['direccionfiscal']) ? strClean($_POST['direccionfiscal']):"";
                    
                    $request=$this->model->setCliente(
                        $strIdentificacion,
                        $strNombres,
                        $strApellidos,
                        $intTelefono,
                        $strEmail,
                        $strDireccion,
                        $strNit,
                        $strNomFiscal,
                        $strDirFiscal);


                    if ($request > 0) {
                        $arrayCliente=array(
                            'identifiacion'=>$strIdentificacion,
                            'nombres'=>$strNombres,
                            "apellidos"=>$strApellidos,
                            'telefono'=>$intTelefono,
                            "email"=>$strEmail,
                            'direccion'=>$strDireccion,
                            'nit'=>$strNit,
                            'nombrefiscal'=>$strNomFiscal,
                            'direccionfiscal'=>$strDirFiscal
                        );
                        $response=array(
                            'status'=>true,
                            "msg"=>"Binevenido Tu Registro Fue Exitoso",
                            "Data"=>$arrayCliente
                        );
                    }else{
                        $response=array(
                            'status'=>FALSE,
                            "msg"=>"Error La identificacion o el email ya existe",
                            "data"=>$arrayCliente
                        );
                        
                    }  
                    $code=200; 
                }else{
                    $response=array(
                        'status'=>FALSE,
                        "msg"=>"Error en la solicitud del metodo: $mettod  cambie su tipo de metodo a POST",
                    );
                    $code=400;
                } 
                JsonResponse($response,$code); 
                die();
            } catch (exception $th) {
               echo "error en el proceso ".$th->getMessage();
            }
            
            
        }
        public function Clientes()
        {
           $Clientes=$this->model->AllClientes();
           if ($Clientes>0) {
                echo(json_encode($Clientes));
           }else{
                echo "No Hay Clientes";
           }
        }
        public function Buscar()
        {
            $id = $_GET['id'];
            $requestUpdate = $this->model->searchClient($id);
        
            if ($requestUpdate > 0) {
                echo (json_encode($requestUpdate));
            } else {
                echo "Error al encontrar cliente";
            }   
        }
         
        public function Eliminar()
        {
            $id = $_GET['id'];
            $requestDelete = $this->model->DeleteClient($id);
        
            if ($requestDelete===false) {
                echo "<div class='alert alert-sucerful'>Error al elimianr cliente porque no exite o ya se ha elimano</div>";
            }  
                echo "<div class='alert alert-sucerful'>Eliminado Exitosamente";
        
        }
        public function Actualizar()
        {
            try {
                $mettod=$_SERVER["REQUEST_METHOD"];
               
                if ($mettod=="PUT"){
                    $_POST = json_decode(file_get_contents('php://input'), true);   
                    $id=$_GET['id'];
                    if (empty($_POST['identificacionUp'])) {
                        $response=array(
                            'status'=>FALSE,
                            "msg"=>"La identificacion es Requerida"
                        );
                        $code=200;

                        JsonResponse($response,$code);
                        die();
                    }
                    if (!testString($_POST['nombresUP'])) {
                        $response=array(
                            'status'=>FALSE,
                            "msg"=>"Error en los nombres",
                        ); 
                        $code=200;
                        JsonResponse($response,$code);
                        die();
                    } 
                    if (!testString($_POST['apellidosUp'])) {
                        $response=array(
                            'status'=>FALSE,
                            "msg"=>"Error en los apellidos"
                        ); 
                        $code=200;
                        JsonResponse($response,$code);
                        die();
                    } 
                     if (testNumber($_POST['telefonoUp'])) {
                        $response=array(
                            'status'=>FALSE,
                            "msg"=>"Error en el telefono"
                        ); 
                        $code=200;
                        JsonResponse($response,$code);
                        die();
                    }
                    if (!testEmail($_POST['emailUp'])) {
                        $response=array(
                            'status'=>FALSE,
                            "msg"=>"Error en el email"
                        ); 
                        $code=200;
                        JsonResponse($response,$code);
                        die();
                    }
                    if (empty($_POST['direccionUp'])) {
                        $response=array(
                            'status'=>FALSE,
                            "msg"=>"La direccion es requerida"
                        ); 
                        $code=200;
                        JsonResponse($response,$code);
                        die();
                    }
                    
                    $strIdentificacion=$_POST['identificacionUp'];
                    $strNombres=ucwords(strtolower($_POST['nombresUP']));
                    $strApellidos=ucwords(strtolower($_POST['apellidosUp']));
                    $intTelefono=$_POST['telefonoUp'];
                    $strEmail=strtolower($_POST['emailUp']);
                    $strDireccion=$_POST['direccionUp'];
                    $strNit=!empty($_POST['nitUp'])? strClean($_POST['nitUp']):"";
                    $strNomFiscal=!empty($_POST['nombrefiscalUp']) ? strClean($_POST['nombrefiscalUp']):"";
                    $strDirFiscal=!empty($_POST['direccionfiscalUp']) ? strClean($_POST['direccionfiscalUp']):"";
                    
                    $request=$this->model->UpdateClient(
                        $strIdentificacion,
                        $strNombres,
                        $strApellidos,
                        $intTelefono,
                        $strEmail,
                        $strDireccion,
                        $strNit,
                        $strNomFiscal,
                        $strDirFiscal,
                        $id);


                    if ($request > 0) {
                        $arrayCliente=array(
                            'identifiacionUp'=>$strIdentificacion,
                            'nombresUP'=>$strNombres,
                            "apellidosUp"=>$strApellidos,
                            'telefonoUp'=>$intTelefono,
                            "emailUp"=>$strEmail,
                            'direccionUp'=>$strDireccion,
                            'nitUp'=>$strNit,
                            'nombrefiscalUp'=>$strNomFiscal,
                            'direccionfiscalUp'=>$strDirFiscal
                        );
                        $response=array(
                            'status'=>true,
                            "msg"=>"Actualizado Correctamente",
                            "Data"=>$arrayCliente
                        );
                    }else{
                        $response=array(
                            'status'=>FALSE,
                            "msg"=>"Error al actualizar usuario",
                            "data"=>$arrayCliente
                        );
                        
                    }  
                    $code=200; 
                }else{
                    $response=array(
                        'status'=>FALSE,
                        "msg"=>"Error en la solicitud del metodo: $mettod  cambie su tipo de metodo a PUT",
                    );
                    $code=400;
                } 
                JsonResponse($response,$code); 
                die(); 
            } catch (exception $th) {
               echo "error en el proceso ".$th->getMessage();
            }
        }
    }
?>