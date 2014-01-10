<?php
$todo_item = $_POST['todo_item'];
$date = $_POST['date'];
$host = 'localhost';
$user = 'root';
$password = '';
$db = 'todolistbase';
$table = 'todotable';

$link = mysqli_connect($host, $user, $password, $db) or die("Error " . mysqli_error($link));

if (isset($_POST['delete']) && $_POST['delete']!="") {
    
  $id =  $_POST['delete'];
   
  $query = "DELETE FROM `todotable` where id='$id'";
  $result = mysqli_query($link, $query) or die(mysqli_error($link));
  };

if (empty (trim($todo_item))) {
	die ('Todo Item field is required !');
}

if (empty (trim($date))) {
	die ('Date field is required !');
}


$sql = "INSERT INTO `todotable`(`todoitem`, `date`) VALUES ('$todo_item', '$date')";

if (!mysqli_query($link,$sql)) {
  die('Error: ' . mysqli_error($link));
}


$query = "SELECT * FROM todotable" or die("Error in the consult.." . mysqli_error($link));
$result = mysqli_query($link, $query) or die(mysqli_error($link));
$row_cnt = mysqli_num_rows($result);
echo  '<div id="div"><ul>';
for ($i=0; $i<$row_cnt; $i++) {
	$row = mysqli_fetch_row($result);
	echo <<<_END
	<div id="diiv">
	<li class="li">$row[1]</li>
	<li class="li">$row[2]</li>
	<button type="button" id="$row[0]" name="delete" class="button">DELETE</button>
	</div>
_END;
  }
echo '</ul></div>';

