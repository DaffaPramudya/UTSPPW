<?php
    session_start();
    include("database.php");
    include("database2.php");
    $res = all_table($conn, "produk");
?>

<!DOCTYPE html>
<html lang="en">
<?php
    include "head.php";
?>
<title>Dalel Shop - Edit Produk</title>
<body>
<?php
    include "header.php";
?>
    <main class="main-table">
        <div class="header"><h1>Edit Daftar Produk</h1></div>
        
        <div class="search-edit">
            <input type="text" name="search" id="search" placeholder="cari produk">
            <form action="">
                <input type="submit" value="Simpan Perubahan" id="save">
            </form>
            
            
        </div>

        <div class="table-body">
            <table>
                <tr class="head">
                    <td>Info Produk</td>
                    <td>Harga</td>
                    <td>Stok</td>
                    <td></td>
                </tr>
                <?php foreach($res as $row){ ?>
                    <tr>
                        <td>
                            <input type="file" name="edit-product" accept="image/png, image/jpg, image/jpeg" id="edit-image" placeholder="Nama Produk" required>
                            <input type="text" name="edit-product" id="edit-product" placeholder="Nama Produk" required>
                        </td>
                        <td><input type="text" name="edit-product" id="edit-product" placeholder="Harga Produk" required></td>
                        <td><input type="text" name="edit-product" id="edit-product" placeholder="Stok Produk" required></td>
                        <td class="edit">
                            <input type="button" value="Hapus" id="hapus">
                        </td>
                        
                    </tr>
                <?php } ?>
            </table>
        </div>
    </main>
</body>
</html>