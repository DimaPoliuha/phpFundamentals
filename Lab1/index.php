<?php
	echo "Hi!";

	$p = 1;
	$l = 'p';
	$$l = 10;
	echo $p;
?>
<h3>.</h3>
<?php

	$a = "Hello";
	$c = 20;

	$a = $a . $c;
	echo '<h3>.</h3>';
	echo $a;
	echo '<h3>.</h3>';
	
	$b = '50';

	if($b == 50){
		echo "Blaaaa $b !!!!";
	}
	

	if($b === 50){
		echo "10000000";
	}

	$arr = [1,2,3,4,5,6,7,8,9];
	$arr[] = 10;

	echo "<h2>{$arr[5]}<h2/>";

	foreach ($arr as $key => $value) {
		$value++;
		echo "<h1>$value</h1>";
	}
?>
<ul>
	<?php
		for($i=0; $i <= 100; $i+=3){
			echo "<li>$i</li>";
		}
	?>
</ul>
<?php
	$arr = [];
	$arr["day"] = 12;
	$arr["month"] = '/02/';
	$arr["year"] = 2018;
	echo "Date: ";
	foreach ($arr as $key => $value) {
		echo "$value";
	}

	$s = 'hi, we are there for a long time';
	$arr = explode(" ", $s);
	echo '<h3>.</h3>';
	echo $arr[6];

	$im = implode("***", $arr);
	echo '<h3>.</h3>';
	echo $im;
	echo '<h3>.</h3>';

	function a($i){
		return $i = $i * 10 + 201;
	}
	echo a(97);