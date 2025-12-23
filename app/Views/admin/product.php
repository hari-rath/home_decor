<?= view('admin/header') ?>

<div class="content">
    <div class="container-fluid">
        <div class="row">

            <!-- Left Column: Form -->
            <div class="col-md-6">

                <?php
                    $isEdit = isset($product) && !empty($product['id']);
                    $actionUrl = $isEdit
                        ? base_url('admin/product/edit/' . $product['id'])
                        : base_url('admin/product/add');
                ?>

                <form action="<?= $actionUrl ?>" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="product_id" value="<?= $isEdit ? $product['id'] : '' ?>">

                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">
                                <?= $isEdit ? 'Update Product' : 'Create Product' ?>
                                <a href="<?= base_url('admin/product') ?>" class="btn btn-sm btn-secondary float-end float-lg-right">Back</a>
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
                            <!-- Category -->
                            <div class="form-group">
                                <label>Category</label>
                                <select name="category_id" class="form-control" required>
                                    <option value="">Select Category</option>
                                    <?php if (!empty($categories)): ?>
                                        <?php foreach ($categories as $cat): ?>
                                            <option value="<?= $cat['id'] ?>"
                                                <?= $isEdit && $product['category_id'] == $cat['id'] ? 'selected' : '' ?>>
                                                <?= esc($cat['category_name']) ?>
                                            </option>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                </select>
                            </div>

                            <!-- Product Name -->
                            <div class="form-group">
                                <label>Product Name</label>
                                <input type="text"
                                       name="product_name"
                                       class="form-control"
                                       value="<?= $isEdit ? esc($product['product_name']) : '' ?>"
                                       placeholder="Product Name"
                                       required>
                            </div>

                            <!-- Product Title -->
                            <div class="form-group">
                                <label>Product Title</label>
                                <input type="text"
                                       name="product_title"
                                       class="form-control"
                                       value="<?= $isEdit ? esc($product['product_title']) : '' ?>"
                                       placeholder="Product Title"
                                       required>
                            </div>
                            <!-- Product Title -->
                            <div class="form-group">
                                <label>Amazon Links</label>
                                <input type="text"
                                       name="amazon_links"
                                       class="form-control"
                                       value="<?= $isEdit ? esc($product['amazon_links']) : '' ?>"
                                       placeholder="Amazon Links"
                                       >
                            </div>
                            <div class="form-group">
                                <label>Flip Kart Links</label>
                                <input type="text"
                                       name="flipkart_links"
                                       class="form-control"
                                       value="<?= $isEdit ? esc($product['flipkart_links']) : '' ?>"
                                       placeholder="Flip Kart Links"
                                       >
                            </div>

                             <!-- Product Title -->
                            <div class="form-group">
                                <label>Product Description</label>
                                <!-- <input type="text"
                                       name="product_description"
                                       class="form-control"
                                       value="<?= $isEdit ? esc($product['product_description']) : '' ?>"
                                       placeholder="Product Title"
                                       required> -->
                                <textarea name="product_description"
                                       class="form-control"
                                       value="<?= $isEdit ? esc($product['product_description']) : '' ?>"
                                       placeholder="Product Description"
                                       required ><?= $isEdit ? esc($product['product_description']) : '' ?></textarea>
                            </div>

                            <!-- Primary Image -->
                            <div class="form-group">
                                <label>Primary Image (Frontend)</label>
                                <input type="file" name="primary_image" class="form-control-file form-control">

                               
                            </div>

                            <!-- Gallery Images -->
                            <div class="form-group">
                                <label>Gallery Images (All angles)</label>
                                <input type="file" name="gallery_images[]" multiple class="form-control-file form-control">

                          
                            </div>

                        </div>

                        <div class="card-footer text-end">
                            <button class="btn btn-success"><?= $isEdit ? 'Update' : 'Create' ?></button>
                        </div>
                    </div>
                </form>

            </div>

            <!-- Right Column: Preview -->
            <div class="col-md-6">

                <!-- Primary Image Card -->
                <div class="container-fluid mb-4">
                    <h4>Primary Image</h4>
                    <div class="card">
                        <?php if ($isEdit && !empty($product['primary_image'])): ?>
                            <img class="card-img-top"
                                 src="<?= base_url('/uploads/products/primary_images/' . $product['primary_image']) ?>"
                                 alt="Primary Image">
                                 <div class="card-body">
                                        <form action="<?= base_url('admin/product/delete_primary_img') ?>" method="post">
                                            <?= csrf_field() ?> <!-- optional CSRF protection -->
                                            <input type="hidden" name="product_id" value="<?= $product['id'] ?>">
                                            
                                            <input type="hidden" name="image_name" value="<?= $product['primary_image'] ?>">
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                     </div>
                        <?php else: ?>
                            <img class="card-img-top"
                                 src="https://via.placeholder.com/300x200?text=No+Image"
                                 alt="No Image">
                        <?php endif; ?>
                    </div>
                </div>

                <!-- Gallery Images Card -->
                <div class="container-fluid">
                    <h4>Gallery Images</h4>
                    <div class="row">
                        <?php
                            if ($isEdit && !empty($product['gallery_images'])){
                                $galleryImages = json_decode($product['gallery_images'], true);
                                $inc = 0;
                                foreach($galleryImages as $img){
                                    $inc++;
                        ?>
                            <div class="col-6 col-sm-4 col-md-6 mb-3">
                                <div class="card">
                                    <img class="card-img-top"
                                         src="<?= base_url('/uploads/products/gallery_images/' . $img) ?>"
                                         alt="Gallery Image">
                                     <div class="card-body">
                                        <form action="<?= base_url('admin/product/delete_gallery_img') ?>" method="post">
                                            <?= csrf_field() ?> <!-- optional CSRF protection -->
                                            <input type="hidden" name="product_id" value="<?= $product['id'] ?>">
                                            <input type="hidden" name="image_index" value="<?= $inc ?>">
                                            <input type="hidden" name="image_name" value="<?= $img ?>">
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>

                                     </div>
                                </div>
                            </div>
                        <?php
                                }
                            }
                            else{
                        ?>
                            <div class="col-12">
                                <p>No gallery images uploaded.</p>
                            </div>
                        <?php } ?>
                    </div>
                </div>

            </div>

        </div>
    </div>
</div>

<?= view('admin/footer') ?>
