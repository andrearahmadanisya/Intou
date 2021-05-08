<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
  <title>IntoU | Data Supplier</title>

  <!-- Bootstrap CSS -->
  <link href="assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456l-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
  <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
  </svg>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <!-- styles template -->
  <link href="assets/css/datasupplier.css" rel="stylesheet">

</head>

<body id="home">

  <div class="d-flex" id="wrapper">

    <!-- Sidebar -->
    <div class="bg-light border-right" id="sidebar-wrapper">
      <div class="sidebar-heading"><img src="assets/images/logo.png" id="logo" /></div>
      <div class="list-group list-group-flush">
        <a href="<?= base_url('HomeController'); ?>" class="item list-group-item-action bg-light">
          <img src="<?php base_url() ?>assets/images/homehitam.png" style="padding-bottom: 4px" class="gambar">
          Home</a>
        <a href="<?= base_url('BukuController'); ?>" class="item list-group-item-action bg-light">
          <img src="<?php base_url() ?>assets/images/databukuhitam.png" style="padding-bottom: 4px" class="gambar">
          Data Buku</a>
        <a href="<?= base_url('SupplierController'); ?>" class="item list-group-item-action bg-dark" style="color:#ffffff">
          <img src="<?php base_url() ?>assets/images/datasupplierputih.png" style="padding-bottom: 4px">
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
                <a class="dropdown-item" href="#">Logout</a>
              </div>
            </li>
          </ul>
        </div>
      </nav>

      <!-- BREADCRUM -->
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb" style="background-color:#F2F5FA">
          <li class="breadcrumb-item active" aria-current="page"><a href="#">Data Supplier</a></li>
          <li class="breadcrumb-item">Tambah Data</li>
        </ol>
      </nav>
      <!-- END BEB -->

      <!-- BUAT TABEL -->
      <div class="container-fluid">
        <!-- Research -->
        <!-- <div class="row"> -->
        <h2 style="margin-left:18px; margin-bottom:35px;">DATA SUPPLIER</h2>
        <div style="margin-bottom:35px; margin-left:18px;">
          <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#TambahS">Tambah Data Supplier</button>
        </div>
        <div class="container-fluid">
          <div class="box">
            <table class="table table-borderless table-hover" id="table">
              <thead style="background-color:#6C7C94; color:white">
                <tr>
                  <th scope="col">No.</th>
                  <th scope="col">Kode Supplier</th>
                  <th scope="col">Nama</th>
                  <th scope="col">Alamat</th>
                  <th scope="col">Kota</th>
                  <th scope="col">Email</th>
                  <th scope="col">Kontak</th>
                  <th scope="col">Actions</th>
                </tr>
              </thead>
              <tbody>
                <?php $no = 1;
                foreach ($supplier as $sp) { ?>
                  <tr>
                    <!--HINT UNTUK MENGHAPUS USER KALIAN DAPAT MENGGUNAKAN FORM, MENGGUNAKAN ANCHOR ATAU HREF PADA BUTTON-->
                    <td class="text-center"><?php echo $no++ ?></td>
                    <td class="text-center"><?php echo $sp['idsupplier']; ?></td>
                    <td class="text-center"><?php echo $sp['namasupplier']; ?></td>
                    <td class="text-center"><?php echo $sp['alamatsupplier']; ?></td>
                    <td class="text-center"><?php echo $sp['kotasupplier']; ?></td>
                    <td class="text-center"><?php echo $sp['emailsupplier']; ?></td>
                    <td class="text-center"><?php echo $sp['contactsupplier']; ?></td>
                    <td class="text-center">
                      <button class="btn btn-success btn-sm rounded-0" type="button" data-toggle="modal" data-target="#Updatesp<?= $sp['idsupplier'] ?>" title="Edit"><i class="fa fa-edit"></i></button>
                      <a class="btn btn-danger btn-sm rounded-0" type="button" href="<?php echo base_url() . 'SupplierController/delete/' . $sp['idsupplier'] ?>" onClick="return confirm('Apakah Anda Yakin?')"><i class="fa fa-trash"></i></a>
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

  <!-- MODAL EDIT DAN TAMBAH -->
  <div class="modal fade" id="TambahS" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <center>
            <h2>TAMBAH DATA SUPPLIER</h2>
          </center>
        </div>
        <div class="modal-body">
          <form method="POST" action="<?= base_url() ?>SupplierController/addSupplier">
            <div class="form-group">
              <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Nama Supplier" name="namasupplier" required>
            </div>
            <div class="form-group">
              <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Alamat Supplier" name="alamatsupplier" required>
            </div>
            <div class="form-group">
              <input type="text" class="form-control" placeholder="Kota Supplier" name="kotasupplier">
            </div>
            <div class="form-group">
              <input type="text" class="form-control" placeholder="Email Supplier" name="emailsupplier">
            </div>
            <div class="form-group">
              <input type="text" class="form-control" placeholder="Contact Supplier" name="contactsupplier">
            </div>
            <div class="modal-footer">
              <input type="submit" class="btn btn-primary" id="hapus" value="Submit" placeholder="Simpan">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <!-- EDIT DATA -->
  <?php foreach ($supplier as $sp) { ?>
    <div class="modal fade" id="Updatesp<?= $sp['idsupplier'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <center>
              <h2>EDIT DATA SUPPLIER</h2>
            </center>
          </div>
          <div class="modal-body">
            <form method="POST" action="<?= base_url() . 'SupplierController/update/' . $sp['idsupplier'] ?>">
              <div class="form-group">
                <label for="formGroupExampleInput">Nama Supplier</label>
                <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Nama Supplier" name="namasupplier" value="<?= $sp['namasupplier'] ?>" required>
              </div>
              <div class="form-group">
                <label for="formGroupExampleInput">Alamat Supplier</label>
                <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Alamat Supplier" name="alamatsupplier" value="<?= $sp['alamatsupplier'] ?>" required>
              </div>
              <div class="form-group">
                <label for="formGroupExampleInput">Kota Supplier</label>
                <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Kota Supplier" name="kotasupplier" value="<?= $sp['kotasupplier'] ?>" required>
              </div>
              <div class="form-group">
                <label for="formGroupExampleInput">Email Supplier</label>
                <input type="text" class="form-control" id="formGroupExampleInput" placeholder="TEmail Supplier" name="emailsupplier" value="<?= $sp['emailsupplier'] ?>" required>
              </div>
              <div class="form-group">
                <label for="formGroupExampleInput">Contact Supplier</label>
                <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Contact Supplier" name="contactsupplier" value="<?= $sp['contactsupplier'] ?>" required>
              </div>
              <div class="modal-footer">
                <input type="submit" class="btn btn-primary" id="hapus" value="Submit" placeholder="Simpan">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  <?php } ?>
</body>
<!-- Bootstrap JavaScript -->
<script src="<?php base_url() ?>assets/jquery/jquery.min.js"></script>
<script src="<?php base_url() ?>assets/bootstrap/js/bootstrap.bundle.min.js"></script>
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
