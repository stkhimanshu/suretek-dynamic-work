// for changin class suffix of fontawesome
    document.addEventListener('DOMContentLoaded', () => {
    document.querySelectorAll('[class*="fa-"]').forEach(el => {
        // Remove all style-specific classes
        el.classList.remove('fa-light', 'fa-regular', 'fa-solid', 'fa-duotone', 'fa-thin');

        // Add just the free 'fa' class
        if (!el.classList.contains('fa')) {
            el.classList.add('fa');
        }
    });
});
document.addEventListener("DOMContentLoaded", function () {
  const navbar = document.querySelector(".navbar");

  function updateNavbar() {
    if (window.scrollY > 50) {
      navbar.classList.add("bg-white", "shadow-lg");
    } else {
      navbar.classList.remove("bg-white", "shadow-lg");
    }
  }

  // Run on scroll
  window.addEventListener("scroll", updateNavbar);

  // Run once on page load to detect current scroll
  updateNavbar();
});
// const navLinks = document.querySelectorAll('.navbar a');

// const currentUrl = window.location.href;

// navLinks.forEach(link => {
//     if (currentUrl === link.href) {
//         link.classList.add('active');
//     } else {
//         link.classList.remove('active');
//     }
// });

const navLinks = document.querySelectorAll('.navbar a');

const currentPath = window.location.pathname;

navLinks.forEach(link => {
    const linkPath = new URL(link.href).pathname;

    if (currentPath === linkPath) {
        link.classList.add('active');
    } else {
        link.classList.remove('active');
    }
});
  // Get the button
  const backToTopBtn = document.getElementById("backToTop");

  // Show button after scrolling down 300px
  window.onscroll = function () {
    if (document.body.scrollTop > 300 || document.documentElement.scrollTop > 300) {
      backToTopBtn.style.opacity = "1";
    } else {
      backToTopBtn.style.opacity = "0";
    }
  };

  // Smooth scroll to top when clicked
  backToTopBtn.addEventListener("click", () => {
    window.scrollTo({
      top: 0,
      behavior: "smooth"
    });
  });

//   $('.story').owlCarousel({
//     loop: true,
//     margin: 30,
//     nav: true,
//     dots: false,
//     autoplay: true,
//     autoplayTimeout: 3000,
//     navText: [
//       '<i class="fas fa-chevron-left"></i>',
//       '<i class="fas fa-chevron-right"></i>'
//     ],
//     responsive: {
//       0: { items: 1 },
//       576: { items: 1 },
//       768: { items: 2 },
//       992: { items: 2 },
//       1200: { items: 3 }
//     }
//   });
//   $('.testi').owlCarousel({
//     loop: true,
//     margin: 30,
//     nav: false,
//     dots: false,
//     autoplay: true,
//     autoplayTimeout: 3000,
//     // navText: [
//     //     '<i class="fas fa-chevron-left"></i>', 
//     //     '<i class="fas fa-chevron-right"></i>'
//     // ],
//     responsive: {
//       0: { items: 1 },
//       576: { items: 1 },
//       768: { items: 2 },
//       992: { items: 2 },
//       1200: { items: 3 }
//     }
//   });
//   $(".video_monial").owlCarousel({
//     items: 1,
//     loop: true,
//     margin: 20,
//     autoplay: false,
//     autoplayTimeout: 6000,
//     autoplayHoverPause: true,
//     nav: true,
//     dots: false,
//     navText: [
//       '<i class="fa-thin fa-long-arrow-left display-5"></i>',
//       '<i class="fa-thin fa-long-arrow-right display-5"></i>'
//     ]
//   });
  $('.branded').owlCarousel({
    loop: true,
    margin: 30,
    nav: false,
    dots: false,
    autoplay: true,
    autoplayTimeout: 3000,
    // navText: [
    //     '<i class="fas fa-chevron-left"></i>', 
    //     '<i class="fas fa-chevron-right"></i>'
    // ],
    responsive: {
      0: { items: 2 },
      576: { items: 2 },
      768: { items: 3 },
      992: { items: 4 },
      1200: { items: 5 }
    }
  });
  $('.serv_slider').owlCarousel({
    loop: true,
    margin: 50,
    nav: false,
    dots: false,
    autoplay: true,
    autoplayTimeout: 3000,
    // navText: [
    //     '<i class="fas fa-chevron-left"></i>', 
    //     '<i class="fas fa-chevron-right"></i>'
    // ],
    responsive: {
      0: { items: 1 },
      576: { items: 2 },
      768: { items: 2 },
      992: { items: 4 },
      1200: { items: 4 }
    }
  });
  $('.indus_slider').owlCarousel({
    loop: true,
    margin: 20,
    nav: false,
    dots: false,
    autoplay: true,
    autoplayTimeout: 3000,
    // navText: [
    //     '<i class="fas fa-chevron-left"></i>', 
    //     '<i class="fas fa-chevron-right"></i>'
    // ],
    responsive: {
      0: { items: 1 },
      576: { items: 2 },
      768: { items: 3 },
      992: { items: 3 },
      1200: { items: 3 }
    }
  });

  document.querySelectorAll(".hover-tabs .nav-link").forEach(tab => {
    tab.addEventListener("mouseenter", function () {
      // Remove active from all
      document.querySelectorAll(".hover-tabs .nav-link").forEach(el => el.classList.remove("active"));
      document.querySelectorAll(".hover-tabs .tab-pane").forEach(el => el.classList.remove("active"));

      // Add active to hovered tab
      this.classList.add("active");
      document.querySelector(`#${this.getAttribute("data-tab")}`).classList.add("active");
    });
  });

  const faqButtons = document.querySelectorAll('#faqAccordion .accordion-button');

  faqButtons.forEach(btn => {
    btn.addEventListener('click', () => {
      faqButtons.forEach(b => {
        b.querySelector('.accordion-icon').textContent = '+';
      });

      const icon = btn.querySelector('.accordion-icon');
      const collapse = document.querySelector(btn.getAttribute('data-bs-target'));
      if (!collapse.classList.contains('show')) {
        icon.textContent = '-';
      }
    });
  });

