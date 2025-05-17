<?php
/*
Archivo:  Usuario.php
Objetivo: clase que encapsula la información de un usuario
Autor:
*/

include_once("AccesoDatos.php");
//include_once("PersonalHospitalario.php");

class Usuario {
    private $nClave = 0;
    private $sPwd = "";
    private $sNombre = "";
    private $sTelefono = "";
    private $nTipo = 0; // 1=Admin, 2=Visualizador

    public function getNombre(){
        return $this->sNombre;
    }
    
    public function setNombre($valor){
        $this->sNombre = $valor;
    }
    
    public function getTelefono(){
        return $this->sTelefono;
    }
    
    public function setTelefono($valor){
        $this->sTelefono = $valor;
    }
    
    public function getClave(){
        return $this->nClave;
    }
    
    public function setClave($valor){
        $this->nClave = $valor;
    }
    
    public function getPwd(){
        return $this->sPwd;
    }
    
    public function setPwd($valor){
        $this->sPwd = $valor;
    }
    
    public function getTipo(){
        return $this->nTipo;
    }
    
    public function setTipo($valor){
        $this->nTipo = $valor;
    }

    public function buscarCvePwd(){
        $bRet = false;
        $sQuery = "";
        $arrRS = null;

        if (($this->nClave == 0 || $this->sPwd == ""))
            throw new Exception("Usuario->buscar: faltan datos");
        else{
            $sQuery = "SELECT nombre, telefono, tipo
                       FROM usuario
                       WHERE id_usuario = ".$this->nClave."
                       AND contraseña = '".$this->sPwd."'";
            
            $oAD = new AccesoDatos();
            if ($oAD->conectar()){
                $arrRS = $oAD->ejecutarConsulta($sQuery);
                $oAD->desconectar();
                if ($arrRS != null){
                    $this->sNombre = $arrRS[0][0];
                    $this->sTelefono = $arrRS[0][1];
                    $this->nTipo = $arrRS[0][2];
                    $bRet = true;
                }
            }
        }
        return $bRet;
    }
}
?>