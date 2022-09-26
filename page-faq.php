<?php
/*
Template Name: 婚活よくあるご質問
*/
?>
<?php get_header(); ?>
<main>
<div class="bt-faq">
    <h2>婚活よくあるご質問</h2>
    <div class="faq-logo">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/faq/faq-title.svg" alt="faqタイトルのロゴ">
    </div>
</div>
<nav class="faq breadcrumbs">
	<ol>
		<li><a href="/">TOP</a></li>
		<li>婚活よくあるご質問</li>
	</ol>
</nav>

<section class="l-faq p-faq">
    <h2 class="p-faq-title">ビオスマリッジサロンによく寄せられる、婚活に関するご質問をご紹介します。どうぞ参考になさってください。</h2>
    <div class="p-faq-items">
        <?php
        $faq = SCF::get('faq-top');
        foreach( $faq as $index => $fields ) {
        ?>
        <a href="#i-<?php echo $index ?>" class="p-faq-item">
            <div class="p-faq-item--left">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/faq/top-faq.svg" alt="">
                <h3><?php echo $fields['fap-list']; ?></h3>
            </div>
            <div class="p-faq-item--right">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/faq/faq-yazirushi.svg" alt="">
            </div>
        </a>
        <?php } ?>
    </div>
    <div class="p-faq-contents">
        <?php
        $faq = SCF::get('faq-lists');
        foreach( $faq as $index => $fields ) {
        ?>
        <div id="i-<?php echo $index ?>" class="p-faq-content">
            <div class="p-gaq-content--top">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/faq/faq-content.svg" alt="">
                <h4><?php echo $fields['faq-txt']; ?></h4>
            </div>
            <div class="p-gaq-content--bottom">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/faq/answer-content.svg" alt="">
                <h4><?php echo nl2br($fields['answer-txt']); ?></h4>
            </div>
            <div class="p-gaq-content--bottom txt">
                <p><?php echo nl2br($fields['faq-text']); ?></p>
            </div>
         </div>
        <?php } ?>
    </div>
    
    <div class="p-faq-button">
        <a href="<?php echo esc_url(home_url('/m-contact/')); ?>">お問い合わせ</a>
    </div>
</section>

</main>
<?php get_template_part('template/foot'); ?>
<?php get_footer(); ?>