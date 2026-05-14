<!DOCTYPE html>

<html lang="en">

<!--<< Header Area >>-->
<head>
    <?php $baseurl = "http://localhost/suretek-lat/"; ?>


    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title><?= htmlspecialchars($title) ?></title>
    <meta name="msvalidate.01" content="60C1E7E10D593EE874251FBA55A3EF3E" />
    <meta name="description" content="<?= htmlspecialchars($description) ?>">
    <meta name="keywords" content="<?= htmlspecialchars($keywords) ?>">
    <meta name="author" content="Suretek Infosoft">
    <meta name="robots" content="index, follow">
    <link rel="canonical" href="<?= htmlspecialchars($url) ?>">
    <link rel="preload"
        as="image"
        href="<?= $baseurl ?>assets/images/hero/hero-ban.webp"
        imagesrcset="<?= $baseurl ?>assets/images/hero/hero-ban.webp"
        imagesizes="100vw"
        type="image/webp"
        fetchpriority="high">

    <!-- Favicon -->
    <link rel="icon" href="<?= $baseurl ?>assets/images/favicon.ico" type="image/x-icon">
    <link rel="preload" href="<?= $baseurl ?>assets/css/style.css" as="style">
    <link rel="preload" href="<?= $baseurl ?>assets/css/responsive.css" as="style">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="preconnect" href="https://cdn.jsdelivr.net" crossorigin>

    <!-- Load CSS early (to prevent layout shift) -->
    <!-- ✅ Bootstrap -->
    <link href="<?= $baseurl ?>assets/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">


    <!-- ✅ Font Awesome -->
    <link rel="preload" href="<?= $baseurl ?>assets/fontawesome/css/font.css" as="style" onload="this.onload=null;this.rel='stylesheet'">
    <noscript>
        <link rel="stylesheet" href="<?= $baseurl ?>assets/fontawesome/css/font.css">
    </noscript>

    <!-- ✅ Owl Carousel -->
    <link rel="preload" href="<?= $baseurl ?>assets/carousel/owl.carousel.min.css" as="style" onload="this.onload=null;this.rel='stylesheet'">
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.css" />

    <noscript>
        <link rel="stylesheet" href="<?= $baseurl ?>assets/carousel/owl.carousel.min.css">
    </noscript>

    <!-- ✅ Swiper -->
    <link rel="preload" href="<?= $baseurl ?>assets/carousel/swiper-bundle.min.css" as="style" onload="this.onload=null;this.rel='stylesheet'">
    <noscript>
        <link rel="stylesheet" href="<?= $baseurl ?>assets/carousel/swiper-bundle.min.css">
    </noscript>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <!-- Preload Google Fonts stylesheet -->
    <link rel="preload" as="style" href="https://fonts.googleapis.com/css2?family=Poppins:wght@100..900&family=Teko:wght@300..700&display=swap" onload="this.onload=null;this.rel='stylesheet'">
    <noscript>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@100..900&family=Teko:wght@300..700&display=swap">
    </noscript>


    <!-- Custom CSS -->
    <link rel="stylesheet" href="<?= $baseurl ?>assets/css/style.css">
    <link rel="stylesheet" href="<?= $baseurl ?>assets/css/responsive.css">

    <!-- Open Graph -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="<?= htmlspecialchars($url) ?>">
    <meta property="og:title" content="<?= htmlspecialchars($title) ?>">
    <meta property="og:description" content="<?= htmlspecialchars($description) ?>">
    <!-- <meta property="og:image" content="<?= $baseurl ?><?= htmlspecialchars($ogImage) ?>"> -->
    <meta property="og:image" content="<?= htmlspecialchars($ogImage) ?>">

    <!-- Delay non-critical scripts -->
    <script>
        window.addEventListener('load', function() {
            const gtag = document.createElement('script');
            gtag.src = "https://www.googletagmanager.com/gtag/js?id=G-LEFRYJ3HXT";
            gtag.async = true;
            document.head.appendChild(gtag);
        });
    </script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());
        gtag('config', 'G-LEFRYJ3HXT');
    </script>

    <!-- Facebook Pixel + LinkedIn (load after main render) -->
    <script>
        function loadTrackingScripts() {
            // ---- Facebook Pixel ----
            ! function(f, b, e, v, n, t, s) {
                if (f.fbq) return;
                n = f.fbq = function() {
                    n.callMethod ? n.callMethod.apply(n, arguments) : n.queue.push(arguments)
                };
                if (!f._fbq) f._fbq = n;
                n.push = n;
                n.loaded = !0;
                n.version = '2.0';
                n.queue = [];
                t = b.createElement(e);
                t.async = !0;
                t.src = v;
                s = b.getElementsByTagName(e)[0];
                s.parentNode.insertBefore(t, s)
            }(window, document, 'script', 'https://connect.facebook.net/en_US/fbevents.js');

            fbq('init', '775415818404358');
            fbq('track', 'PageView');

            // ---- LinkedIn Insight ----
            (function(l) {
                if (!l) {
                    window.lintrk = function(a, b) {
                        window.lintrk.q.push([a, b])
                    };
                    window.lintrk.q = [];
                }
                const s = document.getElementsByTagName("script")[0];
                const b = document.createElement("script");
                b.type = "text/javascript";
                b.async = true;
                b.src = "https://snap.licdn.com/li.lms-analytics/insight.min.js";
                s.parentNode.insertBefore(b, s);
            })(window.lintrk);

            // Remove listener once loaded
            document.removeEventListener('click', loadTrackingScripts);
        }

        // Load tracking only after first user click
        document.addEventListener('click', loadTrackingScripts, {
            once: true
        });
    </script>
    <script type="text/javascript">
        _linkedin_partner_id = "8348380";
        window._linkedin_data_partner_ids = window._linkedin_data_partner_ids || [];
        window._linkedin_data_partner_ids.push(_linkedin_partner_id);
    </script>
    <script type="text/javascript">
        (function(l) {
            if (!l) {
                window.lintrk = function(a, b) {
                    window.lintrk.q.push([a, b])
                };
                window.lintrk.q = []
            }
            var s = document.getElementsByTagName("script")[0];
            var b = document.createElement("script");
            b.type = "text/javascript";
            b.async = true;
            b.src = "https://snap.licdn.com/li.lms-analytics/insight.min.js";
            s.parentNode.insertBefore(b, s);
        })(window.lintrk);
    </script> <noscript> <img height="1" width="1" style="display:none;" alt="" src="https://px.ads.linkedin.com/collect/?pid=8348380&fmt=gif" /> </noscript>

    <!-- Google Tag Manager -->
    <!-- <script>
        (function(w, d, s, l, i) {
            w[l] = w[l] || [];
            w[l].push({
                'gtm.start': new Date().getTime(),
                event: 'gtm.js'
            });
            var f = d.getElementsByTagName(s)[0],
                j = d.createElement(s),
                dl = l != 'dataLayer' ? '&l=' + l : '';
            j.async = true;
            j.src =
                'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
            f.parentNode.insertBefore(j, f);
        })(window, document, 'script', 'dataLayer', 'GTM-5T6L5T62');
    </script> -->
    <!-- End Google Tag Manager -->

    <!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-WZL3T885');</script>
