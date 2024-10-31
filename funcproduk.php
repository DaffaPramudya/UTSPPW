<?php
    include "database.php";
    session_start();

    if (isset($_POST['condition'])) {
        $condition = $_POST['condition'];

        switch ($condition){
            case "insert":
                $nama = "anjing";
                $maxidx = mysqli_query($conn, "SELECT * FROM produk ORDER BY idProduk DESC");
                $row = mysqli_fetch_array($maxidx);
                if(mysqli_num_rows($maxidx) != NULL){
                    $idProduk = $row[0]+1;
                } else {
                    $idProduk = 1;
                }

                $uploadDir = 'uploads/';
            $allowedTypes = ['gif', 'jpg', 'jpeg', 'png'];
            $foto = "Produk_" . $idProduk . "." . pathinfo($_FILES["fotoproduk"]["name"], PATHINFO_EXTENSION);
            $targetFile = $uploadDir . $foto;

            $fileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));
            if (!in_array($fileType, $allowedTypes)) {
                die("File type not allowed.");
            }

            if ($_FILES["fotoproduk"]["size"] > 4096 * 1024) {
                die("File is too large. Maximum size is 4MB.");
            }

            if (move_uploaded_file($_FILES["fotoproduk"]["tmp_name"], $targetFile)) {
                $query = "INSERT INTO produk (idProduk, namaProduk, fotoProduk) VALUES ('$idProduk', '$nama', '$foto')";
                mysqli_query($conn, $query);
                header("location: ../manage-product.php");
            } else {
                header("location: ../register.php");
            }
            break;
        }
    }
?>