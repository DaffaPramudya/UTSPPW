<?php
    session_start();
    include("database.php");

    if (!isset($_SESSION['user_id'])) {
        header("Location: login.php");
        exit();
    }

    if(isset($_POST['submitprofile'])) {
        if(isset($_POST['username']) && !empty(trim($_POST['username']))) {
            $stmt = $conn->prepare("UPDATE users SET username = ? WHERE id = ?;");
            $stmt->bind_param('si', $_POST['username'], $_SESSION['user_id']);
            $stmt->execute();
        }
        if(isset($_POST['email']) && !empty(trim($_POST['email']))) {
            $stmt = $conn->prepare("UPDATE users SET email = ? WHERE id = ?;");
            $stmt->bind_param('si', $_POST['email'], $_SESSION['user_id']);
            $stmt->execute();
        }
        if(isset($_POST['nomor']) && !empty(trim($_POST['nomor']))) {
            $stmt = $conn->prepare("UPDATE users SET nomor = ? WHERE id = ?;");
            $stmt->bind_param('si', $_POST['nomor'], $_SESSION['user_id']);
            $stmt->execute();
        }
        if(isset($_POST['alamat']) && !empty(trim($_POST['alamat']))) {
            $stmt = $conn->prepare("UPDATE users SET alamat = ? WHERE id = ?;");
            $stmt->bind_param('si', $_POST['alamat'], $_SESSION['user_id']);
            $stmt->execute();
        }
        if(isset($_POST['gender'])) {
            $stmt = $conn->prepare("UPDATE users SET gender = ? WHERE id = ?;");
            $stmt->bind_param('si', $_POST['gender'], $_SESSION['user_id']);
            $stmt->execute();
        }
        if(isset($_FILES['fileupload']) && $_FILES['fileupload']['error'] === 0) {
            $uploadDir = 'uploads/';
            $extension = pathinfo($_FILES['fileupload']['name'], PATHINFO_EXTENSION);
            $unique_name = uniqid('', true) . '.' . $extension;
            $fileDir = $uploadDir . $unique_name;

            if(move_uploaded_file($_FILES['fileupload']['tmp_name'], $fileDir)) {
                $stmtCheck = $conn->prepare('SELECT profilepic FROM users WHERE id = ?;');
                $stmtCheck->bind_param('i', $_SESSION['user_id']);
                $stmtCheck->execute();
                $stmtCheck->store_result();
                $stmtCheck->bind_result($oldprofilepic);
                $stmtCheck->fetch();
                if($oldprofilepic != NULL) {
                    if(file_exists($oldprofilepic)) {
                        unlink($oldprofilepic);
                        $stmtUpdate = $conn->prepare('UPDATE users SET profilepic = ? WHERE id = ?;');
                        $stmtUpdate->bind_param('si', $fileDir, $_SESSION['user_id']);
                        $stmtUpdate->execute();
                    }
                } else {
                    $stmtUpdate = $conn->prepare('UPDATE users SET profilepic = ? WHERE id = ?;');
                    $stmtUpdate->bind_param('si', $fileDir, $_SESSION['user_id']);
                    $stmtUpdate->execute();
                }
            }
        }
    }


    if(isset($_POST['hapusfotoprofil'])) {
        $stmtCheck = $conn->prepare('SELECT profilepic FROM users WHERE id = ?;');
        $stmtCheck->bind_param('i', $_SESSION['user_id']);
        $stmtCheck->execute();
        $stmtCheck->store_result();
        $stmtCheck->bind_result($oldprofilepic);
        $stmtCheck->fetch();
        if(file_exists($oldprofilepic)) {
            unlink($oldprofilepic);
            $user_id = $_SESSION['user_id'];
            $sql = "UPDATE users SET profilepic = NULL WHERE id = {$user_id}";
            mysqli_query($conn, $sql);
        }
    }
    header('Location: profile.php');
?>
