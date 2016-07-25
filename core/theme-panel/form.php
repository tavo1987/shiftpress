
<div class="wrap">
    <h1> <?php _e('Shiftpress Settings','shiftpress') ?></h1>
    <?php settings_errors(); ?>
    <form action="options.php" method="post">
        <?php
            settings_fields('shiftpress-settings-group');
            do_settings_sections('shiftpress_theme_panel');
            submit_button();
        ?>
    </form>
</div>
