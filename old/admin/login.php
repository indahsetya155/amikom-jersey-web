<?php 
include "../lib/koneksi.php";
$username = $_POST['username'];
$password = $_POST['password'];
// pastikakn username dan password adalahh berupa huruf atau angka.
if (!ctype_alnum($username) OR !ctype_alnum($password)) {
    echo "<center>LOGIN GAGAL ! <br>
        Username atau password anda tidak benar. <br>
        Atau akun anda sedang diblokir.<br>";
    echo "<a href=index.php><b>ULANGI LAGI</b></a></center>";
}else{
    $login = mysqli_query($koneksi, "SELECT * FROM tbl_admin WHERE username='$username' AND password = '$password'");
    $ketemu = mysqli_num_rows($login);
    $r = mysqli_fetch_array($login);

    // apabila username dan password ditemukan 
    if ($ketemu >0) {
        session_start();
        $_SESSION['username'] = $r['username'];
        $_SESSION['password'] = $r['password']; 
        header('location:adminweb.php?module=home');
    }else{
        echo "<center>LOGIN GAGAL! <br>
        Username atau password anda tidak benar. <br>
        atau akun anda sedang di blokir <br>";
        echo "<a href=index.php><b>ULANGI LAGI</b></a></center>";
    }
}

?>