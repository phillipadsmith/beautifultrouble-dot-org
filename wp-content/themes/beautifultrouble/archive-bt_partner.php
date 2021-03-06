<?php
/**
 * The template for displaying Archive pages.
 *
 * Used to display archive-type pages if nothing more specific matches a query.
 * For example, puts together date-based pages if no date.php file exists.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage WP-Bootstrap
 * @since WP-Bootstrap 0.6
 */

get_header();
     $posts = query_posts($query_string . 
'&orderby=title&order=asc&nopaging=true');
if (have_posts() ) ;?>
<div class="row">
	<div class="container">
		<?php if (function_exists('bootstrapwp_breadcrumbs')) bootstrapwp_breadcrumbs(); ?>
	</div><!--/.container -->
</div><!--/.row -->
<div class="container">
<div class="row content">
	<div class="span8">
	<header class="jumbotron subhead" id="overview">
                <h1>
<?php  
$obj = get_post_type_object('bt_partner');
print $obj->labels->name;
?>
        </h1>
        <h2>
        <?php print $obj->description ?>
        </h2>
</header>

		<?php while ( have_posts() ) : the_post(); ?>
		<div <?php post_class(); ?>>
			<div class="row">
				        <div class="span2"><?php // Checking for a post thumbnail
				        if ( has_post_thumbnail() ) ?>
				        <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" >
				        	<?php the_post_thumbnail();?></a>
				        </div><!-- /.span2 -->
				        <div class="span6">
				        	<?php the_content();?>
				        </div><!-- /.span6 -->
				    </div><!-- /.row -->
				    <hr />
				</div><!-- /.post_class -->
			<?php endwhile; ?>
		</div><!-- /.span8 -->
                <div id="marginalia" class="fluid-sidebar sidebar span4" role="complementary">
                &nbsp;
                </div>
            </div><!-- /.row .content -->
<?php get_footer(); ?>
