<?php
    include("database.php");
    include("database2.php");
    $res = all_table($conn, "produk");
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
    <main class="table">
        <div class="header"><h1>Kelola Produk</h1></div>
        <div class="search-add">
            <input type="text" name="search" id="search" placeholder="cari produk">
            <input type="button" value="+ Tambah Produk" id="add">
        </div>

        <div class="table-body">
            <table>
                <tr class="head">
                    <td>  <input type="checkbox" id="check" value="select">
                    </td>
                    <td>Info Produk</td>
                    <td>Kategori</td>
                    <td>SKU</td>
                    <td>Harga</td>
                    <td>Stok</td>
                    <td>Status</td>
                    <td></td>
                </tr>
                <?php foreach($res as $row){ ?>
                    <tr>
                        <td>  <input type="checkbox" id="check" value="select">
                        </td>
                        <td><img src="uploads/<?php echo $row['fotoProduk']; ?>" alt=""><?php echo $row['namaProduk']; ?></td>
                        <td>Fashion</td>
                        <td>113344</td>
                        <td>Rp785.000,00</td>
                        <td>999</td>
                        <td>Active</td>
                        <td class="edit"><input type="button" value="Edit"></td>
                    </tr>
                <?php } ?>
                <!-- <tr>
                    <td>  <input type="checkbox" id="check" value="select">
                    </td>
                    <td><img src="https://www.beautyhaul.com/assets/uploads/products/thumbs/800x800/Cover.png" alt="">Lip Tint stain 48H red rose</td>
                    <td>Make Up</td>
                    <td>14567</td>
                    <td>Rp50.000,00</td>
                    <td>999</td>
                    <td>Aktif</td>
                    <td class="edit"><input type="button" value="Edit"></td>
                </tr>

                <tr>
                    <td>  <input type="checkbox" id="check" value="select">
                    </td>
                    <td><img src="https://down-id.img.susercontent.com/file/id-11134201-23030-u4obmjlqseov8b" alt="">Basreng Pedas banget 10kg</td>
                    <td>Makanan</td>
                    <td>876543</td>
                    <td>Rp60.000,00</td>
                    <td>999</td>
                    <td>Aktif</td>
                    <td class="edit"><input type="button" value="Edit"></td>
                </tr>

                <tr>
                    <td>  <input type="checkbox" id="check" value="select">
                    </td>
                    <td><img src="https://images.tokopedia.net/img/cache/500-square/VqbcmM/2022/5/30/617be10f-af0f-4466-aca8-978f9922f8b3.jpg" alt="">Ondel-ondel mainan mini</td>
                    <td>Mainan</td>
                    <td>555555</td>
                    <td>Rp29.000,00</td>
                    <td>999</td>
                    <td>Aktif</td>
                    <td class="edit"><input type="button" value="Edit"></td>
                </tr>

                <tr>
                    <td>  <input type="checkbox" id="check" value="select">
                    </td>
                    <td><img src="https://www.static-src.com/wcsstore/Indraprastha/images/catalog/full//catalog-image/115/MTA-98596465/no-brand_buku-tulis-100-lembar-merek-aa_full01.jpg" alt="">Buku Tulis 1000 lembar</td>
                    <td>Alat Tulis</td>
                    <td>984736</td>
                    <td>Rp3.500,00</td>
                    <td>99999</td>
                    <td>Aktif</td>
                    <td class="edit"><input type="button" value="Edit"></td>
                </tr>

                <tr>
                    <td>  <input type="checkbox" id="check" value="select">
                    </td>
                    <td><img src="https://prod-eurasian-res.popmart.com/default/20240820_180608_113346____10-1_____1200x1200.jpg?x-oss-process=image/format,webp" alt="">Mainan Pajangan Anak</td>
                    <td>Mainan</td>
                    <td>356748</td>
                    <td>Rp250.000,00</td>
                    <td>999</td>
                    <td>Aktif</td>
                    <td class="edit"><input type="button" value="Edit"></td>
                </tr>

                <tr>
                    <td>  <input type="checkbox" id="check" value="select">
                    </td>
                    <td><img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRLjGjJRRH_KZ5a5YqAmhg0kMS6Bge1WlEg9Q&s" alt="">Kemeja Pria Katun All Size</td>
                    <td>Fashion</td>
                    <td>538291</td>
                    <td>Rp75.000,00</td>
                    <td>999</td>
                    <td>Aktif</td>
                    <td class="edit"><input type="button" value="Edit"></td>
                </tr>                     -->
            </table>
        </div>
    </main>
</body>
</html>