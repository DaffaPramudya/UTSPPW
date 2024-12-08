<!DOCTYPE html>
<html lang="en">
@include('components.head')

<body>
    @include('components.navbar')

    @if (session()->has('success'))
        <div class="success-message" style="padding: 1rem; margin: 20px">
            {{ session('success') }}
        </div>
    @elseif (session()->has('error'))
        <div class="error-message" style="padding: 1rem; margin: 20px">
            {{ session('error') }}
        </div>
    @endif
    <div class="cart-container">
        <table>
            <tbody>
                <thead>
                    <tr>
                        <th></th>
                        <th>Nama</th>
                        <th>Kuantitas</th>
                        <th>Harga</th>
                        <th></th>
                    </tr>
                </thead>
                @foreach ($carts as $cart)
                    <tr>
                        <td>
                            @if ($cart->product->picture)
                                <img src="/storage/{{ $cart->product->picture }}" style="object-fit: cover;">
                            @else
                                <img src="/storage/no-image.svg" style="object-fit: cover;">
                            @endif
                        </td>
                        <td>
                            <div>{{ $cart->product->name }}</div>
                        </td>
                        <td>
                            <div class="quantity-controls">
                                <form action="/carts/sub/{{ $cart->id }}" method="POST">
                                    @csrf
                                    <button type="submit" name="decrease" class="up-arrow"><i class="fa-solid fa-minus"></i></button>
                                </form>
                                <form action="/carts/{{$cart->id}}" style="margin: 0px 10px; height: 30px">
                                    @csrf
                                    @method('put')
                                    <input type="number" name="quantity" value="{{$cart->quantity}}" min="1" style="height: 100%; width: 100%; outline: none; border: 3px solid black; border-radius: 3px" readonly>
                                </form>
                                <form action="/carts/add/{{ $cart->id }}" method="POST">
                                    @csrf
                                    <button type="submit" name="increase" class="down-arrow"><i class="fa-solid fa-plus"></i></button>
                                </form>
                            </div>
                        </td>
                        <td>
                            {{ $cart->product->price * $cart->quantity }}
                        </td>
                        <td>
                            <form action="/carts/{{ $cart->id }}" method="POST" style="text-align: center;">
                                @csrf
                                @method('delete')
                                <button type="submit" class="buy-button" id="hapusproduk"><i class="fa-solid fa-trash"></i>Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>

</html>
