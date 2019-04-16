<?php
if ( !comments_open() ) :
// If registration required and not logged in.
elseif ( get_option('comment_registration') && !is_user_logged_in() ) :
    ?>
    <p>你必须 <a href="<?php echo wp_login_url( get_permalink() ); ?>">登录</a> 才能发表评论.</p>
<?php else  : ?>
    <!-- Comment Form -->
    <form id="commentform" name="commentform" action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post">
        <h2>留个小脚印</h2>
        <div class="clearfix"> </div>
        <ul class="comment-form-left">
            <?php if ( !is_user_logged_in() ) : ?>
                <li class="clearfix">
                    <input type="text" name="author" class="form-control" id="author" value="<?php echo $comment_author; ?>" size="23" tabindex="1" placeholder="昵称" />
                </li>
                <li class="clearfix">
                    <input type="text" name="email" class="form-control" id="email" value="<?php echo $comment_author_email; ?>" size="23" tabindex="2" placeholder="电子邮件" />
                </li>
                <li class="clearfix">
                    <input type="text" name="url" class="form-control" id="url" value="<?php echo $comment_author_url; ?>" size="23" tabindex="3" placeholder="网址(选填)" />
                </li>
            <?php else : ?>
                <li class="clearfix">您已登录:<a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>. <a href="<?php echo wp_logout_url(get_permalink()); ?>" title="退出登录">退出 »</a></li>
            <?php endif; ?>
        </ul>
        <ul  class="comment-form-right">
            <li class="clearfix">
                <textarea id="message comment" class="form-control" name="comment" tabindex="4" rows="3" cols="40" placeholder="评论内容"></textarea>
            </li>
            <li class="clearfix">
                <span>*只有经过审核的评论才会显示出来噢</span>
                <a href="javascript:void(0);" onClick="Javascript:document.forms['commentform'].submit()" class="btn btn-primary">发表评论</a> </li>
        </ul>


        <?php comment_id_fields(); ?>
        <?php do_action('comment_form', $post->ID); ?>
    </form>
<?php endif;?>

<?php
    if (!empty($post->post_password) && $_COOKIE['wp-postpass_' . COOKIEHASH] != $post->post_password) {
?>
    <li class="comment-info">
        主人秘笺，请提供密码
    </li>
<?php } else if ( !comments_open() ) { ?>
    <li class="comment-info">
        此文评论功能已被挥刀砍掉~
    </li>
<?php } else if ( !have_comments() ) { ?>
    <li class="comment-info">
        还没有人留下脚印噢，快来踩踩叭
    </li>
<?php } else {?>
<table class="table">
    <tbody>
        <?php wp_list_comments('type=comment&callback=getComment');?>
    </tbody>
</table>
<?php }