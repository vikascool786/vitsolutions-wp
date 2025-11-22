<section id="portfolio" class="portfolio section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Portfolio</h2>
        <p>Explore our diverse work — from web design to branding, every pixel matters.</p>
      </div><!-- End Section Title -->

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="isotope-layout" data-default-filter="*" data-layout="masonry" data-sort="original-order">

          <!-- <div class="portfolio-filters-container" data-aos="fade-up" data-aos-delay="200">
            <ul class="portfolio-filters isotope-filters">
              <li data-filter="*" class="filter-active">All Work</li>
              <li data-filter=".filter-web">Web Design</li>
              <li data-filter=".filter-graphics">Graphics</li>
              <li data-filter=".filter-motion">Motion</li>
              <li data-filter=".filter-brand">Branding</li>
            </ul>
          </div> -->
          
          <!-- Filter Tabs -->
          <div class="portfolio-filters-container" data-aos="fade-up" data-aos-delay="200">
            <ul class="portfolio-filters isotope-filters">
              <li data-filter="*" class="filter-active">All Work</li>
              <?php
              $terms = get_terms([
                'taxonomy' => 'portfolio_category',
                'hide_empty' => true
              ]);
              foreach ($terms as $term) {
                echo '<li data-filter=".filter-' . esc_attr($term->slug) . '">' . esc_html($term->name) . '</li>';
              }
              ?>
            </ul>
          </div>

          <div class="row g-4 isotope-container" data-aos="fade-up" data-aos-delay="300">

           <?php
            $query = new WP_Query([
              'post_type' => 'portfolio',
              'posts_per_page' => -1
            ]);

            if ($query->have_posts()) :
              while ($query->have_posts()) : $query->the_post();
                $terms = get_the_terms(get_the_ID(), 'portfolio_category');
                $class_list = '';
                $term_name = '';

                if ($terms && !is_wp_error($terms)) {
                  foreach ($terms as $term) {
                    $class_list .= ' filter-' . $term->slug;
                    $term_name = $term->name; // Just take one term (or modify if you want multiple)
                  }
                }

                // $image = get_the_post_thumbnail_url(get_the_ID(), 'large');
                // $preview = get_field('preview_image');
                $preview_url = $preview ? $preview['url'] : $image;
            ?>
            
            <div class="col-lg-6 col-md-6 portfolio-item isotope-item<?php echo esc_attr($class_list); ?>">
              <div class="portfolio-card">
                <div class="portfolio-image">
                  <img src="<?php the_field('preview_image'); ?>" class="img-fluid" alt="<?php the_field('preview_image'); ?>" loading="lazy">
                  <div class="portfolio-overlay">
                    <div class="portfolio-actions">
                      <a href="<?php the_field('preview_image'); ?>" class="glightbox preview-link" data-gallery="portfolio-gallery-web"><i class="bi bi-eye"></i></a>
                      <a href="<?php the_permalink(); ?>" class="details-link"><i class="bi bi-arrow-right"></i></a>
                    </div>
                  </div>
                </div>
                <div class="portfolio-content">
                  <span class="category"><?php echo esc_html($term_name); ?></span>
                  <h3><?php the_field('title'); ?></h3>
                  <p><?php the_field('short_description'); ?></p>
                </div>
              </div>
            </div>

            <?php endwhile;
              wp_reset_postdata();
            endif;
            ?>
          </div><!-- End Portfolio Container -->

        </div>

      </div>

    </section>