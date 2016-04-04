<?php
	class DB{
		private $server = "127.0.0.1";
		private $username = "root";
		private $password = "";
		private $db = "getmyproject";

		function connect(){
			$conn = new mysqli($this->server, $this->username, 
				$this->password, $this->db);
			if($conn -> connect_error){
				return NULL;
			}
			return $conn;
		}
	}

	class Project{
		private $name, $subject, $sem, $branch, $format, $description,
			$filename, $impl;

		function getResult($name, $branch, $sem, $subject, $desc){
			$db = new DB;
			$conn = $db -> connect();

			$query = "select * from project where name like '%" . $name . "%' and 
				branch like '%" . $branch . "%' and
				(sem=" . $sem . ") and
				subject like '%" . $subject . "%' and
				description like '%" . $desc . "%' ";

			$result = $conn -> query($query);
			return $result;
		}	

		function getResultByVal($val){
			$db = new DB;
			$conn = $db -> connect();

			if($val > 0 and $val < 8){
				$query = "select * from project where sem=" . $val;
			}else{
				$query = "select * from project where name like '%" . $val . "%' or 
				branch like '%" . $val . "%' or
				subject like '%" . $val . "%' or
				description like '%" . $val . "%' ";
			}

			

			$result = $conn -> query($query);
			return $result;
		}

		function incViews($id){
			$db = new DB;
			$conn = $db -> connect();

			$query = "update project set views=(views+1) where id=" . $id;
			
			$result = $conn -> query($query);
			return $result;
		}

		function getResultById($id){
			$db = new DB;
			$conn = $db -> connect();

			$query = "SELECT * from project where id=" . $id;

			$result = $conn -> query($query);
			return $result;
		}

		function getTop3(){
			$db = new DB;
			$conn = $db -> connect();

			$query = "SELECT * from project ORDER by views desc limit 3";

			$result = $conn -> query($query);
			return $result;
		}

		function insertIntoDB($uid, $name, $subject, $sem, $branch, $format, $description,
			$filename, $impl, $ssname){

			$db = new DB;
			$conn = $db -> connect();

			if($ssname == "")
				$ssname = "proj-img.jpg";

			echo "name = " . $name . "<br>";
			echo "subject = " . $subject . "<br>";
			echo "sem = " . $sem . "<br>";
			echo "branch = " . $branch . "<br>";
			echo "format = " . $format . "<br>";
			echo "description = " . $description . "<br>";
			echo "filename = " . $filename . "<br>";
			echo "impl = " . $impl . "<br>";

			$query = "insert into project (`id`, `branch`, `sem`, `userId`, `format`, `name`, `subject`, `description`, `impl`, `filename`, `datetime`, `s1`) values ('', '" .
				$branch . "', " . $sem . ", " .
				$uid . ", '" .
				$format . "', '" .
				$name . "', '" .
				$subject . "', \"" .
				$description . "\", '" .
				$impl . "', '" .
				$filename . "'" .
				", now(), '" . 
				$ssname . "');";
			echo $query . "<br>";

			$result = $conn -> query($query);

			if($result === TRUE){
				$query = "select id from project where name='" . $name . "'";
				$result = $conn -> query($query);
				$row = $result -> fetch_assoc();
				return $row['id'];
			}
			
			return 0;
		}

		function getSubjects(){
			$db = new DB;
			$conn = $db -> connect();

			if($conn != NULL){
				$query = "select distinct subject from project";
				$result = $conn -> query($query);
				return $result;
			}else{
				return null;
			}
		}
	}

	class Feature{
		private $featurename;

		function setFeature($fname){
			$this->featurename = $fname;
		}

		function insertIntoDB(){
			$db = new DB;
			$conn = $db -> connect();

			if($conn != NULL){
				$query = "insert into feature values('', '" . $this->featurename . "')";
				echo $query . '<br>';

				if($conn -> query($query) === TRUE){
					echo "new feature inserted";
				}else{
					echo "already exist";
				}
				$query = "select featureId from feature where type='" . $this->featurename . "'";
				$result = $conn -> query($query);
				$row = $result -> fetch_assoc();

				echo "feature id =  " . $row['featureId'];
				return $row['featureId'];
			}else{
				echo "Connect failed";
			}
			return 0;
		}

		function getFeatures(){
			$db = new DB;
			$conn = $db -> connect();

			if($conn != NULL){
				$query = "select type from feature";
			
				$result = $conn -> query($query);

				return $result;
			}else{
				return null;
			}

		}
	}

	class hasFeature{
		function insertIntoDB($projId, $fid){
			$db = new DB;
			$conn = $db -> connect();

			$query = "insert into hasfeature values (" . $projId . ", " . $fid . ")";
			if($conn -> query($query) === TRUE){
				echo "insert into has feature success";
			}else{
				echo "insert into 'hasfeature' <h3>not</h3> success";
			}
		}

		function getFeatureByProjId($projId){
			$db = new DB;
			$conn = $db -> connect();

			$query = "select featureId from hasfeature where projectId=" . $projId;
			$result = $conn -> query($query);
			if($result -> num_rows > 0){
				return $result;
			}else{
				return null;
			}
		}

		function getFeatureNameById($fid){
			$db = new DB;
			$conn = $db -> connect();

			$query = "select type from feature where featureId=" . $fid;
			$result = $conn -> query($query);
			$row = $result -> fetch_assoc();
			return $row['type'];
		}
	}

	class User{
		function register($name, $status, $email, $pass){
			$db = new DB;
			$conn = $db -> connect();

			$query = "INSERT INTO `user`(`name`, `email`, `pass`, `status`) VALUES ('" . 
				$name . "', '" .
				$email . "', '" .
				$pass . "', '" .
				$status . "')";

			$result = $conn -> query($query);
			return $result;
		}

		function validate($email, $pass){
			$db = new DB;
			$conn = $db -> connect();

			$query = "select * from user where email='" . $email . "' and pass='" . $pass . "'";

			$result = $conn -> query($query);
			if($result -> num_rows > 0 ){
				return TRUE;
			}else{
				return FALSE;
			}
			
		}

		function getNameFromEmail($email){
			$db = new DB;
			$conn = $db -> connect();

			$query = "select name from user where email='" . $email . "'";

			$result = $conn -> query($query);
			$row = $result -> fetch_assoc();
			return $row['name'];
		}

		function getIdFromEmail($email){
			$db = new DB;
			$conn = $db -> connect();

			$query = "select id from user where email='" . $email . "'";

			$result = $conn -> query($query);
			$row = $result -> fetch_assoc();
			return $row['id'];
		}

		function getTop3(){
			$db = new DB;
			$conn = $db -> connect();

			$query = "select user.name, user.status, count(user.id) as c 
				from user join project on(user.id = project.userId) 
				group by userId 
				order by c desc";

			$result = $conn -> query($query);
			return $result;
		}
	}

?>