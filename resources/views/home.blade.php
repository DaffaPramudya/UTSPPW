<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home - Laravel Tailwind</title>
    @vite('resources/css/app.css') <!-- Pastikan sudah dikonfigurasi -->
</head>
<body class="bg-gray-100">

    <!-- Header -->
    <header class="bg-blue-600 text-white p-4">
        <div class="container mx-auto flex justify-between items-center">
            <h1 class="text-2xl font-bold">My Website</h1>
            <nav>
                <ul class="flex gap-4">
                    <li><a href="#" class="hover:text-gray-200">Home</a></li>
                    <li><a href="#" class="hover:text-gray-200">About</a></li>
                    <li><a href="#" class="hover:text-gray-200">Contact</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <!-- Hero Section -->
    <section class="bg-gray-200 py-20">
        <div class="container mx-auto text-center">
            <h2 class="text-4xl font-bold mb-4">Welcome to Our Website</h2>
            <p class="text-lg text-gray-700 mb-6">We provide the best solutions for your business</p>
            <a href="#" class="bg-blue-600 text-white px-6 py-3 rounded-lg hover:bg-blue-700">Get Started</a>
        </div>
    </section>

    <!-- Features -->
    <section class="py-16">
        <div class="container mx-auto grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="bg-white p-6 rounded-lg shadow-md">
                <h3 class="text-xl font-bold mb-2">Feature 1</h3>
                <p class="text-gray-600">Description for feature 1.</p>
            </div>
            <div class="bg-white p-6 rounded-lg shadow-md">
                <h3 class="text-xl font-bold mb-2">Feature 2</h3>
                <p class="text-gray-600">Description for feature 2.</p>
            </div>
            <div class="bg-white p-6 rounded-lg shadow-md">
                <h3 class="text-xl font-bold mb-2">Feature 3</h3>
                <p class="text-gray-600">Description for feature 3.</p>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-gray-800 text-white py-4">
        <div class="container mx-auto text-center">
            <p>&copy; 2024 My Website. All rights reserved.</p>
        </div>
    </footer>

</body>
</html>
