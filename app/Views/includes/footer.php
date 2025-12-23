<footer class="footer-section">
    <div class="container-fluid">
        <div class="footer-cta pt-2 pb-1">
            <div class="row">
                <div class="col-xl-3 col-md-4 mb-5">
                    <div class="single-cta">
                        <i class="fas fa-map-marker-alt"></i>
                        <div class="cta-text">
                            <h4>Find us</h4>
                            <span> Jagannath Nagar (Near Lane 6), Main Road, Bhubaneswar – 751006</span>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-4 mb-5">
                    <div class="single-cta">
                        <i class="fas fa-phone"></i>
                        <div class="cta-text">
                            <h4>Call us</h4>
                            <span><a class="call_tag" href="tel:+917894348111">+91 7894348111</a></span><br>
                            <span><a class="call_tag" href="tel:+919437255858">+91 9437255858</a></span><br>
                            <span><a class="call_tag" href="tel:+918093125103">+91 8093125103</a></span>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-4 mb-5">
                    <div class="single-cta">
                        <i class="far fa-envelope-open"></i>
                        <div class="cta-text">
                            <h4>Mail us</h4>
                            <span>deephomedecor1@gmail.com</span>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-4 mb-5">
                    <div class="">
                        
                        <div class="cta-text">
                            <h4>Follow Us</h4>
                           <div class="footer-social-icon">
                           
                            <a href="#"><i class="fab fa-facebook-f facebook-bg"></i></a>
                            <a href="#"><i class="fab fa-twitter twitter-bg"></i></a>
                            <a href="#"><i class="fab fa-google-plus-g google-bg"></i></a>
                        </div>
                        </div>
                    </div>
                </div>
               
            </div>
        </div>
       
    </div>

</footer>
<div class="copyright-area">
    <div class="container">
        <div class="row">
            <div class="col-xl-12 col-lg-12 text-center text-lg-center">
                <div class="copyright-text">
                    <p>Copyright &copy;
                        <?php echo date('Y'); ?>, All Right Reserved
                    </p>
                </div>
            </div>
            <div class="col-xl-6 col-lg-6 d-none d-lg-block text-right">
                <div class="footer-menu">
                    <!-- <ul>
                                <li><a href="#">Home</a></li>
                                <li><a href="#">Terms</a></li>
                                <li><a href="#">Privacy</a></li>
                                <li><a href="#">Policy</a></li>
                                <li><a href="#">Contact</a></li>
                            </ul> -->
                </div>
            </div>
        </div>
    </div>
</div>
<!-- FOOTER -->
<a href="https://wa.me/917894348111" target="_blank" id="whatsapp-btn" class="whatsapp-button" aria-label="Contact us">
    <i class="bi bi-whatsapp"></i>
</a>

<div class="modal fade" id="autoContactModal" tabindex="-1" aria-labelledby="contactModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 shadow-lg">
            <div class="card">
                <div class="card-body">
                    <div class="modal-header bg-warning text-dark border-0">
                        <h5 class="modal-title fw-bold" id="contactModalLabel">Get in Touch</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body p-4">
                    <?php if (session()->getFlashdata('success')): ?>
                  <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
                  <?php endif; ?>
                  <?php if (session()->getFlashdata('error')): ?>
                  <div class="alert alert-danger"><?= session()->getFlashdata('error') ?></div>
                  <?php endif; ?>

                        <p class="text-muted mb-4">How can we help you? Please write your query.</p>

                        <form action="<?= base_url('savecontact'); ?>" method="post">
                            <?= csrf_field() ?>
                            <div class="mb-3">
                                <label class="form-label fw-semibold">Full Name *</label>
                                <input type="text" name="fullname" class="form-control" required>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label fw-semibold">Email</label>
                                    <input type="email" name="email" class="form-control">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label fw-semibold">Phone *</label>
                                    <input type="tel" name="phone" class="form-control" required>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label fw-semibold">Subject</label>
                                <input type="text" name="subject" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label class="form-label fw-semibold">Message</label>
                                <textarea name="message" class="form-control" rows="3"></textarea>
                            </div>
                            <div class="text-center d-grid">
                                <button type="submit" class="btn btn-warning fw-bold py-2">
                                    Send Enquiry
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="statusMessageModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-sm">
        <div class="modal-content border-0 shadow-lg text-center">
            <div class="card">
                <div class="card-body">

                    <div class="modal-body p-5">
                        <?php if (session()->getFlashdata('success')): ?>
                            <div class="mb-4">
                                <i class="fa fa-check-circle text-success" style="font-size: 4rem;"></i>
                            </div>
                            <h4 class="fw-bold">Success!</h4>
                            <p class="text-muted"><?= session()->getFlashdata('success') ?></p>
                        <?php endif; ?>
        
                        <?php if (session()->getFlashdata('error')): ?>
                            <div class="mb-4">
                                <i class="fa fa-times-circle text-danger" style="font-size: 4rem;"></i>
                            </div>
                            <h4 class="fw-bold">Oops!</h4>
                            <p class="text-muted"><?= session()->getFlashdata('error') ?></p>
                        <?php endif; ?>
        
                        <button type="button" class="btn btn-dark w-100 rounded-pill mt-3" data-bs-dismiss="modal">Continue</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener("DOMContentLoaded", function() {
    // 1. AUTO-TRIGGER STATUS MODAL (Success/Error)
    <?php if (session()->getFlashdata('success') || session()->getFlashdata('error')): ?>
        var statusModal = new bootstrap.Modal(document.getElementById('statusMessageModal'));
        statusModal.show();
    <?php endif; ?>

    // 2. AUTO-TRIGGER CONTACT MODAL (Once per session)
    const hasSeenPopup = sessionStorage.getItem("popupShownSession");
    
    // Only show contact modal if NO status message is being shown
    <?php if (!session()->getFlashdata('success') && !session()->getFlashdata('error')): ?>
        if (!hasSeenPopup) {
            setTimeout(function() {
                var contactModal = new bootstrap.Modal(document.getElementById('autoContactModal'));
                contactModal.show();
                sessionStorage.setItem("popupShownSession", "true");
            }, 3000);
        }
    <?php endif; ?>
});
</script>

</body>

</html>