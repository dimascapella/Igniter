<!DOCTYPE html>

<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-sm-3"></div>
            <div class="col-sm-6 border-whitesmoke">
                <p><?php echo $converty ?></p>
                <form action="<?= base_url('mainmenu/validation') ?>" method="post" enctype="multipart/form-data">
                    <div class="row mt-3">
                        <div class="col-sm-3">
                            <label>Nama</label>
                        </div>
                        <div class="col-sm">
                            <input type="text" class="form-control" name="nama">
                            <small id="helpId" class="form-text text-muted"><?php echo form_error('nama') ?></small>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-sm-3">
                            <label>email</label>
                        </div>
                        <div class="col-sm">
                            <input type="text" class="form-control" name="email">
                            <small id="helpId" class="form-text text-muted"><?php echo form_error('email') ?></small>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-sm-3">
                            <label>password</label>
                        </div>
                        <div class="col-sm">
                            <input type="password" class="form-control" name="password">
                            <input type="hidden" class="form-control" name="modify" value="<?= $date_now ?>" >
                            <small id="helpId" class="form-text text-muted"><?php echo form_error('password') ?></small>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-sm-3">
                            <label>Gambar</label>
                        </div>
                        <div class="col-sm">
                            <input type="file" class="form-control-file" name="photo">
                        </div>
                    </div>
                    <button class="btn btn-primary mt-3 width-full" type="submit">Submit</button>
                </form>
            </div>
            <div class="col-sm-3"></div>
        </div>
        <div class="row mt-4">
            <h1>Data</h1>
            <table class="table table-bordered text-center">
                <thead class="thead-light">
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Gambar</th>
                        <th>Email</th>
                        <th>Password</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $count = 1;
                    foreach ($data->result() as $us) {
                        ?>
                        <tr>
                            <td><?php echo $count++ ?></td>
                            <td><?php echo $us->nama ?></td>
                            <td><?php echo "<img src='" . base_url("assets/upload/" . $us->gambar) . "' width='100' height='100'>" ?></td>
                            <td><?php echo $us->email ?></td>
                            <td><?php echo $us->password ?></td>
                            <td>
                                <a href="<?php echo site_url('mainmenu/edit/') . $us->id ?>"><button class="btn btn-primary">Edit</button></a>
                                <a data-href="<?php echo site_url('mainmenu/delete/') . $us->id ?>" data-toggle="modal" data-target="#confirm"><button class="btn btn-danger">Detele</button></a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
        <div class="row">
            <div class="col">
                <!--Tampilkan pagination-->
                <?php echo $pagination; ?>
            </div>
        </div>
    </div>
    <div class="modal fade" id="confirm" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Confirm Detele</h5>
                </div>
                <div class="modal-body">
                    <div class="container-fluid">
                        Are you sure ?
                    </div>
                </div>
                <div class="modal-footer">
                    <a class="btn-yes"><button type="button" class="btn btn-primary">Yes</button></a>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        $('#exampleModal').on('show.bs.modal', event => {
            var button = $(event.relatedTarget);
            var modal = $(this);
        });
    </script>
    <script>
        $('#confirm').on('show.bs.modal', function(e) {
            $(this).find('.btn-yes').attr('href', $(e.relatedTarget).data('href'));
        });
    </script>
</body>

</html>