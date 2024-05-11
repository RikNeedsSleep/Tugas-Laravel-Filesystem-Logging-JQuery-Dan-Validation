<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        @if (Session::get('error'))
            <div class="row">
                <div class="col-md-4 offset-4 mt-2 py-2 rounded bg-danger text-white fw-bold">
                    {{ Session::get('error') }}
                </div>
            </div>
        @endif
        <div class="row">
            <div class="col-md-4 offset-4 rounded bg-info mt-3 py-3">
                <h2 class="text-center fw-bold" style="font-size: 20px">Tambah Data Produk</h2>
                <form id="productForm" class="mt-3" action="{{ route('postRequest', ['user' => $user->id]) }}"
                    method="POST">
                    @csrf
                        <div class="mb-1">
                        <label for="exampleFormControlInput1" class="form-label fw-semibold">Gambar Produk</label>
                        <input type="file" class="form-control" name="image" id="image">
                        <span class="text-danger" id="image_error"></span>
                    </div>
                    <div class="mb-1">
                        <label for="exampleFormControlInput1" class="form-label fw-semibold">Nama Produk</label>
                        <input type="text" class="form-control" name="nama" id="nama"
                            placeholder="Masukkan nama produk">
                        <span class="text-danger" id="nama_error"></span>
                    </div>
                    <div class="mb-1">
                        <label for="exampleFormControlInput1" class="form-label fw-semibold">Berat</label>
                        <input type="number" class="form-control" name="berat" id="berat"
                            placeholder="Masukkan berat produk">
                        <span class="text-danger" id="berat_error"></span>
                    </div>
                    <div class="mb-1">
                        <label for="exampleFormControlInput1" class="form-label fw-semibold">Harga</label>
                        <input type="number" class="form-control" name="harga" id="harga"
                            placeholder="Masukkan harga produk">
                        <span class="text-danger" id="harga_error"></span>
                    </div>
                    <div class="mb-1">
                        <label for="exampleFormControlInput1" class="form-label fw-semibold">Stok</label>
                        <input type="number" class="form-control" name="stok" id="stok"
                            placeholder="Masukkan stok produk">
                        <span class="text-danger" id="stok_error"></span>
                    </div>
                    <div class="mb-1">
                        <label for="exampleFormControlInput1" class="form-label fw-semibold">Kondisi</label>
                        <select class="form-select form-control" aria-label="Default select example" name="kondisi"
                            id="kondisi">
                            <option selected value="0">Pilih Kondisi Barang</option>
                            <option value="Bekas">Bekas</option>
                            <option value="Baru">Baru</option>
                        </select>
                        <span class="text-danger" id="kondisi_error"></span>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label fw-semibold">Deskripsi</label>
                        <textarea class="form-control" name="deskripsi" id="deskripsi" rows="3"
                            placeholder="Tuliskan deskripsi produk yang akan dijual"></textarea>
                        <span class="text-danger" id="deskripsi_error"></span>
                    </div>
                    <div class="d-flex">
                        <button class="btn btn-dark mx-auto" type="submit">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#productForm').submit(function (e) {
                e.preventDefault();

                // Menghapus pesan error sebelum validasi
                $('.text-danger').text('');

                var isValid = true;

                // Validasi menggunakan JavaScript
                var image = $('#image')[0].files[0]; // Mengambil file gambar

                if (!image) {
                    $('#image_error').text('Error. File Gambar wajib diunggah.');
                    isValid = false;
                }

                // Validasi menggunakan JavaScript
                var nama = $('#nama').val();
                var berat = $('#berat').val();
                var harga = $('#harga').val();
                var stok = $('#stok').val();
                var kondisi = $('#kondisi').val();
                var deskripsi = $('#deskripsi').val();

                if (nama.trim() === '') {
                    $('#nama_error').text('Error. Field Nama wajib diisi.');
                    isValid = false;
                }

                if (berat.trim() === '') {
                    $('#berat_error').text('Error. Field Berat wajib diisi.');
                    isValid = false;
                }

                if (harga.trim() === '') {
                    $('#harga_error').text('Error. Field Harga wajib diisi.');
                    isValid = false;
                }

                if (stok.trim() === '') {
                    $('#stok_error').text('Error. Field Stok wajib diisi.');
                    isValid = false;
                }

                if (kondisi === '0') {
                    $('#kondisi_error').text('Error. Field Kondisi wajib dipilih.');
                    isValid = false;
                }

                if (deskripsi.trim() === '') {
                    $('#deskripsi_error').text('Error. Field Deskripsi wajib diisi.');
                    isValid = false;
                }

                // Lakukan AJAX request untuk menyimpan data jika lolos validasi
                if (isValid) {
                    var formData = new FormData();
                    formData.append('image', image);
                    formData.append('nama', nama);
                    formData.append('berat', berat);
                    formData.append('harga', harga);
                    formData.append('stok', stok);
                    formData.append('kondisi', kondisi);
                    formData.append('deskripsi', deskripsi);

                    $.ajax({
                        url: $(this).attr('action'),
                        method: 'POST',
                        data: formData,
                        contentType: false,
                        processData: false,
                        success: function (response) {
                            // Handle respon dari server
                            console.log(response);
                        },
                        error: function (xhr, status, error) {
                            // Handle error
                            console.error(xhr.responseText);
                        }
                    });
                }
            });
        });
    </script>
</body>

