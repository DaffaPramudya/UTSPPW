<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Keranjang</title>
  <link rel="stylesheet" href="assets/css/keranjang.css">
</head>
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
                            <button>&uarr;</button>
                            28
                            <button>&darr;</button>
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
                            <button>&uarr;</button>
                            12
                            <button>&darr;</button>
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
                            <button>&uarr;</button>
                            1
                            <button>&darr;</button>
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