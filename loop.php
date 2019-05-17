<!-- 記事のループを共通化 -->
<?php if (have_posts()) : ?>
    <?php while (have_posts()) : the_post(); ?>
        <article class="blog-item">
            <h2 class="blog-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
            <h3 class="blog-subtitle"><?php the_author_nickname(); ?><?php the_time("Y年m月j日"); ?><?php single_cat_title('カテゴリー:'); ?></h3>
            <p class="blog-body">
                <!-- 本文 -->
                <?php the_content(); ?>
            </p>
        </article>
    <?php endwhile; ?>
<?php endif; ?>