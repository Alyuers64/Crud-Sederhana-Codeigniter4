<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Pelanggan</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">


    <style>
    body {
        background-color: #f8f9fa;
    }

    .container {
        margin-top: 20px;
        background-color: #fff;
        padding: 20px;
        border-radius: 5px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    .table-responsive {
        margin-top: 20px;
    }

    /* Hapus atau ubah kode berikut untuk menghilangkan debug icon */
    .debug-bar-ndisplay {
        display: none !important;
    }

    @media (max-width: 768px) {
        .container {
            margin-top: 10px;
        }
    }
    </style>

</head>

<body>
    <div class="container">
        <div class="card">
            <h5 class="card-header bg-dark text-white"><i class="fa fa-th-list" aria-hidden="true"></i> CRUD Data
                Pelanggan</h5>
            <div class="card-body">
                <form action="" method="get">
                    <div class="input-group mb-3">
                        <?php
                        $pencarian = $request->getGet('pencarian') ?? '';
                        ?>

                        <input type="text" class="form-control" value="<?= $pencarian ?>" name="pencarian"
                            placeholder="Cari Data..." aria-label="Cari Data..." aria-describedby="button-addon2">
                        <div class="input-group-append">
                            <button class="btn btn-outline-danger" type="submit" id="button-addon2"><i
                                    class="fa fa-times" aria-hidden="true"></i> Batal</button>
                            <button class="btn btn-outline-primary" type="submit" id="button-addon2"><i
                                    class="fa fa-search" aria-hidden="true"></i> Cari</button>

                        </div>
                    </div>
                </form>
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary btn-sm mb-3" data-toggle="modal"
                    data-target="#exampleModal">
                    <i class="fa fa-plus" aria-hidden="true"></i> Tambah Data Pelanggan
                </button>

                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Tambah Data</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="alert alert-danger error" role="alert" style="display: none;">
                                </div>
                                <div class="alert alert-success sukses" role="alert" style="display: none;">
                                </div>
                                <div class="form-group row">
                                    <label for="inputid" class="col-sm-2 col-form-label"></label>
                                    <div class="col-sm-10">
                                        <input type="hidden" class="form-control" value="id_pelanggan" id="inputid">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputnama" class="col-sm-2 col-form-label">Nama</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="inputnama">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputno" class="col-sm-2 col-form-label">Nomor Hp</label>
                                    <div class="col-sm-10">
                                        <input type="number" class="form-control" id="inputno">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputalamat" class="col-sm-2 col-form-label">Alamat</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="inputalamat">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputjenis" class="col-sm-2 col-form-label">Jenis
                                        Orderan</label>
                                    <div class="col-sm-10">
                                        <select class="custom-select" id="inputjenis" required>
                                            <option selected value="">Pilih</option>
                                            <option value="Eat Here">Eat Here</option>
                                            <option value="Pesan">Pesan</option>
                                            <option value="Take away">Take away</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger tbl-tutup"
                                    data-dismiss="modal">Batal</button>
                                <button type="button" class="btn btn-success" id="tbl-simpan"><i class="fa fa-floppy-o"
                                        aria-hidden="true"></i> Simpan
                                    Data</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>No Hp</th>
                                <th>Alamat</th>
                                <th>Jenis Orderan</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($tampildata as $index => $data) : ?>
                            <?php $nomor++; ?>
                            <tr>
                                <td><?= $nomor ?></td>
                                <td><?= $data['nama'] ?></td>
                                <td><?= $data['nomor_hp'] ?></td>
                                <td><?= $data['alamat'] ?></td>
                                <td><?= $data['jenis_orderan'] ?></td>
                                <td>
                                    <button type="button" class="btn btn-warning btn-sm" data-toggle="modal"
                                        data-target="#exampleModal" data-id="<?= $data['id_pelanggan'] ?>"
                                        onclick="edit(<?= $data['id_pelanggan'] ?>)"><i class="fa fa-pencil-square-o"
                                            aria-hidden="true"></i> Edit</button>
                                    <button type="button" class="btn btn-danger btn-sm"
                                        onclick="hapus(<?= $data['id_pelanggan'] ?>)"><i class="fa fa-trash"
                                            aria-hidden="true"></i> Hapus</button>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
                <?php 
                $linkPagination = $pager->links();
                $linkPagination = str_replace('<li class="active">', '<li class="page-item active">', $linkPagination);
                $linkPagination = str_replace('<li>', '<li class="page-item">', $linkPagination);
                $linkPagination = str_replace("<a", "<a class='page-link'",$linkPagination);
                echo $linkPagination;
                ?>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous">
    </script>

    <script nonce="YOUR_GENERATED_NONCE">
    function edit(id_pelanggan) {
        var url = "<?php echo site_url('pelanggan/edit/')?>" + id_pelanggan;

        console.log(url);

        $.ajax({
            url: url,
            type: "GET",
            success: function(response) {
                try {
                    var data = JSON.parse(response);

                    if (data && data.id_pelanggan) {
                        $('#inputid').val(data.id_pelanggan);
                        $('#inputnama').val(data.nama);
                        $('#inputno').val(data.nomor_hp);
                        $('#inputalamat').val(data.alamat);
                        $('#inputjenis').val(data.jenis_orderan);

                        $('.modal-title').text('Edit Data');

                    } else {
                        console.error('Invalid data format or missing "nama" property');
                    }
                } catch (e) {
                    console.error('Invalid JSON data:', e);
                }
            }
        });
    }

    function hapus(id_pelanggan) {
        var res = confirm('Apakah ingin menghapus data?');
        if (res) {
            window.location.href = "<?php echo site_url('pelanggan/hapus/')?>" + id_pelanggan;
        }
    }


    $(document).ready(function() {

        function clean() {
            $('#inputid').val('');
            $('#inputnama').val('');
            $('#inputno').val('');
            $('#inputalamat').val('');
            $('#inputjenis').val('');
        }

        $(document).on('click', '.btn-warning', function() {
            console.log('Edit button clicked');
            var id_pelanggan = $(this).closest('tr').find('td:first').text();
            edit(id_pelanggan);
        });

        $(document).on('click', '.tbl-tutup', function() {
            if ($('.sukses').is(":visible")) {
                window.location.href = "<?= current_url()."?".$_SERVER['QUERY_STRING'] ?>";
            }
            $('.alert').hide();
            clean();
        });

        $(document).on('click', '.btn-primary', function() {
            $('.modal-title').text('Tambah Data');
        });

        $(document).on('click', '.btn-outline-danger', function() {
            $('input[name="pencarian"]').val('');
        });

        $(document).on('click', '.btn-outline-primary', function() {
            var keyword = $('input[name="pencarian"]').val();
            if (keyword.trim() === '') {
                alert('Masukkan kata kunci pencarian.');
                return;
            }

        });

        var jumlahData = $('.table tbody tr').length;
        if (jumlahData === 0) {
            var alertMessage = 'Data yang Anda cari tidak ditemukan.';
            alert(alertMessage);
            window.location.href = "<?= current_url() ?>";
        }

        $(document).on('click', '#tbl-simpan', function() {
            var id_pelanggan = $('#inputid').val();
            var nama = $('#inputnama').val();
            var nomor_hp = $('#inputno').val();
            var alamat = $('#inputalamat').val();
            var jenis_orderan = $('#inputjenis').val();

            $.ajax({
                url: "<?= site_url('pelanggan/simpan') ?>",
                type: "POST",
                data: {
                    id_pelanggan: id_pelanggan,
                    nama: nama,
                    nomor_hp: nomor_hp,
                    alamat: alamat,
                    jenis_orderan: jenis_orderan
                },
                dataType: "json",
                success: function(response) {
                    if (response.sukses === false) {
                        $('.sukses').hide();
                        $('.error').show();
                        $('.error').html(response.error.nama || response.error.nomor_hp ||
                            response.error.alamat || response.error.jenis_orderan);
                    } else {
                        $('.error').hide();
                        $('.sukses').show();
                        clean();
                        $('.sukses').html(response.sukses);
                    }
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                }
            });
        });


    });
    </script>


</body>

</html>