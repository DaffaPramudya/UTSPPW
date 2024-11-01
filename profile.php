<?php
    session_start();

    if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
        header("location: index.php");
        exit;
    }
    
include("database.php");

// Ensure user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user_id'];

// Prepare and execute the SELECT query
$sql = "SELECT username, email, nomor, alamat, gender FROM users WHERE id = ?";

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
    <div class="sidebar">
        <img src="assets/png/anonim.png" alt="User Avatar">
            <div>
            <br><strong><label id="username"><?php echo htmlspecialchars($user['username']); ?></label></strong>
            </div>
    </div>
    <div class="content">
        <div class="profile-card">
            <form method="POST" action="update_profile.php">
                <div>
                    <label for="username">Username</label>
                    <input type="text" id="username" name="username" value="<?php echo htmlspecialchars($user['username']); ?>"<br>
                </div>
                <div>
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($user['email']); ?>"<br>
                </div>
                <div>
                    <label for="nomor">Nomor Hp</label>
                    <input type="text" id="nomor" name="nomor" value="<?php echo htmlspecialchars($user['nomor']); ?>"<br>
                </div>
                <div>
                    <label for="alamat">Alamat</label>
                    <input type="text" id="alamat" name="alamat" value="<?php echo htmlspecialchars($user['alamat']); ?>"<br>
                </div>
                <div>
                    <label for="gender">Jenis Kelamin</label>
                    <select id="gender" name="gender" required>
                        <option value="none" selected> </option>
                        <option value="Laki-laki" <?php if($user['gender'] == 'Laki-laki') echo 'selected'; ?>>Laki-laki</option>
                        <option value="Perempuan" <?php if($user['gender'] == 'Perempuan') echo 'selected'; ?>>Perempuan</option>
                    </select>
                </div>
                <br>
                <div>
                    <input type="submit" value="Update Profile">
                </div>
            </form>
        </div>
    </div>
</body>
</html>
