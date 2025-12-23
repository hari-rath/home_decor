<?= view('includes/header', ['title' => 'Product Gallery']) ?>

<style>
    /* 1. SECTION & TITLE STYLING */
    .gallery-section {
        margin: 8px;
        padding: 60px 20px;
        background: linear-gradient(rgba(249, 241, 230, 0.85), rgba(249, 241, 230, 0.85)), 
                    url(https://m.media-amazon.com/images/I/61LgBvCNNvL.jpg);
        background-position: center;
        background-size: cover;
        background-repeat: no-repeat;
        border: 3px solid #9b840b;
    }

    .wallpaper-title-box {
        display: inline-block;
        border-bottom: 3px solid #002147;
        padding-bottom: 8px;
        margin-bottom: 20px;
    }

    .wallpaper-title-box h2 {
        font-family: 'Playfair Display', serif;
        color: #fff;
        font-weight: 700;
        text-transform: uppercase;
    }

    /* 2. ENHANCED MULTI-ANGLE CARD */
    .gallery-card {
        background: #fff;
        border-radius: 15px;
        overflow: hidden;
        box-shadow: 0 10px 30px rgba(0,0,0,0.1);
        transition: 0.3s ease;
        height: 100%;
        display: flex;
        flex-direction: column;
    }

    /* Main Image */
    .primary-img-wrapper {
        height: 220px;
        overflow: hidden;
        position: relative;
        cursor: pointer;
    }

    .primary-img-wrapper img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: 0.5s ease;
    }

    .gallery-card:hover .primary-img-wrapper img {
        transform: scale(1.05);
    }

    /* Angle Thumbnails Row */
    .angles-wrapper {
        display: flex;
        gap: 5px;
        padding: 10px;
        background: #fdfdfd;
        border-top: 1px solid #eee;
        overflow-x: auto;
    }

    .angle-thumb {
        width: 60px;
        height: 60px;
        border-radius: 6px;
        cursor: pointer;
        border: 2px solid transparent;
        transition: 0.2s;
        object-fit: cover;
    }

    .angle-thumb:hover {
        border-color: #9b840b;
        transform: translateY(-2px);
    }

    /* Card Text */
    .card-body-content {
        padding: 15px;
        text-align: center;
        flex-grow: 1;
    }

    .card-body-content h6 {
        font-weight: 700;
        color: #002147;
        margin: 0;
    }
</style>

<section class="gallery-section">
    <div class="container">
        <div class="text-center mb-5">
            <div class="wallpaper-title-box">
                <h2>All Gallaries</h2>
            </div>
            <p class="text-muted">High-quality views of our premium collection</p>
        </div>

        <div class="row g-4">
            <?php if(!empty($gallaries)): foreach($gallaries as $row): ?>
            <div class="col-12 col-sm-6 col-lg-4">
                <div class="gallery-card">
                    
                    <div class="primary-img-wrapper" onclick="openPreview('<?= base_url('/uploads/gallaries/' . $row['gallaries']); ?>', '<?= addslashes(esc($row['gallaries_desc'])); ?>')">
                        <img src="<?= base_url('/uploads/gallaries/' . $row['gallaries']); ?>" alt="Main View">
                    </div>

                    <div class="angles-wrapper">
                        <img src="<?= base_url('/uploads/gallaries/' . $row['gallaries']); ?>" 
                             class="angle-thumb" 
                             onclick="openPreview('<?= base_url('/uploads/gallaries/' . $row['gallaries']); ?>', '<?= addslashes(esc($row['gallaries_desc'])); ?>')">
                        
                        <?php 
                        if(!empty($row['angle_images'])): 
                            $angles = explode(',', $row['angle_images']); // Assuming comma separated names
                            foreach($angles as $angle): 
                        ?>
                            <img src="<?= base_url('/uploads/gallaries/angles/' . $angle); ?>" 
                                 class="angle-thumb" 
                                 onclick="openPreview('<?= base_url('/uploads/gallaries/angles/' . $angle); ?>', '<?= addslashes(esc($row['gallaries_desc'])); ?>')">
                        <?php endforeach; endif; ?>
                    </div>

                    <div class="card-body-content">
                        <h6><?= esc($row['gallaries_desc']); ?></h6>
                    </div>
                </div>
            </div>
            <?php endforeach; else: ?>
                <div class="col-12 text-center">
                    <p class="text-muted">No products found.</p>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>

<div class="modal fade" id="imageModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content shadow-2xl border-0">
            <div class="modal-body p-0 position-relative">
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" 
                        style="position: absolute; top: 15px; right: 15px; z-index: 10; background-color: rgba(0,0,0,0.5);"></button>
                
                <img src="" id="modalImage" class="img-fluid w-100" style="max-height: 85vh; object-fit: contain; background: #000;">
                
                <div class="modal-caption p-3 text-center bg-white">
                    <h5 id="modalDescription" class="m-0 text-navy"></h5>
                </div>
            </div>
        </div>
    </div>
</div>

<?= view('includes/footer') ?>

<script>
function openPreview(imageSrc, description) {
    document.getElementById('modalImage').src = imageSrc;
    document.getElementById('modalDescription').innerText = description;
    var myModal = new bootstrap.Modal(document.getElementById('imageModal'));
    myModal.show();
}
</script>