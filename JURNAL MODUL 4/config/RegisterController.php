<?php

require 'connect.php';

// (1) Mulai session
session_start();

    // (2) Ambil nilai input dari form registrasi
    $email = $_POST['email'];
    $name = $_POST['name'];
    $username = $_POST['username'];
    $password = password_hash($_POST ['password'], PASSWORD_DEFAULT);

    // (3) Buat dan lakukan query untuk mencari data dengan email yang sama dari nilai input email
    $query_check_email = "SELECT * FROM users WHERE email = '$email'";
    $result_check_email = mysqli_query($connection, $query_check_email);

    // (4) Buatlah perkondisian ketika tidak ada data email yang sama
    if (mysqli_num_rows($result_check_email) == 0) {
        // a. Buatlah query untuk melakukan insert data ke dalam database
        $query_insert_user = "INSERT INTO users (email, name, username, password) VALUES ('$email', '$name', '$username', '$password')";
        $insert_result = mysqli_query($connection, $query_insert_user);

        // b. Buat lagi perkondisian atau percabangan ketika query insert berhasil dilakukan
        if ($insert_result) {
            $_SESSION['message'] = "Pendaftaran berhasil!";
            // Redirect to success page or any desired location
            header("Location: ../views/login.php");
    
        } else {
            $_SESSION['message'] = "Gagal melakukan pendaftaran. Silakan coba lagi.";
            // Redirect to error page or any desired location
            header("Location: ../views/register.php");
        
        }
    } else {
        // (5) Buat juga kondisi else
        $_SESSION['message'] = "Email sudah terdaftar.";
    
        // Redirect to error page or any desired location
        header("Location: ../views/register.php");
    }
?>
