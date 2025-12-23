<?= view('includes/header', ['title' => 'Home']) ?>
<!-- HERO CAROUSEL -->
<div
   id="mainCarousel"
   class="carousel slide carousel-fade"
   data-bs-ride="carousel"
   >
   <div class="carousel-inner">
      <div class="carousel-item active">
         <img
            src="https://images.pexels.com/photos/271816/pexels-photo-271816.jpeg?cs=srgb&dl=pexels-pixabay-271816.jpg&fm=jpg"
            class="d-block w-100"
            alt="..."
            />
         <div class="carousel-caption">
            <h1>A Complete Furnishing Solution</h1>
            <p>Premium Quality &amp; Trusted Brands</p>
         </div>
      </div>
      <div class="carousel-item">
         <img
            src="https://c4.wallpaperflare.com/wallpaper/215/944/975/warm-and-modern-living-room-living-room-set-wallpaper-preview.jpg"
            class="d-block w-100"
            alt="..."
            />
         <div class="carousel-caption">
            <h1>A Complete Furnishing Solution</h1>
            <p>Premium Quality &amp; Trusted Brands</p>
         </div>
      </div>
      <div class="carousel-item">
         <img
            src="https://images.unsplash.com/photo-1631679706909-1844bbd07221?fm=jpg&q=60&w=3000"
            class="d-block w-100"
            alt="..."
            />
         <div class="carousel-caption">
            <h1>A Complete Furnishing Solution</h1>
            <p>Premium Quality &amp; Trusted Brands</p>
         </div>
      </div>
   </div>
   <button
      class="carousel-control-prev"
      type="button"
      data-bs-target="#mainCarousel"
      data-bs-slide="prev"
      >
   <span class="carousel-control-prev-icon" aria-hidden="true"></span>
   <span class="visually-hidden">Previous</span>
   </button>
   <button
      class="carousel-control-next"
      type="button"
      data-bs-target="#mainCarousel"
      data-bs-slide="next"
      >
   <span class="carousel-control-next-icon" aria-hidden="true"></span>
   <span class="visually-hidden">Next</span>
   </button>
</div>
<!-- WHY CHOOSE US -->
<section id="about" class="py-5 text-center " >
   <div class="container">
      <div class="col-md-12">
         <div class="wallpaper-header">
            <div class="wallpaper-title-box">
               <h2 class="mb-0">OUR COLLECTIONS</h2>
            </div>
            <div class="col-md-12 text-left">
               <h6 class="  text-left mt-4">
                  Deep Home Decor is your one‑stop destination for premium home
                  furnishing and décor solutions, offering bedding, blinds, flooring,
                  curtains, and wallpapers in one place.  The theme combines deep navy blue with muted gold and elegant
                  serif headings for a luxurious, brochure‑style feel. <br> 
               </h6>
            </div>
         </div>
      </div>
      <div class="col-md-12 mt-5">
         <div class="wallpaper-header">
            <div class="wallpaper-title-box">
               <h2 class="mb-0">WHY CHOOSE US</h2>
            </div>
            <div class="col-md-12 text-left">
               <h6 class="  text-left mt-4">
                  Deep Home Decor is your one‑stop destination for premium home
                  furnishing and décor solutions, offering bedding, blinds, flooring,
                  curtains, and wallpapers in one place.   The theme combines deep navy blue with muted gold and elegant
                  serif headings for a luxurious, brochure‑style feel.
               </h6>
            </div>
         </div>
      </div>
   </div>
   <!-- <div class="container">
      <h2 class="section-title">WHY CHOOSE US</h2>
      <div class="row mt-4">
          
          <div class="col-md-8 offset-md-2">
              <p class="lead">
                  Deep Home Decor is your one‑stop destination for premium home
                  furnishing and décor solutions, offering bedding, blinds, flooring,
                  curtains, and wallpapers in one place.
              </p>
              <p class="lead">
                  The theme combines deep navy blue with muted gold and elegant
                  serif headings for a luxurious, brochure‑style feel.
              </p>
          </div>
      </div>
      </div> -->
</section>
<!-- OUR COLLECTIONS GRID -->
<section id="collections" class="py-5">
   <div class="container">
      <div class="row g-4">
         <div class="col-md-12">
            <div class="col-md-6">
               <div class="wallpaper-header">
                  <div class="wallpaper-title-box">
                     <h2 class="mb-0">OUR COLLECTIONS</h2>
                  </div>
                  <p class="wallpaper-subtitle mt-2">
                     Wall is just like a blank canvas, by choosing a wallpaper you are
                     introducing an aesthetic touch to your dream home.
                  </p>
               </div>
            </div>
         </div>
         <?php if(isset($Categorys)){ foreach($Categorys as $row) {  ?>
         <div class=" col-md-4">
            <div class="gallery-container">
               <div class="gallery-img-frame">
                  <img
                     src="<?php echo base_url('uploads/products/category_primary_image/').$row['category_primary_image']; ?>"
                     class="gallery-img"
                     alt="<?php echo $row['category_name']; ?>"
                     />
               </div>
               <!-- <div class="gallery-label">CURTAINS</div> -->
               <h6 class="mt-2 mb-0 gallery-title"><?php echo $row['category_name']; ?></h6>
            </div>
         </div>
         <?php }} ?>
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
            <button class="pdf-card-btn">View More</button>
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
            <button class="pdf-card-btn">View More</button>
         </div>
      </div>
   </div>
</section>
<!-- WALLPAPER PAGE STYLE SECTION -->
<section id="wallpaper" class="py-5 wallpaper-section">
   <div class="container wallpaper-page">
      <div class="wallpaper-header">
         <div class="wallpaper-title-box">
            <h2 class="mb-0">Gallaries</h2>
         </div>
         <p class="wallpaper-subtitle mt-2">
            Wall is just like a blank canvas, by choosing a wallpaper you are
            introducing an aesthetic touch to your dream home.
         </p>
      </div>
      <div class="row g-4">
         <!-- top row -->
         <?php if(!empty($gallaries)): ?>
         <?php foreach($gallaries as $row): ?>
         <div class="col-12 col-md-4">
            <div class="wallpaper-card">
               <img onclick="openPreview('<?= base_url('/uploads/gallaries/' . $row['gallaries']); ?>')"
                  src="<?= base_url('/uploads/gallaries/' . $row['gallaries']); ?>"
                  alt="Wallpaper 1"
                  />
            </div>
         </div>
         <?php endforeach; ?>
         <?php endif; ?>
      </div>
   </div>
</section>
<div class="modal fade" id="imageModal" tabindex="-1" role="dialog" aria-hidden="true">
   <div class="modal-dialog modal-dialog-centered modal-lg">
      <div class="modal-content text-right">
         <button type="button" class="close" data-dismiss="modal">&times;</button>
         <div class="modal-body p-0">
            <img src="" id="modalImage" class="img-fluid rounded">
         </div>
      </div>
   </div>
</div>
<?php echo view('includes/footer'); ?>
<script>
   function openPreview(imageSrc) {
       document.getElementById('modalImage').src = imageSrc;
       $('#imageModal').modal('show');
   }
</script>