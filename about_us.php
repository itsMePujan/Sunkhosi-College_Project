    <!--==========================
      About Us Section
    ============================-->
    <section id="about">
      <div class="container">

        <header class="section-header">
          <h3>About Us</h3>
           </header>

        <div class="row about-cols">

          <?php 
            $About = new About();
            $UpdateWeb = $About->getbyid(1);
             debug($UpdateWeb);
           ?>
          <div class="col-md-12 wow fadeInUp" data-wow-delay="0.1s">
            <div class="about-col"><br>
              <h2 class="title"><a href="#"></a><?php echo @$UpdateWeb[0]->Title; ?></h2>
              <p>
               <strong> <?php echo @$UpdateWeb[0]->Summery; ?></strong>
              </p>
              <div class="img">
                <img src="<?php echo UPLOAD_DIR.'/gallery/'.@$UpdateWeb[0]->image; ?>" alt="" class="img-fluid">
           </div>
           <p><strong style="padding-left:10% ">
             <?php echo @$UpdateWeb[0]->Description; ?>
           </strong></p>
            </div>
          </div>

        </div>

      </div>
    </section><!-- #about -->