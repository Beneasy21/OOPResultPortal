<?php
	
	class Sex{
		//db stuff
		private $conn; 
		private $table = 'tblsex';

		//Sex properties
		public $sexId;
		public $longName;
		public $shortName;

		//construct
		public function __construct($dbh){
			$this->conn = $dbh;
			
		}

		//Getting post from db
		public function read(){

			$sql = "SELECT * FROM " .$this->table ;
			// Writing the query
			$stmt = $this->conn->prepare($sql); //Preparing the query
			$stmt->execute(); // Execute the query
			//$result = mysqli_query($db, $sql);
			confirm_result_set($stmt);
			//$Sex = 	$stmt->fetchAll();
			//$stmt->closeCursor();
			return $stmt;
		}

		public function readSingle(){

			$sql = "SELECT * FROM " .$this->table ;
			$sql .= " WHERE sexId = ?";
			$sql .= " LIMIT 1";
			// Writing the query
			$stmt = $this->conn->prepare($sql); //Preparing the query
			$stmt->bindParam(1,$this->sexId);//Binding Parameter
			$stmt->execute(); // Execute the query


			$row = $stmt->fetch();

			$this->longName = $row['longName'];
			$this->shortName = $row['shortName'];

			
			//$result = mysqli_query($db, $sql);
			confirm_result_set($stmt);
			//$Sex = 	$stmt->fetchAll();
			//$stmt->closeCursor();
			return $stmt;
		}

		public function create(){

			$sql = "INSERT INTO " .$this->table ;
			$sql .= " SET longName= :longName, shortName= :shortName";// Writing the query
			$stmt = $this->conn->prepare($sql); //Preparing the query

			
			//Sanitize the data
			$this->longName = h($this->longName);
			$this->shortName = h($this->shortName);

			//binding parameters
			$stmt->bindParam(':longName',$this->longName);//Binding Parameter
			$stmt->bindParam(':shortName',$this->shortName);//Binding Parameter

			//Execute the Query
			if($stmt->execute()){
				return true;
			}else{
				//Print error if something went wrong
				printf("Error %s. \n", $stmt->error);
				return false;
			}
		}

		public function update(){

			$sql = "UPDATE " .$this->table ;
			$sql .= " SET longName= :longName, shortName= :shortName";// Writing the query
			$sql .= " WHERE sexId = :sexId ";
			$stmt = $this->conn->prepare($sql); //Preparing the query

			
			//Sanitize the data
			$this->longName = h($this->longName);
			$this->shortName = h($this->shortName);
			$this->sexId = h($this->sexId);

			//binding parameters
			$stmt->bindParam(':longName',$this->longName);//Binding Parameter
			$stmt->bindParam(':shortName',$this->shortName);//Binding Parameter
			$stmt->bindParam(':sexId',$this->sexId);//Binding sexId

			//Execute the Query
			if($stmt->execute()){
				return true;
			}else{
				//Print error if something went wrong
				printf("Error %s. \n", $stmt->error);
				return false;
			}
		}

		public function delete(){

			$sql = "DELETE FROM " .$this->table ;
			$sql .= " WHERE sexId = :sexId ";
			$sql .= " LIMIT 1";
			$stmt = $this->conn->prepare($sql); //Preparing the query

			//Sanitize the data
			$this->sexId = h($this->sexId);

			//binding parameters
			$stmt->bindParam(':sexId',$this->sexId);//Binding sexId

			//Execute the Query
			if($stmt->execute()){
				return true;
			}else{
				//Print error if something went wrong
				printf("Error %s. \n", $stmt->error);
				return false;
			}
		}
	}
?>