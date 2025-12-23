<?= view('includes/header', ['title' => 'Home']) ?>

<style>
    /* --- CUSTOM THEME STYLING --- */
    .wallpaper-header {
        margin-bottom: 30px;
    }

    .wallpaper-title-box {
        display: inline-block;
        border-bottom: 3px solid #002147; /* Deep Navy */
        padding-bottom: 5px;
        margin-bottom: 15px;
    }

    .wallpaper-title-box h2 {
        font-family: 'Playfair Display', serif;
        font-weight: 700;
        color: #fff;
        text-transform: uppercase;
        letter-spacing: 1px;
    }

    /* --- GALLERY & COLLECTION GRID --- */
    .gallery-container {
        position: relative;
        transition: transform 0.3s ease;
    }

    .gallery-img-frame, .wallpaper-card {
        position: relative;
        overflow: hidden;
        border-radius: 8px;
        box-shadow: 0 4px 12px rgba(0,0,0,0.1);
        height: 280px; /* Fixed height for uniformity */
        cursor: pointer;
        background-color: #f8f9fa;
    }

    .gallery-img-frame img, .wallpaper-card img {
        width: 100%;
        height: 100%;
        object-fit: cover; /* Keeps aspect ratio perfect */
        transition: transform 0.5s ease;
    }

    .gallery-container:hover .gallery-img-frame img, 
    .wallpaper-card:hover img {
        transform: scale(1.1);
    }

    .gallery-title {
        color: #002147;
        font-weight: 600;
        margin-top: 12px;
    }

    /* --- FEATURED PRODUCT CARDS --- */
    .pdf-card-container {
        margin-bottom: 60px;
    }

    .pdf-card-title {
        font-family: 'Playfair Display', serif;
        font-size: 2.5rem;
        color: #002147;
    }

    .pdf-card-subtitle {
        color: #b8860b; /* Muted Gold */
        text-transform: uppercase;
        letter-spacing: 2px;
        font-weight: 600;
        font-size: 0.9rem;
    }

    .pdf-card-btn {
        background-color: #002147;
        color: #fff;
        padding: 12px 30px;
        border: none;
        border-radius: 0;
        transition: 0.3s;
    }

    .pdf-card-btn:hover {
        background-color: #b8860b;
        color: #fff;
    }

    /* --- MODAL STYLING --- */
    .modal-content {
        background: transparent;
        border: none;
    }
    
    .btn-close-custom {
        color: white;
        font-size: 2rem;
        background: none;
        border: none;
        float: right;
        opacity: 0.8;
    }

    .btn-close-custom:hover { opacity: 1; }
    .products_section{

    }
    #wallpaper{
         margin: 8px;
    padding: 60px 20px; /* Added padding so content doesn't touch the borders */
    
    /* Watermark Effect: The gradient goes on top of the URL */
    /* rgba(249, 241, 230, 0.85) matches your #f9f1e6 color but with 85% opacity */
    background: linear-gradient(
        rgba(249, 241, 230, 0.85), 
        rgba(249, 241, 230, 0.85)
    ), 
    url(https://m.media-amazon.com/images/I/61LgBvCNNvL.jpg);
    
    background-position: center;
    background-size: cover; /* Ensures the image fills the section */
    background-repeat: no-repeat;
     border: 3px solid #9b840b;
    }
</style>

<div id="mainCarousel" class="carousel slide carousel-fade" data-bs-ride="carousel">
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="https://images.pexels.com/photos/271816/pexels-photo-271816.jpeg?cs=srgb&dl=pexels-pixabay-271816.jpg&fm=jpg" class="d-block w-100" style="height: 70vh; object-fit: cover;" alt="Slide 1" />
            <div class="carousel-caption">
                <h1>A Complete Furnishing Solution</h1>
                <p>Premium Quality &amp; Trusted Brands</p>
            </div>
        </div>
        <div class="carousel-item">
            <img src="https://c4.wallpaperflare.com/wallpaper/215/944/975/warm-and-modern-living-room-living-room-set-wallpaper-preview.jpg" class="d-block w-100" style="height: 70vh; object-fit: cover;" alt="Slide 2" />
            <div class="carousel-caption">
                <h1>Elegant Interior Designs</h1>
                <p>Transform Your Living Space</p>
            </div>
        </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#mainCarousel" data-bs-slide="prev">
        <span class="carousel-control-prev-icon"></span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#mainCarousel" data-bs-slide="next">
        <span class="carousel-control-next-icon"></span>
    </button>
</div>

