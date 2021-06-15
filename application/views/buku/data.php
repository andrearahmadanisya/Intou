<?= $this->session->flashdata('pesan'); ?>
<div class="card shadow-sm" style="border-bottom: #315c9a; color: #315c9a;">
    <div class="card-header bg-white py-3">
        <div class="row">
            <div class="col">
                <h4 class="h5 align-middle m-0 font-weight-bold text" style="color: #315c9a;">
                    Data Buku
                </h4>
            </div>
            <div class="col-auto">
                <a href="<?= base_url('BukuController/add') ?>" class="btn btn-sm  btn-icon-split" style="background-color: #315c9a; color: white;">
                    <span class="icon">
                        <i class="fa fa-plus"></i>
                    </span>
                    <span class="text">
                        Tambah Buku
                    </span>
                </a>
            </div>
            <div class="col-auto">
                <a href="<?= base_url('HistoryController') ?>" class="btn btn-sm btn-icon-split" style="background-color: #315c9a; color: white;">
                    <span class="icon">
                        <i class="fa fa-book"></i>
                    </span>
                    <span class="text">
                        History Buku
                    </span>
                </a>
            </div>
        </div>
    </div>
    <div class="table-responsive">
        <table class="table table-striped w-100 table-hover" id="dataTable">
            <thead style="background-color:#6C7C94; color:white">
                <tr>
                    <th scope="col" class="text-center">No.</th>
                    <th scope="col" class="text-center">ID Buku</th>
                    <th scope="col" class="text-center">Judul Buku</th>
                    <th scope="col" class="text-center">Stok</th>
                    <th scope="col" class="text-center">Kategori</th>
                    <th scope="col" class="text-center">Penulis</th>
                    <th scope="col" class="text-center">Tgl Masuk</th>
                    <th scope="col" class="text-center">Harga Jual</th>
                    <th scope="col" class="text-center">Harga Beli</th>
                    <th scope="col" class="text-center">(Actions)</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1;
                foreach ($buku as $bk) { ?>
                    <tr>
                        <td class="text-center"><?php echo $no++ ?></td>
                        <td><?php echo $bk['idbuku']; ?></td>
                        <td><?php echo $bk['judul']; ?></td>
                        <td><?php echo $bk['stok']; ?></td>
                        <td><?php echo $bk['category']; ?></td>
                        <td><?php echo $bk['penulis']; ?></td>
                        <td><?php echo date("d/m/Y", strtotime($bk['tglmasuk'])) ?></td>
                        <td><?php echo $bk['hargajual']; ?></td>
                        <td><?php echo $bk['hargabeli']; ?></td>
                        <td>
                            <a href="<?= base_url('BukuController/edit/') . $bk['idbuku'] ?>" class="btn btn-warning btn-circle btn-sm"><i class="fa fa-edit"></i></a>
                            <a onclick="return confirm('Hapus Data Buku?')" href="<?= base_url('BukuController/delete/') . $bk['idbuku'] ?>" class="btn btn-danger btn-circle btn-sm"><i class="fa fa-trash"></i></a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>
