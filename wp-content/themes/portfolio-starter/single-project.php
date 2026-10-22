<?php get_header(); ?>
<main class="wrap entry-content">
<?php while (have_posts()) : the_post(); ?>
    <article <?php post_class(); ?>><span class="eyebrow">Project</span><h1 class="entry-title"><?php the_title(); ?></h1><?php if (has_post_thumbnail()) { the_post_thumbnail('large'); } ?><div><?php the_content(); ?></div></article>
<?php endwhile; ?>
</main>
<?php get_footer(); ?>
