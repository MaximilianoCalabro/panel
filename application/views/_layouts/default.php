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

    <!--  <input type="file" name="saras"> --> 
    
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
        <div id="home-carousel" class="carousel slide" data-ride="carousel" style="width:100%">            
            <!-- Indicators -->
            <div class="carousel-inner" role="listbox">
                <?php for ($i=0; $i<count($cabecera); $i++): ?>
                <div class="item <?php if ($i==0) echo "active"; ?>" style="background-image: url(<?php echo base_url("public/images/"),$cabecera[$i]->ruta_imagen; ?>" alt="Photo <?php echo $i+1; ?>">
                </div>
                <?php endfor; ?>
            <a class="home-carousel-left" href="#home-carousel" data-slide="prev"><i class="fa fa-angle-left"></i></a>
            <a class="home-carousel-right" href="#home-carousel" data-slide="next"><i class="fa fa-angle-right"></i></a>         
            </div>
        </div><!--/#home-carousel--> 
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
                    <a class="logo" href="index.html"><img src="images/logo.png" alt=""></a>
                </div>

                <div class="collapse navbar-collapse" id="st-navbar-collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="#slider">Inicio</a></li>
                        <li><a href="#quienes-somos">Quienes Somos</a></li>
                        <li><a href="#slider2">Nuestros Quesos</a></li>
                        <li><a href="#planta">Nuestra Planta</a></li>
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
                            <span><?php echo $who[0] ->titulo; ?></span>
                        </h1>
                        <span class="st-border"></span>
                    </div>
                </div>

                <div class="col-md-12 col-sm-6 st-service">
                    
                    <h2>
                        <span><?php echo $who[0] ->subtitulo; ?></span>
                    </h2>
                    <br>
                    <p>
                        <span><?php echo $who[0] ->texto1; ?></span>
                    </p>
                    <br>
                    <p>
                        <span><?php echo $who[0] ->texto2; ?></span>
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

    <!-- NUESTROS QUESOS -->
    <section id="slider2">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-title">
                        <h1>
                            <span><?php echo $che[0] ->titulo ; ?></span>
                        </h1>
                        <span class="st-border"></span>
                    </div>
                </div>
            </div>
        </div>
        
        <div id="home-carousel2" class="carousel slide home-carousel" data-ride="carousel" style="width:100%">            
            <div class="carousel-inner" role="listbox">
                <?php for ($i=0; $i<count($che); $i++): ?>
                <div class="item <?php if ($i==0) echo "active"; ?>" style="background-image: url(<?php echo base_url("public/images/"),$che[$i]->ruta_imagen; ?>">
                </div>
                <?php endfor; ?>
            <a class="home-carousel-left" href="#home-carousel2" data-slide="prev"><i class="fa fa-angle-left"></i></a>
            <a class="home-carousel-right" href="#home-carousel2" data-slide="next"><i class="fa fa-angle-right"></i></a>
            </div>
        </div><!--/#home-carousel--> 
    </section>
    <!-- /NUESTROS QUESOS -->


    <!-- NUESTRA PLANTA -->
    <section id="planta">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-title">
                        <h1>
                            <span><?php echo $plant [0] ->titulo ; ?></span>
                        </h1>
                        <span class="st-border"></span>
                    </div>
                </div>

                <div class="portfolio-wrapper" >
                    <div class="col-md-12">
                        <p>
                            <span><?php echo $plant [0] ->texto ; ?></span>
                        </p>
                    </div>
                
                    <div class="portfolio-items">
                        <?php foreach ($plant as $fila): ?>
                        <div class="col-md-4 col-sm-6 work-grid wordpress graphic">
                            <div class="portfolio-content">
                                <img class="img-responsive" src="<?php echo base_url("public/images/") ,$fila->ruta_imagen; ?>" alt="">
                                <div class="portfolio-overlay">
                                    <a href="<?php echo base_url("public/images/") ,$fila->ruta_imagen; ?>"><i class="fa fa-camera-retro"></i></a>
                                </div>
                            </div>  
                        </div>
                        <?php endforeach; ?>
                    </div>              
                </div>

            </div>
        </div>
    </section>
    <!-- /NUESTRA PLANTA -->

    <!-- UBICACION -->
    <section id="ubicacion">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <div class="about-us text-left">
                        <div class="section-title">
                            <h1>
                                <span><?php echo $loc[0] ->titulo ; ?></span>
                            </h1>
                            <span class="st-border"></span>
                        </div>
                    </div>
                    <div class="about-us text-center">
                        <p>
                            <span><?php echo $loc[0] ->texto ; ?></span>
                        </p>
                    </div>
                    <div id="map_container" class="about-us text-center">
                        <div id="map">
                            <div class="google-maps">
                            <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d12779.04952772128!2d-63.337738!3d-36.8002472!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x6ebed084972ffbcc!2sLacteos+la+Union!5e0!3m2!1ses-419!2sar!4v1514238227412" width="400px" height="300px" frameborder="0" style="border:0" allowfullscreen></iframe>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 our-office">
                    <div id="office-carousel" class="carousel slide" data-ride="carousel">          
                        <div class="carousel-inner">
                            <?php for ($i=0; $i<count($loc); $i++): ?>
                                <div  class="item <?php if ($i==0) echo "active"; ?>" >
                                	<div >
                                	 <img src="<?php echo base_url("public/images/"),$loc[$i]->ruta_imagen; ?>" alt="Photo <?php echo $i+1; ?>">
                                	 </div>
                                </div>
                            <?php endfor; ?>
                                                  
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
                        <h1>
                            <span><?php echo $cont[0] ->titulo ; ?></span>
                        </h1>
                        <span class="st-border"></span>
                    </div>
                </div>
                <div class="col-sm-4 contact-info">
                    <p class="st-address"><i class="fa fa-map-marker"></i> 
                        <strong><span><?php echo $cont[0] ->texto1 ; ?></span></strong>
                    </p>
                    <p class="st-phone"><i class="fa fa-mobile"></i> 
                        <strong><span><strong><span><?php echo $cont[0] ->texto2 ; ?></span></strong>
                    </p>
                </div>
                <div class="col-sm-7 col-sm-offset-1">
                    <form action="<?php echo base_url("home/send-contact")?>" class="contact-form" name="contact-form" method="post">
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
                    <p><i class="fa fa-desktop"></i><a href="https://nkstudios.net/new" target=_blank>NKStudios</a></p>
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
   
</html>
