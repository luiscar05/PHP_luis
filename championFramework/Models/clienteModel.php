<?php

    class clienteModel extends Mysql
    {
       private $intIdCliente;
       private $strIdentificacion;
       private $strNombres;
       private $strApellidos;
       private $intTelefono;
       private $strEmail;
       private $strDireccion;
       private $strNit;
       private $strNomFiscal;
       private $strDirFiscal;
       private $intStatus;
        public function __construct()
        {
            parent::__construct();
        }
        public function setCliente(string $identificacion, string $nombres, string $apellidos, int $telefono, string $email, string $Direccion, string $nit, string $nomFiscal, string $DirFiscal) {
            $this->strIdentificacion = $identificacion;
            $this->strNombres = $nombres;
            $this->strApellidos = $apellidos;
            $this->intTelefono = $telefono;
            $this->strEmail = $email;
            $this->strDireccion = $Direccion;
            $this->strNit = $nit;
            $this->strNomFiscal = $nomFiscal;
            $this->strDirFiscal = $DirFiscal;
        
            // Verificar si la identificación o el correo ya existen en la base de datos
            $sql = "SELECT identificacion, email FROM cliente WHERE (identificacion = :iden OR email = :email) AND status = :estado";
            $arrayParams = array(
                ":email" => $this->strEmail,
                ":iden" => $this->strIdentificacion,
                ":estado" => 1
            );
            $request = $this->select($sql, $arrayParams);
        
            if (!empty($request)) {
                // Si ya existe, no se puede registrar
                return $request;

            }else {
                // Si no existe, se puede registrar
                echo "Sí puede ser registrado";
                $query_insert = "INSERT INTO cliente(identificacion,nombres,apellidos,telefono,email,direccion,nit,nombrefiscal,direccionfiscal) 
                                 VALUES(:iden, :nom , :ape , :tel , :email, :dir, :nit , :nomfiscal , :dirfiscal)";
                $arrayData = array(
                    ":iden" => $this->strIdentificacion,
                    ":nom" => $this->strNombres,
                    ":ape" => $this->strApellidos,
                    ":tel" => $this->intTelefono,
                    ":email" => $this->strEmail,
                    ":dir" => $this->strDireccion,
                    ":nit" => $this->strNit,
                    ":nomfiscal" => $this->strNomFiscal,
                    ":dirfiscal" => $this->strDirFiscal
                );
        
                $reques_Insert = $this->insert($query_insert, $arrayData);
                return $reques_Insert; 
            }
        }
        
        public function searchClient(int $idUser){
            $this->intIdCliente=$idUser;
            $sql="SELECT * FROM cliente WHERE (idcliente=:Id)";
            $arrayInfoClient=array(
                ":Id"=>$this->intIdCliente
            ); 
            $requestUser=$this->select($sql,$arrayInfoClient);
            
            return $requestUser;
            

        } 
        public function DeleteClient(int $idClient){
            $this->intIdCliente=$idClient;
            $sql="DELETE FROM cliente WHERE (idcliente=:Id)";
            $arrayInfoClient=array(
                ":Id"=>$this->intIdCliente
            ); 
            $requestUser=$this->delete($sql,$arrayInfoClient);
            
            if ($requestUser !== false ) {
                $rowCount = $this->rowCount();
                return true;
            } else {
                return false;
            }
        }
        public function AllClientes(){
            $sql="SELECT * FROM cliente";

            $requesClientes=$this->select_all($sql);
            return $requesClientes;
        }
        public function UpdateClient(int $identificacion, string $nombres, string $apellidos, int $telefono, string $email, string $Direccion, string $nit, string $nomFiscal, string $DirFiscal,int $idClient) {
            $this->strIdentificacion = $identificacion;
            $this->strNombres = $nombres;
            $this->strApellidos = $apellidos;
            $this->intTelefono = $telefono;
            $this->strEmail = $email;
            $this->strDireccion = $Direccion;
            $this->strNit = $nit;
            $this->strNomFiscal = $nomFiscal;
            $this->strDirFiscal = $DirFiscal;
            $this->intIdCliente=$idClient;
            $query_update = "UPDATE cliente SET identificacion = :iden, nombres = :nom, apellidos = :ape, telefono = :tel, email = :email, direccion = :dir, nit = :nit, nombrefiscal = :nomfiscal, direccionfiscal = :dirfiscal WHERE idcliente = :id";

            $arrayData = array(
                ":iden" => $this->strIdentificacion,
                ":nom" => $this->strNombres,
                ":ape" => $this->strApellidos,
                ":tel" => $this->intTelefono,
                ":email" => $this->strEmail,
                ":dir" => $this->strDireccion,
                ":nit" => $this->strNit,
                ":nomfiscal" => $this->strNomFiscal,
                ":dirfiscal" => $this->strDirFiscal,
                ":id" => $this->intIdCliente
            );


            $request_Update = $this->update($query_update, $arrayData);
            return $request_Update;
        }

    }    
?>