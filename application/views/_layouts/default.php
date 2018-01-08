<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1"> <!--Escala para celulares-->
    <title>Lácteos - LA UNION</title>
    
    <!-- Main CSS file -->
    <link rel="stylesheet" href="<?php echo base_url()?>public/css/bootstrap.min.css" />
    <link rel="stylesheet" href="<?php echo base_url()?>public/css/owl.carousel.css" />
    <link rel="stylesheet" href="<?php echo base_url()?>public/css/magnific-popup.css" />
    <link rel="stylesheet" href="<?php echo base_url()?>public/css/font-awesome.css" />
    <link rel="stylesheet" href="<?php echo base_url()?>public/css/style.css" />
    <link rel="stylesheet" href="<?php echo base_url()?>public/css/responsive.css" />

    
    <!-- Favicon -->
    <link rel="shortcut icon" href="images/icon/favicon.png">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php echo base_url()?>public/images/icon/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo base_url()?>public/images/icon/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo base_url()?>public/images/icon/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="<?php echo base_url()?>public/images/icon/apple-touch-icon-57-precomposed.png">
    <script src='https://www.google.com/recaptcha/api.js'></script>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    
    <!--<video width="50%" controls>
    <source src="video/4.mp4" type="video/mp4">
    Your browser does not support the video tag.
    </video>--> <!--CODIGO PARA PONER VIDEOS-->
