               <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
                    
                    <div class="row">
                        <div class="col-lg-6">
                            <!-- pesan error -->
                            <?= form_error(
                                'menu',
                                '<div class="alert alert-success" role="alert">
                                </div>'
                            ); ?>
                            <?= $this->session->flashdata('message'); ?>
                            <!-- akhir pesan error -->
                            
                            <!-- tombol tambah -->
                            <a href="" class="btn btn-primary mb-3" class="btn btn-primary"
                            data-toggle="modal"
                            data-target="#Addnewrole">Add New Role</a>
                            <!-- Tabel -->

                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Role</th>
                                        <th scope="col">Action</th>
                                     </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                    <?php foreach ($role as $r) :  ?>
                                       
                                        <tr>
                                            <th scope="row"> <?= $i; ?></th>
                                            <td><?= $r['role']; ?></td>
                                            <td>
                                                <a href="<?= base_url('admin/roleAccess/') . $r['id'] ?>" class="btn btn-warning btn-sm" >Access</a>
                                                <button href="#" class="btn btn-success btn-sm" data-toggle="modal" data-popup="tooltip" data-placement="top" title="edit"
                                                 data-target="#exampleModalmenuedit<?= $r['id']; ?>">Edit</button>
                                                <button onclick="deleteRole('<?= base_url('admin/deleterole/') . $r['id'] ?>')" class="btn btn-danger btn-sm tombol-hapus" >Delete</button>
                                            </td>
                                        </tr>
                                        <?php $i++; ?>
                                        <?php endforeach; ?>
                                </tbody>
                            </table>
                            <!-- akhir tabel -->
                            
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- End of Main Content -->


            <!-- Button trigger modal -->

            <!-- Modal -->
            <div class="modal fade" id="Addnewrole" tabindex="-1" aria-labelledby="AddnewroleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="AddnewroleModalLabel">Add new Role</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="close"></button>
                        </div>
                        <form action="<?= base_url('admin/role'); ?>" method="post">
                            <div class="modal-body">
                                <div class="form-group">
                                    <input type="text" class="form-control" id="role" name="role" placehollder="Admin role">
                                </div>
                            </div>

                            <div class="modal-footer">
                                <button type="submit" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Add</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>



             <!-- Modal Edit -->
             <?php foreach ($role as $r) : ?>
             <div class="modal fade" id="exampleModalmenuedit<?= $r['id']; ?>" tabindex="-1" aria-labelledby="exampleModalmenuedit" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalmenuedit">Add Edit new Role</h5>
                            <span aria-hidden="true">&times;</span>
                        </div>
                        <form action="<?= base_url('admin/roleedit'); ?>" method="post">
                            <div class="modal-body">
                            <div class="form group">
                        <input type="text" value="<?= $r['role'] ?>" class="form-control" id="role" name="role" placeholder="Menu menu">
                    </div>
                                <div class="form-group">
                                <input type="hidden" class="form-control" id="id" name="id" readonly value="<?= $r['id'] ?>">
                                </div>
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Add</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>