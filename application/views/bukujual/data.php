<?php echo $this->session->flashdata('pesan'); ?>
<div class="card shadow-sm border-bottom-primary">
    <div class="card-header bg-white py-3">
        <div class="row">
            <div class="col">
                <h4 class="h5 align-middle m-0 font-weight-bold" style="color: #315c9a;">
                    Riwayat Data Buku Keluar
                </h4>
            </div>
            <div class="col-auto">
                <a href="<?php echo base_url('TPenjualanController/add') ?>" class="btn btn-sm btn-icon-split" style="background-color: #315c9a; color: white;">
                    <span class="icon">
                        <i class="fa fa-plus"></i>
                    </span>
                    <span class="text">
                        Input Buku Keluar
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
                    <th>Tanggal Keluar</th>
                    <th>Pelanggan</th>
                    <th>Judul Buku</th>
                    <th>Jumlah Keluar</th>
                    <th>Biaya Kirim</th>
                    <th>Harga Total</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                foreach ($transaksipjl as $pjl) { ?>
                    <tr>
                        <td><?php echo $no++; ?></td>
                        <td><?php echo $pjl['idpenjualan']; ?></td>
                        <td><?php echo date("l, d-m-Y", strtotime($pjl['tanggal_keluar'])); ?></td>
                        <td><?php echo $pjl['namapelanggan']; ?></td>
                        <td><?php echo $pjl['judul']; ?></td>
                        <td><?php echo $pjl['qty']; ?></td>
                        <td><?php echo $pjl['biayakirim']; ?></td>
                        <td><?php echo $pjl['hargatotal']; ?></td>
                        <td>
                            <a href="<?= base_url('TPenjualanController/edit/') . $pjl['idpenjualan'] ?>" class="btn btn-warning btn-circle btn-sm"><i class="fa fa-edit"></i></a>
                            <a onclick="return confirm('Yakin ingin hapus?')" href="<?= base_url('TPenjualanController/delete/') . $pjl['idpenjualan'] ?>" class="btn btn-danger btn-circle btn-sm"><i class="fa fa-trash"></i></a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>