document.addEventListener("DOMContentLoaded", function() {
  if (typeof Swiper === "undefined") {
    console.error("Swiper library not loaded.");
    return;
  }

  document.querySelectorAll(".th-slider").forEach(function(slider) {
    const isCategorySlider = slider.classList.contains("categorySlider");
    const options = JSON.parse(slider.getAttribute("data-slider-options") || "{}");
    
    const baseConfig = {
      slidesPerView: 3,
      spaceBetween: 25,
      loop: true,
      grabCursor: true,
      navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
      },
      breakpoints: {
        0: { slidesPerView: 1 },
        576: { slidesPerView: 1 },
        768: { slidesPerView: 2 },
        992: { slidesPerView: 3 },
        1200: { slidesPerView: 3 },
        1400: { slidesPerView: 5, spaceBetween: 25 }
      }
    };

    // Merge with any existing options
    const config = { ...baseConfig, ...options };
    
    const swiper = new Swiper(slider, config);

    // Apply curve effect only for category sliders on desktop
    if (isCategorySlider && window.innerWidth > 768) {
      applyCurveEffect(swiper);
    }
  });
});

function applyCurveEffect(swiper) {
  const effect = { translate: 0.1, rotate: 0.008 };
  
  function updateCurve() {
    requestAnimationFrame(updateCurve);
    document.querySelectorAll(".single").forEach((slide) => {
      const rect = slide.getBoundingClientRect();
      const centerOffset = 0.5 * window.innerWidth - (rect.x + 0.5 * rect.width);
      let translateY = Math.abs(centerOffset) * effect.translate - rect.width * effect.translate;
      
      translateY = Math.max(0, translateY); // Ensure positive value
      const transformOrigin = centerOffset < 0 ? "left top" : "right top";
      
      slide.style.transform = `translate(0, ${translateY}px) rotate(${-centerOffset * effect.rotate}deg)`;
      slide.style.transformOrigin = transformOrigin;
    });
  }
  
  updateCurve();
  
  // Re-apply effect on window resize and slide change
  window.addEventListener("resize", updateCurve);
  swiper.on("slideChange", updateCurve);
}

// Play button for multiple testimonial videos
const wrappers = document.querySelectorAll(".video-wrapper");

wrappers.forEach(wrapper => {
  const video = wrapper.querySelector(".testimonialVideo");
  const playBtn = wrapper.querySelector(".playButton");

  if (playBtn && video) {
    playBtn.addEventListener("click", () => {
      video.muted = false;   // unmute
      // video.volume = full;      // set to full volume
      video.play();
      // video.setAttribute("controls", "true");
      playBtn.style.display = "none";
    });
  }
});

// case study sideba scrolspy effect
// Select all TOC links and sections
const tocLinks = document.querySelectorAll('.toc_list li a');
const sections = document.querySelectorAll('section .content h3, section .content h2.title');

