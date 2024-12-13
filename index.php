<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>SQL Injection Test</title>
</head>

<body>
  <h1>SQL Injection Test</h1>
  <!-- ユーザー検索フォーム -->
  <form method="GET" action="">
    <label for="id">Enter User ID:</label>
    <input type="text" name="id" id="id" required>
    <button type="submit">Search</button>
  </form>

  <!-- 新規ユーザー登録フォーム -->
  <h2>Register New User</h2>
  <form method="POST" action="">
    <label for="new_id">User ID:</label>
    <input type="text" name="new_id" id="new_id" required>

    <label for="new_name">Name:</label>
    <input type="text" name="new_name" id="new_name" required>

    <label for="new_email">Email:</label>
    <input type="email" name="new_email" id="new_email" required>

    <label for="new_password">Password:</label>
    <input type="text" name="new_password" id="new_password" required>

    <button type="submit">Register</button>
  </form>
</body>

</html>

<!-- SQLインジェクション inputタグの中に入れると指定いしたものがでてくる -->
01234567' OR 'A' = 'A
joker' OR 'A' = 'A
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

// ユーザからの入力を直接使用 ユーザー検索
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

// 新規ユーザー登録
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['new_id']) && isset($_POST['new_name'])) {
  $new_id = $_POST['new_id'];
  $new_name = $_POST['new_name'];
  $new_email = $_POST['new_email'];
  $new_password = $_POST['new_password'];
  // SQLインジェクションが可能な実装
  $sql = "INSERT INTO users (id, name, email, password) VALUES ('$new_id', '$new_name', '$new_email', '$new_password')";

  if ($conn->query($sql) === TRUE) {
    echo "New user registered successfully!";
  } else {
    echo "Error: " . $conn->error;
  }
}

$conn->close();
