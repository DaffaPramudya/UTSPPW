<!DOCTYPE html>
<html lang="en">
<x-head></x-head>
<title>Dalel Shop - Edit Produk</title>

<body>
    <x-navbar></x-navbar>
    <main class="main-table">
        <div class="header">
            <h1>Edit Daftar Produk</h1>
        </div>

        @if (session()->has('success'))
            <div class="success-message">
                {{ session('success') }}
            </div>
        @endif

        <!-- Form Pencarian -->
        <form method="GET" action="">
            <div class="search-edit">
                <input type="text" name="search" id="search" placeholder="Cari produk" value="">
                <input type="submit" value="Cari" id="save">
            </div>
        </form>

        <!-- Form untuk Menyimpan Perubahan -->
        <div class="table-body">
            <table>
                <tr class="head">
                    <td>Info Produk</td>
                    <td>Harga</td>
                    <td>Stok</td>
                    <td></td>
                </tr>
                @foreach ($products as $product)
                    <form action="/products/{{$product->slug}}" method="POST">
                        @csrf
                        @method('put')
                        <tr>
                            <td>
                                @if ($product->picture)
                                    <img src="storage/{{ $product->picture }}" width="50" style="object-fit: cover">
                                @else
                                    <img src="storage/product-images/no-image.svg">
                                @endif
                                <input type="text" name="name" value="{{ $product->name }}"
                                    class="editproduktextinput">
                            </td>
                            <td>
                                <input type="text" name="price" value="{{ $product->price }}"
                                    class="editproduktextinput">
                            </td>
                            <td>
                                <input type="text" name="stock" value="{{ $product->stock }}"
                                    class="editproduktextinput">
                            </td>
                            <td>
                                <button type="submit" id="savechanges"><i class="fa-solid fa-check"></i>Simpan
                                    Perubahan</button>
                            </td>
                    </form>
                    <td class="edit">
                        <form action="/products/{{$product->slug}}" method="POST">
                            @csrf
                            @method('delete')
                            <button type="submit" name="deleteproduct" id="hapusproduk"><i
                                    class="fa-solid fa-trash"></i>Hapus</button>
                        </form>
                    </td>
                    </tr>
                @endforeach
            </table>
        </div>
    </main>
</body>

</html>
