<?php
global $porto_settings;

$footer_view = porto_get_meta_value('footer_view');

?>
<?php if ( is_active_sidebar( 'footer-top' ) && !$footer_view ) : ?>
    <div class="footer-top">
        <div class="container">
            <?php dynamic_sidebar( 'footer-top' ); ?>
        </div>
    </div>
<?php endif; ?>

<?php
$cols = 0;
for ($i = 1; $i <= 4; $i++) {
    if ( is_active_sidebar( 'footer-column-'. $i ) )
        $cols++;
}
?>
<div id="footer" class="footer-1<?php if ($porto_settings['footer-ribbon']) echo ' show-ribbon' ?>">
    <?php if (!$footer_view && $cols) : ?>
        <div class="container">
            <?php if ($porto_settings['footer-ribbon']) : ?>
                <div class="footer-ribbon"><?php echo force_balance_tags($porto_settings['footer-ribbon']) ?></div>
            <?php endif; ?>

            <?php
            if ($cols) :
                $col_class = array();
                switch ($cols) {
                    case 1:
                        $col_class[1] = 'col-sm-12';
                        break;
                    case 2:
                        $col_class[1] = 'col-sm-12 col-md-6';
                        $col_class[2] = 'col-sm-12 col-md-6';
                        break;
                    case 3:
                        $col_class[1] = 'col-sm-12 col-md-4';
                        $col_class[2] = 'col-sm-12 col-md-4';
                        $col_class[3] = 'col-sm-12 col-md-4';
                        break;
                    case 4:
                        $col_class[1] = 'col-sm-12 col-md-3';
                        $col_class[2] = 'col-sm-12 col-md-3';
                        $col_class[3] = 'col-sm-12 col-md-3';
                        $col_class[4] = 'col-sm-12 col-md-3';
                        break;
                }
                ?>
                <div class="row">
                    <?php
                    $cols = 1;
                    for ($i = 1; $i <= 4; $i++) {
                        if ( is_active_sidebar( 'footer-column-'. $i ) ) {
                            ?>
                            <div class="<?php echo $col_class[$cols++] ?>">
                                <?php dynamic_sidebar( 'footer-column-'. $i ); ?>
                            </div>
                        <?php
                        }
                    }
                    ?>
                </div>
            <?php endif; ?>

        </div>
    <?php endif; ?>

    <?php
    if (($porto_settings['footer-logo'] && $porto_settings['footer-logo']['url']) || is_active_sidebar( 'footer-bottom' ) || $porto_settings['footer-copyright']) :
    ?>
    <div class="footer-bottom">
        <div class="container">
            <div class="footer-left">
                <?php
                // show logo
                if ($porto_settings['footer-logo'] && $porto_settings['footer-logo']['url']) : ?>
                    <span class="logo">
                        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?> - <?php bloginfo( 'description' ); ?>" rel="home">
                            <?php echo '<img class="img-responsive" src="' . esc_url(str_replace( array( 'http:', 'https:' ), '', $porto_settings['footer-logo']['url'])) . '" alt="' . esc_attr( get_bloginfo( 'name', 'display' ) ) . '" />'; ?>
                        </a>
                    </span>
                <?php endif; ?>
                <?php
                if ($porto_settings['footer-copyright-pos'] == 'left') {
                    echo force_balance_tags($porto_settings['footer-copyright']);
                } else {
                    if (is_active_sidebar( 'footer-bottom' ))
                        dynamic_sidebar( 'footer-bottom' );
                }
                ?>
            </div>

            <?php if ($porto_settings['footer-payments'] && $porto_settings['footer-payments-image'] && $porto_settings['footer-payments-image']['url']) : ?>
                <div class="footer-center">
                    <?php if ($porto_settings['footer-payments-link']) : ?>
                    <a href="<?php echo esc_url($porto_settings['footer-payments-link']) ?>">
                    <?php endif; ?>
                        <img class="img-responsive" src="<?php echo esc_url(str_replace( array( 'http:', 'https:' ), '', $porto_settings['footer-payments-image']['url'])) ?>" alt="" />
                    <?php if ($porto_settings['footer-payments-link']) : ?>
                    </a>
                    <?php endif; ?>
                </div>
            <?php endif; ?>

            <?php
            if ($porto_settings['footer-copyright-pos'] == 'right') : ?>
                <div class="footer-right">
                    <?php echo force_balance_tags($porto_settings['footer-copyright']) ?>
                </div>
            <?php else :
                if (is_active_sidebar( 'footer-bottom' )) : ?>
                    <div class="footer-right">
                        <?php
                        dynamic_sidebar( 'footer-bottom' );
                        ?>
                    </div>
                <?php endif;
            endif;
            ?>
        </div>
    </div>
    <?php endif; ?>
</div>