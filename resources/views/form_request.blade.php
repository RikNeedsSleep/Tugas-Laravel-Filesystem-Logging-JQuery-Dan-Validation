<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <form id="registrationForm" action="{{ route('send_request') }}?status=true&action=hold" method="POST"
        onsubmit="return validateForm()">
        @csrf()
        <div>
            <label for="nama_lengkap">Nama Lengkap</label>
            <input type="text" name="nama_lengkap" id="nama_lengkap">
            <span id="nama_lengkap_error" class="error-message"></span>
        </div>
        <div>
            <label for="email">Email</label>
            <input type="email" name="email" id="email">
            <span id="email_error" class="error-message"></span>
        </div>
        <div>
            <label for="username">Username</label>
            <input type="text" name="username" id="username">
            <span id="username_error" class="error-message"></span>
        </div>
        <div>
            <label for="description">Deskripsi Diri</label>
            <input type="text" name="description" id="description">
            <span id="description_error" class="error-message"></span>
        </div>
        <div>
            <label for="photo">Foto Profil</label>
            <input type="file" name="photo" id="photo">
            <span id="photo_error" class="error-message"></span>
        </div>

        <button type="submit">Submit</button>
    </form>

    <script>
        function validateForm() {
            // Menghapus pesan error sebelum validasi
            document.querySelectorAll('.error-message').forEach(function (el) {
                el.textContent = '';
            });

            var isValid = true;

            // Validasi nama lengkap
            var namaLengkap = document.getElementById('nama_lengkap').value;
            if (namaLengkap.trim() === '') {
                document.getElementById('nama_lengkap_error').textContent = 'Nama Lengkap wajib diisi';
                isValid = false;
            }

            // Validasi email
            var email = document.getElementById('email').value;
            if (email.trim() === '') {
                document.getElementById('email_error').textContent = 'Email wajib diisi';
                isValid = false;
            }

            // Validasi username
            var username = document.getElementById('username').value;
            if (username.trim() === '') {
                document.getElementById('username_error').textContent = 'Username wajib diisi';
                isValid = false;
            }

            // Validasi deskripsi
            var deskripsi = document.getElementById('description').value;
            if (deskripsi.trim() === '') {
                document.getElementById('description_error').textContent = 'Deskripsi wajib diisi';
                isValid = false;
            }

            // Validasi foto profil (opsional, bisa disesuaikan dengan kebutuhan)
            var fotoProfil = document.getElementById('photo').value;
            if (fotoProfil.trim() === '') {
                document.getElementById('photo_error').textContent = 'Foto Profil wajib diisi';
                isValid = false;
            }

            return isValid;
        }
    </script>
</body>

</html>
