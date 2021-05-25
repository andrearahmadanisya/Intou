<?= $this->session->flashdata('pesan'); ?>
<div class="card shadow-sm border-bottom-primary">
    <div class="card-header bg-white py-3">
        <div class="row">
            <div class="col">
                <h4 class="h5 align-middle m-0 font-weight-bold" style="color: #315c9a; ">
                    Riwayat Data Buku Masuk
                </h4>
            </div>
            <div class="col-auto">
                <a href="<?= base_url('TBukuMasukController/add') ?>" class="btn btn-sm btn-icon-split" style="background-color: #315c9a; color: white;">
                    <span class="icon">
                        <i class="fa fa-plus"></i>
                    </span>
                    <span class="text">
                        Input Buku Masuk
                    </span>
                </a>
            </div>
        </div>
    </div>
    <div class="table-responsive">
        <table class="table table-striped w-100 nowrap" id="dataTable">
            <thead style="background-color:#6C7C94; color:white">
                <tr>
                    <th>No. </th>
                    <th>No Transaksi</th>
                    <th>Tanggal Masuk</th>
                    <th>Supplier</th>
                    <th>Judul Buku</th>
                    <th>Jumlah Masuk(stok)</th>
                    <th>Harga perpcs</th>
                    <th>Harga Total</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                foreach ($transaksimsk as $bm) { ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= $bm['idtransaksi']; ?></td>
                        <td><?php echo date("l, d-m-Y", strtotime($bm['tanggal_masuk'])); ?></td>
                        <td><?= $bm['namasupplier']; ?></td>
                        <td><?= $bm['judul']; ?></td>
                        <td><?= $bm['totalmasuk'] ?></td>
                        <td><?= $bm['hargapcs']; ?></td>
                        <td><?= $bm['hargatotal']; ?></td>
                        <td>
                            <a href="<?= base_url('TBukuMasukController/edit/') . $bm['idtransaksi'] ?>" class="btn btn-warning btn-circle btn-sm"><i class="fa fa-edit"></i></a>
                            <a onclick="return confirm('Yakin ingin hapus?')" href="<?= base_url('TBukuMasukController/delete/') . $bm['idtransaksi'] ?>" class="btn btn-danger btn-circle btn-sm"><i class="fa fa-trash"></i></a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>