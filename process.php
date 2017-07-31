<?php
    $conn = mysqli_connect("localhost", "root", "devonnuri");
    session_start();

    if($_SERVER["REQUETS_METHOD"] == "POST") {
        $username = $_POST["username"];
        $password = $_POST["password"];
        $sql="SELECT password FROM `users` WHERE username='$username' and password='$password'";
        $result=mysql_query($sql);
        $row=mysql_fetch_array($result);

        if(mysql_num_rows($result) == 1 && password_verify($password, $row["password"])) {
            session_register("username");
            $_SESSION["login_username"] = $username;
            header('Location: /index.php');
        } else {
            echo "<script>사용자 이름이나 비밀번호가 올바르지 않습니다.</script>";
            header('Location: /index.php');
        }
    }
?>