</head>
<body>

    <!-- PRELOADER -->
    <div id="st-preloader">
        <div id="pre-status">
            <div class="preload-placeholder"></div>
        </div>
    </div>
    <!-- /PRELOADER -->

    <!-- SLIDER -->
    <section id="slider">
        <div id="home-carousel" class="carousel slide" data-ride="carousel">            
            <div class="carousel-inner">
                <div class="item active" style="background-image: url(<?php echo base_url("public/images/header/00.jpg"); ?>)">
                    <div class="carousel-caption container">
                        <div class="row">
                            <div class="col-sm-7">
                                <h1>HEADER 01</h1>
                            </div>
                        </div>
                    </div>                  
                </div>
                <div class="item" style="background-image: url(<?php echo base_url("public/images/header/01.jpg"); ?>)">
                    <div class="carousel-caption container">
                        <div class="row">
                            <div class="col-sm-7">
                                <h1>HEADER 02</h1>
                            </div>
                        </div>
                    </div>                  
                </div>
                <div class="item" style="background-image: url(<?php echo base_url("public/images/header/02.jpg"); ?>)">
                    <div class="carousel-caption container">
                        <div class="row">
                            <div class="col-sm-7">
                                <h1>HEADER 03</h1>
                            </div>
                        </div>
                    </div>                  
                </div>
                <div class="item" style="background-image: url(<?php echo base_url("public/images/header/03.jpg"); ?>)">
                    <div class="carousel-caption container">
                        <div class="row">
                            <div class="col-sm-7">
                                <h1>HEADER 04</h1>
                            </div>
                        </div>
                    </div>                  
                </div>
                <a class="home-carousel-left" href="#home-carousel" data-slide="prev"><i class="fa fa-angle-left"></i></a>
                <a class="home-carousel-right" href="#home-carousel" data-slide="next"><i class="fa fa-angle-right"></i></a>
            </div>      
        </div> <!--/#home-carousel--> 
    </section>
    <!-- /SLIDER -->


    <!-- HEADER -->
    <header id="header">
        <nav class="navbar st-navbar navbar-fixed-top">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#st-navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>

                <div class="collapse navbar-collapse" id="st-navbar-collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="#slider">Inicio</a></li>
                        <li><a href="#quienes-somos">Quienes Somos</a></li>
                        <li><a href="#planta">Nuestra Planta</a></li>
                        <li><a href="#slider2">Nuestros Quesos</a></li>
                        <li><a href="#ubicacion">Ubicación</a></li>
                        <li><a href="#contact">Contactenos</a></li>
                    </ul>
                </div><!-- /.navbar-collapse -->
            </div><!-- /.container -->
        </nav>
    </header>
    <!-- /HEADER -->

    <!-- QUIENES SOMOS -->
    <section id="quienes-somos">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-title">
                        <h1>
                            <?php foreach ($who->result() as $fila): ?>
                            <span><?php echo $fila ->titulo ; ?></span>
                            <?php endforeach; ?>
                        </h1>
                        <span class="st-border"></span>
                    </div>
                </div>

                <div class="col-md-12 col-sm-6 st-service">
                    
                    <h2>
                        <?php foreach ($who->result() as $fila): ?>
                        <span><?php echo $fila ->subtitulo ; ?></span>
                        <?php endforeach; ?>
                    </h2>
                    <br>
                    <p>
                        <?php foreach ($who->result() as $fila): ?>
                        <span><?php echo $fila ->texto1 ; ?></span>
                        <?php endforeach; ?>
                    </p>
                    
                    <br>

                    <p>
                        <?php foreach ($who->result() as $fila): ?>
                        <span><?php echo $fila ->texto2 ; ?></span>
                        <?php endforeach; ?>
                    </p>
                </div>

                <!--<div class="col-md-4 col-sm-6 st-service">
                    <h2><i class="fa fa-cogs"></i> Web Developement</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dicta libero autem, magni veritatis, optio dolor.</p>
                </div> -->
            </div>
        </div>
    </section>
    <!-- /QUIENES SOMOS -->


    <!-- NUESTRA PLANTA -->
    <section id="planta">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-title">
                        <h1>
                            <?php foreach ($plant->result() as $fila): ?>
                            <span><?php echo $fila ->titulo ; ?></span>
                            <?php endforeach; ?>
                        </h1>
                        <span class="st-border"></span>
                    </div>
                </div>

                <div class="portfolio-wrapper" >
                    <div class="col-md-12">
                        <p>
                            <?php foreach ($plant->result() as $fila): ?>
                            <span><?php echo $fila ->texto ; ?></span>
                            <?php endforeach; ?>
                        </p>
                    </div>
                    
                    <div class="portfolio-items">
                        
                        <div class="col-md-4 col-sm-6 work-grid wordpress graphic">
                            <div class="portfolio-content">
                                <img class="img-responsive" src="<?php echo base_url("public/images/planta/00.jpg"); ?>" alt="">
                                <div class="portfolio-overlay">
                                    <a href="images/planta/00.jpg"><i class="fa fa-camera-retro"></i></a>
                                </div>
                            </div>  
                        </div>
                        
                        <div class="col-md-4 col-sm-6 work-grid html php bootstrap">
                            <div class="portfolio-content">
                                <img class="img-responsive" src="<?php echo base_url("public/images/planta/01.jpg");?>" alt="">
                                <div class="portfolio-overlay">
                                    <a href="images/planta/01.jpg"><i class="fa fa-camera-retro"></i></a>
                                </div>
                            </div>  
                        </div>
                        
                        <div class="col-md-4 col-sm-6 work-grid wordpress graphic">
                            <div class="portfolio-content">
                                <img class="img-responsive" src="<?php echo base_url("public/images/planta/02.jpg");?>" alt="">
                                <div class="portfolio-overlay">
                                    <a href="images/planta/02.jpg"><i class="fa fa-camera-retro"></i></a>
                                </div>
                            </div>  
                        </div>
                        
                        <div class="col-md-4 col-sm-6 work-grid html php bootstrap">
                            <div class="portfolio-content">
                                <img class="img-responsive" src="<?php echo base_url("public/images/planta/03.jpg");?>" alt="">
                                <div class="portfolio-overlay">
                                    <a href="images/planta/03.jpg"><i class="fa fa-camera-retro"></i></a>
                                </div>
                            </div>  
                        </div>
                        
                        <div class="col-md-4 col-sm-6 work-grid wordpress graphic php">
                            <div class="portfolio-content">
                                <img class="img-responsive" src="<?php echo base_url("public/images/planta/04.jpg");?>" alt="">
                                <div class="portfolio-overlay">
                                    <a href="images/planta/04.jpg"><i class="fa fa-camera-retro"></i></a>
                                </div>
                            </div>  
                        </div>
                        
                        <div class="col-md-4 col-sm-6 work-grid html bootstrap graphic">
                            <div class="portfolio-content">
                                <img class="img-responsive" src="<?php echo base_url("public/images/planta/05.jpg");?>" alt="">
                                <div class="portfolio-overlay">
                                    <a href="images/planta/05.jpg"><i class="fa fa-camera-retro"></i></a>
                                </div>
                            </div>
                        </div>  
                    </div>              
                </div>

            </div>
        </div>
    </section>
    <!-- /NUESTRA PLANTA -->
    
    <!-- SLIDER2 -->
    <section id="slider2">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-title">
                        <h1>NUESTROS QUESOS</h1>
                        <span class="st-border"></span>
                    </div>
                </div>
            </div>
        </div>

        <div id="home-carousel2" class="carousel slide" data-ride="carousel">           
            <div class="carousel-inner">
                <div class="item active" style="background-image: url(http://localhost/panel/public/images/slider/00.jpg)">
                    <div class="carousel-caption container">
                        <div class="row">
                            <div class="col-sm-7">
                                <h2>MOZZARELLA</h2>
                            </div>
                        </div>
                    </div>                  
                </div>
                <div class="item" style="background-image: url(http://localhost/panel/public/images/slider/01.jpg)">
                    <div class="carousel-caption container">
                        <div class="row">
                            <div class="col-sm-7">
                                <h2>PATEGRAS</h2>
                            </div>
                        </div>
                    </div>                  
                </div>
                <div class="item" style="background-image: url(http://localhost/panel/public/images/slider/02.jpg)">
                    <div class="carousel-caption container">
                        <div class="row">
                            <div class="col-sm-7">
                                <h2>TYBO</h2>
                            </div>
                        </div>
                    </div>                  
                </div>
                <div class="item" style="background-image: url(http://localhost/panel/public/images/slider/03.jpg)">
                    <div class="carousel-caption container">
                        <div class="row">
                            <div class="col-sm-7">
                                <h2>REGGIANITO</h2>
                            </div>
                        </div>
                    </div>                  
                </div>
                <div class="item" style="background-image: url(http://localhost/panel/public/images/slider/04.jpg)">
                    <div class="carousel-caption container">
                        <div class="row">
                            <div class="col-sm-7">
                                <h2>SARDO</h2>
                            </div>
                        </div>
                    </div>                  
                </div>
                <div class="item" style="background-image: url(http://localhost/panel/public/images/slider/05.jpg)">
                    <div class="carousel-caption container">
                        <div class="row">
                            <div class="col-sm-7">
                                <h2>CREMOSO</h2>
                            </div>
                        </div>
                    </div>                  
                </div>
                <div class="item" style="background-image: url(http://localhost/panel/public/images/slider/06.jpg)">
                    <div class="carousel-caption container">
                        <div class="row">
                            <div class="col-sm-7">
                                <h2>CUARTIROLO</h2>
                            </div>
                        </div>
                    </div>                  
                </div>
                <div class="item" style="background-image: url(http://localhost/panel/public/images/slider/07.jpg)">
                    <div class="carousel-caption container">
                        <div class="row">
                            <div class="col-sm-7">
                                <h2>PORT SALUT</h2>
                            </div>
                        </div>
                    </div>                  
                </div>
                <div class="item" style="background-image: url(http://localhost/panel/public/images/slider/08.jpg)">
                    <div class="carousel-caption container">
                        <div class="row">
                            <div class="col-sm-7">
                                <h2>GOUDA</h2>
                            </div>
                        </div>
                    </div>                  
                </div>
                <a class="home-carousel-left" href="#home-carousel2" data-slide="prev"><i class="fa fa-angle-left"></i></a>
                <a class="home-carousel-right" href="#home-carousel2" data-slide="next"><i class="fa fa-angle-right"></i></a>
            </div>      
        </div> <!--/#home-carousel--> 
    </section>
    <!-- /SLIDER2 -->


    <!-- UBICACION -->
    <section id="ubicacion">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <div class="about-us text-left">
                        <div class="section-title">
                            <h1>
                                <?php foreach ($loc->result() as $fila): ?>
                                <span><?php echo $fila ->titulo ; ?></span>
                                <?php endforeach; ?>
                            </h1>
                            <span class="st-border"></span>
                        </div>
                    </div>
                    <div class="about-us text-center">
                        <p>
                            <?php foreach ($loc->result() as $fila): ?>
                            <span><?php echo $fila ->texto ; ?></span>
                            <?php endforeach; ?>
                        </p>
                    </div>
                </div>
                <div class="col-sm-6 our-office">
                    <div id="office-carousel" class="carousel slide" data-ride="carousel">          
                        <div class="carousel-inner">
                            <div class="item active">
                                <div class="embed-responsive embed-responsive-16by9 google-map">
                                <img src="http://localhost/panel/public/images/office/00.jpg" alt="">
                                </div>
                            </div>
                            <div class="item">
                                <div class="embed-responsive embed-responsive-16by9 google-map">
                                <img src="http://localhost/panel/public/images/office/01.jpg" alt="">           
                                </div>
                            </div>
                            <div class="item">
                                <div class="embed-responsive embed-responsive-16by9 google-map">
                                <img src="http://localhost/panel/public/images/office/02.jpg" alt="">
                                </div>
                            </div>
                            <div class="item">
                                <div class="container embed-responsive embed-responsive-16by9 google-map" >
                                    <div id="map_container"></div>
                                    <div id="map">
                                        <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d12779.04952772128!2d-63.337738!3d-36.8002472!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x6ebed084972ffbcc!2sLacteos+la+Union!5e0!3m2!1ses-419!2sar!4v1514238227412" width="800" height="530" frameborder="0" style="border:0" allowfullscreen></iframe>
                                    </div>
                                </div>
                            </div>
                            <a class="office-carousel-left" href="#office-carousel" data-slide="prev"><i class="fa fa-angle-left"></i></a>
                            <a class="office-carousel-right" href="#office-carousel" data-slide="next"><i class="fa fa-angle-right"></i></a>
                        </div>      
                    </div> <!--/#office-carousel--> 
                </div>
            </div>
        </div>
    </section>
    <!-- /UBICACION -->
    
    
    <!-- CONTACTENOS -->
    <section id="contact">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-title">
                        <h1><span>
                        <?php foreach ($cont->result() as $fila): ?>
                        <span><?php echo $fila ->titulo ; ?></span>
                        <?php endforeach; ?></span></h1>
                        <span class="st-border"></span>
                    </div>
                </div>
                <div class="col-sm-4 contact-info">
                    <p class="st-address"><i class="fa fa-map-marker"></i> <strong><span>
                        <?php foreach ($cont->result() as $fila): ?>
                        <span><?php echo $fila ->texto1 ; ?></span>
                        <?php endforeach; ?>
                    </span></strong></p>
                    <p class="st-phone"><i class="fa fa-mobile"></i> <strong><span>
                        <?php foreach ($cont->result() as $fila): ?>
                        <span><?php echo $fila ->texto2 ; ?></span>
                        <?php endforeach; ?>
                    </span></strong></p>
                </div>
                <div class="col-sm-7 col-sm-offset-1">
                    <form action="php/send-contact.php" class="contact-form" name="contact-form" method="post">
                        <div class="row">
                            <div class="col-sm-6">
                                <input type="text" name="name" required="required" placeholder="Nombre*">
                            </div>
                            <div class="col-sm-6">
                                <input type="text" name="apellido" required="required" placeholder="Apellido*">
                            </div>
                            <div class="col-sm-6">
                                <input type="email" name="email" required="required" placeholder="Email*">
                            </div>
                            <div class="col-sm-6">
                                <input type="text" name="motivo" placeholder="Motivo">
                            </div>
                            <div class="col-sm-12">
                                <textarea name="message" required cols="30" rows="7" placeholder="Mensaje...*"></textarea>
                            </div>
                            <div class="col-sm-6">
                                <input type="submit" name="mandar" value="Mandar Mensaje" class="btn btn-send">
                            </div>
                            <div class="col-sm-6">
                                <div class="g-recaptcha" data-sitekey="6Lf7Nj4UAAAAAEiLC30e08wJlrzxu1ngXSdUR_TC"></div>
                            </div>                          
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- /CONTACTENOS -->

    <!-- FOOTER -->
    <footer id="footer">
        <div class="container">
            <div class="row">
                <!-- SOCIAL ICONS -->
                <div class="col-sm-6 col-sm-push-6 footer-social-icons">
                    <span></span>
                    <p><i class="fa fa-desktop"></i><a href="https://nkstudios.net">NKStudios</a></p>
                </div>
                <!-- /SOCIAL ICONS -->
            </div>
        </div>
    </footer>
    <!-- /FOOTER -->


    <!-- Scroll-up -->
    <div class="scroll-up">
        <ul><li><a href="#header"><i class="fa fa-angle-up"></i></a></li></ul>
    </div>

    
    
    <!-- JS -->
    <script type="text/javascript" src="<?php echo base_url()?>public/js/jquery.min.js"></script><!-- jQuery -->
    <script type="text/javascript" src="<?php echo base_url()?>public/js/bootstrap.min.js"></script><!-- Bootstrap -->
    <script type="text/javascript" src="<?php echo base_url()?>public/js/jquery.parallax.js"></script><!-- Parallax -->
    <script type="text/javascript" src="<?php echo base_url()?>public/js/smoothscroll.js"></script><!-- Smooth Scroll -->
    <script type="text/javascript" src="<?php echo base_url()?>public/js/masonry.pkgd.min.js"></script><!-- masonry -->
    <script type="text/javascript" src="<?php echo base_url()?>public/js/jquery.fitvids.js"></script><!-- fitvids -->
    <script type="text/javascript" src="<?php echo base_url()?>public/js/owl.carousel.min.js"></script><!-- Owl-Carousel -->
    <script type="text/javascript" src="<?php echo base_url()?>public/js/jquery.counterup.min.js"></script><!-- CounterUp -->
    <script type="text/javascript" src="<?php echo base_url()?>public/js/waypoints.min.js"></script><!-- CounterUp -->
    <script type="text/javascript" src="<?php echo base_url()?>public/js/jquery.isotope.min.js"></script><!-- isotope -->
    <script type="text/javascript" src="<?php echo base_url()?>public/js/jquery.magnific-popup.min.js"></script><!-- magnific-popup -->
    <script type="text/javascript" src="<?php echo base_url()?>public/js/scripts.js"></script><!-- Scripts -->


</body>
<script>
    $(document).ready(function() {
        // REQUIRES jquery.livequery
        $('.google-map iframe:visible').livequery(function() {
            var mapFrame = $(this);
            if (!$(mapFrame).hasClass('map-refreshed')) {
                mapFrame.attr('src', mapFrame.attr('src')+'');
                mapFrame.addClass('map-refreshed');
            }
        });

    });
    </script>
</html>
