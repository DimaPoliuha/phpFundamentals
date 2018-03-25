<html>
	<head>
		<title></title>
	</head>
	<body>
		<p>
            <?php
            $host = '127.0.0.1';
            $dbname = 'testPDO';
            $user = 'root';
            //$pass = '123456';
            $pass = '';
            $charset = 'utf8';
                try {  
                    # MySQL через PDO_MYSQL  
                    $DBH = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
                    $someid = '3; drop table test'; 
                    $delrows=$DBH->exec("DELETE FROM some WHERE id>$someid");
                    //exec используется там, где не возвращаются данные, например при удалении
                    echo 'Количество удаленных строк: '.$delrows;
/*
                    $DBH->exec("CREATE TABLE `test`(
                        id INT PRIMARY KEY AUTO_INCREMENT,
                        name VARCHAR(20) NOT NULL DEFAULT '',
                        email VARCHAR(50) NOT NULL DEFAULT '')");

                    $res = $DBH->query("SELECT * FROM some");
                    echo "<h2>".$res->rowCount()."</h2>";

                    //метод lastInsertId() возвращает id последней записи
                    $DBH->query("INSERT INTO test SET id = 7, name='Vasya', email='vasya@test.com'");
                    echo $insertId=$DBH->lastInsertId();

                    $stmt1 = $DBH->prepare("INSERT INTO test (id, name, email) VALUES (?,?,?)");
                    $stmt1 -> execute(array('10','Denis','denyast@i.ua'));

                    $stmt2 = $DBH->prepare("INSERT INTO test (id, name, email) VALUES (:id,:name,:email)");
                    $stmt2 -> execute(array('id'=>'11', 'name'=>'Petro', 'email' => '12j4@ukr.net'));
 */                   
                  }  
                  catch(PDOException $e) {  
                      echo $e->getMessage();  
                  }
			?>
		</p>
	</body>
</html>