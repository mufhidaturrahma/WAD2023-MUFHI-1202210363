<?php 

// (1) Hapus cookie dengan key id 
if (isset($_COOKIE['id'])) {
    setcookie('id', '', time() - 3600, '/');
}
// 

// (2) Mulai session
session_start();
//

// (3) Hapus semua session yang berlangsung
session_unset();
session_destroy();
//

// (4) Lakukan redirect ke halaman login awal
header('Location: halaman_login.php');
exit;

?>
