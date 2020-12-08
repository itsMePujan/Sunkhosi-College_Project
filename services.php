    <!--==========================
      Services Section
      ============================-->
      <section id="services">
        <div class="container">
<!--           <header class="section-header wow fadeInUp">
            <h3>News</h3>
            <p>Laudem latine persequeris id sed, ex fabulas delectus quo. No vel partiendo abhorreant vituperatoribus, ad pro quaestio laboramus. Ei ubique vivendum pro. At ius nisl accusam lorenta zanos paradigno tridexa panatarel.</p>
          </header>
          <div class="row">
            <div class="col-lg-4 col-md-6 box wow bounceInUp" data-wow-duration="1.4s">
              <div class="icon"><i class="ion-ios-analytics-outline"></i></div>
              <h4 class="title"><a href="">Lorem Ipsum</a></h4>
              <p class="description">Voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident</p>
            </div>
            <div class="col-lg-4 col-md-6 box wow bounceInUp" data-wow-duration="1.4s">
              <div class="icon"><i class="ion-ios-bookmarks-outline"></i></div>
              <h4 class="title"><a href="">Dolor Sitema</a></h4>
              <p class="description">Minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat tarad limino ata</p>
            </div>
            <div class="col-lg-4 col-md-6 box wow bounceInUp" data-wow-duration="1.4s">
              <div class="icon"><i class="ion-ios-paper-outline"></i></div>
              <h4 class="title"><a href="">Sed ut perspiciatis</a></h4>
              <p class="description">Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur</p>
            </div>
            <div class="col-lg-4 col-md-6 box wow bounceInUp" data-wow-delay="0.1s" data-wow-duration="1.4s">
              <div class="icon"><i class="ion-ios-speedometer-outline"></i></div>
              <h4 class="title"><a href="">Magni Dolores</a></h4>
              <p class="description">Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum</p>
            </div>
            <div class="col-lg-4 col-md-6 box wow bounceInUp" data-wow-delay="0.1s" data-wow-duration="1.4s">
              <div class="icon"><i class="ion-ios-barcode-outline"></i></div>
              <h4 class="title"><a href="">Nemo Enim</a></h4>
              <p class="description">At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque</p>
            </div>
            <div class="col-lg-4 col-md-6 box wow bounceInUp" data-wow-delay="0.1s" data-wow-duration="1.4s">
              <div class="icon"><i class="ion-ios-people-outline"></i></div>
              <h4 class="title"><a href="">Eiusmod Tempor</a></h4>
              <p class="description">Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi</p>
            </div>
          </div> -->
          <header class="section-header wow fadeInUp">
            <h3>Events</h3> `
          </header>
          <div class="row">
            <div class="table-responsive table-responsive-data2">
              <table class="table table-data2">
                <thead>
                  <tr>
                    <th >S.N</th>
                    <th>title</th>
                    <th>Description</th>
                    <th>Date</th>
                  </tr>
                </thead>
                <?php 
                $News = new NewsEvent();
                $info = $News->getAllperosnalinfo();
                if (@$info) {
                  foreach (@$info as $key => $details) {
                    ?>
                    <tbody>
                      <td><?php echo @$key+1; ?></td>
                      <td><?php echo @$details->title; ?></td>
                      <td>
                        <span class="block-email">doe@example.com</span>
                      </td>
                      <td><?php echo @$details->date; ?></td>
                    </tr>
                  </tbody>
                  <?php
                }
              }
              ?>
            </table>
          </div>
        </div>


      </section><!-- #services -->


