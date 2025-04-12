<?php
class dbSAPIENSConn {

    private $myConn = NULL;
    private $sql_host = "10.60.253.20"; //private $sql_host = "10.60.252.208";
    private $sql_database = "sapiens";
    private $sql_user = "consulta";
    private $sql_pass = "@dM1324";
    private $sql_type = "mssql";
	public  $totRows = NULL;
	public  $erro = NULL;

    public function dbSAPIENSConn(){
		return $this->dbSAPIENSOpen();
    }

    public function dbSAPIENSOpen(){
		try {
			$this->myConn = new PDO("odbc:DRIVER={SQL Server}; SERVER={".$this->sql_host."};UID={".$this->sql_user."};PWD={".$this->sql_pass."}; DATABASE={".$this->sql_database."}",$this->sql_user,$this->sql_pass);
			return $this->myConn;
		} catch(PDOException $e){
			print "<B>Error:</b> ".$e->getMessage()."<br/>";
			die();
		}
    }

    public function dbClose(){
		unset($this->myConn);
    }

	public function listaFuncionario(){
		$sql = " SELECT * FROM USU_TCADFUN ";
		$myRes = $this->myConn->prepare($sql);
		$myRes->execute();
		$myVal = $myRes->fetchAll(PDO::FETCH_BOTH);
		$this->totRows = count($myVal);
		if ($this->totRows>0){
			$this->erro = false;
			return $myVal;
		} else {
			$this->erro = true;
			return 0;
  		}
		$myVal = NULL;
		$myRes = NULL;
	}
}
?>
