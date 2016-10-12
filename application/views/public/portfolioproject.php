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
                    if(isset($loadportfolioproject)){
                        foreach ($loadportfolioproject as $lpp) {
                    ?>

                        <!-- Photo Item -->
                        <div class="col-md-6 col-lg-6 mb-md-10">
                            <div class="post-prev-img">
                                <img src="/upload/portfolio/<?php echo $lpp->photo1;?>" alt="INERRE BANDUNG portfolios" />
                            </div>
                            
                        </div>
                        <!-- End Photo Item -->
                        
                        <!-- Photo Item -->
                        <div class="col-md-6 col-lg-6 mb-md-10">
                            <div class="alt-features-item align-center">
                                <div class="alt-features-descr align-left">
                                    <?php
                                        $description1 = $lpp->description1;
                                        $karakter = 250;
                                        $tampil = substr($description1, 0, $karakter);
                                        echo $tampil;
                                    ?>
                                </div>
                            </div>
                            
                        </div>
                        <!-- End Photo Item -->
                        <!-- Photo Item -->
                        <div class="col-md-6 col-lg-6 mb-md-10">
                            <div class="alt-features-item align-center">
                                <div class="alt-features-descr align-left">
                                <?php
                                    $description2 = $lpp->description2;
                                    $karakter = 250;
                                    $tampil = substr($description2, 0, $karakter);
                                    echo $tampil;
                                ?>
                                </div>
                            </div>
                            
                        </div>
                        <!-- End Photo Item -->
                        <!-- Photo Item -->
                        <div class="col-md-6 col-lg-6 mb-md-10">
                            <div class="post-prev-img">
                                <img src="/upload/portfolio/<?php echo $lpp->photo2;?>" alt="INERRE BANDUNG portfolios" />
                            </div>
                            </br>
                            </br>
                        </div>
                    <?php
                        }
                    } 
                    ?>
                    
                    </div>
                    <!-- End Photo Grid -->
            <div class="home-section fullwidth-slider bg-dark" id="home">
            <?php
            if(isset($loadportfoliocarousel)){
                foreach ($loadportfoliocarousel as $lpc) {
            ?>
                <!-- Slide Item -->
                <section class="home-section bg-scroll" data-background="/upload/portfolio/carousel/<?php echo $lpc->photo;?>">
                    <div class="js-height-full container">
                        <!-- Hero Content -->
                        <div class="home-content">
                            <div class="home-text">
                                <!-- Uncomment to put caption -->
                                <!--
                                <h1 class="hs-line-8 no-transp font-alt mb-50 mb-xs-30">
                                    We Are just crative people
                                </h1>
                                
                                <h2 class="hs-line-14 font-alt mb-50 mb-xs-30">
                                    Rhythm Creative Studio
                                </h2>
                                
                                <div class="local-scroll">
                                    <a href="#about" class="btn btn-mod btn-border-w btn-medium btn-round hidden-xs">See More</a>
                                    <span class="hidden-xs">&nbsp;</span>
                                    <a href="http://vimeo.com/50201327" class="btn btn-mod btn-border-w btn-medium btn-round lightbox mfp-iframe">Play Reel</a>
                                </div>
                                -->
                            </div>
                        </div>
                        <!-- End Hero Content -->
                    </div>
                </section>
                <!-- End Slide Item -->
            <?php
                }
            }
            ?>
            </div>
            <!-- End Fullwidth Slider -->
                    <!-- Photo Grid -->
                <div class="row multi-columns-row mb-30 mb-xs-10">
                <?php
                if(isset($loadportfoliodescription)){
                    foreach ($loadportfoliodescription as $lpd) {
                ?> 
                    <!-- Photo Item -->
                    <div class="col-md-6 col-lg-6 mb-md-10">
                        <div class="alt-features-item align-center">
                            <div class="alt-features-descr align-left">
                                <?php
                                    $description_left = $lpd->description_left;
                                    $karakter = 400;
                                    $tampil = substr($description_left, 0, $karakter);
                                    echo $tampil;
                                ?>
                            </div>
                        </div>
                        </br>
                        </br>
                    </div>
                    <!-- End Photo Item -->
                    <!-- Photo Item -->
                    <div class="col-md-6 col-lg-6 mb-md-10">
                        <div class="alt-features-item align-center">
                            <div class="alt-features-descr align-left">
                                <?php
                                    $description_right = $lpd->description_right;
                                    $karakter = 400;
                                    $tampil = substr($description_right, 0, $karakter);
                                    echo $tampil;
                                ?>
                            </div>
                        </div>
                        </br>
                        </br>
                    </div>
                    <!-- End Photo Item -->
                <?php
                    }
                }
                ?>
                </div>
                </div>
            </section>
            <!-- End Section -->
            
            <!-- Contact Section -->
            <section class="page-section" id="contact">
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
