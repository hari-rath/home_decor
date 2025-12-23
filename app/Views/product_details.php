<?= view('includes/header', ['title' => 'Product Details']) ?>

<style>
    /* 1. CONTAINER & BACKGROUND */
    .detail-container {
        margin: 8px;
        padding: 60px 20px;
        background: linear-gradient(rgba(249, 241, 230, 0.85), rgba(249, 241, 230, 0.85)), 
                    url(https://m.media-amazon.com/images/I/61LgBvCNNvL.jpg);
        background-position: center;
        background-size: cover;
        background-repeat: no-repeat;
        border: 3px solid #9b840b;
    }

    /* 2. THE MAIN CARD */
    .product-detail-card {
        background: #fff;
        border-radius: 2px;
        box-shadow: 0 15px 50px rgba(0,0,0,0.08);
        border: 1px solid #eee;
        padding: 40px;
    }

    /* 3. MAIN IMAGE VIEWER */
    .main-preview-box {
        border: 1px solid #ddd;
        padding: 15px;
        background: #fff;
        height: 450px;
        display: flex;
        align-items: center;
        justify-content: center;
        overflow: hidden;
        cursor: zoom-in;
    }

    .main-preview-box img {
        max-width: 100%;
        max-height: 100%;
        object-fit: contain;
        transition: 0.3s ease;
    }

    /* 4. RESPONSIVE THUMBNAILS */
    .angle-selector {
        display: flex;
        gap: 12px;
        margin-top: 20px;
        overflow-x: auto; /* Enable swipe on mobile */
        padding-bottom: 10px;
        -webkit-overflow-scrolling: touch;
    }

    /* Hide scrollbar for clean look but keep functionality */
    .angle-selector::-webkit-scrollbar {
        height: 5px;
    }
    .angle-selector::-webkit-scrollbar-thumb {
        background: #9b840b;
        border-radius: 10px;
    }

    .angle-box {
        flex: 0 0 80px; /* Do not shrink, stay 80px wide */
        height: 80px;
        border: 1px solid #ddd;
        padding: 5px;
        cursor: pointer;
        transition: 0.3s;
        background: #fff;
    }

    .angle-box:hover, .angle-box.active {
        border-color: #002147;
        background: #fdfaf5;
        transform: translateY(-2px);
    }

    .angle-box img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    /* 5. PRODUCT INFO TEXT */
    .product-info-column {
        padding-left: 40px;
    }

    .product-main-title {
        font-family: 'Playfair Display', serif;
        font-size: 3.5rem;
        color: #002147;
        margin-bottom: 5px;
        text-transform: lowercase;
    }

    .product-tagline {
        color: #b8860b;
        text-transform: uppercase;
        font-weight: 700;
        letter-spacing: 2px;
        font-size: 0.9rem;
        margin-bottom: 20px;
    }

    .product-desc-text {
        color: #666;
        line-height: 1.8;
        font-size: 1.1rem;
        margin-bottom: 30px;
    }

    /* 6. MODAL STYLES */
    .modal-content {
        background: transparent;
        border: none;
    }
    .modal-body {
        padding: 0;
        position: relative;
    }
    .btn-close-custom {
        position: absolute;
        top: -45px;
        right: 0;
        background: none;
        border: none;
        color: #fff;
        font-size: 2.5rem;
        line-height: 1;
        opacity: 0.8;
    }

    /* 7. MOBILE RESPONSIVENESS (Media Queries) */
    @media (max-width: 991px) {
        .product-info-column {
            padding-left: 0;
            margin-top: 40px;
        }
        .product-main-title {
            font-size: 2.5rem;
        }
        .main-preview-box {
            height: 350px;
        }
    }

    @media (max-width: 576px) {
        .product-detail-card {
            padding: 20px;
        }
        .angle-box {
            flex: 0 0 70px;
            height: 70px;
        }
        .product-main-title {
            font-size: 2rem;
        }
    }
</style>



<section class="detail-container">
    <div class="container">
        <a href="javascript:history.back()" class="text-decoration-none mb-4 d-inline-block" style="color: #002147;">
            <i class="fa fa-arrow-left me-2"></i> Back to Gallery
        </a>

        <?php if(!empty($product)): ?>
        <div class="product-detail-card">
            <div class="row">
                <div class="col-lg-7">
                    <div class="main-preview-box" onclick="openPopup(document.getElementById('mainViewer').src)">
                        <img id="mainViewer" src="<?= base_url('/uploads/products/primary_images/' . $product['primary_image']); ?>" alt="<?= esc($product['product_name']); ?>">
                    </div>
                    
                    <div class="angle-selector">
                        <div class="angle-box active" onclick="updateViewer(this, '<?= base_url('/uploads/products/primary_images/' . $product['primary_image']); ?>')">
                            <img src="<?= base_url('/uploads/products/primary_images/' . $product['primary_image']); ?>">
                        </div>

                        <?php 
                        $gallery = json_decode($product['gallery_images'], true);
                        if(!empty($gallery)): 
                            foreach($gallery as $img): 
                        ?>
                        <div class="angle-box" onclick="updateViewer(this, '<?= base_url('/uploads/products/gallery_images/' . $img); ?>')">
                            <img src="<?= base_url('/uploads/products/gallery_images/' . $img); ?>">
                        </div>
                        <?php endforeach; endif; ?>
                    </div>
                </div>

                <div class="col-lg-5">
                    <div class="product-info-column">
                        <h1 class="product-main-title"><?= esc($product['product_name']); ?></h1>
                        <p class="product-tagline"><?= esc($product['product_title']); ?></p>
                        
                        <div class="product-desc-text">
                            <?= nl2br(esc($product['product_description'])); ?>
                        </div>

                        <div class="action-row border-top pt-4">
                            <a href="https://wa.me/+917894348111?text=I'm interested in <?= urlencode($product['product_name']); ?>" class="btn btn-dark px-5 py-3 rounded-0 text-uppercase fw-bold" target="_blank">
                                <i class="fa fa-whatsapp me-2"></i> Enquire Now
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php else: ?>
            <div class="alert alert-warning text-center">Product details not found.</div>
        <?php endif; ?>
    </div>
</section>

<div class="modal fade" id="imagePopupModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-body text-center">
                <button type="button" class="btn-close-custom" data-bs-dismiss="modal">&times;</button>
                <img src="" id="popupImg" class="img-fluid shadow-lg rounded">
            </div>
        </div>
    </div>
</div>

<script>
/**
 * Updates the card viewer and highlights the active thumbnail.
 */
function updateViewer(element, src) {
    // Update main display image
    document.getElementById('mainViewer').src = src;

    // Update active class
    document.querySelectorAll('.angle-box').forEach(box => box.classList.remove('active'));
    element.classList.add('active');
}

/**
 * Opens the high-resolution image in the modal popup.
 */
function openPopup(src) {
    const popupImg = document.getElementById('popupImg');
    popupImg.src = src;
    
    const modalElement = document.getElementById('imagePopupModal');
    const myModal = new bootstrap.Modal(modalElement);
    myModal.show();
}
</script>

<?= view('includes/footer') ?>