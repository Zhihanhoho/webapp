
<?php  
$mysql_host = 'us-cdbr-iron-east-05.cleardb.net';
$mysql_user = 'bec617f30f8fbc';
$mysql_pass = '99fde09e';
$mysql_db = 'heroku_947dd34b739ebe6';
$connect_error = "fail to login";
$current_file = $_SERVER['SCRIPT_NAME'];

$con = mysqli_connect($mysql_host, $mysql_user, $mysql_pass, $mysql_db);
if (!$con) {
    echo "Error: Unable to connect to MySQL." . PHP_EOL;
    echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
    echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
    exit;
}else{
$query = "SELECT * FROM user";
$result = mysqli_query($con, $query);
echo "CURRENT REGISTERED USER";

echo "<table>";
echo "<td>";
echo "username";
echo "</td>";
echo "<td>";
echo "password";
echo "</td>";

while($row = $result->fetch_array(MYSQLI_ASSOC))
  {
  	echo "<tr>";
    echo "<td>";
    echo $row['username'];
    echo "</td>";
    echo "<td>";
    echo $row['password'];
    echo "</td>";
    echo "</tr>";
 }
echo "</table>";
}

?>

<form action="/register.php" method="post">
  username: <input type="text" name="username"><br>
  password: <input type="text" name="password"><br>
  <input type="submit" value="Register">
</form>

<form action="/delete.php" method="post">
  username: <input type="text" name="username"><br>
  password: <input type="text" name="password"><br>
  <input type="submit" value="Delete">
</form>
