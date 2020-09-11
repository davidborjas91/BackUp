<?php 
    class db
    {
        public $isConnected;
        protected $datab;

        public function __construct($username, $password, $host, $dbname)
        {
            $this->isConnected = true;
            try 
            { 
                $this->datab = new PDO("sqlsrv:Server=$host;Database=$dbname", $username, $password); 
                $this->datab->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
                $this->datab->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            } 
            catch(PDOException $e) 
            { 
                $this->isConnected = false;
                throw new Exception($e->getMessage());
            }
        }

        public function desconectar()
        {
            $this->datab = null;
            $this->isConnected = false;
        }

        public function getFila($query, $params=array())
        {
            try
            { 
                $stmt = $this->datab->prepare($query); 
                $stmt->execute($params);
                return $stmt->fetch(); 

            }catch(PDOException $e)
            {
                throw new Exception($e->getMessage());
            }
        }

        public function getFilas($query, $params=array())
        {
            try
            { 
                $stmt = $this->datab->prepare($query); 
                $stmt->execute($params);
                return $stmt->fetchAll();       
            
            }catch(PDOException $e)
            {
                throw new Exception($e->getMessage());
            }       
        }

        /*public function insertar($query, $params)
        {
            try
            { 
                $stmt = $this->datab->prepare($query); 
                $stmt->execute($params);

            }catch(PDOException $e)
            {
                throw new Exception($e->getMessage());
            }           
        }*/

        public function insertar($query, $params)
        {
           // echo $query;
                    for($i=0; $i<count($params); $i++)
                    {
                        echo $params[$i];
                        echo "\n";
                    }
            try
            { 
                $stmt = $this->datab->prepare($query); 
                $stmt->execute($params);

            }catch(PDOException $e)
            {
                throw new Exception($e->getMessage());
            }           
        }

        public function actualizar($query, $params)
        {
            return $this->insertar($query, $params);
        }

        public function eliminar($query, $params)
        {
            return $this->insertar($query, $params);
        }

        public function getSP($sp, $params=array()) {
            try
            {
                $stmt = $this->datab->beginTransaction();
                $stmt = $this->datab->prepare($sp);
                $stmt->execute($params);
                $result = $stmt->fetchAll();
                $stmt = $this->datab->commit();
                return $result;
            }catch(PDOException $e)
            {
                $stmt = $this->datab->rollBack(); 
                throw new Exception($e->getMessage());
            }
        }
    }
?>