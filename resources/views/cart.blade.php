<?php 
session_start();
include("database.php");
include("database2.php");

// Pastikan user login
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user_id'];

// Ambil data keranjang dari database untuk user yang sedang login
$sql = "
    SELECT cart.id AS cart_id, produk.namaProduk, produk.fotoProduk, produk.hargaProduk, cart.quantity 
    FROM cart 
    JOIN produk ON cart.product_id = produk.idProduk 
    WHERE cart.user_id = ?
";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$res = $stmt->get_result();
?>

<!DOCTYPE html>
<html lang="en">
<?php include "head.php"; ?>
<body>
<?php include "header.php"; ?>

<div class="cart-container">
    <table>
        <tbody>
            <thead>
                <tr>
                    <th></th>
                    <th>Nama</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th></th>
                </tr>
            </thead>
            <?php while ($row = $res->fetch_assoc()) {
                $total_price = $row['hargaProduk'] * $row['quantity'];
                $formatted_price = "Rp " . number_format($total_price, 0, ',', '.');
            ?>
                <tr>
                    <td>
                        <img src="uploads/<?php echo $row['fotoProduk']; ?>" style="object-fit: cover;"">
                    </td>
                    <td>
                        <div><b><?php echo $row['namaProduk']; ?></b><br><small>Deskripsi produk singkat...</small></div>
                    </td>
                    <td>
                        <div class="quantity-controls">
                            <form method="POST" action="update_cart.php">
                                <input type="hidden" name="cart_id" value="<?php echo $row['cart_id']; ?>">
                                <button type="submit" name="decrease" class="up-arrow"><i class="fa-solid fa-minus"></i></button>
                                <input type="number" name="quantity" value="<?php echo $row['quantity']; ?>" min="1" readonly>
                                <button type="submit" name="increase" class="down-arrow"><i class="fa-solid fa-plus"></i></button>
                            </form>
                        </div>
                    </td>
                    <td><?php echo $formatted_price; ?></td>
                    <td>
                        <form method="POST" action="remove_from_cart.php" style="text-align: center;">
                            <input type="hidden" name="cart_id" value="<?php echo $row['cart_id']; ?>">
                            <button type="submit" class="buy-button" id="hapusproduk"><i class="fa-solid fa-trash"></i>Hapus</button>
                        </form>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>
</body>
</html>