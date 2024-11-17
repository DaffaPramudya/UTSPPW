<?php
    session_start();

    if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
        header("location: index.php");
        exit;
    }

    include("database.php");

    if (!isset($_SESSION['user_id'])) {
        header("Location: login.php");
        exit();
    }

    $user_id = $_SESSION['user_id'];

    $sql = "SELECT username, email, nomor, alamat, gender, profilepic FROM users WHERE id = ?";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $result = $stmt->get_result();

    // Fetch user data
    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
    } else {
        echo "No user found with the given ID.";
        exit();
    }
?>

<!DOCTYPE html>
<html lang="en">
<?php
    include "head.php";
?>
<body>
<?php
    include "header.php";
?>
    <div class="content">
        <div class="profile-card">
            <form method="POST" action="update_profile.php" enctype="multipart/form-data">
                <div>
                    <label for="username">Username</label>
                    <input type="text" id="username" name="username" value="<?php echo htmlspecialchars($user['username']); ?>" readonly><br>
                </div>
                <div>
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($user['email']); ?>" readonly><br>
                </div>
                <div>
                    <label for="nomor">Nomor Handphone</label>
                    <input type="text" id="nomor" name="nomor" value="<?php echo htmlspecialchars($user['nomor']); ?>"><br>
                </div>
                <div>
                    <label for="alamat">Alamat</label>
                    <input type="text" id="alamat" name="alamat" value="<?php echo htmlspecialchars($user['alamat']); ?>"><br>
                </div>
                <div>
                    <label for="gender">Jenis Kelamin</label>
                    <select id="gender" name="gender">
                        <option value="" disabled selected>Select Gender</option>
                        <option value="Laki-laki" <?php if($user['gender'] == 'Laki-laki') echo 'selected'; ?>>Laki-laki</option>
                        <option value="Perempuan" <?php if($user['gender'] == 'Perempuan') echo 'selected'; ?>>Perempuan</option>
                    </select>
                </div>
                <div>
                    <label>Foto Profil</label>
                    <input type="file" accept="image/jpg, image/png" id="fileupload" name="fileupload">
                    <label for="fileupload" id="uploadlabel"><i class="fa-solid fa-upload"></i>Upload File</label>
                    <?php if($user['profilepic'] != NULL): ?>
                        <br>
                        <button type="submit" name="hapusfotoprofil" id="hapusfotoprofil">
                            <i class="fa-solid fa-trash"></i>Hapus foto profil
                        </button>
                    <?php endif; ?>
                </div>
                <div>
                    <input type="submit" id="submitprofile" name="submitprofile" value="Update Profile">
                </div>
            </form>
        </div>
        <div class="circle-profilepic">
            <?php if($user['profilepic'] != NULL): ?>
                <img src="<?= $user['profilepic'] ?>">
            <?php else: ?>
                <img src="assets/png/anonim.png">
            <?php endif; ?>
        </div>
    </div>
</body>
</html>