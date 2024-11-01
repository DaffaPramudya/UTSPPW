<?php 
session_start();
include("database.php");
include("database2.php");
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <title>Display Produk</title>
    <link rel="stylesheet" href="assets/css/displayproduk.css">
</head>
<body>
<?php include "header.php"; ?>
<?php include "head.php"; ?>

    <main class="table-display">
        <table>
            <tr>
                <td class="gambar-produk"><img src="https://radarlampung.disway.id/upload/891504aea3381619b7bbf4670f20b785.jpg" alt="" id="gambar-produk"></td>

                <td class="isi-produk">
                    <div class="nama-produk">
                        Baju Wanita
                    </div> 
                    <div class="harga-produk">
                        Rp25.000
                    </div>
                    <div class="detail-produk">
                        Detail Produk: <br>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Blanditiis, eveniet in. Reprehenderit debitis rerum in soluta eveniet animi commodi, aliquid sequi neque velit at illum facilis ipsam architecto? Nostrum, numquam.
                    </div>

                    <div class="add-to-cart">
                        <form method="POST" action="">
                            <input type="hidden" name="product_id" value="<?php echo $row['idProduk']; ?>">
                            <button type="submit" name="add_to_cart" id="buy-button">Add to cart</button>
                        </form>     
                    </div>
                    
                </td>
            </tr>
        </table>
    </main>

    <!-- <div class="tampilan-produk">
        <img src="https://radarlampung.disway.id/upload/891504aea3381619b7bbf4670f20b785.jpg" alt="">
        <div class="nama-produk">
            Baju Wanita
        </div>
        <div class="harga-produk">
            Rp25.000
        </div>
        <div class="">
            Detail Produk:
            <p>
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Blanditiis, eveniet in. Reprehenderit debitis rerum in soluta eveniet animi commodi, aliquid sequi neque velit at illum facilis ipsam architecto? Nostrum, numquam.
            </p>
        </div>
    </div> -->
</body>
</html>