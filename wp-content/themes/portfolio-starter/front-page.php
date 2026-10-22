<?php get_header(); ?>
<main>
<section class="wrap hero">
    <div><span class="eyebrow">Independent creative portfolio</span><h1><?php echo esc_html(get_bloginfo('description') ?: 'Thoughtful work, made with purpose.'); ?></h1><p>A selection of projects, ideas, and collaborations. Replace this introduction with a few lines about what you do and who you help.</p><a class="button" href="#work">Explore my work <span aria-hidden="true">&nbsp;↗</span></a></div>
    <div class="hero-art" aria-hidden="true"><span><?php echo esc_html(mb_substr(get_bloginfo('name'), 0, 1)); ?></span></div>
</section>
<section id="work" class="wrap section">
    <div class="section-heading"><h2>Selected work</h2><p>A few things I’ve made recently</p></div>
    <div class="projects">
    <?php $projects = new WP_Query(array('post_type' => 'project', 'posts_per_page' => 6)); if ($projects->have_posts()) : while ($projects->have_posts()) : $projects->the_post(); ?>
        <a class="project" href="<?php the_permalink(); ?>"><div class="project-image"><?php if (has_post_thumbnail()) { the_post_thumbnail('large'); } else { echo '<span aria-hidden="true">✳</span>'; } ?></div><h3><?php the_title(); ?></h3><p><?php echo esc_html(get_the_excerpt()); ?></p></a>
    <?php endwhile; wp_reset_postdata(); else : ?>
        <article class="project"><div class="project-image">✳</div><h3>Your first project</h3><p>Add projects in the WordPress dashboard to fill this section.</p></article>
        <article class="project"><div class="project-image">◌</div><h3>A recent collaboration</h3><p>Use a short excerpt to describe the work.</p></article>
    <?php endif; ?>
    </div>
</section>
<section class="about section"><div class="wrap about-inner"><h2>A little about me</h2><div class="about-copy"><p>I’m a designer, maker, and curious problem-solver. I work with people and teams to turn good ideas into useful, memorable experiences.</p><p>Make this section yours: share what you do, what you care about, and the kind of work you want to take on.</p></div></div></section>
<section class="wrap contact"><div class="contact-inner"><h2>Have a project in mind?</h2><a class="button" href="mailto:hello@example.com">Let’s talk <span aria-hidden="true">&nbsp;↗</span></a></div></section>
</main>
<?php get_footer(); ?>
