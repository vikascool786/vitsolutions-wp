    <section id="services" class="services section">
      <div class="container section-title" data-aos="fade-up">
        <h2>Services</h2>
        <p>We deliver powerful digital solutions tailored to your business goals across industries and platforms.</p>
      </div>

      <div class="container" data-aos="fade-up" data-aos-delay="100">
        <div class="row justify-content-center g-5">
          <?php
          $args = array(
            'post_type' => 'services',
            'posts_per_page' => -1,
            'orderby' => 'menu_order',
            'order' => 'ASC'
          );
          $services = new WP_Query($args);
          $delay = 100;
          $count = 0;

          if ($services->have_posts()) :
            while ($services->have_posts()) : $services->the_post();
              // Determine AOS direction
              $aos = ($count % 2 === 0) ? 'fade-right' : 'fade-left';
          ?>
              <div class="col-md-6" data-aos="<?php echo $aos; ?>" data-aos-delay="<?php echo $delay; ?>">
                <div class="service-item">
                  <div class="service-icon">
                    <i class="<?php the_field('icon_class'); ?>"></i>
                  </div>
                  <div class="service-content">
                    <h3><?php the_field('title'); ?></h3>
                    <p><?php the_field('short_description'); ?></p>
                    <a href="<?php the_permalink(); ?>" class="service-link">
                      <span>Learn More</span>
                      <i class="bi bi-arrow-right"></i>
                    </a>
                  </div>
                </div>
              </div>
          <?php
              $delay += 100;
              $count++;
            endwhile;
            wp_reset_postdata();
          endif;
          ?>
        </div>
      </div>
    </section>
