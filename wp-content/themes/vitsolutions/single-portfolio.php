<?php get_header(); ?>

<section class="single-portfolio section">
  <div class="container">
    <div class="section-title text-center" data-aos="fade-up">
      <h2><?php the_title(); ?></h2>
    </div>

    <div class="row justify-content-center" data-aos="fade-up" data-aos-delay="100">
      <div class="col-md-10">
        <?php if (has_post_thumbnail()) : ?>
          <div class="portfolio-featured mb-4">
            <?php the_post_thumbnail('large', ['class' => 'img-fluid']); ?>
          </div>
        <?php endif; ?>

        <div class="portfolio-details">
          <?php the_content(); ?>
        </div>

        <?php
        $terms = get_the_term_list(get_the_ID(), 'portfolio_category', '', ', ');
        if ($terms) : ?>
          <div class="portfolio-meta mt-4">
            <strong>Category:</strong> <?php echo $terms; ?>
          </div>
        <?php endif; ?>

        <?php if ($url = get_field('project_url')) : ?>
          <div class="portfolio-link mt-3">
            <a class="btn btn-primary" href="<?php echo esc_url($url); ?>" target="_blank">Visit Project</a>
          </div>
        <?php endif; ?>
      </div>
    </div>
    <?php //echo do_shortcode('[portfolio]'); ?>
  </div>
</section>

<?php get_footer(); ?>
