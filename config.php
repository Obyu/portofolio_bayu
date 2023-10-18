<?php
session_start();
$koneksi = new mysqli('localhost', 'root', '', 'myapp_bayu')or die (mysqli_error($koneksi));
if (isset($_POST['login'])) {
    $username = htmlspecialchars($_POST['username']);
    $password = sha1($_POST['password']);
    
    $query = $koneksi->query("SELECT * FROM user WHERE username='$username' AND password='$password'");
    
    $num = mysqli_num_rows($query);
    
    if ($num > 0) {
        $c = mysqli_fetch_array($query);
        $_SESSION['username'] = $c['username'];
        $_SESSION['nmuser'] = $c['nmuser'];
        header("location: index.php");
    } else {
        echo "Gagal";
    }
}
?>
