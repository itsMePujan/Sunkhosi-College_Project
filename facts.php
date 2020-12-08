    <!--==========================
      Facts Section
      ============================-->

      <section id="facts"  class="wow fadeIn">
        <div class="container">
          <header class="section-header">
            <h3>Facts</h3>
            <p>Sunkoshi Rural Municipality (Nepali: सुनकोशी गाउँपालिका) in Okhaldhunga District was formed in March 2017, by merging 5 former VDCs of Katunje, Chyanam, Mulkharka, Sisneri and Balakhu. The center of this rural municipality is located at Mulkharka.</p>
          </header>

          <div class="row counters">
            <div class="col-lg-7 col-9 text-center">
              <span data-toggle="counter-up">18,550</span>
              <h3>Populations</h3>
            </div>

            <div class="col-lg-3 col-6 text-center">
              <span data-toggle="counter-up">143.75</span>
              <h3>Area(&#x33a2;)</h3>
            </div>
          </div>

          <div class="facts-img">
            <img src="<?php SITE_URL.'/includes/fontend/img/facts-img.png';?>" alt="" class="img-fluid">
          </div>
                    <header class="section-header">
            <h3>FAQ</h3>
            <p>HERE ARE THE MOST FREQUENTLY ASKED QUESTIONS AND ANSWERS</p>
          </header>
          <?php 
              $faq = new Faq();
            $getfaq = $faq->getAllfaq(); 
           ?>
                <?php 
                  if($getfaq){
                    foreach($getfaq as $key => $data) {
                      ?>
                  <div class="col-md-12">
                    <div class="card border border">
                      <div class="card-header">
                        <strong class="card-title"><?php echo $key+1 .">" ?>. <?php echo $data->question; ?></strong>
                      </div>
                      <div class="card-body">
                        <p class="card-text">ANS . > <?php echo $data->question; ?></p>
                      </div>
                    </div>
                  </div>
                   <br>
                  <?php
                    }
                  }
                 ?>
            
        </div>
      </section>
      <!-- #facts -->
