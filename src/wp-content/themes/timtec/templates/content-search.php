<article <?php post_class(); ?>>
    <header>
        <h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
        <?php if (get_post_type() === 'post'): ?>
            <?php get_template_part('templates/entry-meta'); ?>
        <?php endif; ?>
    </header>
    <div class="entry-summary">
        <?php the_excerpt(); ?>
    </div>
</article>
