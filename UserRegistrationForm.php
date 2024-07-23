<?php
include('config.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
    $email = $_POST['email'];

    $stmt = $pdo->prepare("INSERT INTO users (username, password, email) VALUES (?, ?, ?)");
    $stmt->execute([$username, $password, $email]);

    echo "Registration successful";
}
?>

<!DOCTYPE html>
<html>
<body>
    <form method="POST" action="register.php">
        <input type="text" name="username" placeholder="Username" required><br>
        <input type="password" name="password" placeholder="Password" required><br>
        <input type="email" name="email" placeholder="Email" required><br>
        <button type="submit">Register</button>
    </form>
</body>
</html>
