<?php
/*
Template Name: Trainers template
*/
get_header(); ?>
<?php while ( have_posts() ) : the_post(); ?>
  <div class="row">
    <div class="container">
      <?php if (function_exists('bootstrapwp_breadcrumbs')) bootstrapwp_breadcrumbs(); ?>
    </div><!--/.container -->
  </div><!--/.row -->
  <div class="container">
 <!-- Masthead
 ================================================== -->
 <header class="jumbotron subhead" id="overview">
  <h1><?php the_title();?></h1>
</header>

<div class="row content">
  <div class="span8">
    <?php the_content();
        
            echo '<hr />';

            $avatar_size = 170;
            $trainers = get_posts( ['nopaging' => 'true', 'post_type' => 'bt_trainer'] );

            foreach($trainers as $trainer) {
                    $avatar_url = get_img_url(get_the_post_thumbnail($trainer->ID, $avatar_size));
                    echo '<div class="row spacer">';
                        echo '<div class="span2 big-avatar" style="background-image:url(\'' . $avatar_url . '\');"></div>';
                        echo '<div class="span6">';
                            echo '<p>' . $trainer->post_content . '</p>';
                        echo '</div>';
                    echo '</div>';
            }

    endwhile;
    ?>
  </div><!-- /.span8 -->

  <div class="span8">
 <?php bootstrapwp_content_nav('nav-below');?>

</div><!-- /.span8 -->
</div><!-- /.row -->
<?php get_footer(); ?>
