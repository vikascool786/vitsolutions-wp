<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package vitsolutions
 */

get_header();
?>

	<!-- Page Title -->
  <div class="page-title">
    <div class="container d-lg-flex justify-content-between align-items-center">
      <h1 class="mb-2 mb-lg-0">Blog Details</h1>
      <nav class="breadcrumbs">
        <ol>
          <li><a href="<?php echo home_url(); ?>">Home</a></li>
          <li class="current"><?php the_title(); ?></li>
        </ol>
      </nav>
    </div>
  </div><!-- End Page Title -->

  <div class="container">
    <div class="row">

      <div class="col-lg-8">
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

        <!-- Blog Details Section -->
        <section id="blog-details" class="blog-details section">
          <div class="container">

            <article class="article">

              <div class="post-img">
                <?php if (has_post_thumbnail()) {
                  the_post_thumbnail('large', ['class' => 'img-fluid']);
                } ?>
              </div>

              <h2 class="title"><?php the_title(); ?></h2>

              <div class="meta-top">
                <ul>
                  <li class="d-flex align-items-center"><i class="bi bi-person"></i> <?php the_author_posts_link(); ?></li>
                  <li class="d-flex align-items-center"><i class="bi bi-clock"></i> <time datetime="<?php echo get_the_date('Y-m-d'); ?>"><?php echo get_the_date(); ?></time></li>
                  <li class="d-flex align-items-center"><i class="bi bi-chat-dots"></i> <a href="#"><?php comments_number('No Comments', '1 Comment', '% Comments'); ?></a></li>
                </ul>
              </div><!-- End meta top -->

              <div class="content">
                <?php the_content(); ?>
              </div><!-- End post content -->

              <div class="meta-bottom">
                <i class="bi bi-folder"></i>
                <ul class="cats">
                  <?php the_category('<li>', '</li>'); ?>
                </ul>

                <i class="bi bi-tags"></i>
                <ul class="tags">
                  <?php the_tags('<li>', '</li><li>', '</li>'); ?>
                </ul>
              </div><!-- End meta bottom -->

            </article>

          </div>
        </section><!-- /Blog Details Section -->

        <!-- Blog Author Section -->
        <section id="blog-author" class="blog-author section">
			<div class="container">
				<div class="author-container d-flex align-items-center">

				<?php
				// Author ID and data
				$author_id = get_the_author_meta('ID');
				echo get_avatar($author_id, 80, '', '', ['class' => 'rounded-circle flex-shrink-0']);
				?>

				<div>
					<h4><?php the_author(); ?></h4>

					<div class="social-links">
					<?php
					// Optional: set these as user_meta in WP admin under Users > Profile
					$twitter   = get_the_author_meta('twitter');
					$facebook  = get_the_author_meta('facebook');
					$instagram = get_the_author_meta('instagram');

					if ($twitter)   echo '<a href="' . esc_url($twitter) . '"><i class="bi bi-twitter-x"></i></a>';
					if ($facebook)  echo '<a href="' . esc_url($facebook) . '"><i class="bi bi-facebook"></i></a>';
					if ($instagram) echo '<a href="' . esc_url($instagram) . '"><i class="bi bi-instagram"></i></a>';
					?>
					</div>

					<p><?php the_author_meta('description'); ?></p>
				</div>

				</div>
			</div>
			</section><!-- /Blog Author Section -->

        <?php endwhile; endif; ?>
      </div>

      <!-- Sidebar -->
      <div class="col-lg-4 sidebar">
        <div class="widgets-container">

          <!-- Search Widget -->
          <div class="search-widget widget-item">
            <h3 class="widget-title">Search</h3>
			<form action="<?php echo esc_url(home_url('/')); ?>" method="get">
				<input type="text" name="s" placeholder="Search..." value="<?php echo get_search_query(); ?>">
				<button type="submit" title="Search"><i class="bi bi-search"></i></button>
			</form>
          </div>
		  

          <!-- Categories Widget -->
          <div class="categories-widget widget-item">
            <h3 class="widget-title">Categories</h3>
            <ul class="mt-3">
              <?php wp_list_categories(['title_li' => '', 'show_count' => true]); ?>
            </ul>
          </div>

          <!-- Recent Posts Widget -->
          <div class="recent-posts-widget widget-item">
            <h3 class="widget-title">Recent Posts</h3>
            <?php
            $recent_posts = wp_get_recent_posts(['numberposts' => 5]);
            foreach ($recent_posts as $post) : ?>
              <div class="post-item d-flex">
                <?php echo get_the_post_thumbnail($post['ID'], 'thumbnail', ['class' => 'flex-shrink-0']); ?>
                <div>
                  <h4><a href="<?php echo get_permalink($post['ID']); ?>"><?php echo esc_html($post['post_title']); ?></a></h4>
                  <time datetime="<?php echo get_the_date('Y-m-d', $post['ID']); ?>"><?php echo get_the_date('', $post['ID']); ?></time>
                </div>
              </div>
            <?php endforeach; ?>
          </div>

          <!-- Tags Widget -->
          <div class="tags-widget widget-item">
            <h3 class="widget-title">Tags</h3>
            <ul>
              <?php
              $tags = get_tags();
              foreach ($tags as $tag) {
                echo '<li><a href="' . get_tag_link($tag) . '">' . $tag->name . '</a></li>';
              }
              ?>
            </ul>
          </div>

        </div>
      </div>

    </div>
  </div>

<?php
// get_sidebar();
get_footer();
