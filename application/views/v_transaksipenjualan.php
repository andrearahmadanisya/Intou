<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>IntoU | Transaksi Penjualan</title>

    <!-- Bootstrap CSS -->
    <link href="assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456l-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
    <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
    </svg>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">


    <!-- styles template -->
    <link href="<?= base_url(); ?>assets/css/transaksipenjualan.css" rel="stylesheet">

</head>

<body id="home">

    <div class="d-flex" id="wrapper">

        <!-- Sidebar -->
        <div class="bg-light border-right" id="sidebar-wrapper">
            <div class="sidebar-heading"><img src="<?php base_url() ?>assets/images/logo.png" id="logo" /></div>
            <div class="list-group list-group-flush">
                <a href="<?= base_url('HomeController'); ?>" class="item list-group-item-action bg-light">
                    <img src="<?php base_url() ?>assets/images/homehitam.png" style="padding-bottom: 4px">
                    Home</a>
                <a href="<?= base_url('BukuController'); ?>" class="item list-group-item-action bg-dark" style="color:#ffffff">
                    <img src="<?php base_url() ?>assets/images/databukuputih.png" style="padding-bottom: 4px" class="gambar">
                    Data Buku</a>
                <a href="<?= base_url('SupplierController'); ?>" class="item list-group-item-action bg-light">
                    <img src="<?php base_url() ?>assets/images/datasupplierhitam.png" style="padding-bottom: 4px">
                    Data Supplier</a>
                <a href="<?= base_url('PelangganController'); ?>" class="item list-group-item-action bg-light">
                    <img src="<?php base_url() ?>assets/images/datapelangganhitam.png" style="padding-bottom: 4px">
                    Data Pelanggan</a>

                <button class="dropdown-btn">
                    <img src="<?php base_url() ?>assets/images/transaksihitam.png" style="padding-bottom: 4px">Transaksi
                    <i class="fa fa-caret-down"></i>
                </button>
                <div class="dropdown-container">
                    <a href="<?= base_url('TBarangMasukController'); ?>" style="color:black">Transaksi Barang Masuk</a><br><br>
                    <a href="<?= base_url('TPenjualanController'); ?>" style="color:black">Transaksi Penjualan</a>
                </div>

                <button class="dropdown-btn">
                    <img src="<?php base_url() ?>assets/images/laporanhitam.png" style="padding-bottom: 4px;"> Laporan
                    <i class="fa fa-caret-down"></i>
                </button>
                <div class="dropdown-container">
                    <a href="#" style="color:black">Laporan Pembelian</a><br><br>
                    <a href="#" style="color:black">Laporan Penjualan</a>
                </div>
            </div>
        </div>
        <script>
            var dropdown = document.getElementsByClassName("dropdown-btn");
            var i;

            for (i = 0; i < dropdown.length; i++) {
                dropdown[i].addEventListener("click", function() {
                    this.classList.toggle("active");
                    var dropdownContent = this.nextElementSibling;
                    if (dropdownContent.style.display === "block") {
                        dropdownContent.style.display = "none";
                    } else {
                        dropdownContent.style.display = "block";
                    }
                });
            }
        </script>

        <!-- /#sidebar-wrapper -->

        <!-- Konten -->
        <div id="page-content-wrapper">

            <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
                <button class="btn" id="menu-toggle">
                    <img src="<?php base_url() ?>assets/images/menu.png">
                </button>
                <div>
                    <script type="text/javascript">
                        arrhari = ["Senin", "Selasa", "Rabu", "Kamis", "Jumat", "Sabtu", "Mingggu"];
                        arrbulan = ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"];
                        hari = date.getDay();
                        tanggal = date.getDate();
                        bulan = date.getMonth();
                        tahun = date.getFullYear();
                        document.write(arrhari[hari] + ", " + tanggal + " " + arrbulan[bulan] + " " + tahun);
                    </script>
                </div>

                <div id="MyClockDisplay" class="jam" onload="showTime()">
                    <script type="text/javascript">
                        function showTime() {
                            var date = new Date();
                            var h = date.getHours(); // 0 - 23
                            var m = date.getMinutes(); // 0 - 59
                            var s = date.getSeconds(); // 0 - 59
                            var session = "AM";

                            if (h == 0) {
                                h = 12;
                            }

                            if (h > 12) {
                                h = h - 12;
                                session = "PM";
                            }

                            h = (h < 10) ? "0" + h : h;
                            m = (m < 10) ? "0" + m : m;
                            s = (s < 10) ? "0" + s : s;

                            var time = h + ":" + m + ":" + s + " " + session;
                            document.getElementById("MyClockDisplay").innerText = time;
                            document.getElementById("MyClockDisplay").textContent = time;

                            setTimeout(showTime, 1000);

                        }

                        showTime();
                    </script>
                </div>

                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img src="<?php base_url() ?>assets/images/karyawan.png">
                                Karyawan
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="<?= base_url('LoginController'); ?>">Logout</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>

            <!-- BREADCRUM -->
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb" style="background-color:#F2F5FA">
                    <li class="breadcrumb-item active" aria-current="page"><a href="<?= base_url('TPenjualanController'); ?>">Transaksi Penjualan</a></li>
                    <li class="breadcrumb-item">Tambah Data</li>
                </ol>
            </nav>
            <!-- END BEB -->

            <!-- BUAT TABEL -->
            <div class="container-fluid">

                <h2 style="margin-left:18px; margin-bottom:35px;">TRANSAKSI Penjualan</h2>
                <!-- BUTTON -->
                <div style="margin-bottom:35px; margin-left:18px;">
                    <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#tambah">Tambah Data</button>
                    <!-- <a type="button" class="btn btn-secondary" href="<?php echo base_url() . 'HistoryController' ?>">History</a> -->
                </div>

                <!-- BUAT TABEL -->
                <div class="container-fluid">
                    <div class="box">
                        <table class="table table-borderless table-hover" id="table">
                            <thead style="background-color:#6C7C94; color:white">
                                <tr>
                                    <th scope="col">No.</th>
                                    <th scope="col">Judul Buku</th>
                                    <th scope="col">Jumlah</th>
                                    <th scope="col">Harga Satuan</th>
                                    <th scope="col">Biaya Pengiriman</th>
                                    <th scope="col">Total Keseluruhan</th>
                                    <th scope="col">Tanggal Transaksi</th>
                                    <th scope="col">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1;
                                date_default_timezone_set('Asia/Jakarta');
                                foreach ($transaksipjl as $tpjl) { ?>
                                    <tr>
                                        <!--HINT UNTUK MENGHAPUS USER KALIAN DAPAT MENGGUNAKAN FORM, MENGGUNAKAN ANCHOR ATAU HREF PADA BUTTON-->
                                        <td class="text-center"><?php echo $no++ ?></td>
                                        <td class="text-center"><?php echo $tpjl['judulbuku'] ?></td>
                                        <td class="text-center"><?php echo $tpjl['qty'] ?></td>
                                        <td class="text-center"><?php echo $tpjl['hargapcs'] ?></td>
                                        <td class="text-center"><?php echo $tpjl['biayakirim'] ?></td>
                                        <td class="text-center"><?php echo $tpjl['hargatotal'] ?></td>
                                        <td class="text-center"><?php echo date("l, d-m-Y H:i a", strtotime($tpjl['tgltransaksi'])) ?></td>
                                        <td class="text-center">
                                            <button class="btn btn-success btn-sm rounded-0" type="button" data-toggle="modal" data-target="#Updatetpjl<?= $tpjl['idpenjualan'] ?>" title="Edit"><i class="fa fa-edit"></i></button>
                                            <a class="btn btn-danger btn-sm rounded-0" type="button" href="<?php echo base_url() . 'TPenjualanController/delete/' . $tpjl['idpenjualan'] ?>" data-placement="top" title="Delete" onClick="return confirm('Apakah Anda Yakin?')"><i class="fa fa-trash"></i></a>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- TAMBAH DATA TRANSAKSI BARANG MASUK -->
    <div class="modal fade" id="tambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <center>
                        <h2>TAMBAH DATA TRANSAKSI Penjualan</h2>
                    </center>
                </div>
                <div class="modal-body">
                    <form method="POST" action="<?= base_url() ?>TPenjualanController/addPenjualan">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Judul Buku" name="judulbuku">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Qty" name="qty">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Harga Satuan" name="hargapcs">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Biaya Kirim" name="biayakirim">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Total Harga" name="hargatotal">
                        </div>
                        <div class="form-group">
                            <input type="datetime" class="form-control" placeholder="Tgl Transaksi" name="tgltransaksi" value="<?php echo date("l, d-m-Y H:i a") ?>">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                            <input type="submit" class="btn btn-primary" id="hapus" value="Submit" placeholder="Simpan">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Edit data buku -->

    <?php foreach ($transaksipjl as $tpjl) { ?>
        <div class="modal fade" id="Updatetpjl<?= $tpjl['idpenjualan'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <center>
                            <h2>EDIT Transaksi Penjualan</h2>
                        </center>
                    </div>
                    <div class="modal-body">
                        <form method="POST" action="<?= base_url() . 'TPenjualanController/update/' . $tpjl['idpenjualan'] ?>">

                            <div class="form-group">
                                <label for="formGroupExampleInput">Judul Buku</label>
                                <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Judul Buku" name="judulbuku" value="<?= $tpjl['judulbuku'] ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="formGroupExampleInput">Jumlah</label>
                                <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Qty" name="qty" value="<?= $tpjl['qty'] ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="formGroupExampleInput">Harga Satuan</label>
                                <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Harga Satuan" name="hargapcs" value="<?= $tpjl['hargapcs'] ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="formGroupExampleInput">Biaya Kirim</label>
                                <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Biaya Kirirm" name="biayakirim" value="<?= $tpjl['biayakirim'] ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="formGroupExampleInput">Total Harga</label>
                                <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Total Harga" name="totalharga" value="<?= $tpjl['hargatotal'] ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="formGroupExampleInput">Tgl Transaski</label>
                                <input type="datetime" class="form-control" id="formGroupExampleInput" placeholder="Tgl Transaski" name="tgltransaksi" value="<?php echo date("l, d-m-Y H:i a") ?>" required>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                <input type="submit" class="btn btn-primary" id="hapus" value="Submit" placeholder="Simpan">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>

</body>

<!-- Bootstrap JavaScript -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="assets/jquery/jquery.min.js"></script>
<script src="assets/bootstrap/js/bootstrap.bundle.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
<!-- Menu Script -->
<script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });

    $(document).ready(function() {
        $('#table').DataTable();
    });
</script>

</html>