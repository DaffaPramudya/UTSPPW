<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Checkout</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body class="bg-gray-100">
  <div class="max-w-6xl mx-auto p-6">
    <div class="mb-6">
        <h1 class="text-2xl font-bold relative">
          <i class="fa-solid fa-chevron-left text-xl cursor-pointer absolute left-0 -ml-8 pt-1"></i>
          Checkout
        </h1>
      </div>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
      <!-- Bagian kiri: Alamat -->
      <div class="md:col-span-2">
        <!-- Alamat -->
        <div class="bg-white p-4 shadow-md rounded-lg mb-6">
          <h2 class="text-lg font-semibold mb-2">Alamat</h2>
          <div class="flex justify-between items-center">
            <p class="text-gray-700">Johar, Bekasi Timur, Indonesia Raya</p>
            <button class="font-bold-bold text-blue-600 font-medium">Ganti</button>
          </div>
        </div>

        <!-- Order Items Table -->
        <div class="relative shadow-md sm:rounded-lg overflow-x-auto">
          <table class="w-full text-sm text-center rtl:text-right text-gray-900">
            <thead>
              <tr class="text-xs text-gray-800 uppercase bg-blue-100 dark:bg-gray-700 dark:text-gray-400">
                <th scope="col" class="px-6 py-3">Produk</th>
                <th scope="col" class="px-6 py-3">Harga</th>
                <th scope="col" class="px-6 py-3">Jumlah</th>
                <th scope="col" class="px-6 py-3">Total</th>
                <th scope="col" class="px-6 py-3"></th>
              </tr>
            </thead>
            <tbody>
              <tr class="bg-white border-b">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 flex items-center">
                  <img class="w-10 h-10 mr-2" src="https://via.placeholder.com/60" alt="">
                  <span>Sepatu Besar Custom</span>
                </th>
                <td class="px-6 py-4">Rp12,500</td>
                <td class="px-6 py-4">7</td>
                <td class="px-6 py-4">Rp87,500</td>
                <td class="px-6 py-4">
                  <button class="text-red-600 hover:text-red-800"><i class="fa-solid fa-trash"></i></button>
                </td>
              </tr>
              <tr class="bg-gray-50 border-b">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 flex items-center">
                  <img class="w-10 h-10 mr-2" src="https://via.placeholder.com/60" alt="">
                  <span>Sepatu Besar Custom</span>
                </th>
                <td class="px-6 py-4">Rp12,500</td>
                <td class="px-6 py-4">7</td>
                <td class="px-6 py-4">Rp87,500</td>
                <td class="px-6 py-4">
                  <button class="text-red-600 hover:text-red-800"><i class="fa-solid fa-trash"></i></button>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>

      <!-- Summary -->
      <div class="bg-white p-4 shadow-md rounded-lg flex flex-col justify-between">
        <div>
          <h2 class="text-lg font-semibold mb-4">Order Total</h2>
          <div class="space-y-2">
            <div class="flex justify-between">
              <span class="text-gray-900">Sub Total</span>
              <span class="font-medium">Rp175,000</span>
            </div>
            <div class="flex justify-between">
              <span class="text-gray-900">Shipping</span>
              <span class="font-medium">- (Gratis)</span>
            </div>
            <div class="flex justify-between border-t pt-2">
              <span class="font-semibold">Total</span>
              <span class="font-bold">Rp175,000</span>
            </div>
          </div>
        </div>
        <button class="w-full mt-6 bg-green-500 text-white py-2 rounded-lg font-medium">Bayar Sekarang</button>
      </div>
    </div>
  </div>
</body>
</html>