<!-- End Google Tag Manager -->


    <!-- schema start -->
    <!-- 1. Organization Schema -->

    <script type="application/ld+json">
        {
            "@context": "https://schema.org",
            "@type": "Organization",
            "name": "Suretek Infosoft Pvt Ltd",
            "url": "https://www.suretekinfosoft.com/",
            "logo": "https://www.suretekinfosoft.com/assets/images/logo-white.png",
            "description": "Suretek Infosoft provides custom software development, web &amp; mobile app solutions, AI services, and IT consulting to help businesses scale globally.",
            "foundingDate": "2010",
            "address": {
                "@type": "PostalAddress",
                "streetAddress": "D-247/32, Sector 63",
                "addressLocality": "Noida",
                "addressRegion": "Uttar Pradesh",
                "postalCode": "201301",
                "addressCountry": "IN"
            },
            "contactPoint": [{
                "@type": "ContactPoint",
                "telephone": "+91-120-4234350",
                "contactType": "customer support",
                "areaServed": "IN, US, EU"
            }],
            "sameAs": [
                "https://www.linkedin.com/company/suretek-infosoft-pvt--ltd-/",
                "https://www.facebook.com/suretekinfosoftglobal",
                "https://www.instagram.com/suretekinfosoft/",
                "https://x.com/suretekinfo",
                "https://www.youtube.com/@suretekinfosoftglobal"
            ]
        }
    </script>

    <!-- 2. Website Schema -->

    <script type="application/ld+json">
        {
            "@context": "https://schema.org",
            "@type": "WebSite",
            "url": "https://www.suretekinfosoft.com/",
            "name": "Suretek Infosoft",
            "potentialAction": {
                "@type": "SearchAction",
                "target": "https://www.suretekinfosoft.com/?s={search_term_string}",
                "query-input": "required name=search_term_string"
            }
        }
    </script>

    <!-- 3. Local Business Schema -->

    <script type="application/ld+json">
        {
            "@context": "https://schema.org",
            "@type": "LocalBusiness",
            "name": "Suretek Infosoft Pvt Ltd",
            "url": "https://www.suretekinfosoft.com/",
            "telephone": "+91-120-4234350",
            "address": {
                "@type": "PostalAddress",
                "streetAddress": "D-247/32, Sector 63",
                "addressLocality": "Noida",
                "addressRegion": "Uttar Pradesh",
                "postalCode": "201301",
                "addressCountry": "IN"
            },
            "openingHours": "Mo-Fr 09:00-18:00",
            "geo": {
                "@type": "GeoCoordinates",
                "latitude": "28.5675",
                "longitude": "77.3260"
            }
        }
    </script>

    <!-- 4. Breadcrumb Schema -->

    <script type="application/ld+json">
        {
            "@context": "https://schema.org",
            "@type": "BreadcrumbList",
            "itemListElement": [{
                    "@type": "ListItem",
                    "position": 1,
                    "name": "Home",
                    "item": "https://www.suretekinfosoft.com/"
                },
                {
                    "@type": "ListItem",
                    "position": 2,
                    "name": "Services",
                    "item": "https://www.suretekinfosoft.com/services.php"
                }
            ]
        }
    </script>
    <!-- schema end -->
