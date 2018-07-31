
    </div><!-- / End container-->

    <footer role="contentinfo" class="bg-grey-lighter py-8">
        <div class="container mx-auto">
            <div id="copyright">
                <?php echo sprintf( __( '%1$s %2$s %3$s. All Rights Reserved.', 'shiftpress' ), '&copy;', date( 'Y' ), esc_html( get_bloginfo( 'name' ) ) ); echo sprintf( __( ' Theme By: %1$s.', 'shiftpress' ), '<a target="_blank" rel="noopener noreferrer" href="https://github.com/tavo1987">Edwin Ramírez</a>' ); ?>
            </div>
        </div>
    </footer><!-- / End footer-->
    <?php wp_footer(); ?>
</body>
</html>
