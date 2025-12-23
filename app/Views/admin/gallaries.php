<?= view('admin/header') ?>

<style>
    /* 1. Flexbox Gallery Layout */
    .gallery-container {
        display: flex;
        flex-wrap: wrap;
        gap: 20px;
        padding: 20px 0;
    }

    .gallery-item {
        position: relative; /* Base for the corner button */
        flex: 1 1 calc(25% - 20px); 
        min-width: 220px;
        background: #fff;
        border-radius: 10px;
        box-shadow: 0 4px 12px rgba(0,0,0,0.1);
        overflow: hidden;
        transition: transform 0.3s ease;
        cursor: pointer;
    }

    .gallery-item:hover {
        transform: translateY(-5px);
    }

    /* 2. Corner Delete Button */
    .btn-delete-corner {
        position: absolute;
        top: 10px;
        right: 10px;
        background-color: rgba(255, 71, 71, 0.9);
        color: white !important;
        border: none;
        border-radius: 50%;
        width: 32px;
        height: 32px;
        display: flex;
        align-items: center;
        justify-content: center;
        z-index: 5;
        font-size: 14px;
        box-shadow: 0 2px 4px rgba(0,0,0,0.2);
    }

    .btn-delete-corner:hover {
        background-color: #ff0000;
        transform: scale(1.1);
    }

    /* 3. Image Sizing */
    .gallery-img-wrapper {
        width: 100%;
        height: 200px;
    }

    .gallery-img-wrapper img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .gallery-footer {
        padding: 12px;
        text-align: center;
        background: #fafafa;
        font-size: 13px;
        font-weight: 500;
        color: #555;
    }

    /* 4. Modal Fixes */
    #imageModal .modal-content {
        background: transparent;
        border: none;
    }
    #imageModal .modal-header {
        border: none;
        padding: 0;
    }
    #imageModal .close {
        color: white;
        font-size: 35px;
        opacity: 1;
        margin-bottom: 10px;
    }
</style>

<div class="content">
    <div class="container-fluid">
        <div class="row">
            
            <div class="col-md-12">
                <form action="<?= base_url('admin/gallaries/add'); ?>" method="post" enctype="multipart/form-data">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h4 class="card-title">Manage Gallery</h4>
                            <a href="<?= base_url('admin/gallaries') ?>" class="btn btn-primary btn-sm">Back</a>
                        </div>
                        <div class="card-body">
                            <?php if (session()->getFlashdata('success')): ?>
                                <div class="alert alert-success"><?= session()->getFlashdata('success'); ?></div>
                            <?php endif; ?>

                            <div class="row">
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label>Description</label>
                                        <input type="text" name="gallaries_desc" class="form-control" placeholder="What is this image about?" required>
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label>Choose Image</label>
                                        <input type="file" name="gallaries" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <label>&nbsp;</label>
                                    <button type="submit" class="btn btn-success btn-block">Upload Now</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>

            <div class="col-md-12">
                <div class="mt-4">
                    <h4>All Photos</h4>
                    <div class="gallery-container">
                        <?php if(!empty($gallaries)): ?>
                            <?php foreach($gallaries as $row): ?>
                                <div class="gallery-item">

                                    <form action="<?= base_url('admin/gallaries/delete/' . $row['id']) ?>">
                                        <button title="Delete Image" type="submit" class="btn-delete-corner"  onclick="event.stopPropagation(); return confirm('Are you sure you want to delete this image?')"> <i class="la la-trash"></i></button>
                                    </form>

                                    <!-- <a href="<?= base_url('admin/gallaries/delete/' . $row['id']) ?>" 
                                       class="btn-delete-corner" 
                                       title="Delete Image"
                                       onclick="event.stopPropagation(); return confirm('Are you sure you want to delete this image?')">
                                        <i class="la la-trash"></i>
                                    </a> -->

                                    <div class="gallery-img-wrapper" onclick="openPreview('<?= base_url('/uploads/gallaries/' . $row['gallaries']); ?>')">
                                        <img src="<?= base_url('/uploads/gallaries/' . $row['gallaries']); ?>" alt="Gallery Image">
                                    </div>

                                    <!-- <div class="gallery-footer text-truncate">
                                        <? //echo esc($row['gallaries_desc']) ?>
                                    </div> -->
                                </div>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <div class="col-12 text-center text-muted">No images found in gallery.</div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

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
<?= view('admin/footer') ?>
<script>
function openPreview(imageSrc) {
    document.getElementById('modalImage').src = imageSrc;
    $('#imageModal').modal('show');
}
</script>

