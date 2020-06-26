<?php	
	require_once('dbh.class.php');
	
	class bio extends dbh{
		private $per_no;

		public function __construct(){
			
		}

		public function get_per_details($p_no){
			$this->per_no= $p_no;
			$sql="SELECT * FROM biodata where per_no = $this->per_no ";
			$res= $this->connect()->query($sql);
			$row_num= $res->num_rows;
			if($row_num>0)
			{
				$row= $res->fetch_assoc();
				$data[]=$row;
				return $data;
			}	
				

		}
		public function get_qual_details(){

			$sql="SELECT * FROM qualification where q_per_id = $this->per_no ";
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
		public function get_pay_details(){

			$sql="SELECT * FROM payroll where per_no = $this->per_no ";
			$res= $this->connect()->query($sql);
			$row_num= $res->num_rows;
			if($row_num>0)
			{
				$row= $res->fetch_assoc();
				$data[]=$row;
				return $data;
			}	
				

		}

		public function get_all_details(){
			$sql="SELECT * FROM biodata";
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

		public function chk_user($p_no){
			$sql="SELECT * FROM `users` WHERE per_no='$p_no'";
			$res= $this->connect()->query($sql);
			$row_num= $res->num_rows;
			if($row_num>0)
				return true;
			else
				return false;

		}

		public function delete_details($p_no){
			$sql="DELETE FROM users,biodata,payroll USING users INNER JOIN biodata INNER JOIN payroll WHERE users.per_no = biodata.per_no AND biodata.per_no=payroll.per_no AND payroll.per_no='$p_no' ";
			$res= $this->connect()->query($sql);
			$row_num= $this->connect()->affected_rows;
			
		}

		public function delete_qualification($p_no){
			$sql="DELETE FROM qualification WHERE q_per_id ='$p_no'";
			$res= $this->connect()->query($sql);
			$row_num= $this->connect()->affected_rows;
			echo $row_num;
		}

		public function __destruct(){

		}
			
			
		
		
		
		


	}


?>