<?php
    class Cliente extends Controllers{

        public function __construct()
        {
            parent::__construct();
        }



        public function Cliente($idCliente)
        {
           
        }
        public function Registro($idCliente)
        {
           
            try {
                
                 $mettod=$_SERVER["REQUEST_METHOD"];
                /*  $response[]; */
                 if ($mettod=="POST") {

                    $_POST=json_decode(file_get_contents(filename:"php:input"), asociative: true);
                    if (empty($_POST['identificacion'])) {
                        $response=array(
                            'status'=>FALSE,
                            "msg"=>"La identificacion es Requerida",
                        ); 
                        JsonResponse($response,$code:200);
                        die();
                    }
                    
                    $response=array(
                        'status'=>true,
                        "msg"=>"Datos Guardados Con Exito",
                    );
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