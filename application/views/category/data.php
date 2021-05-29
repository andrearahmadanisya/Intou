<?= $this->session->flashdata('pesan'); ?>
<div class="card shadow-sm border-bottom-primary">
    <div class="card-header bg-white py-3">
        <div class="row">
            <div class="col">
                <h4 class="h5 align-middle m-0 font-weight-bold " style="color: #315c9a;">
                    Data Kategori Buku
                </h4>
            </div>
            <div class=" col-auto">
                <a type="button" data-toggle="modal" data-target="#Tambahcat" class="btn btn-sm  btn-icon-split text-light" style="background-color: #315c9a; color: white;">
                    <span class="icon">
                        <i class="fa fa-plus"></i>
                    </span>
                    <span class="text">
                        Tambah Kategori Buku
                    </span>
                </a>
            </div>
        </div>
    </div>
    <div class="table-responsive">
        <table class="table table-striped" id="dataTable">
            <thead style="background-color:#6C7C94; color:white">
                <tr>
                    <th>No. </th>
                    <th>Kategori Buku</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                foreach ($category as $cat) { ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= $cat['category']; ?></td>
                        <td>
                            <button type="button" class="btn btn-warning btn-circle btn-sm text-light" data-toggle="modal" data-target="#Editcat<?= $cat['idcategory'] ?>" title="Edit"><i class="fa fa-edit"></i></button>
                            <a type="button" class="btn btn-danger btn-circle btn-sm" href="<?php echo base_url() . 'CategoryController/delete/' . $cat['idcategory'] ?>" onClick="return confirm('Apakah Anda Yakin?')"><i class="fa fa-trash"></i></a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>

<!-- TAMBAH CATEGORY BUKU -->
<div class="modal fade" id="Tambahcat" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4> Form Tambah Kategori Buku</h4>
            </div>
            <div class="modal-body">
                <form method="POST" action="<?= base_url() ?>CategoryController/add">
                    <?= $this->session->flashdata('pesan'); ?>
                    <?= form_open(); ?>
                    <div class="row form-group">
                        <label class="col-md-3 text-md-right" for="category">Kategori Buku</label>
                        <div class="col-md-9">
                            <input value="<?= set_value('category'); ?>" name="category" id="category" type="text" class="form-control" placeholder="Category Buku...">
                            <?= form_error('category', '<small class="text-danger">', '</small>'); ?>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="submit" class="btn btn-primary" id="submit" value="Submit" placeholder="Simpan">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    </div>
                    <?= form_close(); ?>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- EDIT CATEGORY BUKU -->
<?php foreach ($category as $cat) { ?>
    <div class="modal fade" id="Editcat<?= $cat['idcategory'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4>Form Edit Kategori Buku</h4>
                </div>
                <div class="modal-body">
                    <form method="POST" action="<?= base_url() . 'CategoryController/edit/' . $cat['idcategory'] ?>">
                        <?= $this->session->flashdata('pesan'); ?>
                        <?= form_open('', [], ['idcategory' => $cat['idcategory']]); ?>
                        <div class="row form-group">
                            <label class="col-md-3 text-md-right" for="category">Kategori Buku</label>
                            <div class="col-md-9">
                                <input value="<?= set_value('category', $cat['category']); ?>" name="category" id="category" type="text" class="form-control" placeholder="Category Buku...">
                                <?= form_error('category', '<small class="text-danger">', '</small>'); ?>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <input type="submit" class="btn btn-primary" id="submit" value="Submit" placeholder="Simpan">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        </div>
                        <?= form_close(); ?>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php } ?>
