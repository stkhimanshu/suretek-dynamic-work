<!-- header -->
<?php
$title = "Contact us – Connect with Our Global IT Team | Suretek Infosoft";
$description = "Contact us via email or phone across our global locations. Whether it’s India, the US, Sweden, Canada, or Singapore, we’re ready to address your questions and business needs.";
$keywords = "global contact support, contact suretek infosoft, business inquiry contact, international office support, customer communication channels";
$url = "https://www.suretekinfosoft.com/contact-us.php";

// og image
$ogImage = "https://www.suretekinfosoft.com/assets/images/og-image.webp";
include("components/header.php")
?>
<!-- header -->

<script src="https://www.google.com/recaptcha/api.js" async defer></script>

<script>
    var getCaptchaStatus = document.getElementById('recaptcha-accessible-status').value;
    console.log('getCaptchaStatus', getCaptchaStatus);
</script>
<style>
    /* Simple spinner loader */
    .spinner {
        width: 18px;
        height: 18px;
        border: 2px solid #fff;
        border-top: 2px solid transparent;
        border-radius: 50%;
        display: inline-block;
        animation: spin 0.8s linear infinite;
        vertical-align: middle;
        margin-right: 6px;
    }

    .alert.alert-success {
        margin-top: 15px;
        background: #025a78;
        color: white;
        padding: 12px;
    }

    .alert.alert-warning {
        margin-top: 15px;
        background: #d22a2d;
        color: white;
        padding: 12px;
    }

    @keyframes spin {
        to {
            transform: rotate(360deg);
        }
    }

    button[disabled] {
        opacity: 0.7;
        cursor: not-allowed;
    }
</style>
<!-- services -->
<section class="team" style="background-image: linear-gradient(to right, rgba(255, 255, 255, 0.8), rgba(255, 255, 255, 0)), url(<?= $baseurl ?>assets/images/contact_us.webp); background-position:top right; background-attachment:local;">
    <div class="container position-relative z-10">
        <div class="row">
            <div class="col-lg-6 col-md-8">
                <h1 class="title mt-5 mb-2">Contact us</h1>
                <p class="fs-5 mt-3 mb-4">Have a question or need support? Contact us today, and our team will be happy to help you find the answers you need.</p>
                <ul class="bread mt-md-5 mt-4">
                    <li><a href="<?= $baseurl ?>index.php" title="Home">Home</a></li>
                    <li class="mx-2"><span>/</span></li>
                    <li class="active">Contact Us</li>
                </ul>
            </div>
        </div>
    </div>
</section>
<!-- services -->

