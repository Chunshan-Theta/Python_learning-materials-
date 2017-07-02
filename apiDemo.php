<?PHP

	
	
	$act=isset($_POST['Act'])?$_POST['Act']:204;
	$Pin_id=isset($_POST['Pin_id'])?$_POST['Pin_id']:204;
	$cost=isset($_POST['Cost'])?$_POST['Cost']:204;
	$Name=isset($_POST['Name'])?$_POST['Name']:204;
	$User_Id=isset($_POST['User_id'])?$_POST['User_id']:204;
	$mail=isset($_POST['Mail'])?$_POST['Mail']:204;
	$cmd=isset($_POST['Cmd'])?$_POST['Cmd']:204;
	/*
	    GET/POST
	*/
	define('DB_PATH', '140.130.36.51'); //設定資料庫路徑
	define('DB_NAME', 'gpio'); //設定資料庫名稱
	define('DB_USER', 'gpio'); //設定資料庫帳號
	define('DB_PASSWORD', 'gpio'); //設定資料庫密碼	
	
	/*
	    config end
	*/
	print "act:".$act." <br>";
	switch($act){
	    case "addDevice":
	        $sql = "INSERT INTO `devicedata` (`Pin_id`, `cost`, `Name`) VALUES (".$Pin_id.", ".$cost.", '".$Name."');";
            echo $sql;
	        Insert_mysqlQuery($sql);
	        break;
		case "addUser":
			//INSERT INTO `user` (`User_Id`, `Name`, `mail`) VALUES (0x40241124, 'Wang C.S', 'gavin19950511#gmail.com');

	        $sql = "INSERT INTO `user` (`User_Id`, `Name`, `mail`) VALUES ('".$User_Id."', '".$Name."', '".$mail."');";
            echo $sql;
	        Insert_mysqlQuery($sql);
	        break;
		case "CMD":
			//INSERT INTO `gpiorecord` (`id`, `Pin_Id`, `User_Id`, `cmd`) VALUES (NULL, '123', '40241124', 'on');

	        $sql = "INSERT INTO `gpiorecord` (`id`, `Pin_Id`, `User_Id`, `cmd`) VALUES (NULL,".$Pin_id.", '".$User_Id."', '".$cmd."');";
            echo $sql;
	        Insert_mysqlQuery($sql);
	        break;
		default:
			print "devicedata: <br>";
			$sql = 'SELECT * FROM `devicedata';
		    Show($sql);
			print "<br>user: <br>";
			$sql = 'SELECT * FROM `user';
		    Show($sql);
			print "<br>cmd: <br>";
			$sql = 'SELECT * FROM `gpiorecord';
		    Show($sql);
	        break;
	}
	
	
	function Insert_mysqlQuery($sql) {
	
	
	
	//建立PDO連線
	$_link = new PDO('mysql:host='.DB_PATH.';charset=UTF8;dbname='.DB_NAME, DB_USER, DB_PASSWORD);
	//設定編碼
	$_link->query('SET NAMES UTF8')->execute();
	$query = $_link->prepare($sql);
	$query->execute();
	print($query->errorInfo()[2]);
	}
	function Show($sql) {	
	
	
		//建立PDO連線
		$_link = new PDO('mysql:host='.DB_PATH.';charset=UTF8;dbname='.DB_NAME, DB_USER, DB_PASSWORD);
		//設定編碼
		$_link->query('SET NAMES UTF8')->execute();
		$query = $_link->prepare($sql);
		$query->execute();
		$re = $query->fetchAll(PDO::FETCH_OBJ);
		print_r($re);
	}
	
	

?>
