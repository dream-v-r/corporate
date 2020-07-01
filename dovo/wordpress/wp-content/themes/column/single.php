
<?php get_header(); ?>

<!-- Page Header -->
<header class="masthead masthead_single" style="
    background-image: url(<?php echo get_the_post_thumbnail_url(); ?>) ;">

  <div class="overlay"></div>
  <div class="container header-container">
    <div class="row row-heading">
      <div class="col-lg-8 col-md-10 mx-auto">
        <div class="site-heading site-heading_single">
<?php 
    if ( have_posts() ) :
    while ( have_posts() ) : the_post();
?>
          <h1><?php the_title(); ?></h1>
        </div>
      </div>
    </div>
  </div>
</header>
<!-- Main Content -->
<div class="container">
  <div class="row row_center">
  <div class="col-lg-8 mx-auto">
    <section>
      <?php the_content(); ?>
    </section>
<hr>
<p class="post-meta">Posted by
  <?php the_author(); ?>
  on <?php the_time('Y-m-d'); ?></p>
<div class="article-tag">
      <?php the_tags('<ul><li>','</li><li>','</li></ul>'
    ); ?>
</div>
<?php 
    endwhile;
    endif;
?>

<?php get_footer(); ?>