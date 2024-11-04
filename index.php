<?php
// index.php
get_header();
?>


  <section class="px-3 md:px-10">
    <!-- HERO START-->
    <div class="w-full flex gap-10 md:p-5 py-3">

      <?php
      // Carousel query to get all carousel items
      $args = array(
        'post_type' => 'carousel_items',
        'posts_per_page' => -1, // Retrieve all carousel items
      );
      $carousel_query = new WP_Query($args);

      // Check if there are carousel items
      if ($carousel_query->have_posts()) {
        echo '<div class="carousel w-full md:w-[80%]">';

        // Loop through each carousel item
        while ($carousel_query->have_posts()) {
          $carousel_query->the_post();
          $description = get_the_content();
          $link = get_post_meta(get_the_ID(), '_carousel_link', true);
          $image_url = get_the_post_thumbnail_url(get_the_ID(), 'full');
          $title = get_the_title();


          // Display carousel item with dynamic content
          echo '<div class="carousel-item w-full flex flex-col md:flex-row">';

          // Image Section
          echo '<div class="w-full md:w-[70%]">';
          if ($image_url) {
            echo '<img src="' . esc_url($image_url) . '" alt="' . esc_attr($title) . '" class="w-full" />';
          } else {
            // echo '<img src="' . get_template_directory_uri() . '/assets/images/default-image.jpg" alt="default image" class="w-full" />';
          }
          echo '</div>';

          // Description Section
          echo '<div class="w-full md:w-[30%] bg-[#E2E2E2]">';
          echo '<div class="w-full justify-end md:flex mt-3 hidden">';
          echo '<p class="bg-[#FF0000] rounded-tl-[13px] rounded-bl-[13px] px-5 text-white py-1">Interview</p>';
          echo '</div>';

          echo '<div class="space-y-[9px] md:mx-4 p-3">';
          echo '<h2 class="text-[25px] font-[700] leading-[34px] text-[#4A4A4A]">' . esc_html($title) . '</h2>';
          echo '<div class="carousel-description">' . wp_kses_post($description) . '</div>'; // Display editor content          echo '<p class="text-xs text-[#4A4A4A] font-[400] w-full flex justify-end md:justify-start">10 seconds ago</p>';
      
          // Conditional button with link if available
          if (!empty($link)) {
            echo '<a href="' . esc_url($link) . '" class="bg-[#4A4A4A] px-7 py-2 rounded-[8px] text-white text-sm md:block hidden">Read More</a>';
          } else {
            echo '<button class="bg-[#4A4A4A] px-7 py-2 rounded-[8px] text-white text-sm md:block hidden">Read More</button>';
          }
          echo '</div>'; // End of Description Content
      
          echo '</div>'; // End of Description Section
          echo '</div>'; // End of Carousel Item
        }

        echo '</div>'; // End of Carousel Wrapper
        wp_reset_postdata();
      } else {
        echo '<p>No carousel items found.</p>';
      }
      ?>


      <div class="overflow-auto hidden md:block">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/twitter-feed.png" alt="hero1" />
      </div>
    </div>
    <!-- HERO END -->

    <div class="bg-[#f5f5f5] rounded-[21px] py-4 px-[50px] space-y-4">
      <h1 class="font-[700] md:text-[25px] text-[#4A4A4A] leading-[34px]">
        Presidential Candidates
      </h1>
      <div class="flex gap-4 carousel-pres">
        <div class="flex gap-1 cursor-pointer carousel-item">
          <img src="<?php echo get_template_directory_uri(); ?>/assets/images/presidential1.png" alt="" data-id="1"
            class="candidate-img" />
          <div id="card-1" style="background-color: rgba(196, 196, 196, 0.36)"
            class="rounded-tr-[13px] rounded-br-[13px] p-4 w-[140px] probability-card">
            <h2 class="text-lg font-bold">Muhammadu Buhari</h2>
            <p class="text-sm font-semibold text-[#868686]">
              67% Probability
            </p>
          </div>
        </div>
        <div class="flex gap-1 cursor-pointer carousel-item">
          <img src="<?php echo get_template_directory_uri(); ?>/assets/images/presidential2.png" alt="" data-id="2"
            class="candidate-img" />
          <div id="card-2" style="background-color: rgba(196, 196, 196, 0.36)"
            class="rounded-tr-[13px] rounded-br-[13px] p-4 w-[140px] probability-card">
            <h2 class="text-lg font-bold">Muhammadu Buhari</h2>
            <p class="text-sm font-semibold text-[#868686]">
              67% Probability
            </p>
          </div>
        </div>

        <div class="flex gap-1 cursor-pointer carousel-item">
          <img src="<?php echo get_template_directory_uri(); ?>/assets/images/presidential3.png" alt="" data-id="3"
            class="candidate-img" />
          <div id="card-3" style="background-color: rgba(196, 196, 196, 0.36)"
            class="rounded-tr-[13px] rounded-br-[13px] p-4 w-[140px] probability-card">
            <h2 class="text-lg font-bold">Muhammadu Buhari</h2>
            <p class="text-sm font-semibold text-[#868686]">
              67% Probability
            </p>
          </div>
        </div>

        <div class="flex gap-1 cursor-pointer carousel-item">
          <img src="<?php echo get_template_directory_uri(); ?>/assets/images/presidential4.png" alt="" data-id="4"
            class="candidate-img" />
          <div id="card-4" style="background-color: rgba(196, 196, 196, 0.36)"
            class="rounded-tr-[13px] rounded-br-[13px] p-4 w-[140px] probability-card">
            <h2 class="text-lg font-bold">Muhammadu Buhari</h2>
            <p class="text-sm font-semibold text-[#868686]">
              67% Probability
            </p>
          </div>
        </div>

        <div class="flex gap-1 cursor-pointer carousel-item">
          <img src="<?php echo get_template_directory_uri(); ?>/assets/images/presidential2.png" alt="" data-id="5"
            class="candidate-img" />
          <div id="card-5" style="background-color: rgba(196, 196, 196, 0.36)"
            class="rounded-tr-[13px] rounded-br-[13px] p-4 w-[140px] probability-card">
            <h2 class="text-lg font-bold">Muhammadu Buhari</h2>
            <p class="text-sm font-semibold text-[#868686]">
              67% Probability
            </p>
          </div>
        </div>

        <div class="flex gap-1 cursor-pointer carousel-item">
          <img src="<?php echo get_template_directory_uri(); ?>/assets/images/presidential4.png" alt="" data-id="6"
            class="candidate-img" />
          <div id="card-6" style="background-color: rgba(196, 196, 196, 0.36)"
            class="rounded-tr-[13px] rounded-br-[13px] p-4 w-[140px] probability-card">
            <h2 class="text-lg font-bold">Muhammadu Buhari</h2>
            <p class="text-sm font-semibold text-[#868686]">
              67% Probability
            </p>
          </div>
        </div>
      </div>
    </div>

    <div class="w-full flex gap-5 py-5">
      <div class="w-full md:w-[80%]">
        <div>
          <div class="flex items-center gap-2 w-full">
            <span class="rounded-none p-2 bg-[#FF0000]"></span>
            <h2 class="font-[700] text-[25px] text-[#4A4A4A] leading-[34px]">
              Voter Education
            </h2>
            <hr class="border border-[#C5C5C5] flex-grow" />
          </div>

          <div class="flex flex-col md:flex-row items-center gap-5 w-full my-4">


            <?php
            // Query the custom post type 'carousel_items'
            $args = array(
              'post_type' => 'voter_education',
              'posts_per_page' => 3, // Limit to 3 posts
            );
            $voters_query = new WP_Query($args);

            if ($voters_query->have_posts()):
              while ($voters_query->have_posts()):
                $voters_query->the_post();
                $image_url = get_the_post_thumbnail_url(get_the_ID(), 'full');
                $title = get_the_title();
                $description = get_the_content(); // Use the content from the editor
                $date = get_the_date(); // Get the post date
                ?>

                <div class="w-full md:w-[80%] flex md:flex-col flex-row gap-3">
                  <div class="w-[268px] h-[144px] bg-gray-800 overflow-hidden">
                    <img src="<?php echo esc_url($image_url); ?>" alt="<?php echo esc_attr($title); ?>"
                      class="w-full h-full object-fit" />
                  </div>
                  <div class="w-full">
                    <div class="md:space-y-2">
                      <h2
                        class="line-clamp-1 text-[15px] font-[700] leading-[20px] md:text-[20px] md:font-[800] md:leading-[27px] text-[#4F4F4F]">
                        <?php echo esc_html($title); ?>
                      </h2>
                      <p
                        class="text-[13px] md:text-[17px] leading:[17px] md:leading-[23px] text-[#4A4A4A] font-[400] line-clamp-3">
                        <?php echo wp_kses_post($description); ?>
                      </p>
                      <p class="text-xs text-[#C5C5C5] font-[400] w-full flex justify-start">
                        <?php echo esc_html($date); ?>
                      </p>
                    </div>
                  </div>
                </div>

                <?php
              endwhile;
              wp_reset_postdata();
            else:
              echo '<p>No carousel items found.</p>';
            endif;
            ?>



          </div>
        </div>

        <!-- video posts -->
        <div class="">
          <div class="flex items-center gap-2 w-full">
            <span class="rounded-none p-2 bg-[#FF0000]"></span>
            <h2 class="font-[700] text-[25px] text-[#4A4A4A] leading-[34px]">
              Video Posts
            </h2>
            <hr class="border border-[#C5C5C5] flex-grow" />
          </div>

          <div class="flex gap-5 my-4">
            <?php
            // Query the custom post type 'video_post' to retrieve posts
            $args = array(
              'post_type' => 'video_posts',
              'posts_per_page' => 4, // Get the first post as main, next three as rest
            );
            $video_query = new WP_Query($args);

            // Check if posts are found
            if ($video_query->have_posts()):
              // Get the first post
              $video_query->the_post();
              $main_image_url = get_the_post_thumbnail_url(get_the_ID(), 'full');
              $main_title = get_the_title();
              $main_description = get_the_content();
              $main_date = get_the_date();
              $main_video_url = get_post_meta(get_the_ID(), '_video_post_url', true);
              $main_comments_count = get_post_meta(get_the_ID(), '_video_post_comments_count', true);

              ?>

              <!-- Main Post Section -->
              <div class="w-full md:flex md:flex-col flex-row gap-3 hidden">
                <div class="w-[380px] h-[280px] ">
                  <video src="<?php echo esc_url($main_video_url); ?>" class="w-full h-full rounded-md" controls>
                    Your browser does not support the video tag.
                  </video>
                </div>
                <div class="w-full">
                  <div class="md:space-y-2">
                    <h2
                      class="text-[15px] font-[700] leading-[20px] md:text-[20px] md:font-[800] md:leading-[27px] text-[#4F4F4F]">
                      <?php echo esc_html($main_title); ?>

                    </h2>
                    <p
                      class="text-[13px] md:text-[17px] leading-[17px] md:leading-[23px] text-[#4A4A4A] font-[400] w-full">
                      <?php echo wp_kses_post($main_description); ?>
                    </p>
                    <p class="text-xs text-[#C5C5C5] font-[400] w-full flex justify-start">
                      <?php echo esc_html($main_date); ?>
                    </p>
                  </div>
                </div>
              </div>

              <!-- Rest of the Posts -->
              <div class="flex flex-col gap-3">
                <?php while ($video_query->have_posts()):
                  $video_query->the_post();
                  $rest_image_url = get_the_post_thumbnail_url(get_the_ID(), 'full');
                  $rest_title = get_the_title();
                  $rest_description = get_the_content();
                  $rest_date = get_the_date();
                  $rest_video_url = get_post_meta(get_the_ID(), '_video_post_url', true);
                  $rest_comments_count = get_post_meta(get_the_ID(), '_video_post_comments_count', true);
                  ?>
                  <div class="w-full flex gap-3">
                    <div class="w-[104px] h-[92px] ">
                      <video src="<?php echo esc_url($rest_video_url); ?>" class="w-full h-full rounded-md" controls>
                        Your browser does not support the video tag.
                      </video>
                    </div>

                    <div class="w-full">
                      <div class="space-y-2">
                        <h2
                          class="md:hidden text-[15px] font-[700] leading-[20px] md:text-[20px] md:font-[800] md:leading-[27px] text-[#4F4F4F]">
                          <?php echo esc_html($rest_title); ?>
                        </h2>
                        <p
                          class="text-[13px] md:text-[17px] leading-[17px] md:leading-[23px] text-[#4A4A4A] font-[400] w-full">
                          <?php echo wp_kses_post($rest_description); ?>
                        </p>
                        <div class="flex items-center justify-between w-full cursor-pointer">
                          <p class="text-xs text-[#C5C5C5] font-[400] w-full flex justify-start">
                            <?php echo esc_html($rest_date); ?>
                          </p>
                          <p style="background-color: rgba(255, 0, 0, 0.08)"
                            class="text-red-500 md:hidden p-2 rounded-full text-[10px] font-[400] leading-[10px] flex items-center gap-1">
                            <?php echo esc_html($rest_comments_count); ?> <i class="fa-solid fa-message"></i>
                          </p>
                        </div>
                      </div>
                    </div>
                  </div>
                <?php endwhile; ?>
              </div>
              <?php
              wp_reset_postdata();
            else:
              echo '<p>No video posts found.</p>';
            endif;
            ?>
          </div>

        </div>

        <div class="">
          <div class="flex items-center gap-2 w-full">
            <span class="rounded-none p-2 bg-[#FF0000]"></span>
            <h2 class="font-[700] text-[25px] text-[#4A4A4A] leading-[34px]">
              Election Stories
            </h2>
            <hr class="border border-[#C5C5C5] flex-grow" />
          </div>

          <div class="flex flex-col gap-3 my-4">
            <?php
            // Query the custom post type 'election_stories' to retrieve posts
            $args = array(
              'post_type' => 'election_stories',
              'posts_per_page' => 4, // Adjust the number as needed
            );
            $election_query = new WP_Query($args);

            // Check if posts are found
            if ($election_query->have_posts()):
              while ($election_query->have_posts()):
                $election_query->the_post();
                $image_url = get_the_post_thumbnail_url(get_the_ID(), 'full');
                $title = get_the_title();
                $description = get_the_content();
                $date = get_the_date();
                $comments_count = get_post_meta(get_the_ID(), '_election_stories_comments_count', true);

                ?>
                <!-- Single Post Section -->
                <div class="flex gap-5 my-4">

                  <div class="w-full flex gap-3">
                    <div class="w-[139px] h-[121px]">

                      <img src="<?php echo esc_url($image_url); ?>" alt="<?php echo esc_attr($title); ?>"
                        class="w-full h-full object-cover rounded-md" />
                    </div>
                    <div class="w-full">
                      <div class="space-y-2">
                        <h2
                          class="text-[15px] font-[700] leading-[20px] md:text-[20px] md:font-[800] md:leading-[27px] text-[#4F4F4F]">
                          <?php echo esc_html($title); ?>
                        </h2>
                        <p
                          class="text-[13px] md:text-[17px] leading-[17px] md:leading-[23px] text-[#4A4A4A] font-[400] w-full line-clamp-2">
                          <?php echo wp_kses_post($description); ?>
                        </p>
                        <div class="flex items-center justify-between w-full cursor-pointer">
                          <p class="text-xs text-[#C5C5C5] font-[400] w-full flex justify-start">
                            <?php echo esc_html($date); ?>
                          </p>
                          <p style="background-color: rgba(255, 0, 0, 0.08)"
                            class="text-red-500 p-2 rounded-full text-[10px] font-[400] leading-[10px] flex items-center gap-1">
                            <?php echo esc_html($comments_count); ?> <i class="fa-solid fa-message"></i>
                          </p>
                        </div>
                      </div>
                    </div>
                  </div>
                  <hr class="border border-[#C5C5C5] flex-grow my-2" />
                </div>

                <?php
              endwhile;
              wp_reset_postdata();
            else:
              echo '<p>No election stories found.</p>';
            endif;
            ?>



            <hr class="border border-[#C5C5C5] flex-grow my-2" />
          </div>
        </div>
      </div>
      <div class="md:flex flex-col space-y-6 hidden">
        <div class="bg-white shadow-sm shadow-gray-300 space-y-3 flex flex-col items-center p-5">
          <h2 class="font-[900] text-[4F4F4F] text-xl">Weekly Newsletter</h2>
          <p class="text-center font-[400] text-[4F4F4F] text-sm">
            Subscribe to stay up-to-date on all the latest news
          </p>
          <input class="rounded-none border-2 border-[#BDBDBD] w-full p-3" name="email" type="email"
            placeholder="Email" />
          <button class="bg-[#ff0000] px-7 py-2 font-[500] text-[15px] rounded-[13px] text-white">
            Sign up
          </button>
        </div>
        <div class="">
          <img src="<?php echo get_template_directory_uri(); ?>/assets/images/cta.png" alt="hero1" class="w-full" />
        </div>
      </div>
    </div>

    <div class="overflow-auto md:hidden">
      <img src="<?php echo get_template_directory_uri(); ?>/assets/images/twitter-feed.png" alt="hero1"
        class="w-full" />
    </div>

    <div
      class="bg-white shadow-md md:shadow-sm shadow-gray-300 space-y-3 flex flex-col items-center p-5 my-3 md:hidden">
      <h2 class="font-[900] text-[4F4F4F] text-xl">Weekly Newsletter</h2>
      <p class="text-center font-[400] text-[4F4F4F] text-sm">
        Subscribe to stay up-to-date on all the latest news
      </p>
      <input class="rounded-none border-2 border-[#BDBDBD] w-full p-3" name="email" type="email" placeholder="Email" />
      <button class="bg-[#ff0000] px-7 py-2 font-[500] text-[15px] rounded-[13px] text-white">
        Sign up
      </button>
    </div>
  </section>


  <?php wp_footer(); ?>
</body>

</html>