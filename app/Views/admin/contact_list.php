<?= view('admin/header') ?>

<div class="content">
    <div class="container-fluid">
        <div class="col-md-10">

            <div class="card">
                <div class="card-header">
                    <div class="card-title">
                        Contact Form List
                       
                    </div>
                </div>

                <div class="card-body">

                            <?php if (session()->getFlashdata('success')): ?>
                                <div class="alert alert-success mb-4">
                                    <?= session()->getFlashdata('success'); ?>
                                </div>
                            <?php endif; ?>

                            <?php if (session()->getFlashdata('error')): ?>
                                <div class="alert alert-danger mb-4">
                                    <?= session()->getFlashdata('error'); ?>
                                </div>
                            <?php endif; ?>
                    <table id="example" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th> Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Subject</th>
                                <th>Message</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php if (!empty($contact_list)) : ?>
                                <?php $i = 1; foreach ($contact_list as $row) : ?>
                                    <tr>
                                        <td><?= $i++ ?></td>
                                       
                                        <td><?= esc($row['fullname']) ?></td>
                                        <td><?= esc($row['email']) ?></td>
                                        <td><?= esc($row['phone']) ?></td>
                                        <td><?= esc($row['subject']) ?></td>
                                        <td><?= esc($row['message']) ?></td>
                                        <td>
                                          
                                            <a href="<?= base_url('admin/contact/delete/' . $row['id']) ?>"
                                               onclick="return confirm('Are you sure?')"
                                               class="btn btn-danger btn-sm">Delete</a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php else : ?>
                                <tr>
                                    <td colspan="5" class="text-center">No Contact found</td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>

<?= view('admin/footer') ?>
