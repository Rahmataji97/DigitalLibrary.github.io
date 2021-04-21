<!DOCTYPE html>
<html lang="zxx">
    

	<?php include "header.php" ?>

    <body>
		<?php include "header_section_detail.php"; ?>  

        <!-- Start: Page Banner -->
        <section class="page-banner services-banner">
            <div class="container">
                <div class="banner-header">
                    <h2>Contact Us</h2>
                    <span class="underline center"></span>
                    <p class="lead">Hubungi Kami.</p>
                </div>
                <div class="breadcrumb">
                    <ul>
                        <li><a href="index.php">Home</a></li>
                        <li>Contact</li>
                    </ul>
                </div>
            </div>
        </section>
        <!-- End: Page Banner -->
        
        <!-- Start: Contact Us Section -->
        <div id="content" class="site-content">
            <div id="primary" class="content-area">
                <main id="main" class="site-main">
                    <div class="contact-main">
                        <div class="contact-us">
                            <div class="container">
                                <div class="contact-location">
                                    <div class="flipcard">
                                        <div class="front">
                                            <div class="top-info">
                                                <span><i class="fa fa-map-marker" aria-hidden="true"></i> Address</span>
                                            </div>
                                            <div class="bottom-info">
                                                <span class="top-arrow"></span>
                                                <ul>
                                                    <li>Jl. Sawo Manila </li>
                                                    <li>Pasar Minggu, Jakarta Selatan 12520</li>
                                                    <li>Indonesia</li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="back">
                                            <div class="bottom-info orange-bg">
                                                <span class="bottom-arrow"></span>
                                                <ul>
                                                    <li> Jl. Sawo Manila </li>
                                                    <li>Pasar Minggu, Jakarta Selatan 12520</li>
                                                    <li>Indonesia</li>
                                                </ul>
                                            </div>
                                            <div class="top-info dark-bg">
                                                <span><i class="fa fa-map-marker" aria-hidden="true"></i> Address</span>
                                            </div>                                                
                                        </div>
                                    </div>
                                    <div class="flipcard">
                                        <div class="front">
                                            <div class="top-info">
                                                <span><i class="fa fa-fax" aria-hidden="true"></i> Phone</span>
                                            </div>
                                            <div class="bottom-info">
                                                <span class="top-arrow"></span>
                                                <ul>
                                                    <li>(021) 7806700</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="back">
                                            <div class="bottom-info orange-bg">
                                                <span class="bottom-arrow"></span>
                                                <ul>
                                                    <li>(021) 7806700</a></li>
                                                </ul>
                                            </div>
                                            <div class="top-info dark-bg">
                                                <span><i class="fa fa-fax" aria-hidden="true"></i> Phone</span>
                                            </div>                                                
                                        </div>
                                    </div>
                                    <div class="flipcard">
                                        <div class="front">
                                            <div class="top-info">
                                                <span><i class="fa fa-envelope" aria-hidden="true"></i> Email</span>
                                            </div>
                                            <div class="bottom-info">
                                                <span class="top-arrow"></span>
                                                <ul>
                                                    <li>info@unas.ac.id</li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="back">
                                            <div class="bottom-info orange-bg">
                                                <span class="bottom-arrow"></span>
                                                <ul>
                                                    <li>info@unas.ac.id</li>
                                                </ul>
                                            </div>
                                            <div class="top-info dark-bg">
                                                <span><i class="fa fa-envelope" aria-hidden="true"></i> Email</span>
                                            </div>                                                
                                        </div>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="row">
                                    <div class="contact-area">
                                        <div class="container">
                                            <div class="col-md-5 col-md-offset-1 border-gray-left">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="contact-map bg-light margin-left">
                                                            <div class="company-map" id="map"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-5 border-gray-right">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="contact-form bg-light margin-right">
                                                            <h2>Ada masukan untuk kami!</h2>
                                                            <span class="underline left"></span>
                                                            <div class="contact-fields">
                                                                <form  action="<?php echo $url;?>control/pesan.php?action=1" method="post" enctype="multipart/form-data">
                                                                    <div class="row">
                                                                        <div class="col-md-6 col-sm-6">
                                                                            <div class="form-group">
                                                                                <input class="form-control" type="text" placeholder="First Name" name="first-name" id="first-name" size="30" value="" aria-required="true" />
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6 col-sm-6">
                                                                            <div class="form-group">
                                                                                <input class="form-control" type="text" placeholder="Last Name" name="last-name" id="last-name" size="30" value="" aria-required="true" />
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6 col-sm-6">
                                                                            <div class="form-group">
                                                                                <input class="form-control" type="email" pattern="[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{1,63}$" placeholder="Email" name="email" id="email" size="30" value="" aria-required="true" />
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6 col-sm-6">
                                                                            <div class="form-group">
                                                                                <input class="form-control" type="text" placeholder="Phone Number" name="phone" id="phone" size="30" value="" aria-required="true" />
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-12">
                                                                            <div class="form-group">
                                                                                <textarea class="form-control" placeholder="Your message" id="message" name="message" aria-required="true"></textarea>
                                                                                <div class="clearfix"></div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-12">
                                                                            <div class="form-group form-submit">
                                                                                <input class="btn btn-default" type="submit" name="submit" value="Send Message"  />
                                                                            </div>
                                                                        </div>
                                                                        
                                                                    </div>
                                                                </form> 
                                                            </div>                                                                   
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
        </div>
        <!-- End: Contact Us Section -->

	<?php include "footer.php"; ?>
    </body>


</html>
