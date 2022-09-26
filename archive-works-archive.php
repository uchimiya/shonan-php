<?php get_header(); ?>

<section class="l-works-mv p-works-mv l-inner">
    <h2 class="p-works__title">works</h2>
    <div class="p-works__slide content-list">
        <div class="p-works__slide items">
            <div class="p-works__item">
                <div class="p-works-slide">
                    <div class="swiper-container swiper1">
                        <div class="swiper-wrapper">
                            <?php
                            $repeat_item = SCF::get_option_meta('register_slide', 'works-contents');
                            foreach ($repeat_item as $fields) {
                                $image_url = wp_get_attachment_image_src($fields['works-image'], 'full'); ?>
                                <div class="swiper-slide">
                                    <div class="p-works-slide img">
                                        <img src="<?php echo $image_url[0]; ?>" width="<?php echo $image_url[0]; ?>">
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                        <div class="swiper-pagination my-swiper-pagination"></div>
                        <div class="swiper-button-next"></div>
                        <div class="swiper-button-prev"></div>
                    </div>
                </div>
            </div>
        </div>



        <div class="p-works__content items fadeUp">
            <div class="p-works__flame">
                <span></span>
                <span></span>
            </div>

            <div class="swiper-container swiper2">
                <div class="swiper-wrapper works">
                    <?php
                    foreach ($repeat_item as $fields) {
                    ?>
                        <div class="swiper-slide">

                            <div class="p-works__content item top">
                                <div class="p-works__content item--left">
                                    <h2 class="p-works__content title">DATE</h2>
                                </div>
                                <div class="p-works__content item--right">
                                    <?php echo $fields['works-date']; ?>
                                </div>
                            </div>
                            <div class="p-works__content item">
                                <div class="p-works__content item--left">
                                    <h2 class="p-works__content title">TAG</h2>
                                </div>
                                <div class="p-works__content item--right">
                                    <div class="p-works__content tag">
                                        <?php echo $fields['works-tag']; ?>
                                    </div>
                                </div>
                            </div>
                            <div class="p-works__content item">
                                <div class="p-works__content item--left">
                                    <h2 class="p-works__content title">NAME</h2>
                                </div>

                                <div class="p-works__content item--right">
                                    <div class="p-works__content name">
                                        <?php echo $fields['works-name']; ?>
                                    </div>
                                </div>
                            </div>
                            <div class="p-works__content item">
                                <div class="p-works__content item--left">
                                    <h2 class="p-works__content title">ACCESS</h2>
                                </div>

                                <div class="p-works__content item--right">
                                    <div class="p-works__content access">
                                        <?php echo $fields['works-access']; ?>
                                    </div>
                                </div>
                            </div>
                            <div class="p-works__content item">
                                <div class="p-works__content item--left">
                                    <h2 class="p-works__content title">DETAIL</h2>
                                </div>

                                <div class="p-works__content item--right">
                                    <div class="p-works__content access">
                                        <?php echo $fields['works-detail']; ?>
                                    </div>
                                </div>
                            </div>

                        </div>
                    <?php } ?>
                </div>
            </div>

            <div class="p-works__flame">
                <span></span>
                <span></span>
            </div>
        </div>
    </div>
</section>

<section class="l-works-tab l-inner" id="works">
    <ul class="p-works-tab items fadeUp">
        <li class="p-works-tab item">
            <a href="<?php echo esc_url(get_post_type_archive_link('works-archive')); ?>"><span>ALL</span></a>
        </li>
        <?php
        $terms = get_terms('works_cat', array('hide_empty' => false));

        foreach ($terms as $term) { ?>

            <li class="p-works-tab item">
                <a href="<?php echo esc_url(get_term_link($term)); ?>">
                    <span><?php echo esc_html($term->name); ?></span></a>
            </li>
        <?php
        }
        ?>
    </ul>
    <div class="p-works-list items">
        <?php
        if (wp_is_mobile()) {
            $num = 4; // スマホの表示数(全件は-1)
        } else {
            $num = 9; // PCの表示数(全件は-1)
        }
        $paged = get_query_var('paged') ? get_query_var('paged') : 1;
        $args = [
            'post_type' => 'works-archive', // カスタム投稿の投稿タイプスラッグ
            'paged' => $paged, // ページネーションがある場合に必要
            'posts_per_page' => $num, // 表示件数
        ];
        $wp_query = new WP_Query($args);
        if (have_posts()) : while (have_posts()) : the_post();
        ?>
                <?php
                $repeat_item = SCF::get('works-archive');
                foreach ($repeat_item as $fields) {
                ?>
                    <div class="p-works-list item fadeUp">
                    <a href="<?php the_permalink(); ?>">
                        <figure class="p-works-list image">
                            <?php the_post_thumbnail('post-thumbnail', array('alt' => the_title_attribute('echo=0'))); ?>
                        </figure>

                        <div class="p-works-list contents">
                            <div class="p-works-list content--left">
                                <p class="p-works-list title-tag">TAG
                                <?php
                                    $taxonomy_terms = get_the_terms($post->ID, 'works_cat');
                                    foreach ($taxonomy_terms as $taxonomy_term) {
                                        echo '<span class="' . $taxonomy_term->slug . '">' . $taxonomy_term->name . '</span>';
                                    }
                                    ?>
                                </p>
                                <p class="p-works-list title-name">NAME
                                    <span><?php the_title(); ?></span>
                                </p>
                                <p class="p-works-list title-access">ACCESS
                                    <span><?php echo $fields['works-list-address']; ?></span>
                                </p>
                                <p class="p-works-list title-detail">DETAIL
                                    <span><?php echo $fields['works-list-detail']; ?></span>
                                </p>
                            </div>

                        </div>
                        </a>
                    </div>
                    <?php } ?>
                <?php endwhile;
                else : ?>
                <?php wp_reset_query(); ?>
            <?php endif ?>

    </div>
    <div class="l-pagenavi">
      <?php wp_pagenavi(); ?>
    </div>
</section>

<section class="l-last__contents">
    <figure class="p-last__contents img p-last__contents--works">
        <img src="<?php echo get_template_directory_uri() ?>/assets/img/common/last_contents-works.jpg" alt="">
    </figure>
</section>


<?php get_footer(); ?>