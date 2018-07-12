<?php
 require_once 'conecta.php';
 class imagen {
   private $id;
   private $nombre;
   private $descripcion;
   const TABLA = 'imagen';
   public function getId() {
      return $this->id_imagen;
   }
   public function getNombre() {
      return $this->nombre;
   }
   
   public function getDescripcion() {
      return $this->imagen_name;
   }
   
   public function setNombre($nombre) {
      $this->nombre = $nombre;
   }
   public function setDescripcion($imagen_name) {
      $this->imagen_name = $imagen_name;
   }
   public function __construct($nombre, $imagen_name, $id=null) {
      $this->nombre = $nombre;
      $this->imagen_name = $imagen_name;
      $this->id_imagen = $id;
   }
   public function guardar(){
      $conexion = new conecta();
      if($this->id) /*Modifica*/ {
         $consulta = $conexion->prepare('UPDATE ' . self::TABLA .' SET nombre = :nombre, imagen_name = :imagen_name WHERE id = :id_imagen');
         $consulta->bindParam(':nombre', $this->nombre);
         $consulta->bindParam(':imagen_name', $this->imagen_name);
         $consulta->bindParam(':id_imagen', $this->id);
         $consulta->execute();
      }else /*Inserta*/ {
         $consulta = $conexion->prepare('INSERT INTO ' . self::TABLA .' (nombre, imagen_name) VALUES(:nombre, :imagen_name)');
         $consulta->bindParam(':nombre', $this->nombre);
         $consulta->bindParam(':imagen_name', $this->imagen_name);
         $consulta->execute();
         $this->id = $conexion->lastInsertId();
      }
      $conexion = null;
   }
 }
?>