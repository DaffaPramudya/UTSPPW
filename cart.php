<?php 
session_start();
include("database.php");
include("database2.php");

// Ambil kata kunci pencarian jika ada
$search = isset($_GET['search']) ? $_GET['search'] : null;

// Ambil produk yang sesuai dengan pencarian
$res = all_table_alluser($conn, "produk", $search);
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
    <div class="cart-container">
        <table>
            <thead>
                <tr>
                    <th></th>
                    <th>Nama</th>
                    <th>Qty</th>
                    <th>Price</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><img src="image.png" alt="Sumpah Pemuda"></td>
                        <td><div><b>Sumpah Pemuda</b><br><small>Memperingati hari sumpah pemuda</small></div>
                    </td>
                    <td>
                    <div class="quantity-controls">
                    <div>
                            <button class="up-arrow">&uarr;</button>
                                <input type="number" value="28" min="1">
                            <button class="down-arrow">&darr;</button>
                        </div>
                    </td>
                    <td>Rp 350.000,00</td>
                    <td><button class="remove-btn"><img src="delete_icon.png" alt="Delete"></button></td>
                </tr>
                <tr>
                    <td><img src="image.png" alt="Sumpah Pemuda"></td>
                        <td><div><b>Sumpah Pemuda</b><br><small>Memperingati hari sumpah pemuda</small></div>
                    </td>
                    <td>
                    <div class="quantity-controls">
                        <div>
                            <button class="up-arrow">&uarr;</button>
                                <input type="number" value="28" min="1">
                            <button class="down-arrow">&darr;</button>
                        </div>
                    </td>
                    <td>Rp 200.000,00</td>
                    <td><button class="remove-btn"><img src="delete_icon.png" alt="Delete"></button></td>
                </tr>
                <tr>
                    <td><img src="image.png" alt="Sumpah Pemuda"></td>
                        <td><div><b>Sumpah Pemuda</b><br><small>Memperingati hari sumpah pemuda</small></div>
                    </td>
                    <td>
                        <div class="quantity-controls">
                            <div>
                                <button class="up-arrow">&uarr;</button>
                                    <input type="number" value="28" min="1">
                                <button class="down-arrow">&darr;</button>
                            </div>
                        </div>
                    </td>
                    <td>Rp 20.000,00</td>
                    <td><button class="remove-btn"><img src="delete_icon.png" alt="Delete"></button></td>
                </tr>
            </tbody>
        </table>
    </div>
</body>
</html>