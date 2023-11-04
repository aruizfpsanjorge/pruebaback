<?php


/**
 * BaseDatos
 */
class BaseDatos{
        
    /**
     * conexion asadad
     *
     * @var mixed asdasdsadasdasd
     */
    private $conexion;    
    /**
     * user asdad
     *
     * @var mixed asdadssadsaasd
     */
    private $user ;
    private $host;
    private $pass ;
    public static $db_ud04 = 'ud04';
    public static $db_ud05 = 'ud05';
    
        public function __construct()
    {
        $this->user = "root";
        $this->host = "localhost";
        $this->pass = "";
        /*$this->db = "ud04";*/
    }
    
        
    /**
     * Metodo larala lorolo
     *
     * @param  mixed $database asldj alkdj
     * @return void asdsad
     */
    public function conectar($database){
     
          $this->conexion = new mysqli($this->host,$this->user,$this->pass,$database);    
           if ($this->conexion->connect_errno) {
                printf("Connect failed: %s\n", $this->conexion->connect_error);
                exit();
            }
            else{
               return $this->conexion;
            }       
     
    }

    public function seleccionar($query){
        $resultado=$this->conexion->query($query);
        if (!$resultado) {
            echo 'Hubo un error en la conexión con la base de datos.';
            exit;
        }
        return $resultado;
    }

    public function insertar($query) {
        $resultado=$this->conexion->query($query);
        if (!$resultado) {
            echo "Los datos no pudieron ser enviados a la base de datos. <br/>";
            
        } 
    }

    public function eliminar($query) {
        $resultado=$this->conexion->query($query);
        if (!$resultado) {
            echo "Los datos no pudieron ser enviados a la base de datos. <br/>";
     
        } 
    }
    public function update($query) {
        $resultado=$this->conexion->query($query);
        if (!$resultado) {
            echo "Los datos no pudieron ser enviados a la base de datos. <br/>";
           
        } 
    }

}

