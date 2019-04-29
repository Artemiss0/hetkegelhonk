<?php /* Template Name: nieuwsberichten */
require_once "header.php";
$image = get_field('header_foto');
$mypages = get_pages( array( 'child_of' => $post->ID, 'sort_column' => 'post_date', 'sort_order' => 'desc' ) );

?>
<header class="header clear container" role="banner">
    <nav class="page-nav" role="navigation"><!-- nav -->
        <?php nav(); ?>
    </nav><!-- /nav -->
</header>

<main role="main">
    <section>
        <div class="sub-header">
            <div>
                <div class="dark_overlay"></div>
                <div class="dotted_overlay"></div>
            </div>
            <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>"/>
            <h1><?php the_title(); ?></h1>
        </div>
        <div class="sub-nav">
            <div class="container">
                <ul>
                    <?php foreach( $mypages as $page ) {?>
                        <a href="#<?= $page->post_title; ?>"><li><?= $page->post_title; ?></li></a>
                    <?php } ?>
                </ul>
            </div>
        </div>
    </section>

    <section>
        <div class="container">
            <?php global $post;
            $args = array( 'posts_per_page' => 10, 'order'=> 'DESC', 'orderby' => 'date' );
            $postslist = get_posts( $args );
?>

            <?php if (have_posts()): while (have_posts()) : the_post(); ?>
                <!-- article -->

                <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                    <?php the_content(); ?>
                    <div>
                        <?php
                        foreach ( $postslist as $post ) :
                            setup_postdata( $post ); ?>
                            <div class="posts news">
                                <div class="posts_image">
                                    <?= get_the_post_thumbnail(); ?>
                                </div>
                                <div class="post_text">
                                    <a href="<?php the_permalink(); ?>">
                                        <h3><?php the_title(); ?></h3>
                                        <?php the_category(); ?>
                                        <p>
                                            <?php the_excerpt(); ?>
                                        </p>
                                    </a>
                                </div>
                            </div>

                        <?php
                        endforeach;

                        ?>
                        <?php if(function_exists("hocwp_pagination")) hocwp_pagination(); ?>
                        <?php
                        wp_reset_postdata();
                        ?>
                    </div>
                </article>
                <article>
                    <?php foreach( $mypages as $page ) {
                        $content = $page->post_content;
                        if ( ! $content ) // Check for empty page
                            continue;
                        $content = apply_filters( 'the_content', $content );
                        ?>

                        <div class="entry" id="<?= $page->post_title; ?>">
                            <?php echo $content; ?></div>
                    <?php } ?>
                    <br class="clear">
                    <?php edit_post_link(); ?>
                </article>

            <?php endwhile; ?>
            <?php else: ?>
                <article>
                    <h2><?php _e('Sorry, nothing to display.', 'html5blank'); ?></h2>
                </article>
            <?php endif; ?>

        </div>

    </section>

</main>

<?php //get_sidebar(); ?>

<?php get_footer(); ?>
