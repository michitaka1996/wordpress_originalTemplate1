<?php
/*
Template Name: CONTACT ~お問い合わせ~
*/
?>


<?php get_header(); ?>

<?php get_template_part('content', 'menu'); ?>

<main>
  <section class=" hero container-fluid">
    <div class="hero-title">
      <h2>Wordpress　Template</h2>
    </div>
  </section>

  <section class="container-fluid main-contents">
    <div class="row">
      <div class="col">

      </div>

      <!-- contact -->
      <section class="col-11 main-content-contact">
        <div class="middle-content middle-content-contact">

          <h1 class="content-title-blog"><?php echo get_the_title(); ?></h1>
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

  </section>

</main>


<?php get_footer(); ?>