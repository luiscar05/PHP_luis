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
        public function setCliente(string $identificacion,string $nombres,string $apellidos,int $telefono,string $email,string $Direccion,string $nit,string $nomFiscal,string $DirFiscal ){
            $this->strIdentificacion=$identificacion;
            $this->strNombres=$nombres;
            $this->strApellidos=$apellidos;
            $this->intTelefono=$telefono;
            $this->strEmail=$email;
            $this->strDireccion=$Direccion;
            $this->strNit=$nit;
            $this->strNomFiscal=$nomFiscal;
            $this->strDirFiscal=$DirFiscal;
            $sql="select identificacion,email from cliente where (email= :email or identificacion=:iden)and status=:estado";

            $arrayParams=array(
                ":email"=>$this->strEmail,
                ":iden"=>$this->strIdentificacion,
                ":estado"=> 1
            );
            $request=$this->select($sql,$arrayParams);

            if (!empty($request)) {
                return false;
            }else{
                $query_insert="insert into cliente (identificacion,nombres,apellidos,telefono,email,direccion,nit,nombrefiscal,direccionfiscal) values{:iden, :nom , :ape , :tel , :email, :dir, :nit , :nomfiscal , :dirfiscal}";

                $arrayData=array(
                    ":iden"=>$this->strIdentificacion,
                    ":nom"=>$this->strNombres,
                    ":ape"=>$this->strApellidos,
                    ":tel"=>$this->intTelefono,
                    ":email"=>$this->strEmail,
                    ":dir"=>$this->strDireccion,
                    ":nit"=>$this->strNit,
                    ":nomfiscal"=>$this->strNomFiscal,
                    ":dirfiscal"=>$this->strDirFiscal
                );

                $reques_Insert=$this->insert($query_insert,$arrayData);
                return $reques_Insert;
            }
        }


    }

?>