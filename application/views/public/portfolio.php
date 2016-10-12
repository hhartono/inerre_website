<?php 
    // load view header from template
    $this->load->view('public/public_template/header');
?>          
            <!-- Head Section -->
            <section class="page-section bg-dark-lighter parallax-3" data-background="/assets/images/subheader/subheader_portfolio.jpg">
                <div class="relative container align-left">
                    <div class="row">
                        <div class="col-md-12">
                            <h1 class="opensans700 textshadowblack hs-line-11 font-alt mb-20 mt-xs-40 mb-xs-0 inerre-brown ">Portfolio</h1>
                            <div class="opensans700 textshadowblack hs-line-4 font-alt ">
                                A proud portrait of INERRE’s work
                            </div>
                        </div>
                        <!--div class="col-md-4 mt-30">
                            <div class="mod-breadcrumbs font-alt align-right">
                                <a href="/home">Home</a>&nbsp;<i class="inerre-brown">//</i>&nbsp;<span>Portfolio</span>
                            </div>
                        </div-->
                    </div>
                </div>
            </section>
            <!-- End Head Section -->
            <!-- Section -->
            <section class="page-section">
                <div class="container relative">
                    <!-- Photo Grid -->
                    <div class="row multi-columns-row mb-30 mb-xs-10">
                    <?php
                    if(isset($loadportfolio)){
                        foreach($loadportfolio as $lp){
                    ?>
                             <!-- Photo Item -->
                            <div class="col-md-6 col-lg-6 mb-md-10">
                                <div class="post-prev-img" style="margin-bottom:60px;">
                                    <a href="/upload/portfolio/<?php echo $lp->photo_portfolio;?>" class="lightbox-gallery-2 mfp-image">
                                        <img src="/upload/portfolio/<?php echo $lp->photo_portfolio;?>" alt="INERRE BANDUNG portfolios" />
                                    </a>
                                </div>
                                <!-- <div class="alt-features-item align-center">
                                    <div class="alt-features-descr align-left">
                                        <h2 class="section-title mt-0 font-alt align-left" style="margin-top:-50px !important; margin-bottom:-14px;"><?php echo $lp->portfolio_title; ?></h2>
                                        <h3 class="alt-features-title font-alt" style="color:#00010C; margin-bottom:14px;"><?php echo $lp->portfolio_location;?></h3>
                                        <?php
                                            $description =  $lp->portfolio_description;
                                            $karakter = 433;
                                            $tampil = substr($description, 0, $karakter);
                                            echo $tampil;
                                        ?>
                                    </div>
                                </div>
                                </br>
                                </br> -->
                            </div>
                            <!-- End Photo Item -->
                    <?php
                        }
                    ?>

                        <!-- Photo Item
                        <div class="col-md-4 col-lg-4 mb-md-10">
                            <div class="post-prev-img">
                                <a href="/assets/images/portfolio-inerre/015532-1140.jpg" class="lightbox-gallery-2 mfp-image"><img src="/assets/images/portfolio-inerre/015532-650.jpg" alt="" /></a>
                            </div>
                            <div class="alt-features-item align-center">
                                <div class="alt-features-descr align-left">
                                    <h2 class="section-title mt-0 font-alt align-left" style="margin-top:-50px !important; margin-bottom:-14px;">Title 1</h2>
                                    <h3 class="alt-features-title font-alt" style="color:#00010C; margin-bottom:14px;">Bandung, Indonesia</h3>
                                    From idea to installation, from concept to check-in, we want to make sure that all of our designs are able to reflect the characters of our clients’ personalities and lifestyles, from the broad narrative down to the smallest most meaningful details.
                                </div>
                            </div>
                            </br>
                            </br>
                        </div>
                        End Photo Item
                        
                        Photo Item
                        <div class="col-md-4 col-lg-4 mb-md-10">
                            <div class="post-prev-img">
                                <a href="/assets/images/portfolio-inerre/025053-1140.jpg" class="lightbox-gallery-2 mfp-image"><img src="/assets/images/portfolio-inerre/025053-650.jpg" alt="" /></a>
                            </div>
                            <div class="alt-features-item align-center">
                                <div class="alt-features-descr align-left">
                                    <h2 class="section-title mt-0 font-alt align-left" style="margin-top:-50px !important; margin-bottom:-14px;">Title 2</h2>
                                    <h3 class="alt-features-title font-alt" style="color:#00010C; margin-bottom:14px;">Bandung, Indonesia</h3>
                                    From idea to installation, from concept to check-in, we want to make sure that all of our designs are able to reflect the characters of our clients’ personalities and lifestyles, from the broad narrative down to the smallest most meaningful details.
                                </div>
                            </div>
                            </br>
                            </br>
                        </div>
                        End Photo Item
                        Photo Item
                        <div class="col-md-4 col-lg-4 mb-md-10">
                            <div class="post-prev-img">
                                <a href="/assets/images/portfolio-inerre/034836-1140.jpg" class="lightbox-gallery-2 mfp-image"><img src="/assets/images/portfolio-inerre/034836-650.jpg" alt="" /></a>
                            </div>
                            <div class="alt-features-item align-center">
                                <div class="alt-features-descr align-left">
                                    <h2 class="section-title mt-0 font-alt align-left" style="margin-top:-50px !important; margin-bottom:-14px;">Title 3</h2>
                                    <h3 class="alt-features-title font-alt" style="color:#00010C; margin-bottom:14px;">Bandung, Indonesia</h3>
                                    From idea to installation, from concept to check-in, we want to make sure that all of our designs are able to reflect the characters of our clients’ personalities and lifestyles, from the broad narrative down to the smallest most meaningful details.
                                </div>
                            </div>
                            </br>
                            </br>
                        </div>
                        End Photo Item
                        Photo Item
                        <div class="col-md-4 col-lg-4 mb-md-10">
                            <div class="post-prev-img">
                                <a href="/assets/images/portfolio-inerre/034909-1140.jpg" class="lightbox-gallery-2 mfp-image"><img src="/assets/images/portfolio-inerre/034909-650.jpg" alt="" /></a>
                            </div>
                            <div class="alt-features-item align-center">
                                <div class="alt-features-descr align-left">
                                    <h2 class="section-title mt-0 font-alt align-left" style="margin-top:-50px !important; margin-bottom:-14px;">Title 4</h2>
                                    <h3 class="alt-features-title font-alt" style="color:#00010C; margin-bottom:14px;">Bandung, Indonesia</h3>
                                    From idea to installation, from concept to check-in, we want to make sure that all of our designs are able to reflect the characters of our clients’ personalities and lifestyles, from the broad narrative down to the smallest most meaningful details.
                                </div>
                            </div>
                            </br>
                            </br>
                        </div>
                        End Photo Item
                        Photo Item
                        <div class="col-md-4 col-lg-4 mb-md-10">
                            <div class="post-prev-img">
                                <a href="/assets/images/portfolio-inerre/045216-1140.jpg" class="lightbox-gallery-2 mfp-image"><img src="/assets/images/portfolio-inerre/045216-650.jpg" alt="" /></a>
                            </div>
                            <div class="alt-features-item align-center">
                                <div class="alt-features-descr align-left">
                                    <h2 class="section-title mt-0 font-alt align-left" style="margin-top:-50px !important; margin-bottom:-14px;">Title 5</h2>
                                    <h3 class="alt-features-title font-alt" style="color:#00010C; margin-bottom:14px;">Bandung, Indonesia</h3>
                                    More than 80% of your customers care about social impact. That's a lot of people. It's also why sustainable brands are great and why positive branding is vital. You want your customers to trust you better than the competition.
                                    Our positive branding process involves creating and designing sustainable brands by connecting you with innovative nonprofits who can help you discover how you can maximise social impact in your community.
                                </div>
                            </div>
                            </br>
                            </br>
                        </div>
                        End Photo Item
                        Photo Item
                        <div class="col-md-4 col-lg-4 mb-md-10">
                            <div class="post-prev-img">
                                <a href="/assets/images/portfolio-inerre/051453-1140.jpg" class="lightbox-gallery-2 mfp-image"><img src="/assets/images/portfolio-inerre/051453-650.jpg" alt="" /></a>
                            </div>
                           <div class="alt-features-item align-center">
                                <div class="alt-features-descr align-left">
                                    <h2 class="section-title mt-0 font-alt align-left" style="margin-top:-50px !important; margin-bottom:-14px;">Title 6</h2>
                                    <h3 class="alt-features-title font-alt" style="color:#00010C; margin-bottom:14px;">Bandung, Indonesia</h3>
                                    From idea to installation, from concept to check-in, we want to make sure that all of our designs are able to reflect the characters of our clients’ personalities and lifestyles, from the broad narrative down to the smallest most meaningful details.
                                </div>
                            </div>
                            </br>
                            </br>
                        </div>
                        End Photo Item
                        Photo Item
                        <div class="col-md-4 col-lg-4 mb-md-10">
                            <div class="post-prev-img">
                                <a href="/assets/images/portfolio-inerre/052712-1140.jpg" class="lightbox-gallery-2 mfp-image"><img src="/assets/images/portfolio-inerre/052712-650.jpg" alt="" /></a>
                            </div>
                            <div class="alt-features-item align-center">
                                <div class="alt-features-descr align-left">
                                    <h2 class="section-title mt-0 font-alt align-left" style="margin-top:-50px !important; margin-bottom:-14px;">Title 7</h2>
                                    <h3 class="alt-features-title font-alt" style="color:#00010C; margin-bottom:14px;">Bandung, Indonesia</h3>
                                    More than 80% of your customers care about social impact. That's a lot of people. It's also why sustainable brands are great and why positive branding is vital. You want your customers to trust you better than the competition.
                                    Our positive branding process involves creating and designing sustainable brands by connecting you with innovative nonprofits who can help you discover how you can maximise social impact in your community.
                                </div>
                            </div>
                            </br>
                            </br>
                        </div>
                        End Photo Item
                        Photo Item
                        <div class="col-md-4 col-lg-4 mb-md-10">
                            <div class="post-prev-img">
                                <a href="/assets/images/portfolio-inerre/052786-1140.jpg" class="lightbox-gallery-2 mfp-image"><img src="/assets/images/portfolio-inerre/052786-650.jpg" alt="" /></a>
                            </div>
                            <div class="alt-features-item align-center">
                                <div class="alt-features-descr align-left">
                                    <h2 class="section-title mt-0 font-alt align-left" style="margin-top:-50px !important; margin-bottom:-14px;">Title 8</h2>
                                    <h3 class="alt-features-title font-alt" style="color:#00010C; margin-bottom:14px;">Bandung, Indonesia</h3>
                                    From idea to installation, from concept to check-in, we want to make sure that all of our designs are able to reflect the characters of our clients’ personalities and lifestyles, from the broad narrative down to the smallest most meaningful details.
                                </div>
                            </div>
                            </br>
                            </br>
                        </div>
                        End Photo Item
                        Photo Item
                        <div class="col-md-4 col-lg-4 mb-md-10">
                            <div class="post-prev-img">
                                <a href="/assets/images/portfolio-inerre/059594-1140.jpg" class="lightbox-gallery-2 mfp-image"><img src="/assets/images/portfolio-inerre/059594-650.jpg" alt="" /></a>
                            </div>
                            <div class="alt-features-item align-center">
                                <div class="alt-features-descr align-left">
                                    <h2 class="section-title mt-0 font-alt align-left" style="margin-top:-50px !important; margin-bottom:-14px;">Title 9</h2>
                                    <h3 class="alt-features-title font-alt" style="color:#00010C; margin-bottom:14px;">Bandung, Indonesia</h3>
                                    From idea to installation, from concept to check-in, we want to make sure that all of our designs are able to reflect the characters of our clients’ personalities and lifestyles, from the broad narrative down to the smallest most meaningful details.
                                </div>
                            </div>
                            </br>
                            </br>
                        </div>
                        End Photo Item
                        Photo Item
                        <div class="col-md-4 col-lg-4 mb-md-10">
                            <div class="post-prev-img">
                                <a href="/assets/images/portfolio-inerre/059982-1140.jpg" class="lightbox-gallery-2 mfp-image"><img src="/assets/images/portfolio-inerre/059982-650.jpg" alt="" /></a>
                            </div>
                            <div class="alt-features-item align-center">
                                <div class="alt-features-descr align-left">
                                    <h2 class="section-title mt-0 font-alt align-left" style="margin-top:-50px !important; margin-bottom:-14px;">Title 10</h2>
                                    <h3 class="alt-features-title font-alt" style="color:#00010C; margin-bottom:14px;">Bandung, Indonesia</h3>
                                    From idea to installation, from concept to check-in, we want to make sure that all of our designs are able to reflect the characters of our clients’ personalities and lifestyles, from the broad narrative down to the smallest most meaningful details.
                                </div>
                            </div>
                            </br>
                            </br>
                        </div>
                        End Photo Item -->
                    <?php
                    }else{
                    ?>

                    <?php
                    }
                    ?>
                    </div>
                    <!-- End Photo Grid -->
                </div>
            </section>
            <!-- End Section -->
            
            <!-- Contact Section -->
            <section class="page-section" id="contact" style="margin-top:-200px !important;">
                <div class="container relative">
                    <h2 class="section-title font-alt mb-70 mb-sm-40">
                        Find Inerre
                    </h2>
                    <div class="row">
                        <div class="col-md-8 col-md-offset-2">
                            <div class="row">
                                <!-- Phone -->
                                <div class="col-sm-6 col-lg-4 pt-20 pb-20 pb-xs-0">
                                    <div class="contact-item">
                                        <div class="ci-icon">
                                            <i class="fa fa-phone"></i>
                                        </div>
                                        <div class="ci-title font-alt">
                                            Call Us
                                        </div>
                                        <div class="ci-text">
                                            +62 22 423 2200
                                        </div>
                                    </div>
                                </div>
                                <!-- End Phone -->
                                <!-- Address -->
                                <div class="col-sm-6 col-lg-4 pt-20 pb-20 pb-xs-0">
                                    <div class="contact-item">
                                        <div class="ci-icon">
                                            <i class="fa fa-map-marker"></i>
                                        </div>
                                        <div class="ci-title font-alt">
                                            Address
                                        </div>
                                        <div class="ci-text">
                                            Jl. Pasteur 11<br>
                                            Bandung<br>
                                            INDONESIA
                                        </div>
                                    </div>
                                </div>
                                <!-- End Address -->
                                <!-- Email -->
                                <div class="col-sm-6 col-lg-4 pt-20 pb-20 pb-xs-0">
                                    <div class="contact-item">
                                        <div class="ci-icon">
                                            <i class="fa fa-envelope"></i>
                                        </div>
                                        <div class="ci-title font-alt">
                                            Email
                                        </div>
                                        <div class="ci-text">
                                            <a href="mailto:info@inerre.com">info@inerre.com</a>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Email -->
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- End Contact Section -->
<?php
    // load view footer from template
    $this->load->view('public/public_template/footer');
?>
