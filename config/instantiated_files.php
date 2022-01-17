<?php session_start();
     include('functions.php');
     if(!isset($_SESSION['uid'])){
        header('location: index');
      }
     $uid = $_SESSION['uid'];
     $user_details = get_one_row_from_one_table_by_id('users','unique_id',$uid,'date_added');
     $first_name = $user_details['fname'];
     $last_name = $user_details['lname'];
     $mname = $user_details['mname'];
     $fullname = $first_name.' '.$last_name;
     $phone = $user_details['phone'];
     $email = $user_details['email'];
     $date_created = $user_details['date_added'];
     $role = $user_details['role'];
    

  
     //////////pagination script starts
		if (isset($_GET['pageno'])) {
		$pageno = $_GET['pageno'];
		} else {
		$pageno = 1;
		}
		$no_per_page = 10;
		$offset = ($pageno-1) * $no_per_page; 
		/////////pagination script ends
?>