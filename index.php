<?php get_header();?>
            <div id="content">

                <?php if (have_posts()) : ?>
                <?php while (have_posts()) : the_post(); ?>

                <article>
                    <h2 class="title"><a alt href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?> <?php the_time('  Y-m-d') ?>"><?php the_title_attribute(); ?></a></h2>

                     <!--div class="cover-panel">
                         <div class="cover-image" style="background-image: url('<?php //bloginfo('template_directory'); ?>/image/main.jpg')"></div>
                     </div-->

                    <div class="text"><?php echo mb_strimwidth(strip_tags(apply_filters('the_content', $post->post_content)), 0, 200,'...'); ?></div>
                </article>

                <?php endwhile; ?>
                <?php else: ?>
                <article>
                    <h2 class="title"><a href="/">找不到内容噢</a></h2>
                    <div class="text">未能寻找到您需要的内容，请查看它是不是飞到火星上去了</div>
                </article>
                <?php endif; ?>

                <?php getPageNav($query_string); ?>

            </div>
            <?php getIndexTags();?>

<?php get_footer();?>