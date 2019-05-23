<?php
    get_header();
?>
            <div id="content">

                <?php if (have_posts()) : ?>
                <?php while (have_posts()) : the_post(); ?>

                <article>


                    <h2 class="title">
                        <a href="<?php the_permalink() ?>"><?php the_title_attribute(); ?></a>
                        <div class="date">
                            <?php the_time('Y-m-d') ?>
                        </div>
                    </h2>


                    <div class="text">
                        <?php the_content("Read More..."); ?>
                    </div>
                </article>

                <?php endwhile; ?>
                <?php else: ?>
                <article>
                    <h2 class="title"><a href="/">找不到内容噢</a></h2>
                    <div class="text">未能寻找到您需要的内容，请查看它是不是飞到火星上去了</div>
                </article>
                <?php endif; ?>

                <div class="comment">
                    <?php comments_template(); ?>
                </div>


            </div>
<?php
    get_footer();
?>