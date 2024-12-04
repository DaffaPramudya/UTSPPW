<!DOCTYPE html>
<html lang="en">
<x-head></x-head>

<body>
    <x-navbar></x-navbar>
    <div class="content">
        <div class="profile-card">
            <form action="/profile" method="POST" enctype="multipart/form-data">
                @csrf
                @if (session()->has('successUpdate'))
                    <div class="success-message">
                        Profile berhasil diperbarui!
                    </div>
                @endif
                <div>
                    <label for="username">Username</label>
                    <input type="text" id="username" name="username" value="{{ auth()->user()->username }}"
                        readonly><br>
                </div>
                <div>
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" value="{{ auth()->user()->email }}"
                        readonly><br>
                </div>
                <div>
                    <label for="name">Nama</label>
                    <input type="text" id="name" name="nama" value="{{ auth()->user()->name }}">
                </div>
                <div>
                    <label for="nomor">Nomor Handphone</label>
                    <input type="text" id="nomor" name="nomor" value="{{ auth()->user()->nomor }}"><br>
                </div>
                <div>
                    <label for="alamat">Alamat</label>
                    <input type="text" id="alamat" name="alamat" value="{{ auth()->user()->alamat }}"><br>
                </div>
                <div>
                    <label for="gender">Jenis Kelamin</label>
                    <select id="gender" name="gender">
                        <option value="Laki-Laki" {{ auth()->user()->gender === 'Laki-Laki' ? 'selected' : '' }}>
                            Laki-Laki</option>
                        <option value="Perempuan" {{ auth()->user()->gender === 'Perempuan' ? 'selected' : '' }}>
                            Perempuan</option>
                    </select>
                </div>
                <div>
                    <label>Foto Profil</label>
                    <input type="file" accept="image/jpg, image/png" id="fileupload" name="fileupload">
                    <label for="fileupload" id="uploadlabel"><i class="fa-solid fa-upload"></i>Upload File</label>
                </div>
                <div>
                    <input type="submit" id="submitprofile" name="submitprofile" value="Update Profile">
                </div>
            </form>
            @if (auth()->user()->profilepic)
                <form action="{{ route('deleteProfilepic') }}" method="POST">
                    @csrf
                    <button type="submit" name="hapusfotoprofil" id="hapusfotoprofil">
                        <i class="fa-solid fa-trash"></i>Hapus foto profil
                    </button>
                </form>
            @endif
        </div>
        <div class="circle-profilepic">
            @if (auth()->user()->profilepic)
                <img src="storage/{{ auth()->user()->profilepic }}">
            @else
                <img src="/storage/profile-images/anonim.png">
            @endif
        </div>
    </div>
</body>

</html>
