<?php get_header() ?>
<h1>Single</h1>
<?php if(have_posts(  )): while(have_posts(  )): the_post(  ); ?>

<article class="post">
    <?php the_post_thumbnail( ) ?>
    <h1><?php the_title() ?></h1>
    <div class="post_meta">
        <?php echo get_avatar(get_the_author_meta("ID"), 40) ?>
        <p>
            Publié le <?php the_date() ?>
            par <?php the_author() ?>
            dans la catégorie <?php the_category() ?>
            avec les étiquettes <?php the_tags() ?>
        </p>
    </div>
    <div class="post_content">
        <?php the_content() ?>
    </div>
</article>
<?php endwhile; endif; ?>
<?php get_footer() ?>