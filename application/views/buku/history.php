<?= $this->session->flashdata('pesan'); ?>
<div class="card shadow-sm border-bottom-primary">
    <div class="card-header bg-white py-3">
        <div class="row">
            <div class="col">
                <h4 class="h5 align-middle m-0 font-weight-bold" style="color: #315c9a;">
                    Data History Buku
                </h4>
            </div>
            <div class="col-auto">
                <a href="<?= base_url('BukuController') ?>" class="btn btn-sm btn-icon-split" style="background-color: #315c9a; color: white;">
                    <span class="icon">
                        <i class="fa fa-book"></i>
                    </span>
                    <span class="text">
                        Data Buku
                    </span>
                </a>
            </div>
        </div>
    </div>
    <div class="table-responsive">
        <table class="table table-striped w-100 dt-responsive nowrap" id="dataTable">
            <thead style="background-color:#6C7C94; color:white">
                <tr>
                    <th scope="col" class="text-center">No.</th>
                    <th scope="col" class="text-center">Id Buku</th>
                    <th scope="col" class="text-center">Judul Buku</th>
                    <th scope="col" class="text-center">Stok</th>
                    <th scope="col" class="text-center">Kategori</th>
                    <th scope="col" class="text-center">Penulis</th>
                    <th scope="col" class="text-center">Tanggal Masuk</th>
                    <th scope="col" class="text-center">Harga Jual</th>
                    <th scope="col" class="text-center">Harga Beli</th>
                    <th scope="col" class="text-center">Non-Active</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1;
                foreach ($buku as $hbk) { ?>
                    <tr>
                        <!--HINT UNTUK MENGHAPUS USER KALIAN DAPAT MENGGUNAKAN FORM, MENGGUNAKAN ANCHOR ATAU HREF PADA BUTTON-->
                        <td class="text-center"><?php echo $no++ ?></td>
                        <td><?php echo $hbk['idbuku']; ?></td>
                        <td><?php echo $hbk['judul']; ?></td>
                        <td><?php echo $hbk['stok']; ?></td>
                        <td><?php echo $hbk['category']; ?></td>
                        <td><?php echo $hbk['penulis']; ?></td>
                        <td><?php echo date("l, d-m-Y H:i a", strtotime($hbk['tglmasuk'])) ?></td>
                        <td><?php echo $hbk['hargajual']; ?></td>
                        <td><?php echo $hbk['hargabeli']; ?></td>
                        <td><?php echo date("l, d-m-Y H:i a") ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>