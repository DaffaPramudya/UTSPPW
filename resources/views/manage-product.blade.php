<!DOCTYPE html>
<html lang="en">
<x-head></x-head>
<title>Dalel Shop - Kelola Produk</title>

<body>
    <x-navbar></x-navbar>
    <main class="main-table">
        <div class="header">
            <h1>Kelola Produk</h1>
        </div>
        <div class="add-product">
            <span id="header-add">Tambah Produk Baru</span>
            @if(session()->has('successProduct'))
                <div class="success-message" style="width: 75%">
                    {{session('successProduct')}}
                </div>
            @endif
            <form action="/manage-product" method="post" enctype="multipart/form-data">
                @csrf
                <input type="text" name="name" id="enter-product" placeholder="Nama Produk" required>
                <input type="text" name="price" id="enter-product" placeholder="Harga Produk" required>
                <input type="text" name="stock" id="enter-product" placeholder="Stok Produk" required>
                <label id="uploadlabeltext">Pilih file untuk diunggah:</label>
                <input type="file" name="picture" id="enter-image">
                <label for="enter-image" id="uploadgambarproduk"><i class="fa-solid fa-upload"></i>Upload Gambar</label>
                <input type="submit" value="+ Tambah Produk" id="add">
            </form>
        </div>
        <div class="search-edit">
            <form method="GET" action="{{route('products-search')}}">
                <input type="text" name="search" id="search" placeholder="Cari produk" value="{{$search}}">
                <input type="submit" value="Cari" id="save">
            </form>
            <a href="/edit-product" class="edit-product">
                Edit Produk
            </a>
        </div>

        <div class="table-body">
            <table style="border: none;">
                <tr class="head">
                    <td>Info Produk</td>
                    <td>Harga</td>
                    <td>Stok</td>
                </tr>
                @foreach($products as $product)
                    <tr>
                        @if($product->picture)
                        <td class="info-produk"><img src="{{asset('storage/' . $product['picture'])}}">{{$product['name']}}</td>
                        @else
                        <td class="info-produk"><img src="storage/product-images/no-image.svg">{{$product['name']}}</td>
                        @endif
                        <td>Rp {{$product['price']}}</td>
                        <td>{{$product['stock']}}</td>
                    </tr>
                @endforeach
            </table>
        </div>

    </main>
</body>

</html>