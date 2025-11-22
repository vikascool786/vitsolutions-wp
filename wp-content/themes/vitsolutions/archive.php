<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package vitsolutions
 */
 get_header(); ?>

<!-- Page Title -->
<div class="page-title">
  <div class="container d-lg-flex justify-content-between align-items-center">
    <h1 class="mb-2 mb-lg-0">
      <?php
      if (is_category()) {
        single_cat_title();
      } elseif (is_tag()) {
        single_tag_title();
      } elseif (is_author()) {
        the_author();
      } elseif (is_day()) {
        echo 'Archive: ' . get_the_date();
      } elseif (is_month()) {
        echo 'Archive: ' . get_the_date('F Y');
      } elseif (is_year()) {
        echo 'Archive: ' . get_the_date('Y');
      } else {
        echo 'Archives';
      }
      ?>
    </h1>
    <nav class="breadcrumbs">
      <ol>
        <li><a href="<?php echo home_url(); ?>">Home</a></li>
        <li class="current">
          <?php
          if (is_category()) {
            single_cat_title();
          } elseif (is_tag()) {
            single_tag_title();
          } elseif (is_author()) {
            the_author();
          } elseif (is_day() || is_month() || is_year()) {
            echo get_the_date();
          } else {
            echo 'Archives';
          }
          ?>
        </li>
      </ol>
    </nav>
  </div>
</div><!-- End Page Title -->

<!-- Blog Posts Section -->
<section id="blog-posts" class="blog-posts section">
  <div class="container">
    <div class="row gy-4">
      <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        <div class="col-lg-4">
          <article>

            <div class="post-img">
              <a href="<?php the_permalink(); ?>">
                <?php if (has_post_thumbnail()) : ?>
                  <?php the_post_thumbnail('medium_large', ['class' => 'img-fluid']); ?>
                <?php else : ?>
                  <img src="<?php echo get_template_directory_uri(); ?>/assets/img/default.jpg" class="img-fluid" alt="<?php the_title(); ?>">
                <?php endif; ?>
              </a>
            </div>

            <p class="post-category">
              <?php
              $category = get_the_category();
              if (!empty($category)) {
                echo esc_html($category[0]->name);
              }
              ?>
            </p>

            <h2 class="title">
              <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
            </h2>

            <div class="d-flex align-items-center">
              <img src="<?php echo get_avatar_url(get_the_author_meta('ID')); ?>" alt="<?php the_author(); ?>" class="img-fluid post-author-img flex-shrink-0" width="50" height="50">
              <div class="post-meta">
                <p class="post-author"><?php the_author(); ?></p>
                <p class="post-date">
                  <time datetime="<?php echo get_the_date('Y-m-d'); ?>"><?php echo get_the_date(); ?></time>
                </p>
              </div>
            </div>

          </article>
        </div><!-- End post list item -->
      <?php endwhile; else : ?>
        <div class="col-12">
          <p>No posts found.</p>
        </div>
      <?php endif; ?>
    </div>
  </div>
</section><!-- /Blog Posts Section -->

<!-- Blog Pagination Section -->
<section id="blog-pagination" class="blog-pagination section">
  <div class="container">
    <div class="d-flex justify-content-center">
      <ul>
        <?php
        $big = 999999999; // need an unlikely integer
        $pages = paginate_links(array(
          'base'      => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
          'format'    => '?paged=%#%',
          'current'   => max(1, get_query_var('paged')),
          'total'     => $wp_query->max_num_pages,
          'type'      => 'array',
          'prev_text' => '<i class="bi bi-chevron-left"></i>',
          'next_text' => '<i class="bi bi-chevron-right"></i>',
        ));

        if ($pages) {
          foreach ($pages as $page) {
            if (strpos($page, 'current') !== false) {
              echo '<li><a href="#" class="active">' . strip_tags($page) . '</a></li>';
            } else {
              echo '<li>' . $page . '</li>';
            }
          }
        }
        ?>
      </ul>
    </div>
  </div>
</section><!-- /Blog Pagination Section -->

<?php get_footer(); ?>
