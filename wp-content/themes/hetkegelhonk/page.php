<?php
require_once "header.php";
$image = get_field('header_foto');
$mypages = get_pages( array( 'child_of' => $post->ID, 'sort_column' => 'post_date', 'sort_order' => 'desc' ) );

?>
<header class="header clear container" role="banner">
    <nav class="nav">
        <!--        <div class="logo">-->
        <!--            <a href="--><?php //echo home_url(); ?><!--">-->
        <!--                <img src="-->
        <?php //echo get_template_directory_uri(); ?><!--/img/logo.svg" alt="Logo" class="logo-img">-->
        <!--            </a>-->
        <!--        </div>-->
    </nav>
    <nav class="page-nav" role="navigation"><!-- nav -->
        <?php nav(); ?>
    </nav><!-- /nav -->
</header>
<main role="main">
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
    <section>
        <div class="container">
            <?php if (have_posts()): while (have_posts()) : the_post();


            ?>
                <!-- article -->
                <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                    <?php the_content(); ?>
                </article>
                <article>
                    <?php foreach( $mypages as $page ) {
                        $content = $page->post_content;
                        if ( ! $content ) // Check for empty page
                            continue;
                        $content = apply_filters( 'the_content', $content );
                        ?>

                        <div class="entry" id="<?= $page->post_title; ?>"><?php echo $content; ?></div>

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

<?php get_footer(); ?>
