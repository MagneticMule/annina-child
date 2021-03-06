<?php
/**
 * @package annina
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="content-annina">



        <header class="entry-header">
            <?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
        </header><!-- .entry-header -->

        <div class="entry-content">
            <?php the_content(); ?>
            <?php
            wp_link_pages( array(
                'before' => '<div class="page-links"><i class="fa fa-files-o spaceRight"></i>' . __( 'Pages:', 'annina' ),
                'after'  => '</div>',
                'link_before'      => '<span>',
                'link_after'       => '</span>',
                ) );
                ?>
            </div><!-- .entry-content -->

            <footer class="entry-footer smallPart">
                <?php annina_entry_footer(); ?>
                <?php annina_posted_on(); ?>
            </footer><!-- .entry-footer -->
        </div><!-- .content-annina -->
    </article><!-- #post-## -->
