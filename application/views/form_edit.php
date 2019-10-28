<body>
    <div class="container">
        <div class="row">
            <div class="col-sm-2"></div>
            <div class="col-sm-8 mt-5 border-whitesmoke">
                <div class="form-group">
                    <?php foreach ($user as $u) { ?>
                        <form action="<?= base_url('mainmenu/update') ?>" method="post">
                            <div class="row mt-3">
                                <div class="col-sm-3">
                                    <label>Nama</label>
                                </div>
                                <div class="col-sm">
                                    <input type="hidden" name="id" value="<?php echo $u->id ?>">
                                    <input class="form-control" type="text" name="nama" value="<?php echo $u->nama ?>">
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-sm-3">
                                    <label>Email</label>
                                </div>
                                <div class="col-sm">
                                    <input class="form-control" type="text" name="email" value="<?php echo $u->email ?>">
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-sm-3">
                                    <label>Password</label>
                                </div>
                                <div class="col-sm">
                                    <input class="form-control" type="text" name="password" value="<?php echo $u->password ?>">
                                </div>
                            </div>
                            <input class="btn btn-primary width-full mt-3" type="submit" value="Simpan">
                        </form>
                    <?php } ?>
                </div>
            </div>
            <div class="col-sm-2"></div>
        </div>
    </div>
</body>