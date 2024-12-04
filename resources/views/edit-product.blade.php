<!DOCTYPE html>
<html lang="en">
<x-head></x-head>
<title>Dalel Shop - Edit Produk</title>
<body>
<x-navbar></x-navbar>
    <main class="main-table">
        <div class="header"><h1>Edit Daftar Produk</h1></div>
        
        <!-- Form Pencarian -->
        <form method="GET" action="edit-product.php">
            <div class="search-edit">
                <input type="text" name="search" id="search" placeholder="Cari produk" value="">
                <input type="submit" value="Cari" id="save">
            </div>
        </form>
        
        <!-- Form untuk Menyimpan Perubahan -->
        <form action="update_product.php" method="POST" enctype="multipart/form-data">
            <div class="table-body">
                <table>
                    <tr class="head">
                        <td>Info Produk</td>
                        <td>Harga</td>
                        <td>Stok</td>
                        <td></td>
                    </tr>
                    
                </table>
            </div>
            <div class="save-changes">
                <button type="submit" id="savechanges"><i class="fa-solid fa-check"></i>Simpan Perubahan</button>
            </div>
        </form>
    </main>
</body>
</html>
