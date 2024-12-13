<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>SQL Injection Test</title>
</head>

<body>
  <h1>SQL Injection Test</h1>
  <form method="GET" action="">
    <label for="id">Enter User ID:</label>
    <input type="text" name="id" id="id" required>
    <button type="submit">Search</button>
  </form>
</body>

</html>

<!-- 01234567' OR 'A' = 'A -->

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "testdb";

// データベース接続
$conn = new mysqli($servername, $username, $password, $dbname);

// 接続確認
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// ユーザからの入力を直接使用
$user_input = $_GET['id'];

$sql = "SELECT * FROM users WHERE id = '$user_input'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {
    echo "ID: " . $row["id"] . " - Name: " . $row["name"] . "<br>";
  }
} else {
  echo "0 results";
}

$conn->close();
