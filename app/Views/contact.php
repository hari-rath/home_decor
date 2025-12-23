<?= view('includes/header', ['title' => 'Contact']) ?>
<section id="about" class="about py-5">
   <div class="container">
      <div class="row g-4">
         <!-- LEFT COLUMN -->
         <div class="col-md-6 bg-light p-4">
            <h2 class="fw-bold mb-3">Reach Out to Our Dedicated Support Team</h2>
            <p class="fw-medium mb-1">Our team is ready to help. Your satisfaction is our priority.</p>
            <p class="text-muted mb-4">
               Got a question, need advice, or looking for help? Our knowledgeable team is here to assist you.
            </p>
            <div class="border-top pt-3">
               <!-- EMAIL -->
               <div class="d-flex align-items-start gap-3 py-3 border-bottom">
                  <div class="bg-light rounded-circle d-flex align-items-center justify-content-center" style="width:48px;height:48px;">
                     <i class="bi bi-envelope-fill text-danger fs-5"></i>
                  </div>
                  <div>
                     <small class="text-muted">Email Address</small>
                     <div class="fw-semibold fs-5" style="word-break: break-all;">deephomedecor1@gmail.com</div>
                  </div>
               </div>
               <!-- PHONE -->
               <div class="d-flex align-items-start gap-3 py-3 border-bottom">
                  <div class="bg-light rounded-circle d-flex align-items-center justify-content-center" style="width:48px;height:48px;">
                     <i class="bi bi-telephone-fill text-danger fs-5"></i>
                  </div>
                  <div>
                     <small class="text-muted">Phone Number</small>
                     <div class="fw-semibold fs-5">
                        <span><a class="contact_tag" href="tel:+917894348111">+91 7894348111</a></span><br>
                        <span><a class="contact_tag" href="tel:+919437255858">+91 9437255858</a></span><br>
                        <span><a class="contact_tag" href="tel:+918093125103">+91 8093125103</a></span>
                     </div>
                  </div>
               </div>
               <!-- LOCATION -->
               <div class="d-flex align-items-start gap-3 py-3 border-bottom">
                  <div class="bg-light rounded-circle d-flex align-items-center justify-content-center" style="width:48px;height:48px;">
                     <i class="bi bi-geo-alt-fill text-danger fs-5"></i>
                  </div>
                  <div>
                     <small class="text-muted">Our Location</small>
                     <div class="fw-semibold">
                        <span> Jagannath Nagar (Near Lane 6), Main Road, Bhubaneswar – 751006</span>
                     </div>
                  </div>
               </div>
              
            </div>
         </div>
         <!-- RIGHT COLUMN -->
         <div class="col-md-6">
            <div class="card shadow-sm">
               <div class="card-body">
                  <h3 class="fw-bold mb-2">Get in Touch</h3>
                  <p class="text-muted mb-4">How can we help you? Please write your query.</p>
                  <?php if (session()->getFlashdata('success')): ?>
                  <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
                  <?php endif; ?>
                  <?php if (session()->getFlashdata('error')): ?>
                  <div class="alert alert-danger"><?= session()->getFlashdata('error') ?></div>
                  <?php endif; ?>
                  <form action="<?= base_url('savecontact'); ?>" method="post">
                     <div class="mb-3">
                        <label class="form-label fw-semibold">Full Name *</label>
                        <input type="text" name="fullname" class="form-control" required>
                     </div>
                     <div class="mb-3">
                        <label class="form-label fw-semibold">Email</label>
                        <input type="email" name="email" class="form-control">
                     </div>
                     <div class="mb-3">
                        <label class="form-label fw-semibold">Phone *</label>
                        <input type="tel" name="phone" class="form-control" required>
                     </div>
                     <div class="mb-3">
                        <label class="form-label fw-semibold">Subject</label>
                        <input type="text" name="subject" class="form-control">
                     </div>
                     <div class="mb-3">
                        <label class="form-label fw-semibold">Message</label>
                        <textarea name="message" class="form-control" rows="4"></textarea>
                     </div>
                     <div class="text-center">
                        <button type="submit" class="btn btn-warning px-5 fw-semibold">
                        Send Enquiry
                        </button>
                     </div>
                  </form>
               </div>
            </div>
         </div>
         <div class="col-md-12">
           <!-- MAP -->
            <div class="card">
              <div class="card-body">

                <div class="py-3">
                   <small class="text-muted">Find Us on Map</small>
                   <iframe
                      src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3742.123!2d85.867!3d20.296!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zMjDCsDE3JzQ1LjYiTiA4NcKwNTInMDEuMiJF!5e0!3m2!1sen!2sin!4v1700000000000"
                      width="100%"
                      height="300"
                      style="border: 0;"
                      allowfullscreen=""
                      loading="lazy"
                      ></iframe>
                </div>
              </div>
              
            </div>
         </div>
      </div>
   </div>
</section>