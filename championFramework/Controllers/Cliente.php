<?php
    class Cliente extends Controllers{

        public function __construct()
        {
            parent::__construct();
        }



        public function Cliente($idCliente)
        {
           
        }
        public function Registro()
        {
            try {
                $mettod=$_SERVER["REQUEST_METHOD"];
               
                /* $response=[];
                $arrayCliente=[]; */
                if ($mettod=="POST"){
                    
                    $_POST = json_decode(file_get_contents('php://input'), true);

                    if (empty($_POST['identificacion'])) {
                        $response=array(
                            'status'=>FALSE,
                            "msg"=>"La identificacion es Requerida"
                        );
                        $code=200;

                        JsonResponse($response,$code);
                        die();
                    };
                    
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
            
        }
        public function Actualizar()
        {
            
        }
        public function Eliminar()
        {
           
        }



    }


?>