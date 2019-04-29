<?php
get_header(); ?>
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
            <?php the_post_thumbnail(); // Fullsize image for the single post ?>
            <?php if ( has_post_thumbnail()) : // Check if Thumbnail exists ?>
            <?php endif; ?>
            <h1><?php the_title(); ?></h1>
        </div>
        <div class="sub-nav">
            <div class="container">
                <ul>
                    <a href="#"><li id="back">Ga terug</li></a>
                </ul>
            </div>
        </div>
        <div class="container">
	<section>

	<?php if (have_posts()): while (have_posts()) : the_post(); ?>

		<!-- article -->
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

			<!-- post details -->

			<?php the_content(); // Dynamic Content ?>

			<?php the_tags( __( 'Tags: ', 'html5blank' ), ', ', '<br>'); // Separated by commas with a line break at the end ?>


			<?php edit_post_link(); // Always handy to have Edit Post Links available ?>
<!--            <h3>--><?php //the_time('F j, Y'); ?><!-- --><?php //the_time('g:i a'); ?><!--</h3>-->
		</article>

	<?php endwhile; ?>

	<?php else: ?>

		<article>
			<h1><?php _e( 'Sorry, nothing to display.', 'html5blank' ); ?></h1>
		</article>

	<?php endif; ?>

	</section>
        </div>
	<!-- /section -->
	</main>
<script>
    document.getElementById("back").addEventListener("click", function (e) {
        window.history.back();
    })
</script>

<?php get_footer(); ?>
