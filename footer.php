            </div>
            <!-- fin du div container ouvert dans header-->
            <?php
            // get_template_part('template-parts/content', 'trois_colonnes');
            ?>

            <?php
            get_template_part('template-parts/content', 'footer_simple');
            ?>

            <nav class="nav-footer">
                <?= wp_nav_menu(
                    [
                        'theme_location' => 'footer',
                        'container' => false,
                        'menu_class' => 'menu-navigation',
                        'items_wrap' => '<div id="%1$s" class="%2$s">%3$s</div>'
                    ]
                ) ?>
            </nav>
        <?php
        get_template_part('template-parts/content', 'cookie_popup');
        ?>
        <?php wp_footer(); ?>
        </body>

    </html>