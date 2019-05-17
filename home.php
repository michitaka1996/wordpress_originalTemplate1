<?php  
/*
Template Name: TOP ~トップページ~
 */ 
?>


<?php get_header(); ?>
    
    <!-- メニュー -->
   <?php get_template_part('content', 'menu'); ?>

   
    <main>
      <!-- gridレイアウト　container-fulidかcontainer -->
      <section class=" hero container-fluid">
        <div class="hero-title">
          <h2>Wordpress　Template</h2>
        </div>
      </section>

        <section class="container-fluid main-contents">
         <div class="row">
            <div class="col">
              
            </div>

            <section class="col-8 main-content">
              <div class="middle-content">

                <div id="home">
                  <h1 class="content-title">ABOUT</h1>
                  <p>
                   <?php echo get_post_meta($post->ID, 'about', true); ?> 
                  </p>
                </div>

                <div id=#recruit>
                  <h1 class="content-title">JOIN US</h1>
                  <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">First</th>
                        <th scope="col">Last</th>
                        <th scope="col">Handle</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <th scope="row">1</th>
                        <td>業務内容</td>
                        <td>Otto</td>
                        <td>@mdo</td>
                      </tr>
                      <tr>
                        <th scope="row">2</th>
                        <td>Jacob</td>
                        <td>Thornton</td>
                        <td>@fat</td>
                      </tr>
                      <tr>
                        <th scope="row">3</th>
                        <td>Larry</td>
                        <td>the Bird</td>
                        <td>@twitter</td>
                      </tr>
                    </tbody>
                  </table>
                </div>
          
              </div>
            </section>

            <div class="col">
              
            </div>
         </div>
        </section>

    </main>

 <?php get_footer(); ?>

   