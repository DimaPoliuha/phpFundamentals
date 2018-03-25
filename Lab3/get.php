<?php

if(!isset($_GET['id'])){
	exit("Wrong choose");
}

$id = $_GET['id'];
$text = file_get_contents("news/$id");

?>
<h2>News</h2>
<?php
$files = scandir('news');

foreach ($files as $file) {
	if(is_file('news/'.$file)){
		echo "<a href = \"get.php?id=$file\">News: $file</a>";
		echo '<br>';
	}
}
echo '<br><br>';
echo '<a href="index.php">Go back</a>';

?>
<hr>
<?php
	echo nl2br($text);
?>
<hr>