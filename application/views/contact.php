<?php 
    // load view header from template
    $this->load->view('public_template/header');
?>          
            <!-- Head Section -->
            <section class="page-section bg-dark-alfa-60 parallax-3" data-background="/assets/images/full-width-images/test-bg.jpg" style="">
                <div class="relative container align-left">
                    
                    <div class="row">
                        
                        <div class="col-md-8">
                            <h1 class="hs-line-11 font-alt mb-20 mb-xs-0 inerre-brown">Contact</h1>
                            <div class="hs-line-4 font-alt">
                                Lorem ipsum dolor sit amet, consectetur adipiscing
                            </div>
                        </div>
                        
                        <div class="col-md-4 mt-30">
                            <div class="mod-breadcrumbs font-alt align-right">
                                <a href="/home">Home</a>&nbsp;<i class="inerre-brown">//</i>&nbsp;<span>Contact</span>
                            </div>
                            
                        </div>
                    </div>
                    
                </div>
            </section>
            <!-- End Head Section -->
            
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

                    <!-- Contact Form -->                            
                    <div class="row">
                        <div class="col-md-8 col-md-offset-2">
                            
                            <form method="POST" class="form contact-form" id="contact_form" autocomplete="off">
                                <div class="clearfix">
                                    <div class="cf-left-col">
                                        <!-- Name -->
                                        <div class="form-group">
                                            <input type="text" name="name" id="name" class="input-md round form-control" placeholder="Name" pattern=".{3,100}" required>
                                        </div>
                                        <!-- Email -->
                                        <div class="form-group">
                                            <input type="email" name="email" id="email" class="input-md round form-control" placeholder="Email" pattern=".{5,100}" required>
                                        </div>
                                    </div>
                                    <div class="cf-right-col">
                                        <!-- Message -->
                                        <div class="form-group">                                            
                                            <textarea name="message" id="message" class="input-md round form-control" style="height: 84px;" placeholder="Message"></textarea>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="clearfix">
                                    <div class="cf-left-col">
                                        <!-- Inform Tip -->                                        
                                        <div class="form-tip pt-20">
                                            <i class="fa fa-info-circle"></i> All the fields are required
                                        </div>
                                    </div>
                                    <div class="cf-right-col">
                                        <!-- Send Button -->
                                        <div class="align-right pt-10">
                                            <button class="submit_btn btn btn-mod btn-medium btn-round" id="submit_btn">Submit Message</button>
                                        </div>
                                    </div>
                                </div>
                                <div id="result"></div>
                            </form>
                            
                        </div>
                    </div>
                    <!-- End Contact Form -->
                    
                </div>
            </section>
            <!-- End Contact Section -->
            
             <!-- Google Map -->
            <div class="google-map">
                <!--div data-address="INERRE Interior, Jl. Pasteur No. 11, Bandung, Jawa Barat 40116" id="map-canvas"></div-->
                <div data-address="INERRE Interior, Jl. Pasteur No. 11, Bandung, Jawa Barat 40116" data-address-lat="-6.900460" data-address-long="107.603326" id="map-canvas"></div>
                <div class="map-section">
                    <div class="map-toggle">
                        <div class="mt-icon">
                            <i class="fa fa-map-marker"></i>
                        </div>
                        <div class="mt-text font-alt">
                            <div class="mt-open">Open the map <i class="fa fa-angle-down"></i></div>
                            <div class="mt-close">Close the map <i class="fa fa-angle-up"></i></div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Google Map -->

            <!-- Section button visit maps -->
            <section class="page-section hidden-lg hidden-md hidden-sm" id="section-button-visit">
                <div class="row">
                    <div class="col-xs-12 text-center" >
                        <div>
                            <a target="_blank" class="btn btn-mod btn-border btn-large" href="https://www.google.co.id/maps/dir//INERRE+Interior,+Jl.+Pasteur+No.+11,+Bandung,+Jawa+Barat+40116/@-6.9003664,107.5663282,13z/data=!3m1!4b1!4m9!4m8!1m0!1m5!1m1!1s0x2e68e64383f4eda3:0x420267de73972b84!2m2!1d107.603322!2d-6.900453!3e0?hl=en">
                                Visit Inerre
                            </a>
                        </div>
                    </div>
                </div>
            </section>
            <!-- END Section button visit maps -->

<?php
    // load view footer from template
    $this->load->view('public_template/footer');
?>
