    <!--==========================
      Portfolio Section
    ============================-->
    <section id="portfolio"  class="section-bg" >
      <div class="container">

        <header class="section-header">
          <h3 class="section-title">Gallery</h3>
        </header>
        
      <div class="row portfolio-container">
         <?php if($getimage){
           foreach ($getimage as $key => $image) {
            ?>
          <div class="col-lg-4 col-md-6 portfolio-item filter-web wow fadeInUp" data-wow-delay="0.1s">
            <div class="portfolio-wrap">
              <figure>
                <img src="<?php echo SITE_URL.'/uploads/gallery/'.$image->image; ?>" class="img-fluid" alt="">
                 <a href="<?php echo SITE_URL.'/uploads/gallery/'.$image->image; ?>" class="link-preview" data-lightbox="portfolio" data-title="Web 3" title="Preview"><i class="ion ion-eye"></i></a>
                <a href="#" class="link-details" title="More Details"><i class="ion ion-android-open"></i></a>
              </figure>
              <div class="portfolio-info">
                <h4><a ><?php echo $image->title; ?></a></h4>
                <p><?php echo $image->description;?></p>
              </div>
            </div>
          </div>
          <?php 
                }     
          }
           ?>

        </div>

      </div>
    </section><!-- #portfolio -->