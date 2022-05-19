        <?php 
      require $_SERVER['DOCUMENT_ROOT'].'/config/init.php';
      require FONTEND_CSS;
      require FONTEND_HEADER;
      $gallery = new Gallery();
      $getBanner = $gallery->getBanner('Yes');
      $getimage = $gallery ->getBanner('No');
      if($getBanner || $getimage){
        // debug($getBanner);
         //debug($getimage  );
         //
      }
       ?>
    <!--==========================
      Intro Section
    ============================-->
    <section id="intro">
      <div class="intro-container">
        <div id="introCarousel" class="carousel  slide carousel-fade" data-ride="carousel">

          <ol class="carousel-indicators"></ol>

          <div class="carousel-inner" role="listbox">
          <?php if($getBanner){
                foreach ($getBanner as $key => $Banner) {
                ?>
             <div class="carousel-item <?php echo ($Banner->id==19)?'active':'' ?> ">
              <div class="carousel-background"><img src="<?php echo SITE_URL.'/uploads/gallery/'.$Banner->image ;?>" alt=""></div>
              <div class="carousel-container">
                <div class="carousel-content">
                  <h2><?php echo $Banner->title; ?></h2>
                  <p><?php echo $Banner->description ?></p>

                </div>
              </div>
            </div>

                  <?php
                }
        } 
          ?>
          </div>
          <a class="carousel-control-prev" href="#introCarousel" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon ion-chevron-left" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>

          <a class="carousel-control-next" href="#introCarousel" role="button" data-slide="next">
            <span class="carousel-control-next-icon ion-chevron-right" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>

        </div>
      </div>
    </section><!-- #intro -->

    <main id="main">



      <!--==========================Services============================-->
                             <?php  require 'services.php';    ?>
          <!--======================================================-->
        
          
          <!--==========================Facts============================--> 
                             <?php  require 'facts.php';    ?>
                      <!--====================================-->

          <!--==========================Gallery============================-->
                             <?php  require 'gallery.php';    ?>
                      <!--====================================-->

          <!--==========================Team============================-->
                    <!--====================================-->

          <!--==========================About Us============================-->
                             <?php  require 'about_us.php';    ?>
                       <!--==================================-->
          
          <!--==========================Contact============================-->
                             <?php  require 'contact.php';    ?>
                         <!--===============================-->


  <?php 
    require FONTEND_JS 
   ?>