<style>
    .cookies {
        background-color: #f2f2f2;
        width: min(400px, 65%);
    }

    .cookies p {
        font-size: 14px;
        margin-bottom: 10px;
    }

    .cookies .vector img {
        max-height: 45px;
    }

    .c_btn {
        background-color: #000;
        color: #fff;
        padding: 5px 15px;
        border-radius: 4px;
        font-weight: 600;
        font-size: 14px;
        transition: all ease-in-out .3s;

        &:hover {
            background-color: #fff;
            color: #000;
            border: 1px solid #000;
        }
    }

    .c_btn2 {

        background-color: #fff;
        color: #000;
        border: 1px solid #000;
        padding: 5px 15px;
        font-size: 14px;
        border-radius: 4px;
        font-weight: 600;
        transition: all ease-in-out .3s;

        &:hover {
            background-color: #000;
            color: #fff;
        }
    }


    .modal-dialog-scrollable .modal-body {
        scrollbar-width: none;
    }

    .cookies .btn-close {
        width: 0.8rem;
        height: 0.8rem;
    }

    .cookie-option {
        background: #fca0a024;
        padding: 1rem;
        border-radius: 15px;
        height: 160px;
    }

    .cookie-option h4 {
        font-size: 1.8rem;
    }

    .cookie-option .desc {
        font-size: 0.875rem;
        margin: 0;
    }

    .cookie-option .form-check-input:checked {
        background-color: #a22426;
        border-color: #a22426;
    }

    .cookie-option .form-check-input:focus {
        box-shadow: 0 0 0 .25rem rgba(162, 36, 38, 0.25)
    }

    .btn-close-custom {
        appearance: none;
        height: 30px;
        width: 30px;
        padding: 10px;
        border: 1px solid #eee;
        background: #a22426;
        border-radius: 50%;
        display: flex;
        justify-content: center;
        align-items: center;
        color: white;
        font-size: 1rem;
        translate: 20px -20px;
    }

    .text-default {
        color: #a22426;
    }

    .font-teko {
        font-family: "Teko";
    }


    @media (max-width:575px) {
        #cookieModal .modal-body {
            padding: 0;
        }

        .btn-close-custom {
            translate: none;
        }
    }

    .fs-head {
        font-size: 2.75rem;
    }




    .z-100 {
        z-index: 100;
    }
    #staticBackdrop.modal {
  pointer-events: none;
}

#staticBackdrop .modal-dialog,
#staticBackdrop .modal-content {
  pointer-events: auto;
}
</style>


<!-- <button type="button" class="btn btn-primary position-fixed bottom-0 z-100" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
    Launch static backdrop modal
</button> -->

<!-- Modal -->
<div class="modal fade" id="staticBackdrop" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true" data-bs-keyboard="false" data-bs-backdrop="false" data-bs-scroll="true" data-bs-padding="false" data-bs-focus="false">
    <div class="modal-dialog m-2 position-absolute bottom-0">
        <div class="modal-content cookies px-3 py-2 rounded-0 shadow-lg ">
            <div class="modal-body border-0 p-0 d-flex align-items-center gap-2 ">
                <p>To enhance your experience
                    we use cookies <button class="text-decoration-underline text-default" data-bs-toggle="modal" data-bs-target="#cookieModal">Know More</button></p>
                <div>
                    <button class="c_btn" data-bs-dismiss="modal" id="cookies_ok">OK</button>
                </div>
            </div>
        </div>


    </div>
</div>


