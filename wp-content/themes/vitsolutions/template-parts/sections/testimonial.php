<section id="testimonials" class="testimonials section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Testimonials</h2>
        <p>Trusted by Professionals Across Industries</p>
      </div><!-- End Section Title -->

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="testimonials-slider swiper init-swiper">
          <script type="application/json" class="swiper-config">
            {
              "loop": true,
              "speed": 800,
              "autoplay": {
                "delay": 5000
              },
              "slidesPerView": 1,
              "spaceBetween": 30,
              "pagination": {
                "el": ".swiper-pagination",
                "type": "bullets",
                "clickable": true
              },
              "breakpoints": {
                "768": {
                  "slidesPerView": 2
                },
                "1200": {
                  "slidesPerView": 3
                }
              }
            }
          </script>
          <div class="swiper-wrapper">
            <?php
            $testimonials = new WP_Query([
              'post_type' => 'testimonials',
              'posts_per_page' => -1
            ]);

            if ($testimonials->have_posts()) :
              while ($testimonials->have_posts()) : $testimonials->the_post();

                // Get ACF fields
                $photo = get_field('client_photo');
                $name = get_field('client_name');
                $role = get_field('client_role');
                $rating = intval(get_field('rating'));
            ?>
            <div class="swiper-slide">
              <div class="testimonial-card">
                <div class="testimonial-content">
                  <p>
                    <i class="bi bi-quote quote-icon"></i>
                    <?php the_field('short_description'); ?>
                  </p>
                </div>
                <div class="testimonial-profile">
                  <div class="rating">
                   <?php for ($i = 0; $i < 5; $i++) : ?>
                    <i class="bi <?php echo $i < $rating ? 'bi-star-fill' : 'bi-star'; ?>"></i>
                  <?php endfor; ?>
                  </div>
                  <div class="profile-info">
                    <?php if ($photo): ?>
                      <img src="<?php echo esc_url($photo['url']); ?>" alt="<?php echo esc_attr($name); ?>">
                    <?php else: ?>
                      <img src="<?php echo get_template_directory_uri(); ?>/assets/img/person/default.webp" alt="Profile Image">
                    <?php endif; ?>
                    <div>
                      <h3><?php echo esc_html($name); ?></h3>
                      <h4><?php echo esc_html($role); ?></h4>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <?php
              endwhile;
              wp_reset_postdata();
            endif;
            ?>
          </div>
          <div class="swiper-pagination"></div>
        </div>

      </div>

    </section>