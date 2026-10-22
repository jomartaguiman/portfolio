<?php
get_header();
?>
<main class="wrap entry-content">
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
<article <?php post_class(); ?>><h1 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1><?php the_excerpt(); ?></article>
<?php endwhile; the_posts_navigation(); else : ?><p>No content found.</p><?php endif; ?>
</main>
<?php get_footer();