<section id="about" class="py-5 text-center">
    <div class="container">
        <div class="row">
            <div class="col-md-12 mb-5">
                <div class="wallpaper-header">
                    <div class="wallpaper-title-box">
                        <h2 class="mb-0">OUR COLLECTIONS</h2>
                    </div>
                    <h6 class="text-muted mt-3 px-md-5">
                        Deep Home Decor is your one‑stop destination for premium home furnishing and décor solutions, offering bedding, blinds, flooring, curtains, and wallpapers in one place.
                    </h6>
                </div>
            </div>
            <div class="col-md-12">
                <div class="wallpaper-header">
                    <div class="wallpaper-title-box">
                        <h2 class="mb-0">WHY CHOOSE US</h2>
                    </div>
                    <h6 class="text-muted mt-3 px-md-5">
                        The theme combines deep navy blue with muted gold and elegant serif headings for a luxurious, brochure‑style feel.
                    </h6>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="collections" class="py-5 bg-light">
    <div class="container">
       
        <div class="row g-4">
            <div class="col-md-12">
                 <div class="wallpaper-header text-center mb-1 float-lg-start">
                    <div class="wallpaper-title-box">
                        <h2 class="mb-0">EXPLORE CATEGORIES</h2>
                    </div>
                </div>
            </div>
            <?php if(isset($Categorys)): foreach($Categorys as $row): ?>
            <div class="col-md-4">
                 <a href="<?php echo base_url('category_wise_products/').$row['id']; ?>" class="category_wise_products" style="text-decoration:none;">
                <div class="gallery-container text-center">
                    <div class="gallery-img-frame">
                        <img src="<?= base_url('uploads/products/category_primary_image/').$row['category_primary_image']; ?>" alt="<?= $row['category_name']; ?>" />
                    </div>
                    <h6 class="gallery-title"><?= $row['category_name']; ?></h6>
                </div>
            </a>
            </div>
            <?php endforeach; endif; ?>
        </div>
    </div>
</section>
<!-- FEATURED BEDDING & FLOORING -->
<section id="bedding" class="py-5" >
   <div class="container">
      <!-- Bedding card -->
      <div class="row align-items-center pdf-card-container">
         <div class="col-md-6">
            <div class="pdf-card-frame">
               <img
                  src="<?php echo base_url().'uploads/products/primary_images/'. $latestProduct['primary_image']; ?>"
                  class="pdf-card-img"
                  alt="<?php echo $latestProduct['product_name']; ?>"
                  />
            </div>
         </div>
         <div class="col-md-6 ps-md-5 mt-4 mt-md-0">
            <h2 class="pdf-card-title"><?php echo $latestProduct['product_name']; ?></h2>
            <p class="pdf-card-subtitle"><?php echo $latestProduct['product_title']; ?></p>
            <p class="text-muted pdf-card-text">
               <?php echo $latestProduct['product_description']; ?>
            </p>
            <a href="<?php echo base_url('product_details/').$latestProduct['id']; ?>" class="pdf-card-btn" style="text-decoration:none">View More</a>
         </div>
      </div>
      <!-- Flooring card -->
      <div class="row align-items-center flex-md-row-reverse pdf-card-container">
         <div class="col-md-6">
            <div class="pdf-card-frame">
               <img
                  src="<?php echo base_url().'uploads/products/primary_images/'. $latestsecondProduct['primary_image']; ?>"
                  class="pdf-card-img"
                  alt="<?php echo $latestsecondProduct['product_name']; ?>"
                  />
            </div>
         </div>
         <div class="col-md-6 pe-md-5 mt-4 mt-md-0">
            <h2 class="pdf-card-title"><?php echo $latestsecondProduct['product_name']; ?></h2>
            <p class="pdf-card-subtitle"><?php echo $latestsecondProduct['product_title']; ?></p>
            <p class="text-muted pdf-card-text">
               <?php echo $latestsecondProduct['product_description']; ?>
            </p>
            <a href="<?php echo base_url('product_details/').$latestsecondProduct['id']; ?>" class="pdf-card-btn" style="text-decoration:none">View More</a>
         </div>
      </div>
   </div>
</section>

<section id="wallpaper" class="py-5 ">
    <div class="container">
        
        <div class="row g-4">
            <div class="col-lg-12">
                <div class="wallpaper-header text-left mb-2">
                    <div class="wallpaper-title-box" style="border-color: #fff;">
                        <h2 class="mb-0 text-white text-left">PHOTO GALLERIES</h2>
                    </div>
                    <p class="text-black mt-2">Wall is just like a blank canvas, introducing an aesthetic touch to your dream home.</p>
                </div>

            </div>
            <?php if(!empty($gallaries)): foreach($gallaries as $row): ?>
            <div class="col-12 col-md-4">
                <div class="wallpaper-card shadow" onclick="openPreview('<?= base_url('/uploads/gallaries/' . $row['gallaries']); ?>')">
                    <img src="<?= base_url('/uploads/gallaries/' . $row['gallaries']); ?>" alt="Gallery Image" />
                </div>
            </div>
            <?php endforeach; endif; ?>
            <div class="col-lg-12 text-center">
                <a href="<?php echo base_url('all_gallaries'); ?>" class="pdf-card-btn">View More</a>
            </div>
        </div>
    </div>
</section>

<div class="modal fade" id="imageModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="w-100 overflow-hidden mb-2">
                <button type="button" class="btn-close-custom" data-bs-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body p-0">
                <img src="" id="modalImage" class="img-fluid rounded shadow-lg w-100">
            </div>
        </div>
    </div>
</div>

<?= view('includes/footer') ?>

<script>
function openPreview(imageSrc) {
    document.getElementById('modalImage').src = imageSrc;
    // Using Bootstrap 5 native JS
    var myModal = new bootstrap.Modal(document.getElementById('imageModal'));
    myModal.show();
}
</script>