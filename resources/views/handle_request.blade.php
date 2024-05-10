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
                    </div>                    
                    <!-- Error message for image -->
                    <div class="text-danger" id="image_error"></div>
                    <div class="mb-1">
                        <label for="exampleFormControlInput1" class="form-label fw-semibold">Nama Produk</label>
                        <input type="text" class="form-control" name="nama" id="nama"
                            placeholder="Masukkan nama produk">
                    </div>
                    <!-- Error message for nama -->
                    <div class="text-danger" id="nama_error"></div>
                    <div class="mb-1">
                        <label for="exampleFormControlInput1" class="form-label fw-semibold">Berat</label>
                        <input type="number" class="form-control" name="berat" id="berat"
                            placeholder="Masukkan berat produk">
                    </div>
                    <!-- Error message for berat -->
                    <div class="text-danger" id="berat_error"></div>
                    <div class="mb-1">
                        <label for="exampleFormControlInput1" class="form-label fw-semibold">Harga</label>
                        <input type="number" class="form-control" name="harga" id="harga"
                            placeholder="Masukkan harga produk">
                    </div>
                    <!-- Error message for harga -->
                    <div class="text-danger" id="harga_error"></div>
                    <div class="mb-1">
                        <label for="exampleFormControlInput1" class="form-label fw-semibold">Stok</label>
                        <input type="number" class="form-control" name="stok" id="stok"
                            placeholder="Masukkan stok produk">
                    </div>
                    <!-- Error message for stok -->
                    <div class="text-danger" id="stok_error"></div>
                    <div class="mb-1">
                        <label for="exampleFormControlInput1" class="form-label fw-semibold">Kondisi</label>
                        <select class="form-select form-control" aria-label="Default select example" name="kondisi"
                            id="kondisi">
                            <option selected value="0">Pilih Kondisi Barang</option>
                            <option value="Bekas">Bekas</option>
                            <option value="Baru">Baru</option>
                        </select>
                    </div>
                    <!-- Error message for kondisi -->
                    <div class="text-danger" id="kondisi_error"></div>
                    <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label fw-semibold">Deskripsi</label>
                        <textarea class="form-control" name="deskripsi" id="deskripsi" rows="3"
                            placeholder="Tuliskan deskripsi produk yang akan dijual"></textarea>
                    </div>
                    <!-- Error message for deskripsi -->
                    <div class="text-danger" id="deskripsi_error"></div>
                    <div class="d-flex">
                        <button id="submitButton" class="btn btn-dark mx-auto" type="submit">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
</script>
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

            // Lakukan AJAX request untuk menyimpan data jika lolos validasi
            if (isValid) {
                var formData = new FormData();
                formData.append('image', image);
                formData.append('nama', $('#nama').val());
                formData.append('berat', $('#berat').val());
                formData.append('harga', $('#harga').val());
                formData.append('stok', $('#stok').val());
                formData.append('kondisi', $('#kondisi').val());
                formData.append('deskripsi', $('#deskripsi').val());

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
