<?= view('admin/header') ?>

<div class="content">
    <div class="container-fluid">
        <div class="row">

            <div class="col-md-6">
    
                <?php
                    // SAFE edit check
                    $isEdit = isset($category) && !empty($category['id']);
    
                    $actionUrl = $isEdit
                        ? base_url('admin/category/edit/' . $category['id'])
                        : base_url('admin/category/add');
                ?>
    
                <form action="<?= $actionUrl ?>" method="post" enctype="multipart/form-data">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">
                                <?= $isEdit ? 'Update Category' : 'Create Category' ?>
                                <a href="<?= base_url('admin/category') ?>" class="btn btn-primary btn-sm float-right">back</a>
                            </div>
                        </div>
    
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
                        <div class="card-body">
                            <div class="form-group">
                                <label>Category Name</label>
                                <input type="text"
                                       name="category_name"
                                       class="form-control"
                                       value="<?= $isEdit ? esc($category['category_name']) : '' ?>"
                                       placeholder="category Name"
                                       required>
                            </div>
                            <div class="form-group">
                                <label>Category Primary Image Upload</label>
                                <input type="file"
                                       name="category_primary_image"
                                       class="form-control"
                                       value=""
                                     <?= !$isEdit ? 'required' : '' ?>>
                            </div>
                        </div>
    
                        <div class="card-action">
                            <button class="btn btn-success">
                                <?= $isEdit ? 'Update' : 'Create' ?>
                            </button>
                        </div>
                    </div>
                </form>
    
            </div>
            <div class="col-md-4">
                <?php //echo "<pre>";print_r($category); ?>
                <div class="container-fluid mb-4">
                    <h4>Primary Image</h4>
                    <div class="card">
                        <?php if ($isEdit && !empty($category['category_primary_image'])): ?>
                            <img class="card-img-top"
                                 src="<?= base_url('/uploads/products/category_primary_image/' . $category['category_primary_image']) ?>"
                                 alt="Primary Image">
                                 <div class="card-body">
                                       
                                </div>
                        <?php else: ?>
                          
                            <img class="card-img-top"
                                 src="https://png.pngtree.com/png-vector/20221125/ourmid/pngtree-no-image-available-icon-flatvector-illustration-picture-coming-creative-vector-png-image_40968940.jpg"
                                 alt="No Image">
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?= view('admin/footer') ?>
