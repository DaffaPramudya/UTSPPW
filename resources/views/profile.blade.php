<!DOCTYPE html>
<html lang="en">
<head>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
    <x-navbar></x-navbar>
    <div class="flex justify-center mt-10">
        <div class="bg-white rounded-lg shadow-2xl p-6 w-full max-w-3xl">
            <h1 class="text-xl font-bold text-center mb-4">Edit Profile</h1>
            <div class="flex justify-center mt-6">
                <div class="w-32 h-32 rounded-full overflow-hidden shadow-md border-1 border-gray-200">
                    @if (auth()->user()->profilepic)
                        <img src="storage/{{ auth()->user()->profilepic }}" alt="Profile Picture" class="w-full h-full object-cover">
                    @else
                        <img src="/storage/profile-images/anonim.png" alt="Default Picture" class="w-full h-full object-cover">
                    @endif
                </div>
            </div>

            <form action="/profile" method="POST" enctype="multipart/form-data" class="space-y-4 mt-4">
                @csrf
                    @if (session()->has('successUpdate'))
                        <div class="success-message">
                            Profile berhasil diperbarui!
                        </div>
                    @endif

                <!-- Foto Profil -->
                <div>
                    <label for="fileupload" class="block text-sm font-medium text-gray-700">Foto Profil</label>
                    <input type="file" accept="image/jpg, image/png" id="fileupload" name="fileupload"
                        class="w-full mt-1 text-gray-900 border-gray-300 rounded-md shadow-sm hover:border-blue-500 focus:ring-blue-500 focus:border-blue-500 p-2">
                </div>
                
                <!-- Delete Photo Button -->
                @if (auth()->user()->profilepic)
                    <div class="mt-4">
                        <form action="{{ route('deleteProfilepic') }}" method="POST">
                            @csrf
                            <button type="submit" name="hapusfotoprofil" id="hapusfotoprofil"
                                class="inline-flex items-center bg-red-600 text-white text-sm mb-4 px-4 py-2 rounded-md hover:bg-red-700 focus:ring-2 focus:ring-red-500">
                                <i class="font-semibold fa-solid fa-trash mr-2"></i>Hapus Foto Profil
                            </button>
                        </form>
                    </div>
                @endif    

                <!-- Username -->
                <div>
                    <label for="username" class="block text-sm font-medium text-gray-700">Username</label>
                    <input type="text" id="username" name="username" value="{{ auth()->user()->username }}" 
                        class="w-full mt-1 border border-gray-300 rounded-md shadow-sm hover:border-blue-500 p-2 focus:border-gray-400">
                </div>

                <!-- Email -->
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                    <input type="email" id="email" name="email" value="{{ auth()->user()->email }}" 
                        class="w-full mt-1 border border-gray-300 rounded-md shadow-sm hover:border-blue-500 p-2 focus:border-gray-400">
                </div>

                <!-- Nama -->
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700">Nama</label>
                    <input type="text" id="name" name="nama" value="{{ auth()->user()->name }}"
                        class="w-full mt-1 border border-gray-300 rounded-md shadow-sm hover:border-blue-500 p-2 focus:border-gray-400">
                </div>

                <!-- Nomor Handphone -->
                <div>
                    <label for="nomor" class="block text-sm font-medium text-gray-700">Nomor Handphone</label>
                    <input type="text" id="nomor" name="nomor" value="{{ auth()->user()->nomor }}"
                        class="w-full mt-1 border border-gray-300 rounded-md shadow-sm hover:border-blue-500 p-2 focus:border-gray-400">
                </div>

                <!-- Alamat -->
                <div>
                    <label for="alamat" class="block text-sm font-medium text-gray-700">Alamat</label>
                    <input type="text" id="alamat" name="alamat" value="{{ auth()->user()->alamat }}"
                        class="w-full mt-1 border border-gray-300 rounded-md shadow-sm hover:border-blue-500 p-2 focus:border-gray-400">
                </div>

                <!-- Gender -->
                <div>
                    <label for="gender" class="block text-sm font-medium text-gray-700">Jenis Kelamin</label>
                    <select id="gender" name="gender" 
                        class="w-full mt-1 border border-gray-300 rounded-md shadow-sm hover:border-blue-500 p-2 focus:border-gray-400">
                        <option value="Laki-Laki" {{ auth()->user()->gender === 'Laki-Laki' ? 'selected' : '' }}>Laki-Laki</option>
                        <option value="Perempuan" {{ auth()->user()->gender === 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                    </select>
                </div>

                <!-- Submit Button -->
                <div>
                    <button type="submit" id="submitprofile" name="submitprofile"
                        class="w-full bg-blue-500 mt-5 text-white py-2 rounded-md shadow hover:bg-blue-600 focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                        Update Profile
                    </button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
