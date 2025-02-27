<?
	class Database
	{
		private $conn;
		private $table;
		public function __construct($table_name)
		{
			$this->table = $table_name;
			$this->conn = mysqli_connect("localhost", "root", "");
			mysqli_select_db($this->conn, "nukri");
			mysqli_query($this->conn, 'SET CHARACTER SET utf8'); 
			mysqli_query($this->conn, 'SET NAMES utf8');
		}
		public static function table($table_name)
		{
			return new Database($table_name);
		}
		public function select($where)
		{
			$result = [];
			$res=mysqli_query($this->conn, "SELECT * FROM ".$this->table);
			while($data=mysqli_fetch_assoc($res))
			{
				$result[] = $data;
			}
			return $result;
		}
		public function update($fields, $id)
		{
			$query = "UPDATE ".$this->table." SET ";
			foreach($fields as $key=>$value)
			{
				$query.=$key."'$value',";
			}
			$query = rtrim($query, ',')." WHERE id=$id";
			mysqli_query($this->conn, $query);
		}
		public function insert($fields)
		{
			$query = "INSERT INTO ".$this->table."(";
			foreach($fields as $key=>$value)
			{
				$query.=$key.",";
			}
			$query = rtrim($query, ',');
			$query .= ") VALUES (";
			foreach($fields as $key=>$value)
			{
				$query.="'$value',";
			}
			$query = rtrim($query, ',');
			$query .= ")";
			mysqli_query($this->conn, $query);
		}
		public function getField($field, $id)
		{
			$res=mysqli_query($this->conn, "SELECT $field FROM ".$this->table." WHERE id=$id");	
			$data=mysqli_fetch_assoc($res);
			return $data[$field];
		}
	}
?>