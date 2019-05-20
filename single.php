<?php get_header(); ?>

<?php get_template_part('content', 'menu'); ?>



<main>
    <!-- gridレイアウト　container-fulidかcontainer -->
    <section class=" hero container-fluid">
    </section>

    <section class="container-fluid main-contents">
        <div class="row">
            <div class="col">

            </div>

            <section class="col-11 main-content-blog">
                <div class="middle-content middle-content-blog">
                    <h1 class="content-title-blog">BLOG</h1>
                    <div id="content" class="blog-content">


                        <?php if (have_posts()) : ?>
                            <?php while (have_posts()) : the_post(); ?>
                                <!-- 記事の部分 -->
                                <article class="blog-item">
                                    <h2 class="blog-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                                    <h3 class="blog-subtitle"><?php the_author_nickname(); ?><?php the_time("Y年m月j日"); ?><?php single_cat_title('カテゴリー:'); ?></h3>
                                    <p class="blog-body">
                                        <!-- 本文 -->
                                        <?php the_content(); ?>
                                    </p>
                                </article>

                            <?php endwhile; ?>

                            <!-- 前後のページへのリンクを行う 勝手にリンクを入れてくれる -->
                            <div class="pagenation">
                                <ul>
                                    <li class="perv"><?php previous_post_link('%link', 'PREV'); ?></li>
                                    <li class="next"><?php next_post_link('%link', 'NEXT'); ?></li>
                                </ul>
                            </div>

                            <!-- comments -->
                            <?php comments_template(); ?>

                        <?php else : ?>
                            <h2 class="title">記事が見つかりませんでした</h2>
                            <p>検索で見つかるかもしれません</p<br />
                                <?php get_search_form(); ?>

                            <?php endif; ?>

                    </div>

                    <?php get_sidebar(); ?>

                </div>
            </section>

            <div class="col">

            </div>
        </div>
    </section>



</main>


<?php get_footer(); ?>