<style>
.custom_software .info_box:hover {
    background: #f1f1f1;
    border-left: 4px solid #a22426;
    box-shadow: 0 6px 18px rgba(0, 0, 0, .08);
}
  .border_default:hover {
    border-left: solid 4px var(--text-color)
}
    </style>
</head>

<body>
    <!-- Google Tag Manager (noscript) -->
    <!-- <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-5T6L5T62"
            height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript> -->
    <!-- End Google Tag Manager (noscript) -->
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-WZL3T885"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->


    <header>
        <nav class="navbar fixed-top">
            <div class="top_line top_line1 d-none d-lg-block">
                <div class="container">
                    <div class="row">
                        <div class="col-md-auto ms-auto">
                            <!-- <ul class="calluscont d-none d-md-flex"> -->
                            <ul class="calluscont">
                                <li><img src="https://www.suretekinfosoft.com/assets/images/icons/india.png" alt="India - Suretek Infosoft" title="India - Suretek Infosoft">&nbsp;<a href="tel:+911204234350" title="Call Us - Suretek Infosoft">+91-120-4234350</a></li>
                                <li><img src="https://www.suretekinfosoft.com/assets/images/icons/Denmark.png" alt="Denmark - Suretek Infosoft" title="Denmark - Suretek Infosoft">&nbsp; <a href="tel:+4532330368" title="Call Us - Suretek Infosoft">+4532330368</a></li>
                                <li><img src="https://www.suretekinfosoft.com/assets/images/icons/finland.png" alt="Finland - Suretek Infosoft" title="Finland - Suretek Infosoft">&nbsp; <a href="tel:+358931581149" title="Call Us - Suretek Infosoft">+358931581149</a></li>
                                <!--<li><span class="fll"><span class="buscan">&nbsp;</span> +1-780-994-6439</span></li>-->
                                <li><img src="https://www.suretekinfosoft.com/assets/images/icons/uk.png" alt="United Kingdom - Suretek Infosoft" title="United Kingdom - Suretek Infosoft">&nbsp; <a href="tel:+447418352319" title="Call Us - Suretek Infosoft">+447418352319</a></li>
                         <li><img src="https://www.suretekinfosoft.com/assets/images/icons/sweden.png" alt="Sweden - Suretek Infosoft" title="Sweden - Suretek Infosoft">&nbsp; <a href="tel:+46812410910" title="Call Us - Suretek Infosoft">+46812410910</a></li>
                                <!-- <li><span class="fll"><span class="busuk">&nbsp;</span> +44-7505873729</span></li> -->
                            </ul>
                        </div>
                        <!-- <a href="#" class="w-fit-content btn btn-danger mx-auto d-md-none d-inline-block px-4 py-0 rounded fw-medium shadow-sm">
                            <i class="fa fa-phone me-2"></i> Business
                        </a> -->
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row w-100 align-items-center m-0">
                    <div class="col-md-3 col-lg-2 col-sm-4 col-6 ps-0">
                        <a class="navbar-brand" href="<?= $baseurl ?>index.php" title="Suretek Infosoft">
                            <img src="<?= $baseurl ?>assets/images/logo1.png" alt="Suretek Infosoft" title="Suretek Infosoft">
                        </a>
                    </div>
                    <div class="col-md-10 m-auto desktop_menu pe-0 d-none d-lg-flex justify-content-between">
                        <ul class="nav_menu ms-5 w-100 me-5">
                            <li class="nav-item dropdown">
                                <a class="nav-link" href="javascript:void(0);" title="About Us - Suretek Infosoft">
                                    About <i class="fa fa-chevron-down chevron"></i>
                                </a>
                                <!-- <ul class="mega_menu small_menu"> -->
                                <ul class="mega_menu">
                                    <div class="row g-0">
                                        <div class="col-md-4">
                                            <a href="<?= $baseurl ?>about-us.php" class="bocks seventh" title="About Us - Suretek Infosoft">
                                                <p class="title">About Us</p>
                                                <p>Discover who we are, our vision, and our journey.</p>
                                            </a>
                                        </div>
                                        <div class="col-md-4">
                                            <a href="<?= $baseurl ?>team.php" class="bocks sixth" title="Our Team - Suretek Infosoft">
                                                <p class="title">Our Team</p>
                                                <p>Meet the passionate people driving our success.</p>
                                            </a>
                                        </div>
                                        <div class="col-md-4">
                                            <a href="<?= $baseurl ?>life-at-suretek.php" class="bocks fivth" title="Life at Suretek - Suretek Infosoft">
                                                <p class="title">Life at Suretek</p>
                                                <p>Meet the passionate people driving our success.</p>
                                            </a>
                                        </div>

                                    </div>
                                </ul>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link" href="<?= $baseurl ?>services.php" title="Services - Suretek Infosoft">
                                    Services <i class="fa fa-chevron-down chevron"></i>
                                </a>
                                <ul class="mega_menu">
                                    <div class="row g-0">
                                        <div class="col-md-3">
                                            <a href="<?= $baseurl ?>team-augmentation.php" class="bocks first" title="Team Augmentation - Suretek Infosoft">
                                                <p class="title">Team <br /> Augmentation</p>
                                                <p>Scalable Talent Extension</p>
                                            </a>
                                        </div>
                                        <div class="col-md-3">
                                            <a title="Quality Assurance - Suretek Infosoft" href="<?= $baseurl ?>quality-assurance.php" class="bocks second">
                                                <p class="title">Quality <br /> Assurance</p>
                                                <p>Flawless Product Delivery</p>
                                            </a>
                                        </div>
                                        <div class="col-md-3">
                                            <a title="Software Development - Suretek Infosoft" href="<?= $baseurl ?>custom-software-development.php" class="bocks third">
                                                <p class="title">Software <br /> Development</p>
                                                <p>Custom Software Solutions</p>
                                            </a>
                                        </div>
                                        <div class="col-md-3">
                                            <a title="Mobile App Development - Suretek Infosoft" href="<?= $baseurl ?>mobile-app-development.php" class="bocks fourth">
                                                <p class="title">Mobile Apps <br /> Development</p>
                                                <p>Innovative App Development</p>
                                            </a>
                                        </div>
                                        <div class="col-md-3">
                                            <a title="Maintenance - Suretek Infosoft" href="<?= $baseurl ?>maintenance-and-support.php" class="bocks fivth">
                                                <p class="title">Software <br /> Maintenance</p>
                                                <p>Reliable System Support</p>
                                            </a>
                                        </div>
                                        <div class="col-md-3">
                                            <a title="IT Consulting - Suretek Infosoft" href="<?= $baseurl ?>it-consulting.php" class="bocks sixth">
                                                <p class="title">IT Consulting <br /> Services</p>
                                                <p>Strategic Tech Guidance</p>
                                            </a>
                                        </div>
                                        <div class="col-md-3">
                                            <a title="Web Application Development  - Suretek Infosoft" href="<?= $baseurl ?>web-application-development.php" class="bocks seventh">
                                                <p class="title">Web Apps <br /> Development</p>
                                                <p>Powerful Web Solutions</p>
                                            </a>
                                        </div>
                                        <div class="col-md-3">
                                            <a title="AI Solutions - Suretek Infosoft" href="<?= $baseurl ?>ai-solutions.php" class="bocks eighth">
                                                <p class="title">Artificial <br /> Intelligence</p>
                                                <p>Intelligent Automation Solutions</p>
                                            </a>
                                        </div>
                                        <div class="col-md-6 mx-auto text-center">
                                            <a title="Digital Design &amp; Creative Services - Suretek Infosoft" href="https://portfolio.suretekinfosoft.com" target="_blank" class="bocks fivth">
                                                <p class="fs-6 fw-semibold">Digital Design &amp; Creative Services</p>
                                                <p class="px-md-5">
                                                    Wide range of design services and digital solutions
                                                </p>
                                            </a>
                                        </div>
                                        <div class="col-md-6 mx-auto text-center">
                                            <a title="IT Infra &amp; Cloud Services - Suretek Infosoft" href="<?= $baseurl ?>it-infra-and-clould-services.php" class="bocks eight">
                                                <p class="fs-6 fw-semibold">IT Infra &amp; Cloud Services</p>
                                                <p class="px-md-5">
                                                    Operate on-premises, cloud, or hybrid systems
                                                </p>
                                            </a>
                                        </div>

                                    </div>
                                </ul>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link" href="<?= $baseurl ?>industries.php" title="Industries - Suretek Infosoft">
                                    Industries <i class="fa fa-chevron-down chevron"></i>
                                </a>
                                <ul class="mega_menu">
                                    <div class="row g-0">
                                        <div class="col-md-3">
                                            <a href="<?= $baseurl ?>financial-services-and-fintech.php" class="bocks third"
                                                title="Financial Services & Fintech - Suretek Infosoft">
                                                <p class="title">Financial Services & Fintech</p>
                                                <p>Secure, scalable solutions</p>
                                            </a>
                                        </div>
                                        <div class="col-md-3">
                                            <a href="<?= $baseurl ?>mobile-solutions.php" class="bocks fivth"
                                                title="Mobile Solutions - Suretek Infosoft">
                                                <p class="title">Mobile <br /> Solutions</p>
                                                <p>High-performance apps</p>
                                            </a>
                                        </div>
                                        <div class="col-md-3">
                                            <a href="<?= $baseurl ?>e-learning-solutions.php" class="bocks seventh"
                                                title="E-Learning Solutions - Suretek Infosoft">
                                                <p class="title">E-Learning <br /> Solutions</p>
                                                <p>Interactive platforms</p>
                                            </a>
                                        </div>
                                        <div class="col-md-3">
                                            <a href="<?= $baseurl ?>e-commerce-development.php" class="bocks eighth"
                                                title="E-Commerce Development - Suretek Infosoft">
                                                <p class="title">E-Commerce <br /> Development</p>
                                                <p>Smart online stores</p>
                                            </a>
                                        </div>
                                        <!-- Additional industries -->
                                        <div class="col-md-3">
                                            <a href="<?= $baseurl ?>healthcare-and-medtech.php" class="bocks first"
                                                title="Healthcare & MedTech - Suretek Infosoft">
                                                <p class="title">Healthcare & <br />MedTech</p>
                                                <p>Innovative solutions</p>
                                            </a>
                                        </div>
                                        <div class="col-md-3">
                                            <a href="<?= $baseurl ?>travel-and-hospitality.php" class="bocks second"
                                                title="Travel & Hospitality - Suretek Infosoft">
                                                <p class="title">Travel & <br />Hospitality</p>
                                                <p>Enhanced digital experiences</p>
                                            </a>
                                        </div>
                                        <div class="col-md-3">
                                            <a href="<?= $baseurl ?>retail-and-consumer-goods.php" class="bocks fourth"
                                                title="Retail & Consumer Goods - Suretek Infosoft">
                                                <p class="title">Retail & <br /> Consumer Goods</p>
                                                <p>Digital strategies</p>
                                            </a>
                                        </div>

                                        <div class="col-md-3">

                                            <a href="<?= $baseurl ?>logistics-and-supply-chain.php" class="bocks sixth"

                                                title="Logistics & Supply Chain - Suretek Infosoft">

                                                <p class="title">Logistics & Supply Chain</p>

                                                <p>Optimize operations</p>

                                            </a>

                                        </div>

                                        <div class="col-md-12 mx-auto text-center">

                                            <a href="<?= $baseurl ?>manufacturing-and-operations-excellence.php" class="bocks fivth w-100"

                                                title="Manufacturing & Operations Excellence - Suretek Infosoft">

                                                <p class="title">Manufacturing & Operations Excellence</p>

                                                <p>Optimized Production</p>

                                            </a>

                                        </div>

                                    </div>

                                </ul>

                            </li>



                            <li class="nav-item dropdown">

                                <a class="nav-link" href="javascript:void(0);" title="Success Stories - Suretek Infosoft">

                                    Success Stories <i class="fa fa-chevron-down chevron"></i>

                                </a>

                                <ul class="mega_menu small_menu">

                                    <div class="row g-0">

                                        <div class="col-md-6">

                                            <a href="<?= $baseurl ?>blogs.php" class="bocks fourth"

                                                title="Blogs - Suretek Infosoft">

                                                <p class="title">Blogs</p>

                                                <p>Insights, trends, and ideas from our experts.</p>

                                            </a>

                                        </div>



                                        <div class="col-md-6">

                                            <a href="<?= $baseurl ?>case-studies.php" class="bocks sixth"

                                                title="Case Studies - Suretek Infosoft">

                                                <p class="title">Case Studies</p>

                                                <p>Real success stories showcasing client growth.</p>

                                            </a>

                                        </div>

                                    </div>

                                </ul>

                            </li>



                            <li class="nav-item">

                                <a class="nav-link" href="<?= $baseurl ?>careers.php" title="Careers - Suretek Infosoft">Careers</a>

                            </li>

                            <li class="nav-item">

                                <a class="nav-link" href="<?= $baseurl ?>global-ties.php" title="Global Ties - Suretek Infosoft">Global Ties</a>

                            </li>



                        </ul>

                        <a href="<?= $baseurl ?>contact-us.php" class="butn" title="Contact Us - Suretek Infosoft">Contact Us</a>

                    </div>

                    <!-- <div class="col-md-2 d-none d-lg-flex justify-content-end pe-md-0">

                    </div> -->

                    <div class="col-auto ms-auto d-flex gap-5 d-lg-none p-0">

                        <!-- <a href="tel:+911204234350" class="call_btn d-flex d-md-none" title="Call Now - Suretek Infosoft">

                            <i class="fa fa-phone"></i>

                        </a> -->

                        <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">

                            <i class="fa fa-bars"></i>

                        </button>

                    </div>

                </div>

                <!-- mobile menu  -->

                <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">

                    <div class="offcanvas-header mb-5">

                        <a href="<?= $baseurl ?>index.php" title="Suretek Infosoft" class="offcanvas-title" id="offcanvasNavbarLabel">

                            <img src="<?= $baseurl ?>assets/images/logo.png" alt="Suretek Infosoft" title="Suretek Infosoft">

                        </a>

                        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>

                    </div>

                    <div class="offcanvas-body">

                        <ul class="navbar-nav justify-content-end flex-grow-1" id="mainNav">



                            <!-- <li class="nav-item">

                                <a class="nav-link" href="<?= $baseurl ?>about-us.php" title="">About</a>

                            </li> -->

                            <li class="nav-item">

                                <a class="nav-link d-flex justify-content-between align-items-center"

                                    data-bs-toggle="collapse" href="#aboutMenu" role="button"

                                    aria-expanded="false" aria-controls="aboutMenu" title="About - Suretek Infosoft">

                                    About <span class="dropdown-icon">+</span>

                                </a>

                                <ul class="collapse list-unstyled ps-3" id="aboutMenu" data-bs-parent="#mainNav">

                                    <li><a class="nav-link" href="<?= $baseurl ?>about-us.php" title="About Us - Suretek Infosoft">About Us</a></li>

                                    <li><a class="nav-link" href="<?= $baseurl ?>team.php" title="Our Team - Suretek Infosoft">Our Team</a></li>
                                   
                                    <li><a class="nav-link" href="<?= $baseurl ?>life-at-suretek.php" title="Life at Suretek - Suretek Infosoft">Life at Suretek</a></li>

                                </ul>

                            </li>



                            <!-- Services -->

                            <li class="nav-item">

                                <a class="nav-link d-flex justify-content-between align-items-center"

                                    data-bs-toggle="collapse" href="#servicesMenu" role="button"

                                    aria-expanded="false" aria-controls="servicesMenu" title="Services - Suretek Infosoft">

                                    Services <span class="dropdown-icon">+</span>

                                </a>

                                <ul class="collapse list-unstyled ps-3" id="servicesMenu" data-bs-parent="#mainNav">

                                    <li><a class="nav-link" href="<?= $baseurl ?>services.php" title="All Services - Suretek Infosoft">All Services</a></li>

                                    <li><a class="nav-link" href="<?= $baseurl ?>team-augmentation.php" title="Team Augmentation Services - Suretek Infosoft">Team Augmentation Services</a></li>

                                    <li><a class="nav-link" href="<?= $baseurl ?>quality-assurance.php" title="Quality Assurance - Suretek Infosoft">Quality Assurance</a></li>

                                    <li><a class="nav-link" href="<?= $baseurl ?>custom-software-development.php" title="Custom Software Development - Suretek Infosoft">Custom Software Development</a></li>

                                    <li><a class="nav-link" href="<?= $baseurl ?>mobile-app-development.php" title="Mobile Application - Suretek Infosoft">Mobile Application</a></li>

                                    <li><a class="nav-link" href="<?= $baseurl ?>maintenance-and-support.php" title="Maintenance & Support - Suretek Infosoft">Maintenance & Support</a></li>

                                    <li><a class="nav-link" href="<?= $baseurl ?>it-consulting.php" title="IT Consulting - Suretek Infosoft">IT Consulting</a></li>

                                    <li><a class="nav-link" href="<?= $baseurl ?>web-application-development.php" title="Web Application Development - Suretek Infosoft">Web Application Development</a></li>

                                    <li><a class="nav-link" href="<?= $baseurl ?>ai-solutions.php" title="AI Solutions - Suretek Infosoft">AI Solutions</a></li>

                                    <li><a class="nav-link" href="https://portfolio.suretekinfosoft.com" target="_blank" title="Digital Design & Creative Services - Suretek Infosoft">Digital Design & Creative Services</a></li>

                                    <li><a class="nav-link" title="Digital Design &amp; Creative Services - Suretek Infosoft" href="<?= $baseurl ?>it-infra-and-clould-services.php" target="_blank">IT Infra & Cloud Services</a></li>

                                </ul>

                            </li>



                            <!-- Industries -->

                            <li class="nav-item">

                                <a class="nav-link d-flex justify-content-between align-items-center"

                                    data-bs-toggle="collapse" href="#industriesMenu" role="button"

                                    aria-expanded="false" aria-controls="industriesMenu" title="Industries - Suretek Infosoft">

                                    Industries <span class="dropdown-icon">+</span>

                                </a>

                                <ul class="collapse list-unstyled ps-3" id="industriesMenu" data-bs-parent="#mainNav">

                                    <li><a class="nav-link" href="<?= $baseurl ?>industries.php" title="All Industries - Suretek Infosoft">All Industries</a></li>

                                    <li><a class="nav-link" href="<?= $baseurl ?>financial-services-and-fintech.php" title="Financial Services & Fintech - Suretek Infosoft">Financial Services & Fintech</a></li>

                                    <li><a class="nav-link" href="<?= $baseurl ?>mobile-solutions.php" title="Mobile Solutions - Suretek Infosoft">Mobile Solutions</a></li>

                                    <li><a class="nav-link" href="<?= $baseurl ?>e-learning-solutions.php" title="E-Learning Solutions - Suretek Infosoft">E-Learning Solutions</a></li>

                                    <li><a class="nav-link" href="<?= $baseurl ?>e-commerce-development.php" title="E-Commerce Development - Suretek Infosoft">E-Commerce Development</a></li>

                                    <li><a class="nav-link" href="<?= $baseurl ?>healthcare-and-medtech.php" title="Healthcare & MedTech - Suretek Infosoft">Healthcare & MedTech</a></li>

                                    <li><a class="nav-link" href="<?= $baseurl ?>travel-and-hospitality.php" title="Travel & Hospitality - Suretek Infosoft">Travel & Hospitality</a></li>

                                    <li><a class="nav-link" href="<?= $baseurl ?>retail-and-consumer-goods.php" title="Retail & Consumer Goods - Suretek Infosoft">Retail & Consumer Goods</a></li>

                                    <li><a class="nav-link" href="<?= $baseurl ?>logistics-and-supply-chain.php" title="Logistics & Supply Chain - Suretek Infosoft">Logistics & Supply Chain</a></li>

                                </ul>

                            </li>



                            <!-- Resources -->

                            <li class="nav-item">

                                <a class="nav-link d-flex justify-content-between align-items-center"

                                    data-bs-toggle="collapse" href="#resourcesMenu" role="button"

                                    aria-expanded="false" aria-controls="resourcesMenu" title="Resources - Suretek Infosoft">

                                    Success Stories <span class="dropdown-icon">+</span>

                                </a>

                                <ul class="collapse list-unstyled ps-3" id="resourcesMenu" data-bs-parent="#mainNav">

                                    <li><a class="nav-link" href="<?= $baseurl ?>case-studies.php" title="Case Studies - Suretek Infosoft">Case Studies</a></li>

                                    <li><a class="nav-link" href="<?= $baseurl ?>blogs.php" title="Blogs - Suretek Infosoft">Blogs</a></li>

                                    <!-- <li><a class="nav-link" href="https://portfolio.suretekinfosoft.com" target="_blank">Digital Branding</a></li> -->

                                </ul>

                            </li>



                            <li class="nav-item"><a class="nav-link" href="<?= $baseurl ?>careers.php" title="Careers - Suretek Infosoft">Careers</a></li>

                            <li class="nav-item"><a class="nav-link" href="<?= $baseurl ?>global-ties.php" title="Global Ties - Suretek Infosoft">Global Ties</a></li>

                            <li class="nav-item"><a class="nav-link" href="<?= $baseurl ?>contact-us.php" title="Contact Us - Suretek Infosoft">Contact Us</a></li>

                            <!-- <li class="nav-item"><a class="nav-link" href="https://portfolio.suretekinfosoft.com/">Portfolio</a></li> -->

                        </ul>

                        <ul class="calluscont">

                            <li><img src="https://www.suretekinfosoft.com/assets/images/icons/india.png" alt="India - Suretek Infosoft" title="India - Suretek Infosoft">&nbsp;<a href="tel:+911204234350" title="Call Us - Suretek Infosoft">+91-120-4234350</a></li>

                            <li><img src="https://www.suretekinfosoft.com/assets/images/icons/usa.png" alt="USA - Suretek Infosoft" title="USA - Suretek Infosoft">&nbsp; <a href="tel:+19252720857" title="Call Us - Suretek Infosoft">+1-925-272-0857</a></li>

                            <li><img src="https://www.suretekinfosoft.com/assets/images/icons/sweden.png" alt="Sweden - Suretek Infosoft" title="Sweden - Suretek Infosoft">&nbsp; <a href="tel:+46709968622" title="Call Us - Suretek Infosoft">+46-709-96-86-22</a></li>

                            <!--<li><span class="fll"><span class="buscan">&nbsp;</span> +1-780-994-6439</span></li>-->

                            <li><img src="https://www.suretekinfosoft.com/assets/images/icons/singapore.webp" alt="Singapore - Suretek Infosoft" title="Singapore - Suretek Infosoft">&nbsp; <a href="tel:+6593599621" title="Call Us - Suretek Infosoft">+65 9359 9621</a></li>

                            <!-- <li><span class="fll"><span class="busuk">&nbsp;</span> +44-7505873729</span></li> -->

                        </ul>





                        <!-- JS -->

                        <script>
                            document.addEventListener("DOMContentLoaded", function() {

                                document.querySelectorAll("#mainNav .nav-item").forEach(function(item) {

                                    const toggle = item.querySelector("[data-bs-toggle='collapse']");

                                    if (!toggle) return; // skip non-dropdown items

                                    const icon = toggle.querySelector(".dropdown-icon");

                                    const target = document.querySelector(toggle.getAttribute("href"));



                                    target.addEventListener("shown.bs.collapse", function() {

                                        icon.textContent = "–";

                                    });

                                    target.addEventListener("hidden.bs.collapse", function() {

                                        icon.textContent = "+";

                                    });

                                });

                            });
                        </script>



                        <!-- <form class="d-none d-md-flex mt-3" role="search">

                            <a href="<?= $baseurl ?>contact-us.php" class="btn btn-dark rounded-pill">Contact Us</a>

                        </form> -->

                    </div>

                </div>

            </div>

        </nav>

    </header>

    <?php include("cookies.php") ?>