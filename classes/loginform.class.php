<?php
	require_once('dbh.class.php');

	class login extends dbh
	{	
		
		public function __construct()
		{
				
		}
		public function chk_admin_login($p_no,$c_no){
			/*echo $this->p_no;
			echo $this->c_no;*/
			$sql="SELECT * FROM users where per_no = $p_no AND c_no=$c_no ";
			$res= $this->connect()->query($sql);
			$row_num= $res->num_rows;
			if($row_num>0){
				$row=$res->fetch_assoc();
				if($row['per_no']=='817926' && $row['c_no']=='5803')
					return true;
			}
			else
				return false;
		}

		public function chk_user_login($p_no){
			$sql="SELECT * FROM users where per_no = $p_no AND NOT per_no = '817926' ";
			$res= $this->connect()->query($sql);
			$row_num= $res->num_rows;
			if($row_num>0){
				return true;
			}
			else
				return false;
		}

		public function __destruct()
		{
			//unset()

			
		}

	}



?>