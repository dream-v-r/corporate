
<?php get_header(); ?>

<!-- Page Header -->
<header class="masthead" style="background-image: url('<?php echo get_template_directory_uri(); ?>/img/post-bg.jpg')">
<!--header class="masthead" style="background-image: url('<?php echo wp_get_attachment_url(get_post_thumbnail_id($post_id)); ?>')"-->
  <div class="overlay"></div>
  <div class="container header-container">
    <div class="row row-heading">
      <div class="col-md-10 mx-auto">
        <div class="site-heading">
          <h1>DREAM VISION COLUMN</h1>
          <span class="subheading">IT・クリエイティブ業界webマガジン</span>
          <!--a href="<?php the_permalink(); ?>" style="color:#fff;text-decoration: none;">
            <h1><?php the_title(); ?></h1>
            <span class="subheading"><?php the_excerpt(); ?></span>
          </a-->
        </div>
      </div>
    </div>
  </div>
</header>
<!-- Main Content -->
<div class="container">
  <div class="row">
  <div class="col-md-10 mx-auto list_of_posted_pages">
  <?php while (have_posts()): the_post(); ?>
  <a href="<?php the_permalink(); ?>">
  <div class="post-preview">
  <?php the_post_thumbnail( array(350,350) ); ?>
  <h2 class="post-title">
  <?php the_title(); ?>
  </h2>
  <h3 class="post-subtitle">
  <?php the_excerpt(); ?>
  </h3>
  </a>	
  <div class="article-tag">
  <?php the_tags('<ul><li>','</li><li>','</li></ul>'); ?>
</div>
  <p class="post-meta">Posted by
  <?php the_author(); ?>
  on <?php the_time('Y-m-d'); ?></p>
</div>
<?php endwhile; ?>

<?php get_footer(); ?>