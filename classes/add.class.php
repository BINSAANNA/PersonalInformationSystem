<?php

	require_once('dbh.class.php');
	class add_user extends dbh{
		private $p_no;

		public function __construct($p_no){
			$this->p_no=$p_no;
		}

		public function insert_bio($p_no,$name,$grade,$dt_grade,$trade,$dt_birth,$address,$station){

			$sql="INSERT INTO `biodata` (`per_no`, `name`, `grade`, `dt_grade`, `trade`, `dt_birth`, `address`, `station`) VALUES ('$p_no', '$name', '$grade', '$dt_grade', '$trade', '$dt_birth', '$address', '$station');
";
			$res= $this->connect()->query($sql);
		}

		public function salary($p_no,$basic,$allowance,$tax,$gross){
			
			$sql="INSERT INTO `pis`.`payroll` (`per_no`, `basic`, `allowance`, `tax`, `gross`) VALUES ('$p_no', '$basic', '$allowance', '$tax', '$gross');";
			$res= $this->connect()->query($sql);

		}

		public function qualification_user($p_no,$qualification,$subject){

			$sql="INSERT INTO `pis`.`qualification` (`q_per_id`, `qualification`, `subject`) VALUES ('$p_no', '$qualification', '$subject');";
	 		$res= $this->connect()->query($sql);
			
		}
		
		public function insert_user($p_no,$c_no){
			$sql="INSERT INTO `pis`.`users` (`per_no`, `c_no`) VALUES ('$p_no', '$c_no');";
	 		$res= $this->connect()->query($sql);
			
		
		}

		public function update_bio($per_no,$name,$grade,$dt_grade,$trade,$dt_birth,$address,$station){
			$sql= "UPDATE `biodata` SET `per_no` = '$per_no',
										 `name` = '$name',
										 `grade` = '$grade',
										 `dt_grade` = '$dt_grade',
										 `trade` = '$trade',
										 `dt_birth` = '$dt_birth',
										 `address` = '$address',
										 `station` = '$station' WHERE `biodata`.`per_no` = '$this->p_no'";
			$res= $this->connect()->query($sql);
			if($res)
				return true;
		}

		public function update_salary($per_no,$basic,$allowance,$tax,$gross){
			$sql= "UPDATE `payroll` SET `per_no` = '$per_no',
										 `basic` = '$basic',
										 `allowance` = '$allowance',
										 `tax` = '$tax',
										 `gross` = '$gross' WHERE `payroll`.`per_no` = '$this->p_no'";
			$res= $this->connect()->query($sql);
			if($res)
				return true;
				
		}

		public function get_sl(){

			$sql="SELECT sl FROM qualification where q_per_id = '$this->p_no' ";
			$res= $this->connect()->query($sql);
			$row_num= $res->num_rows;
			if($row_num>0)
			{
				while($row= $res->fetch_assoc()){
					$data[]=$row;
				}
				
				return $data;
			}	
				

		}
		
		public function chk_id($per_no){
			$sql="SELECT q_per_id FROM users";
			$res=$this->connect()->query($sql);
			$row_num=$res->num_rows;
			if($row_num>0){
				while($row=$res->fetch_assoc()){
					if($row['per_no']==$per_no)
					{
						
						$flag=0;
						break;
					}
					else{
						$flag=1;
					}
				}
			}
			if($flag)
				return true;
			else
				return false;
		}


		public function update_qual($sl,$per_no,$qualification,$subject){
			$sql= "UPDATE `qualification` SET `q_per_id` = '$per_no',
										 `qualification` = '$qualification',
										 `subject` = '$subject' WHERE `qualification`.`sl` = '$sl'";
			$res= $this->connect()->query($sql);
			if($res)
				return true;
				
			
		}

		public function update_user($per_no){
			$sql= "UPDATE `users` SET `per_no` = '$per_no' WHERE `users`.`per_no` = '$this->p_no'";
			$res= $this->connect()->query($sql);
			if($res)
				return true;
			
		}





	} 



?>