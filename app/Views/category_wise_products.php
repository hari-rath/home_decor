<?= view('includes/header', ['title' => 'Product Gallery']) ?>

<style>
    .gallery-section {
        margin: 8px;
        padding: 60px 20px;
        background: linear-gradient(rgba(249, 241, 230, 0.9), rgba(249, 241, 230, 0.9)), 
                    url(https://m.media-amazon.com/images/I/61LgBvCNNvL.jpg);
        background-size: cover;
        border: 3px solid #9b840b;
    }

    .product-card {
        background: #fff;
        border-radius: 15px;
        overflow: hidden;
        box-shadow: 0 10px 25px rgba(0,0,0,0.1);
        height: 100%;
        display: flex;
        flex-direction: column;
        border: 1px solid #eee;
    }

    /* Main Featured Image */
    .primary-img-holder {
        height: 250px;
        overflow: hidden;
        cursor: pointer;
    }
    .primary-img-holder img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: 0.4s ease;
    }

    /* Multi-Angle Strip */
    .thumb-strip {
        display: flex;
        gap: 8px;
        padding: 12px;
        background: #fafafa;
        border-top: 1px solid #eee;
        overflow-x: auto;
    }
    .thumb-img {
        width: 55px;
        height: 55px;
        border-radius: 6px;
        object-fit: cover;
        cursor: pointer;
        border: 2px solid #ddd;
        transition: 0.2s;
    }
    .thumb-img:hover {
        border-color: #9b840b;
        transform: translateY(-2px);
    }

    .product-caption {
        padding: 15px;
        text-align: left;
    }
    .product-caption h6 {
        font-family: 'Playfair Display', serif;
        font-weight: 700;
        color: #002147;
        margin: 0;
    }
    
</style>

<section class="gallery-section">
    <div class="container">
        <div class="row mb-3">
            <div class="col-md-12">
                <div class="wallpaper-header text-center mb-1 float-lg-start">
                    <div class="wallpaper-title-box">
                        <h2 class="mb-0"><?php echo category_name($category_id); ?></h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="row g-4">
            <?php if(!empty($category_wise_products)): foreach($category_wise_products as $row): ?>
            <div class="col-12 col-md-4">
                <div class="product-card">
                    
                    <div class="primary-img-holder" onclick="openFullImg('<?= base_url('/uploads/products/primary_images/' . $row['primary_image']); ?>', '<?= addslashes(esc($row['product_name'])); ?>')">
                        <img src="<?= base_url('/uploads/products/primary_images/' . $row['primary_image']); ?>" alt="Primary View">
                    </div>

                    <div class="thumb-strip">
                        <img src="<?= base_url('/uploads/products/primary_images/' . $row['primary_image']); ?>" 
                             class="thumb-img" onclick="openFullImg(this.src, '<?= addslashes(esc($row['product_name'])); ?>')">

                        <?php 
                        // Decode the JSON string from your database
                        $gallery = json_decode($row['gallery_images'], true); 
                        if(!empty($gallery)): 
                            foreach($gallery as $imgName): 
                        ?>
                            <img src="<?= base_url('/uploads/products/gallery_images/' . $imgName); ?>" 
                                 class="thumb-img" 
                                 onclick="openFullImg(this.src, '<?= addslashes(esc($row['product_name'])); ?>')">
                        <?php endforeach; endif; ?>
                    </div>

                    <div class="product-caption text-left">
                        <h6><?= esc($row['product_name']); ?></h6>
                        <small class="text-muted float-end"><?= esc($row['product_title']); ?></small>

                        <?php if($row['amazon_links']!='' && !empty($row['amazon_links'])) { ?>
                        <a target="_blank" href="<?php echo  $row['amazon_links'] ?>" class=""><img src="<?php echo base_url('assets/images/amazon.png'); ?>" style="height:31px"></a>
                           <?php  } ?>
                           <?php if($row['flipkart_links']!='' && !empty($row['flipkart_links'])) { ?>
                        <a target="_blank" href="<?php echo  $row['flipkart_links'] ?>" class=""><img src="<?php echo base_url('assets/images/flipkart.png'); ?>" style="height:40px"></a>
                           <?php  } ?>

                    </div>
                </div>
            </div>
            <?php endforeach; endif; ?>
        </div>
    </div>
</section>

<div class="modal fade" id="imgModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content border-0 bg-transparent">
            <div class="modal-body p-0 text-center position-relative">
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" style="position: absolute; top: -35px; right: 0;"></button>
                <img src="" id="targetImg" class="img-fluid rounded shadow-lg" style="max-height: 85vh;">
                <div class="bg-white p-3 rounded-bottom mt-1">
                    <h5 id="targetTitle" class="m-0 text-dark"></h5>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
function openFullImg(src, title) {
    document.getElementById('targetImg').src = src;
    document.getElementById('targetTitle').innerText = title;
    var myModal = new bootstrap.Modal(document.getElementById('imgModal'));
    myModal.show();
}
</script>

<?= view('includes/footer') ?>