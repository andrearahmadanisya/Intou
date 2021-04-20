<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>IntoU | Home</title>

  <!-- Bootstrap CSS -->
  <link href="assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456l-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
  <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
  </svg>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <!-- styles template -->
  <link href="assets/css/databuku.css" rel="stylesheet">

</head>

<body id="home">

  <div class="d-flex" id="wrapper">

    <!-- Sidebar -->
    <div class="bg-light border-right" id="sidebar-wrapper">
      <div class="sidebar-heading"><img src="assets/images/logo.png" id="logo" /></div>
      <div class="list-group list-group-flush">
        <a href="<?= base_url('HomeController'); ?>" class="item list-group-item-action bg-light">
          <img src="assets/images/homehitam.png" style="padding-bottom: 4px">
          Home</a>
        <a href="<?= base_url('BukuController'); ?>" class="item list-group-item-action bg-dark" style="color:#ffffff">
          <img src="assets/images/databukuputih.png" style="padding-bottom: 4px" class="gambar">
          Data Buku</a>
        <a href="<?= base_url('SupplierController'); ?>" class="item list-group-item-action bg-light">
          <img src="assets/images/datasupplierhitam.png" style="padding-bottom: 4px">
          Data Supplier</a>
        <a href="<?= base_url('PelangganController'); ?>" class="item list-group-item-action bg-light">
          <img src="assets/images/datapelangganhitam.png" style="padding-bottom: 4px">
          Data Pelanggan</a>

        <button class="dropdown-btn">
          <img src="assets/images/transaksihitam.png" style="padding-bottom: 4px">Transaksi
          <i class="fa fa-caret-down"></i>
        </button>
        <div class="dropdown-container">
          <a href="" style="color:black">Transaksi Barang Masuk</a><br><br>
          <a href="" style="color:black">Transaksi Penjualan</a>
        </div>

        <button class="dropdown-btn">
          <img src="assets/images/laporanhitam.png" style="padding-bottom: 4px;"> Laporan
          <i class="fa fa-caret-down"></i>
        </button>
        <div class="dropdown-container">
          <a href="" style="color:black">Laporan Pembelian</a><br><br>
          <a href="" style="color:black">Laporan Penjualan</a>
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
          <img src="assets/images/menu.png">
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
                <img src="assets/images/karyawan.png">
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
          <li class="breadcrumb-item active" aria-current="page"><a href="#">Data Buku</a></li>
          <li class="breadcrumb-item">Tambah Data</li>
          <li class="breadcrumb-item">History</li>
        </ol>
      </nav>
      <!-- END BEB -->

      <h2 style="margin-left:18px; margin-bottom:35px;">DATA BUKU</h2>

      <!-- BUTTON -->
      <div style="margin-bottom:35px; margin-left:18px;">
        <button type="button" class="btn btn-secondary">Tambah Data</button>
        <button type="button" class="btn btn-secondary">History</button>
      </div>

      <!-- END BUTTON -->

      <!-- BUAT TABEL -->
      <div class="container-fluid">
        <!-- Research -->

        <div class="row">
          <div class="col-sm-4">
            <!-- SEARCH -->
            <form action="<?= site_url('BukuController/SearchBuku') ?>" method="post">
              <div class="input-group" style="margin-top: -7px">
                <input type="text" name="keyword" class="form-control rounded" aria-label="Search" aria-describedby="search-addon" />
                <button type="submit" class="btn btn-outline-secondary">search</button>
              </div>
            </form>
          </div>
          <div class="col-sm-2"></div>
          <div class="col-sm-3">
            <div class="form-group row">
              <label class="col-sm-4 text-secondary h6" for="Search">Sort by</label>
              <div class="btn-group">
                <button type="button" class="btn btn-secondary btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="margin-top:-6px">
                  Latest
                </button>
                <div class="dropdown-menu">
                  <a class="dropdown-item" href="#">Latest</a>
                  <a class="dropdown-item" href="#">Newest</a>
                </div>
              </div>
            </div>
          </div>
          <div class="col-sm-3">
            <div class="form-group row">
              <label class="col-sm-3 text-secondary h6" for="Search">Show</label>
              <div class="btn-group">
                <button type="button" class="btn btn-secondary btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="margin-top:-6px">
                  10
                </button>
                <div class="dropdown-menu">
                  <a class="dropdown-item" href="#">10</a>
                  <a class="dropdown-item" href="#">20</a>
                  <a class="dropdown-item" href="#">All</a>
                </div>
              </div>
            </div>
          </div>
          <div>
          </div>
          <div class="col-lg-12">
            <div class="col-lg-1"></div>
            <div class="col-lg-20">
              <div class="row" style="padding-top: 10px; padding-left:12px; padding-right:12px">
                <table class="table table-hover">
                  <thead class="table-light" style="background-color:#6C7C94; color:white">
                    <tr>
                      <th scope="col">No.</th>
                      <th scope="col">ID Buku</th>
                      <th scope="col">Judul Buku</th>
                      <th scope="col">Kategori</th>
                      <th scope="col">Penulis</th>
                      <th scope="col">Tgl Masuk</th>
                      <th scope="col">Harga Jual</th>
                      <th scope="col">Harga Beli</th>
                      <th scope="col">Total</th>
                      <th scope="col">Actions</th>
                    </tr>
                  </thead>
                  <tbody style="background-color: white">

                    <tr> <?php foreach ($buku as $bk) { ?>
                        <th scope="row">1</th>
                        <td><?= $bk['idbuku'] ?></td>
                        <td><?= $bk['judul'] ?></td>
                        <td><?= $bk['category'] ?></td>
                        <td><?= $bk['penulis'] ?></td>
                        <td><?= $bk['tglmasuk'] ?></td>
                        <td><?= $bk['hargajual'] ?></td>
                        <td><?= $bk['hargabeli'] ?></td>
                        <td><?= $bk['total'] ?></td>
                        <td>
                          <!-- Call to action buttons -->
                          <ul class="list-inline m-0">
                            <li class="list-inline-item">
                              <a class="btn btn-success btn-sm rounded-0" type="button" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-edit"></i></a>
                            </li>
                            <li class="list-inline-item">
                              <a class="btn btn-danger btn-sm rounded-0" type="button" href="<?php echo base_url() . 'BukuController/delete/' . $bk['idbuku'] ?>" +data-toggle="tooltip" data-placement="top" title="Delete" onClick="return confirm('Apakah Anda Yakin?')"><i class="fa fa-trash"></i></a>
                            </li>
                          </ul>

                        </td>
                    </tr> <?php } ?>
                  </tbody>
                </table>
              </div>


            </div>
            <!-- /#page-konten-wrapper -->


          </div>
          <!-- /#wrapper -->

          <nav aria-label="Page navigation example">
            <ul class="pagination" style="margin-left:12px">
              <li class="page-item right"><a class="page-link" href="#">Previous</a></li>
              <li class="page-item"><a class="page-link" href="#">1</a></li>
              <li class="page-item"><a class="page-link" href="#">2</a></li>
              <li class="page-item"><a class="page-link" href="#">3</a></li>
              <li class="page-item"><a class="page-link" href="#">Next</a></li>
            </ul>
          </nav>


          <!-- Bootstrap JavaScript -->
          <script src="assets/jquery/jquery.min.js"></script>
          <script src="assets/bootstrap/js/bootstrap.bundle.min.js"></script>

          <!-- Menu Script -->
          <script>
            $("#menu-toggle").click(function(e) {
              e.preventDefault();
              $("#wrapper").toggleClass("toggled");
            });
          </script>



</body>

</html>
