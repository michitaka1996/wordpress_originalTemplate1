<?php get_header(); ?>

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

        <section class="col-11 main-content-blog">
          <div class="middle-content">
            <h1 class="content-title-blog">BLOG | Category</h1>
            <div id="content" class="blog-content">

              <!-- 記事のループ -->
              <?php get_template_part('loop'); ?>
              
              <!-- ページング処理 -->
              <?php if (function_exists("pagenation")) pagenation($wp_query->max_num_pages); ?>
            </div>

            <!-- サイドバー -->
            <?php get_sidebar(); ?>

        </section>

        <div class="col">

        </div>
      </div>
    </section>

  </main>


  <?php get_footer(); ?>