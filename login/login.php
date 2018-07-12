<?php
 require_once 'conecta.php';
 class login{

   private $id;
   private $user;
   private $ip;
   const TABLA = 'login';

   public function getId() {
      return $this->id;
   }

   public function getUser() {
      return $this->user;
   }
   
      
   public function setUser($user) {
      $this->user = $user;
   }

   public function setpass($passw) {
      $this->passw = $passw;
   }
   
   public function __construct($user, $passw, $id=null) {
      $this->user = $user;
      $this->passw = $passw;
      $this->ip = $_SERVER['REMOTE_ADDR'];
      $this->id  = $id;
      $this->navegador = $_SERVER['HTTP_USER_AGENT']; 
   }

   public function guardar(){
    echo "<br> ya entro al guardado";
      $conexion = new conecta();
      if($this->id) /*Modifica*/ {
echo "<br>  ". $this->id;
        try{
         $consulta = $conexion->prepare('UPDATE ' . self::TABLA .' SET user = :user, password = :passw, ip = :ip navegador = :navegador WHERE id = :id');
         $consulta->bindParam(':user', $this->user);
         $consulta->bindParam(':passw', $this->passw);
         $consulta->bindParam(':ip', $this->ip);
         $consulta->bindParam(':navegador', $this->navegador);
         $consulta->bindParam(':id', $this->id);
         $consulta->execute();
        }catch(PDOException $e){
            echo 'Ha surgido un error al actualizar... ' . $e->getMessage();
            exit;
        }
      }else /*Inserta*/ {
        try{
         $consulta = $conexion->prepare('INSERT INTO ' . self::TABLA .' (user, password, ip, navegador) VALUES(:user, :passw, :ip, :navegador)');
         $consulta->bindParam(':user', $this->user);
         $consulta->bindParam(':passw', $this->passw);
              $consulta->bindParam(':navegador', $this->navegador);
           $consulta->bindParam(':ip', $this->ip);
         $consulta->execute();
         $this->id = $conexion->lastInsertId();
        }catch(PDOException $e){
            echo 'Ha surgido un error al Insertar... ' . $e->getMessage();
            exit;
        }
      }
      $conexion = null;
   }
 }
?>