<?php
/**
 * Single job listing.
 *
 * This template can be overridden by copying it to yourtheme/job_manager/content-single-job_listing.php.
 *
 * @see         https://wpjobmanager.com/document/template-overrides/
 * @author      Automattic
 * @package     wp-job-manager
 * @category    Template
 * @since       1.0.0
 * @version     1.37.0
 */

if (!defined('ABSPATH')) {
	exit; // Exit if accessed directly.
}

global $post;

if (job_manager_user_can_view_job_listing($post->ID)) : ?>
	<div class="single_job_listing max-w-5xl flex flex-col md:flex-row space-x-0 space-y-8 md:space-x-4 md:space-y-0 mb-6">
		<div class="basis-2/3 w-full overflow-hidden rounded-2xl shadow-xl ">
			<?php if (get_option('job_manager_hide_expired_content', 1) && 'expired' === $post->post_status) : ?>
				<div class="job-manager-info"><?php _e('This listing has expired.', 'wp-job-manager'); ?></div>
			<?php else : ?>
			<div class="p-12 shadow-gray-200 text-gray-500 leading-relaxed">

				<?php wpjm_the_job_description(); ?>
				<?php echo do_shortcode("[cm_fieldshow key='_field_cfwjm13' job_id='777']"); ?>
				<?php the_company_video(); ?>
			</div>



		</div>


		<?php
		/**
		 * single_job_listing_end hook
		 */
		do_action('single_job_listing_end');
		?>
		<?php endif; ?>
		<?php if (candidates_can_apply()) : ?>
			<?php get_job_manager_template('job-application.php'); ?>
		<?php endif; ?>
	</div>
<?php else : ?>

	<?php get_job_manager_template_part('access-denied', 'single-job_listing'); ?>

<?php endif; ?>
