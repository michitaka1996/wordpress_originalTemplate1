<?php
/* 
Template Name:INFO ~インフォメーション~
*/
?>



<?php get_header(); ?>

<?php get_template_part('content', 'menu'); ?>
<main>
  <!-- gridレイアウト　container-fulidかcontainer -->
  <section class=" hero container-fluid">
    <img src="<?php echo get_post_meta($post->ID, 'img-top', true); ?>" id="top-baner">
    <div class="hero-title">
      <h2>Wordpress　Template</h2>
    </div>
  </section>

  <section class="container-fluid main-contents">
    <div class="row">
      <div class="col">

      </div>

      <section class="col-11 main-content-info">
        <div class="middle-content middle-content-info">

          <h1 class="content-title-blog"><?php echo get_the_title(); ?></h1>
          <div>
            <?php echo get_post_meta($post->ID, 'map', true); ?>
          </div>
          <div class="shop-info">
            <?php if (have_posts()) :
              while (have_posts()) : the_post();  ?>
                <div id="post-<?php the_ID() ?>" <?php post_class(); ?>>
                  <?php the_content(); ?>
                </div>
              <?php endwhile;
          else : ?>
              <div class="post">
                <h2>記事はありません</h2>
                <p>お探しの記事は見つかりませんでした</p>
              </div>
            <?php endif; ?>
          </div>
        </div>
      </section>


</main>



<?php get_footer(); ?>