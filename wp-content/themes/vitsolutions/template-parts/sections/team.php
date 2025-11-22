<section id="team" class="team section light-background">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Team</h2>
        <p>Our team is a blend of creative thinkers, tech enthusiasts, and strategy experts — all dedicated to building exceptional digital experiences.</p>
      </div><!-- End Section Title -->

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row g-5">
        <?php
          $args = array(
            'post_type' => 'team',
            'posts_per_page' => -1,
            'orderby' => 'menu_order',
            'order' => 'ASC'
          );
          $teams = new WP_Query($args);
          $delay = 100;
          $count = 0;

          if ($teams->have_posts()) :
            while ($teams->have_posts()) : $teams->the_post();
              // Determine AOS direction
              $aos = ($count % 2 === 0) ? 'fade-right' : 'fade-left';
        ?>
          <div class="col-md-6 col-lg-3" data-aos="zoom-in" data-aos-delay="100">
            <div class="team-card">
              <div class="team-image">
                <img src="<?php the_field('photo'); ?>" class="img-fluid" alt="">
                <div class="team-overlay">
                  <p><?php the_field('short_description'); ?></p>
                  <div class="team-social">
                    <!-- <a href=""><i class="bi bi-twitter-x"></i></a>
                    <a href=""><i class="bi bi-facebook"></i></a>
                    <a href=""><i class="bi bi-instagram"></i></a> -->
                    <a href="<?php the_field('linkedin'); ?>"><i class="bi bi-linkedin"></i></a>
                  </div>
                </div>
              </div>
              <div class="team-content">
                <h4><?php the_field('name'); ?></h4>
                <span class="position"><?php the_field('designation'); ?></span>
              </div>
            </div>
          </div><!-- End Team Member -->
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