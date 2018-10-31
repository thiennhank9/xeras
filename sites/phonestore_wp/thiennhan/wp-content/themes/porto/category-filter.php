<?php
global $porto_settings, $porto_layout, $porto_sidebar;
?>
<div class="category-filter">
    <div class="filter-toggle"><i class="fa fa-filter"></i></div>
    <div class="filter-content">
        <?php dynamic_sidebar( $porto_sidebar ); ?>
    </div>
</div>
