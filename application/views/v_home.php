<!DOCTYPE html>
<html lang="en">

<head>
  <!-- ini manggil css -->
  <link rel="stylesheet" type="text/css" href="assets/css/home.css"/>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />

  <title>IntoU | Home</title>

  <!-- Bootstrap CSS -->
  <link href="assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
  <!-- CSS Files -->
  <link href="../assets/css/bootstrap.min.css" rel="stylesheet" />
  <link href="../assets/css/paper-dashboard.css?v=2.0.1" rel="stylesheet" />
    <!--   Core JS Files   -->
  <script src="../assets/js/core/jquery.min.js"></script>
  <script src="../assets/js/core/popper.min.js"></script>
  <script src="../assets/js/core/bootstrap.min.js"></script>
  <script src="../assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>

</head>

<body id="home">

  <div class="d-flex" id="wrapper">

    <!-- Sidebar -->
    <div class="bg-light border-right" id="sidebar-wrapper">
      <div class="sidebar-heading"><img src="assets/images/logo.png" id="logo" /></div>
      <div class="list-group list-group-flush">
        <a href="views/v_home.php" class="item list-group-item-action bg-dark"
        style="color:#ffffff">
        <img src="assets/images/homeputih.png" style="padding-bottom: 4px">
        Home</a>
        <a href="v_databuku.php" class="item list-group-item-action bg-light">
        <img src="assets/images/databukuhitam.png" style="padding-bottom: 4px" class="gambar">
        Data Buku</a>
        <a href="v_datasupplier.php" class="item list-group-item-action bg-light">
        <img src="assets/images/datasupplierhitam.png" style="padding-bottom: 4px">
        Data Supplier</a>
        <a href="v_datapelanggan.php" class="item list-group-item-action bg-light">
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
            arrbulan = ["Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember"];
            hari = date.getDay();
            tanggal = date.getDate();
            bulan = date.getMonth();
            tahun = date.getFullYear();
          document.write(arrhari[hari]+", "+tanggal+" "+arrbulan[bulan]+" "+tahun);
          </script>
        </div>

        <div id="MyClockDisplay" class="jam" onload="showTime()">  
        <script type="text/javascript">
          function showTime(){
          var date = new Date();
          var h = date.getHours(); // 0 - 23
          var m = date.getMinutes(); // 0 - 59
          var s = date.getSeconds(); // 0 - 59
          var session = "AM";
    
          if(h == 0){
              h = 12;
          }
          
          if(h > 12){
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
                <a class="dropdown-item" href="#">Logout</a>
              </div>
            </li>
          </ul>
        </div>
      </nav>

      
     <!-- BREADCRUM -->
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb" style="background-color:#F2F5FA">
        <li class="breadcrumb-item active" aria-current="page"><a href="#">Home</a></li>
      </ol>
    </nav>
     <!-- END BEB -->
     
     <h2 style="margin-left:18px; margin-bottom:35px;">SELAMAT DATANG</h2>

      <div class="container-fluid">
        <div class="row">
      <div class="col-xl-3 col-sm-6 col-12"> 
        <div class="card shadow py-2">
          <div class="card-content">
            <div class="card-body">
              <div class="media d-flex">
                <div class="align-self-center">
                  <i><img src="assets/images/totalbuku.png"></i>
                </div>
                <div class="media-body text-right">
                  <h3>0</h3>
                  <span style="font-size: 14px">Total Buku</span>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-xl-3 col-sm-6 col-12">
        <div class="card shadow h-100 py-2">
          <div class="card-content">
            <div class="card-body">
              <div class="media d-flex">
                <div class="align-self-center">
                  <i><img src="assets/images/totalsupplier.png"></i>
                </div>
                <div class="media-body text-right">
                  <h3>0</h3>
                  <span style="font-size: 14px">Total Supplier</span>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-xl-3 col-sm-6 col-12">
        <div class="card shadow h-100 py-2">
          <div class="card-content">
            <div class="card-body">
              <div class="media d-flex">
                <div class="align-self-center">
                  <i><img src="assets/images/totalpelanggan.png"></i>
                </div>
                <div class="media-body text-right">
                  <h3>0</h3>
                  <span style="font-size: 14px">Total Pelanggan</span>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-xl-3 col-sm-6 col-12">
        <div class="card shadow h-100 py-2">
          <div class="card-content">
            <div class="card-body">
              <div class="media d-flex">
                <div class="align-self-center">
                  <i><img src="assets/images/totalpenjualan.png"></i>
                </div>
                <div class="media-body text-right">
                  <h3>0</h3>
                  <span style="font-size: 14px">Total Penjualan</span>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
      </div>
      </div>
    </div>
    <!-- /#page-konten-wrapper -->

  </div>
  <!-- /#wrapper -->

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