<div class="modal fade" id="cookieModal" tabindex="-1" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false" data-bs-focus="false">
    <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content p-4 position-relative rounded-5">

            <div class="modal-body ">
                <div class="cookie-header mb-3 d-flex justify-content-between">
                    <div>
                        <h3 class="mb-1 fs-head font-teko">Your <span class="text-default">Cookie Settings</span></h3>
                    </div>
                    <button type="button" class="btn-close-custom" data-bs-dismiss="modal" aria-label="Close">
                        <i class="fas fa-xmark"></i>
                    </button>
                </div>

                <div class="row g-3">
                    <p class="small m-0 d-flex">Choose and toggle the cookie settings you're comfortable with. &nbsp;<a href="privacy-policy.php" target="_blank" class="fw-semibold text-decoration-underline text-default">Click here</a> &nbsp;to learn more.</p>
                    <div class="col-md-4">
                        <div class="cookie-option">
                            <div class="form-check form-switch d-flex justify-content-between ps-0">
                                <h4 class="title font-teko">Essential</h4>
                                <input class="form-check-input" type="checkbox" id="essential" checked="">
                            </div>

                            <p class="desc">These cookies are vital for smooth browsing, faster page loading, and ensuring the website works as it should. This feature is always active.</p>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="cookie-option">
                            <div class="form-check form-switch d-flex justify-content-between ps-0">
                                <h4 class="title font-teko">Performance &amp; Statistical</h4>
                                <input class="form-check-input" type="checkbox" id="performance">
                            </div>

                            <p class="desc">These cookies remember your preferences and track site performance to ensure proper functionality without direct identification.</p>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="cookie-option">
                            <div class="form-check form-switch d-flex justify-content-between ps-0">
                                <h4 class="title font-teko">Targeting</h4>
                                <input class="form-check-input" type="checkbox" id="targeting">
                            </div>
                            <p class="desc">Targeting cookies customize your experience by showing offers that match your interests, making your visits more relevant and engaging.</p>
                        </div>
                    </div>
                </div>

                <div class="d-flex justify-content-end mt-3 gap-2">
                    <!-- <button type="reset" class="c_btn2" id="resetChoices">Reset</button> -->
                    <button type="button" class="c_btn" id="confirmChoices">Confirm</button>
                </div>
            </div>
        </div>
    </div>
</div>


<script>
document.addEventListener("DOMContentLoaded", function () {

    // Show cookie modal if not accepted yet
    if (!localStorage.getItem("cookieAccepted")) {
        const cookieModal = new bootstrap.Modal(document.getElementById('staticBackdrop'), {
            backdrop: false,     // JS override: no backdrop
            scroll: true         // JS override: allow scrolling
        });
        cookieModal.show();
    }

    // Accept cookies button (main modal)
    document.getElementById('cookies_ok').addEventListener('click', () => {
        localStorage.setItem("cookieAccepted", "true");
        const cookieModal = bootstrap.Modal.getInstance(document.getElementById('staticBackdrop'));
        cookieModal.hide();
    });

    // Accept from preferences modal
    document.getElementById('confirmChoices').addEventListener('click', () => {
        localStorage.setItem("cookieAccepted", "true");
        const cookieModal = bootstrap.Modal.getInstance(document.getElementById('cookieModal'));
        cookieModal.hide();
    });

});


/* FORCE BACKGROUND TO REMAIN SCROLLABLE + REMOVE BOOTSTRAP LOCKS */
const myModal = document.getElementById('staticBackdrop');

myModal.addEventListener('show.bs.modal', () => {
    // Prevent Bootstrap from locking scroll
    setTimeout(() => {
        document.body.classList.remove('modal-open');
        document.body.style.overflow = 'auto';
        document.body.style.paddingRight = '0px';

        // Remove backdrop if Bootstrap injects it
        document.querySelectorAll('.modal-backdrop').forEach(b => b.remove());
    }, 10);
});

myModal.addEventListener('shown.bs.modal', () => {
    // Ensure scroll is free after animation
    document.body.classList.remove('modal-open');
    document.body.style.overflow = 'auto';
    document.body.style.paddingRight = '0px';
    document.querySelectorAll('.modal-backdrop').forEach(b => b.remove());
});

myModal.addEventListener('hidden.bs.modal', () => {
    // Cleanup
    document.body.style.overflow = '';
    document.body.style.paddingRight = '0px';
});
</script>