<!-- contact -->
<section class="contact" id="contact">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-12">
                <h2 class="title fs-1 mb-5">let's Connect</h2>
                <!-- <iframe src="<?= $baseurl ?>" frameborder="0"></iframe> -->
                <div class="suc" style="display:none;" id="msgDiv"></div>
                <div class="war" style="display:none;" id="errorDiv"></div>
                <div class="form_box">
                    <form id="contactForm" class="contact-form">
                        <div class="d-flex gap-4 mb-3 flex-column flex-sm-row">
                            <div class="form-group w-100">
                                <label for="name">Full Name <sup class="text-danger">*</sup></label>
                                <input type="text" id="name" name="name" placeholder="Enter your name" pattern="[A-Za-z\s]+" oninput="this.value=this.value.replace(/[^A-Za-z\s]/g,'')" required>
                            </div>

                            <div class="form-group w-100">
                                <label for="email">Email <sup class="text-danger">*</sup></label>
                                <input type="email" id="email" name="email" placeholder="Enter your email " required>
                            </div>
                        </div>

                        <div class="d-flex gap-4 mb-3 flex-column flex-sm-row">
                            <!-- <div class="form-group w-100">
                            <input type="text" id="subject" name="subject" placeholder=" " required>
                            <label for="subject">Subject <sup class="text-danger">*</sup></label>
                        </div> -->

                            <div class="form-group w-100">
                                <label for="mobile">Mobile No <sup class="text-danger">*</sup></label>
                                <input type="text" id="mobile" name="mobile" placeholder="Enter your mobile no " required oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0,10)" />
                            </div>
                        </div>

                        <!-- <div class="form-group">
                            <input type="text" id="address" name="address" placeholder=" " required>
                            <label for="address">Address <sup class="text-danger">*</sup></label>
                        </div> -->

                        <div class="form-group">
                            <label for="comments">Comments</label>
                            <textarea id="comments" name="comments" rows="4" placeholder="Enter your message"></textarea>
                        </div>
                        <div class="form-group">
                            <div class="g-recaptcha" data-sitekey="6Ldi32sqAAAAAEMmXs83tfsSbp9dqAdNJinEhY_C"></div>
                        </div>

                        <div class="d-flex gap-3 mt-4">
                            <button type="submit" class="btn btn-dark" id="submitBtn">Submit</button>
                            <button type="reset" class="btn btn-outline-secondary">Clear</button>
                        </div>

                        <div id="formFeedback" class="mt-3"></div>
                    </form>
                    <div id="contactUs"></div>

                    <script>
                        function validateCaptcha() {
                            const response = grecaptcha.getResponse();
                            const captchaElement = document.querySelector(".g-recaptcha");

                            // Remove any existing error message before adding a new one
                            const existingMessage = captchaElement.parentNode.querySelector(".captcha-error");
                            if (existingMessage) existingMessage.remove();

                            if (response.length === 0) {
                                const infoText = document.createElement("div");
                                infoText.className = "captcha-error";
                                infoText.textContent = "Please verify that you are not a robot.";
                                infoText.style.marginTop = "10px";
                                infoText.style.color = "red";
                                infoText.style.fontSize = "14px";
                                captchaElement.parentNode.appendChild(infoText);
                                return false; // Prevent form submission
                            }

                            return true; // Allow form submission
                        }

                        document.getElementById('contactForm').addEventListener('submit', function(e) {
                            e.preventDefault();
                            if (!validateCaptcha()) return false;

                            const form = this;
                            const feedback = document.getElementById('formFeedback');
                            const formData = new FormData(form);
                            formData.append('action', 'contact-form');
                            const submitBtn = document.getElementById('submitBtn');
                            const resultContainer = document.getElementById('contactUs');
                            const originalText = submitBtn.innerHTML; // ✅ store original text BEFORE changing it

                            // Disable button and show spinner
                            submitBtn.disabled = true;
                            submitBtn.innerHTML = `<span class="spinner"></span> Submitting...`;

                            fetch('../contact_submit.php', {
                                    method: 'POST',
                                    body: formData
                                })
                                .then(res => res.json())
                                .then(data => {
                                    console.log('Response:', data); // Debug

                                    if (data.status === 'success') {
                                        form.reset();
                                        resultContainer.innerHTML = `<div class="alert alert-success">${data.message}</div>`;
                                        grecaptcha.reset();
                                    } else {
                                        resultContainer.innerHTML = `<div class="alert alert-danger">${data.message}</div>`;
                                    }
                                })
                                .catch(err => {
                                    console.error(err);
                                    resultContainer.innerHTML = `<div class="alert alert-danger">Network error. Please try again.</div>`;
                                })
                                .finally(() => {
                                    // ✅ Re-enable button only after all operations are done
                                    submitBtn.disabled = false;
                                    submitBtn.innerHTML = originalText;
                                });
                        });
                    </script>
                </div>

                <div class="bg-secondary bg-opacity-10 p-3 text-secondary mb-4 mt-5">
                    <p class="fs-6">We, at Suretek Infosoft , are constantly striving to enhance your experience on our site. We are here to provide help and assistance at every step. Please contact us at the following address for your questions, problems & business enquiries:-</p>
                </div>
                <!-- map -->
                <iframe class="border
                 border-4 secondary p-1" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3501.9565441367627!2d77.38150067613718!3d28.631064484146208!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x390ceaebadc2b289%3A0x1eabfad756a4656e!2sSuretek%20Infosoft%20Pvt.%20Ltd.!5e0!3m2!1sen!2sin!4v1758021245812!5m2!1sen!2sin" width="100%" height="400" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
            <div class="col-lg-4 col-md-12 mt-4 mt-lg-0">
                <h2 class="mb-md-4 mb-2 teko">Our Offices</h2>
                <div class="row row-cols-md-2 row-cols-lg-1">
                    <!-- India Office -->
                    <div class="col">
                        <div class="office mb-4 p-4 border">
                            <div class="contry d-flex align-items-center justify-content-start border-bottom pb-3 mb-2 gap-2">
                                <img src="<?= $baseurl ?>assets/images/icons/india.png" alt="India Flag - Suretek Infosoft" title="India Flag - Suretek Infosoft" class="d-block" style="width:20px">
                                <h5 class="text_default mb-0">India</h5>
                            </div>

                            <!-- <div class="contry justify-content-start border-bottom pb-3 mb-2 d-flex align-items-center">
                                <div class="flag me-2"><img src="<?= $baseurl ?>assets/images/icons/india.png" alt="India Flag - Suretek Infosoft" title="India Flag - Suretek Infosoft">
                                </div>
                                <h5 class="text_default">India</h4>
                            </div> -->
                            <h6 class="text-dark mb-2">Noida</h6>
                            <p class="mb-1">D-247/32, Sector 63, Noida</p>
                            <p class="mb-1">Uttar Pradesh - 201301</p>
                            <p class="mb-1">NCR (Near New Delhi)</p>
                            <p class="mb-1"><strong>Email:</strong> <a class="text_default" href="mailto:info@suretekinfosoft.com">info@suretekinfosoft.com</a></p>
                            <p class="mb-0"><strong>Contact:</strong> <a href="tel:+911204234350" title="" class="text_default">+91-120-4234350</a></p>
                            <br />
                            <h6 class="text-dark mb-2 mt-4 mt-md-0">New Delhi (Registered Office)</h6>
                            <p class="mb-1">GH 9/142 Paschim Vihar</p>
                            <p class="mb-1">B/h Sunder Vihar</p>
                            <p class="mb-1">Near St Marks School</p>
                            <p class="mb-1">New Delhi - 110087</p>
                            <p class="mb-1"><strong>Email:</strong> <a class="text_default" href="mailto:info@suretekinfosoft.com">info@suretekinfosoft.com</a></p>
                        </div>
                    </div>

                    <!-- United States Office -->
                    <div class="col">
                        <div class="office mb-4 p-4 border">
                            <h4><i class="fa-light text-secondary fs-5 fa-globe"></i> Global Presence</h4>
                            <hr>
                            <div class="contry d-flex align-items-center justify-content-start mb-2 mt-0 gap-2 border-0">
                                <div class="flag d-flex align-items-center">
                                    <img
                                        src="<?= $baseurl ?>assets/images/icons/uk.png"
                                        alt="UK - Suretek Infosoft"
                                        title="UK - Suretek Infosoft"
                                        class="d-block"
                                        style="width:20px">
                                </div>
                                <h5 class="text_default mb-0">United Kingdom</h5>
                            </div>

                            <!-- <p class="mb-1">Post Office Box 344</p>
                            <p class="mb-1">Alamo, CA 94507</p>
                            <p class="mb-1">U.S.A.</p> -->
                            <p class="mb-1"><strong>Email:</strong> <a class="text_default" href="mailto:uk@suretekinfosoft.com">uk@suretekinfosoft.com</a></p>
                            <p class="mb-0"><strong>Contact:</strong> <a class="text_default" href="tel:+447418352319" title="">+447418352319</a></p>

                            <div class="contry d-flex align-items-center justify-content-start mb-2 mt-4 gap-2">
                                <div class="flag d-flex align-items-center">
                                    <img
                                        src="<?= $baseurl ?>assets/images/icons/finland.png"
                                        alt="Finland - Suretek Infosoft"
                                        title="Finland - Suretek Infosoft"
                                        class="d-block"
                                        style="width:20px">
                                </div>
                                <h5 class="text_default mb-0">Finland</h5>
                            </div>


                            <!-- <h6 class="text-dark mb-2">Sveavägen 65</h6>
                            <p class="mb-1">SE-182 62 Djursholm Stockholm</p>
                            <p class="mb-1">Sweden</p> -->
                            <p class="mb-1"><strong>Email:</strong> <a class="text_default" href="mailto:finland@suretekinfosoft.com">finland@suretekinfosoft.com</a></p>
                            <p class="mb-0"><strong>Contact:</strong> <a class="text_default" href="tel:+358931581149" title="">+358931581149</a></p>


                            <!-- <br />
                            <h6 class="text-dark mb-2 mt-4 mt-md-0">Ältavägen 102</h6>
                            <p class="mb-1">13133 Nacka</p>
                            <p class="mb-1">Sweden</p>
                            <p class="mb-1"><strong>Email:</strong> <a class="text_default" title="mailto:info@suretekinfosoft.com" href="mailto:info@suretekinfosoft.com">info@suretekinfosoft.com</a></p>
                            <p class="mb-0"><strong>Contact:</strong> <a class="text_default" href="tel:+46707183636" title="+46707183636">+46-707-18-36-36</a></p> -->

                            <div class="contry d-flex align-items-center justify-content-start mb-2 mt-4 gap-2">
                                <div class="flag d-flex align-items-center">
                                    <img
                                        src="<?= $baseurl ?>assets/images/icons/Denmark.png"
                                        alt="Denmark Flag - Suretek Infosoft"
                                        title="Denmark Flag - Suretek Infosoft"
                                        class="d-block"
                                        style="width:20px">
                                </div>
                                <h5 class="text_default mb-0">Denmark</h5>
                            </div>


                            <!-- <p class="mb-1">3035 36A Avenue</p>
                            <p class="mb-1">Edmonton, Alberta</p>
                            <p class="mb-1">Canada T6T 1J8</p> -->
                            <p class="mb-1"><strong>Email:</strong> <a class="text_default" title="mailto:denmark@suretekinfosoft.com" href="mailto:denmark@suretekinfosoft.com">denmark@suretekinfosoft.com</a></p>
                            <p class="mb-0"><strong>Contact:</strong> <a class="text_default" href="tel:+4532330368" title="">+4532330368</a></p>

                            <div class="contry d-flex align-items-center justify-content-start mb-2 mt-4 gap-2">
                                <div class="flag d-flex align-items-center">
                                    <img
                                        src="<?= $baseurl ?>assets/images/icons/sweden.png"
                                        alt="Sweden - Suretek Infosoft"
                                        title="Sweden - Suretek Infosoft"
                                        class="d-block"
                                        style="width:20px">
                                </div>
                                <h5 class="text_default mb-0">Sweden</h5>
                            </div>


                            <!-- <h6 class="text-dark mb-2">Sveavägen 65</h6>
                            <p class="mb-1">SE-182 62 Djursholm Stockholm</p>
                            <p class="mb-1">Sweden</p> -->
                            <p class="mb-1"><strong>Email:</strong> <a class="text_default" href="mailto:sweden@suretekinfosoft.com">sweden@suretekinfosoft.com</a></p>
                            <p class="mb-0"><strong>Contact:</strong> <a class="text_default" href="tel:+46812410910" title="">+46812410910</a></p>




                            <div class="contry d-none align-items-center justify-content-start mb-2 mt-4 gap-2">
                                <div class="flag d-flex align-items-center">
                                    <img
                                        src="<?= $baseurl ?>assets/images/icons/singapore.webp"
                                        alt="Singapore Flag - Suretek Infosoft"
                                        title="Singapore Flag - Suretek Infosoft"
                                        class="d-block"
                                        style="width:20px">
                                </div>
                                <h5 class="text_default mb-0">Singapore</h5>
                            </div>
                            <!-- 
                            <p class="mb-1">Boulder & Stones Int’l Pte Ltd.</p>
                            <p class="mb-1">Blk 808, French Road, #03-14</p>
                            <p class="mb-1">Kitchener Complex</p>
                            <p class="mb-1">Singapore 200808</p> -->
                            <!-- <p class="mb-1"><strong>Email:</strong> <a class="text_default" href="mailto:info@suretekinfosoft.com" title="info@suretekinfosoft.com">info@suretekinfosoft.com</a></p> -->
                            <!-- <p class="mb-0"><strong>Contact:</strong> <a class="text_default" href="tel:+6562975453" title="+65-6297-5453">+65-6297-5453</a></p> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- contact -->









<?php
include("components/footer.php")
?>
<!-- footer -->