// Function to check current section in viewport
function setActiveLink() {
  let scrollPosition = window.scrollY + 150; // Adjust offset for sticky TOC

  sections.forEach(section => {
    const sectionTop = section.offsetTop;
    const sectionHeight = section.offsetHeight;
    const id = section.getAttribute('id') || section.textContent.trim().toLowerCase().replace(/\s+/g, '-');

    if (scrollPosition >= sectionTop && scrollPosition < sectionTop + sectionHeight) {
      tocLinks.forEach(link => {
        link.classList.remove('active');
        if (link.getAttribute('href') === '#' + id) {
          link.classList.add('active');
        }
      });
    }
  });
}

// Initial call
setActiveLink();

// Highlight active menu link on scroll (make sure setActiveLink is defined somewhere)
window.addEventListener('scroll', setActiveLink);

// Animate counters function
function animateCounters() {
  const counters = document.querySelectorAll('.counter');
  const duration = 2000; // total animation time in ms

  counters.forEach(counter => {
    const target = +counter.getAttribute('data-target');

    const animate = (timestamp, startTime) => {
      if (!startTime) startTime = timestamp;
      const progress = timestamp - startTime;
      const value = Math.min(Math.floor((progress / duration) * target), target);
      counter.innerText = value;

      if (progress < duration) {
        requestAnimationFrame(ts => animate(ts, startTime));
      } else {
        counter.innerText = target; // ensure exact final value
      }
    };

    requestAnimationFrame(animate);
  });
}

// Wait until DOM is loaded
document.addEventListener("DOMContentLoaded", () => {
  const countersSection = document.querySelector('.counters');

  if (!countersSection) return; // safety check

  const observer = new IntersectionObserver(entries => {
    if (entries[0].isIntersecting) {
      animateCounters();
      observer.disconnect(); // run only once
    }
  }, { threshold: 0.5 });

  observer.observe(countersSection);
});

// check responsive js
function checkWebsite(id) {
  if (document.getElementById('web').value != '') {
    document.getElementById('mainDiv').innerHTML = '';
    var url = document.getElementById('web').value;
    if (url.indexOf('http') >= 0 || url.indexOf('https') >= 0) {
      document.getElementById(id).src = document.getElementById('web').value;
      var one = document.getElementById(id + '-div').innerHTML;
      document.getElementById('mainDiv').innerHTML = one;
      $elem = $('body');
      $('html, body').animate({
        scrollTop: 800
      }, 800);
    } else {
      document.getElementById(id).src = 'http://' + document.getElementById('web').value;
      var one = document.getElementById(id + '-div').innerHTML;
      document.getElementById('mainDiv').innerHTML = one;
      $elem = $('body');
      $('html, body').animate({
        scrollTop: 800
      }, 800);
    }
    //document.getElementById(id+'-div').style.display = 'block';

  } else {
    $('#err').show();
    return false;
    //alert('Kindly Enter web link url');
  }
}
(function ($) {
  $(document).ready(function (e) {
    $('body').keypress(function (e) {
      if (e.which == 13) {
        checkWebsite('iphone-5-portrait');
        if (document.getElementById('web').value != '') {
          $elem = $('body');
          $('html, body').animate({
            scrollTop: 800
          }, 800);
        }
      } else {
        $('#err').hide();
      }
    });
  });
})(jQuery);

(function ($) {

  function checkWebsite(id) {
    const webInput = $('#web').val().trim();
    if (webInput === '') {
      $('#err').show();
      return false;
    }

    $('#err').hide();
    $('#mainDiv').empty();

    let url = webInput;
    if (!/^https?:\/\//i.test(url)) {
      url = 'http://' + url;
    }

    $('#' + id).attr('src', url);

    const deviceHtml = $('#' + id + '-div').html();
    $('#mainDiv').html(deviceHtml);

    $('html, body').animate({ scrollTop: $('#mainDiv').offset().top }, 800);

    return true;
  }

  $(document).ready(function () {

    $('body').keypress(function (e) {
      if (e.which === 13) {
        checkWebsite('iphone-5-portrait');
      } else {
        $('#err').hide();
      }
    });
  });

  window.checkWebsite = checkWebsite;
})(jQuery);

// For blog table of contents
document.addEventListener('DOMContentLoaded', function () {
  const sections = document.querySelectorAll('section');
  const navLinks = document.querySelectorAll('#toc .nav-link');

  window.addEventListener('scroll', () => {
    let current = '';
    sections.forEach(section => {
      const sectionTop = section.offsetTop;
      if (scrollY >= sectionTop + 200) { // 120 = header offset
        current = section.getAttribute('id');
      }
    });

    navLinks.forEach(link => {
      link.classList.remove('active');
      if (link.getAttribute('href') === '#' + current) {
        link.classList.add('active');
      }
    });
  });
});
