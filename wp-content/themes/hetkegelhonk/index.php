<?php
/* Template Name: index */
require_once "header.php";
$posts = get_posts(array(
    'posts_per_page' => 3,
    'post_type' => 'post'
));

?>

<!-- header -->
<header class="header clear container" role="banner">
    <nav class="nav">
        <div class="logo">
            <a href="<?php echo home_url(); ?>">
                <img src="<?php echo get_template_directory_uri(); ?>/img/Kegelhonk_logo_white.png" alt="Logo" class="logo-img">
            </a>
        </div>
    </nav>
    <nav class="nav" role="navigation"><!-- nav -->
        <?php nav(); ?>
    </nav><!-- /nav -->
</header>
<!-- /header -->
<main role="main">
    <div class="header-image">
        <div>
            <div class="dark_overlay"></div>
            <div class="dotted_overlay"></div>
        </div>
        <?php $image = get_field('header_image'); ?>
        <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>"/>
    </div>
    <div class="container">
        <section>
            <h1><?php the_field('header_text'); ?></h1>
            <h2><?php the_field('subheader_text'); ?></h2>
            <p><?php the_field('paragraph_text'); ?></p>
            <a href="<?php the_field('button'); ?>" class="button">Lees Meer</a>
        </section>
    </div>
    <section class="news">
        <div class="container">
            <h1><?php the_field('sectie_2_header_text'); ?></h1>
            <h2><?php the_field('sectie_2_subheader_text'); ?></h2>
            <p><?php the_field('sectie_2_paragraaf_tekst'); ?></p>

            <?php
            if ($posts): ?>
                <div>
                    <?php foreach ($posts as $post):
                        setup_postdata($post);
                        ?>
                        <div class="posts">
                            <div class="posts_image">
                                <?= get_the_post_thumbnail(); ?>
                            </div>
                            <div class="post_text">
                                <a href="<?php the_permalink(); ?>">
                                    <h3><?php the_title(); ?></h3>
                                    <?php the_category(); ?>
                                    <p>
                                        <?= the_excerpt(); ?>
                                    </p>
                                </a>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
                <?php wp_reset_postdata(); ?>
            <?php endif; ?>
            <h2 class="news-link"><a href="<?= the_field('post_link'); ?>"><?= the_field('button_tekst'); ?></a></h2>
        </div>
    </section>
    <section class="separate_image">
        <div class="separator_image">
            <div class="circle_icon">
                <?php $icon = get_field('afbeelding_icon'); ?>
                <img src="<?= $icon['url']; ?>" alt="<?= $icon['alt']; ?>"/>

            </div>
            <div>
                <div class="dark_overlay"></div>
                <div class="dotted_overlay"></div>
                <div class="circle_overlay"></div>
                <div class="circle_overlay2"></div>
            </div>
            <?php $image2 = get_field('separator_image'); ?>
            <img src="<?= $image2['url']; ?>" alt="<?= $image2['alt']; ?>"/>
        </div>
    </section>
    <section>
        <div class="container">
            <h1><?php the_field('titel_s3'); ?></h1>
            <h2><?php the_field('subtitel-s3'); ?></h2>
            <p><?php the_field('text-s3'); ?></p>
            <div>
                <div class="col-l4">
                    <a href="<?= get_field("link_1") ?>">
                        <div class="circle">
                            <?php $icon1 = get_field('afbeelding_cirkel_1'); ?>
                            <img src="<?= $icon1['url']; ?>" alt="<?= $icon1['alt']; ?>"/>
                        </div>
                        <p>
                            <?= the_field("circel_1") ?>
                        </p>
                    </a>
                </div>
                <div class="col-l4">
                    <a href="<?= get_field("link_2") ?>">
                        <div class="circle">
                            <?php $icon2 = get_field('afbeelding_cirkel_2'); ?>
                            <img src="<?= $icon2['url']; ?>" alt="<?= $icon2['alt']; ?>"/>
                        </div>
                        <p>
                            <?= the_field("cirkel_2") ?>
                        </p>
                    </a>
                </div>
                <div class="col-l4">
                    <a href="<?= get_field("link_3") ?>">
                        <div class="circle">
                            <?php $icon3 = get_field('afbeelding_cirkel_3'); ?>
                            <img src="<?= $icon3['url']; ?>" alt="<?= $icon3['alt']; ?>"/>
                        </div>
                        <p>
                            <?= the_field("cirkel_3") ?>
                        </p>
                    </a>
                </div>
                <div class="col-l4">
                    <a href="<?= get_field("link_4") ?>">
                        <div class="circle">
                            <?php $icon4 = get_field('afbeelding_cirkel_4'); ?>
                            <img src="<?= $icon4['url']; ?>" alt="<?= $icon4['alt']; ?>"/>
                        </div>
                        <p>
                            <?= the_field("cirkel_4") ?>
                        </p>
                    </a>
                </div>
            </div>
        </div>
    </section>
    <section class="galery">
        <div class="container center">
            <h1><?= the_field("titel-s4"); ?></h1>
            <h2><?= the_field("subtitel-s4"); ?></h2>
        </div>
        <a href="<?= get_template_directory_uri(); ?>/gallerij">
            <div class="gallery">
                <?= the_field("homepagina_gallerij"); ?>
            </div>
        </a>

    </section>
</main>

<?php //get_sidebar(); ?>

<?php get_footer(); ?>
