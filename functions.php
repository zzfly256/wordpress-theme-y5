<?php

// 分页函数
function getPageNav($query_string){
    global $posts_per_page, $paged;
    $my_query = new WP_Query($query_string ."&posts_per_page=-1");
    $total_posts = $my_query->post_count;
    if(empty($paged))$paged = 1;
    $prev = $paged - 1;
    $next = $paged + 1;
    $range = 4; // only edit this if you want to show more page-links
    $showitems = ($range * 2)+1;

    $pages = ceil($total_posts/$posts_per_page);
    if(1 != $pages){
        echo "<div class='pagination'>";
        echo ($paged > 2 && $paged+$range+1 > $pages && $showitems < $pages)? "<a href='".get_pagenum_link(1)."'>首页</a>":"";
        echo ($paged > 1 && $showitems < $pages)? "<a href='".get_pagenum_link($prev)."'>上一页</a>":"";

        for ($i=1; $i <= $pages; $i++){
            if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems )){
                echo ($paged == $i)? "<span class='current'>".$i."</span>":"<a href='".get_pagenum_link($i)."' class='inactive' >".$i."</a>";
            }
        }

        echo ($paged < $pages && $showitems < $pages) ? "<a href='".get_pagenum_link($next)."'>下一页</a>" :"";
        echo ($paged < $pages-1 && $paged+$range-1 < $pages && $showitems < $pages) ? "<a href='".get_pagenum_link($pages)."'>末页</a>":"";
        echo "</div>\n";
    }
}

// 面包屑导航
function getBreadcrumbs()
{
    global $wp_query;

    if ( !is_home() ){

        // Add the Home link
        echo '<li><a href="'. get_settings('home') .'">主页</a></li>';

        if ( is_category() )
        {
            $catTitle = single_cat_title( "", false );
            $cat = get_cat_ID( $catTitle );
            echo "<li>&raquo;". get_category_parents( $cat, TRUE, "" ) ."</li>";
        }
        elseif ( is_archive() && !is_category() )
        {
            echo "<li>归档</li>";
        }
        elseif ( is_search() ) {

            echo "<li><a href='#'>搜索结果</a></li>";
        }
        elseif ( is_404() )
        {
            echo "<li>找不到内容</li>";
        }
        elseif ( is_single() )
        {
            $category = get_the_category();
            $category_id = get_cat_ID( $category[0]->cat_name );

            echo '<li>&raquo;'. get_category_parents( $category_id, TRUE, "" ).'</li>';
           // echo '<a href="'.get_permalink().'">'.the_title('','', FALSE) ."</a></li>";
        }
        elseif ( is_page() )
        {
            $post = $wp_query->get_queried_object();

            if ( $post->post_parent == 0 ){

                echo "<li> &raquo; <a href='".get_permalink()."'>".the_title('','', FALSE)."</a></li>";

            } else {
                $title = the_title('','', FALSE);
                $ancestors = array_reverse( get_post_ancestors( $post->ID ) );
                array_push($ancestors, $post->ID);

                foreach ( $ancestors as $ancestor ){
                    if( $ancestor != end($ancestors) ){
                        echo '<li> &raquo; <a href="'. get_permalink($ancestor) .'">'. strip_tags( apply_filters( 'single_post_title', get_the_title( $ancestor ) ) ) .'</a></li>';
                    } else {
                        echo '<li> &raquo; '. strip_tags( apply_filters( 'single_post_title', get_the_title( $ancestor ) ) ) .'</li>';
                    }
                }
            }
        }

    }
}

// 评论列表

function getComment($comment, $args, $depth){

    $GLOBALS['comment'] = $comment;
    ?>

        <tr class="comment-list" id="li-comment-<?php comment_ID(); ?>">
            <td><?php if (function_exists('get_avatar') && get_option('show_avatars')) { echo get_avatar($comment, 48); } ?></td>
            <td class="author"><?php printf(__('%s'), get_comment_author_link()); ?></td>
            <td id="comment-<?php comment_ID(); ?>" title="留言时间：<?php echo get_comment_time('Y年m月d日 H:i'); ?>">
                <?php comment_text(); ?>
                <?php if ($comment->comment_approved == '0') : ?>
                    <em>你的评论正在审核，稍后会显示出来！</em><br />
                <?php endif; ?>
            </td>
        </tr>

    <?php
}

if (function_exists('register_nav_menu')) {
    register_nav_menu('category_nav_menu', '主导航菜单 - 分类');
    register_nav_menu('about_nav_menu', '主导航菜单 - 关于');
}

?>