<?= view('includes/header', ['title' => 'Our Decoration Services']) ?>

<style>
    .service-card {
        transition: all 0.3s ease;
        border: none;
        border-radius: 15px;
        overflow: hidden;
        background: #fff;
    }
    .service-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 15px 30px rgba(0,0,0,0.1) !important;
    }
    .service-img-wrapper {
        height: 250px;
        overflow: hidden;
        background-color: #eee; /* Placeholder color if image fails */
    }
    .service-img-wrapper img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.5s ease;
    }
    .service-card:hover .service-img-wrapper img {
        transform: scale(1.1);
    }
    .icon-box {
        width: 50px;
        height: 50px;
        background: #fff3cd;
        color: #856404;
        border-radius: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-bottom: 15px;
    }
</style>

<div class="py-5 text-center" style="background: linear-gradient(rgba(0,0,0,0.7), rgba(0,0,0,0.7)), url('https://images.pexels.com/photos/1571460/pexels-photo-1571460.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1') center/cover; color: white;">
    <div class="container py-5">
        <h1 class="fw-bold display-4">Our Premium Services</h1>
        <p class="lead">Bringing elegance and comfort to every corner of your home.</p>
    </div>
</div>

<section class="py-5 bg-light">
    <div class="container">
        <div class="row g-4">
            
            <div class="col-md-4">
                <div class="card h-100 shadow-sm service-card">
                    <div class="service-img-wrapper">
                        <img src="https://images.pexels.com/photos/1571468/pexels-photo-1571468.jpeg?auto=compress&cs=tinysrgb&w=800" alt="Living Room Decor">
                    </div>
                    <div class="card-body p-4">
                        <div class="icon-box"><i class="bi bi-lamp-fill fs-4"></i></div>
                        <h4 class="fw-bold">Living Room Styling</h4>
                        <p class="text-muted small">From luxury sofa sets to customized wall units, we create the perfect first impression for your home.</p>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card h-100 shadow-sm service-card">
                    <div class="service-img-wrapper">
                        <img src="https://images.pexels.com/photos/1080721/pexels-photo-1080721.jpeg?auto=compress&cs=tinysrgb&w=800" alt="Modular Kitchen">
                    </div>
                    <div class="card-body p-4">
                        <div class="icon-box"><i class="bi bi-grid-3x3-gap-fill fs-4"></i></div>
                        <h4 class="fw-bold">Modular Kitchens</h4>
                        <p class="text-muted small">Elegant, space-saving designs with premium finishes that make cooking a delightful experience.</p>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card h-100 shadow-sm service-card">
                    <div class="service-img-wrapper">
                        <img src="https://images.pexels.com/photos/164595/pexels-photo-164595.jpeg?auto=compress&cs=tinysrgb&w=800" alt="Bedroom Interior">
                    </div>
                    <div class="card-body p-4">
                        <div class="icon-box"><i class="bi bi-door-closed-fill fs-4"></i></div>
                        <h4 class="fw-bold">Bedroom Sanctuary</h4>
                        <p class="text-muted small">We design cozy and functional bedrooms with custom wardrobes and mood lighting for relaxation.</p>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card h-100 shadow-sm service-card">
                    <div class="service-img-wrapper">
                        <img src="https://images.pexels.com/photos/271816/pexels-photo-271816.jpeg?auto=compress&cs=tinysrgb&w=800" alt="False Ceiling">
                    </div>
                    <div class="card-body p-4">
                        <div class="icon-box"><i class="bi bi-layers-fill fs-4"></i></div>
                        <h4 class="fw-bold">Ceiling & POP Work</h4>
                        <p class="text-muted small">Give your home a modern look with designer false ceilings and hidden cove lighting.</p>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card h-100 shadow-sm service-card">
                    <div class="service-img-wrapper">
                        <img src="https://images.pexels.com/photos/1722183/pexels-photo-1722183.jpeg?auto=compress&cs=tinysrgb&w=800" alt="Wallpaper">
                    </div>
                    <div class="card-body p-4">
                        <div class="icon-box"><i class="bi bi-paint-bucket fs-4"></i></div>
                        <h4 class="fw-bold">Wall Treatments</h4>
                        <p class="text-muted small">Premium texture painting and designer wallpapers that add personality to your walls.</p>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card h-100 shadow-sm service-card">
                    <div class="service-img-wrapper">
                        <img src="https://images.pexels.com/photos/667838/pexels-photo-667838.jpeg?auto=compress&cs=tinysrgb&w=800" alt="Office Decor">
                    </div>
                    <div class="card-body p-4">
                        <div class="icon-box"><i class="bi bi-briefcase-fill fs-4"></i></div>
                        <h4 class="fw-bold">Work From Home</h4>
                        <p class="text-muted small">Ergonomic and professional home office setups designed to boost productivity and comfort.</p>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

<?= view('includes/footer') ?>