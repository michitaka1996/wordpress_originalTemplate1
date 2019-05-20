<?php  
/*
Template Name: TOP ~トップページ~
 */ 
?>


<?php get_header(); ?>
    
    <!-- メニュー -->
   <?php get_template_part('content', 'menu'); ?>

   <!-- メインコンテンツ -->
    <main>
      <!-- gridレイアウト　container-fulidかcontainer -->

      <section class=" hero container-fluid">
      <img src="<?php echo get_post_meta($post->ID, 'img-top', true); ?>" id="top-baner" >
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
                        <th scope="col"><?php echo get_post_meta($post->ID, 'recruit_info1', true); ?></th>
                        <th scope="col"><?php echo get_post_meta($post->ID, 'recruit_info2', true); ?></th>
                        <th scope="col"><?php echo get_post_meta($post->ID, 'recruit_info3', true); ?></th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <th scope="row">1</th>
                        <td><?php echo get_post_meta($post->ID, 'recruit_info4', true); ?></td>
                        <td><?php echo get_post_meta($post->ID, 'recruit_info5', true); ?></td>
                        <td><?php echo get_post_meta($post->ID, 'recruit_info6', true); ?></td>
                      </tr>
                      <tr>
                        <th scope="row">2</th>
                        <td><?php echo get_post_meta($post->ID, 'recruit_info7', true); ?></td>
                        <td><?php echo get_post_meta($post->ID, 'recruit_info8', true); ?></td>
                        <td><?php echo get_post_meta($post->ID, 'recruit_info9', true); ?></td>
                      </tr>
                      <tr>
                        <th scope="row">3</th>
                        <td><?php echo get_post_meta($post->ID, 'recruit_info10', true); ?></td>
                        <td><?php echo get_post_meta($post->ID, 'recruit_info11', true); ?></td>
                        <td><?php echo get_post_meta($post->ID, 'recruit_info12', true); ?></td>
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

   