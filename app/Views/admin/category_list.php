<?= view('admin/header') ?>

<div class="content">
    <div class="container-fluid">
        <div class="col-md-8">

            <div class="card">
                <div class="card-header">
                    <div class="card-title">
                        Category List
                        <a href="<?= base_url('admin/category/add') ?>" class="btn btn-primary btn-sm float-right">
                            Create
                        </a>
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
                                <th>Category Name</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php if (!empty($category)) : ?>
                                <?php $i = 1; foreach ($category as $row) : ?>
                                    <tr>
                                        <td><?= $i++ ?></td>
                                        <td><?= esc($row['category_name']) ?></td>
                                        <td>
                                            <a href="<?= base_url('admin/category/edit/' . $row['id']) ?>"
                                               class="btn btn-success btn-sm">Edit</a>

                                            <a href="<?= base_url('admin/category/delete/' . $row['id']) ?>"
                                               onclick="return confirm('Are you sure?')"
                                               class="btn btn-danger btn-sm">Delete</a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php else : ?>
                                <tr>
                                    <td colspan="3" class="text-center">No data available</td>
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
