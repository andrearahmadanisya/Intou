<!-- Outer Row -->
<div class="row justify-content-center mt-5 pt-lg-5">
    <div class="card o-hidden border-0 shadow-lg">
        <div class="card-body p-lg-5">
            <!-- Nested Row within Card Body -->
            <div class="row">
                <div class="col-md-6">
                    <div class="p-5">
                        <div class="text-center mb-4">
                            <div class="col-lg-6 d-none d-lg-block">
                                <img src="assets/img/logo.png">
                            </div>
                        </div>
                        <?= $this->session->flashdata('pesan'); ?>
                        <?= form_open('', ['class' => 'account']); ?>
                        <div class="form-group">
                            <input autofocus="autofocus" value="<?= set_value('username'); ?>" type="text" name="username" class="form-control form-control-user" placeholder="Username">
                            <?= form_error('username', '<small class="text-danger">', '</small>'); ?>
                        </div>
                        <div class="form-group">
                            <input type="password" name="password" class="form-control form-control-user" placeholder="Password">
                            <?= form_error('password', '<small class="text-danger">', '</small>'); ?>
                        </div>
                        <button type="submit" class="btn btn-primary btn-user btn-block">
                            Login
                        </button>
                        <?= form_close(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>