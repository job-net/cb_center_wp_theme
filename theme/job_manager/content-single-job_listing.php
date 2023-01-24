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
<div>
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
		<div class="basis-1/3">
			<div class="flex flex-col space-y-4 shadow-md rounded-2xl p-4">

				<div class="bg-gray-50 flex flex-row rounded-xl overflow-hidden">
					<div class="basis-1/4">
						<img class="company_logo" src="https://beta.cbcentergt.com/wp-content/uploads/2023/01/cbcgtblue-150x150.png"
							 alt="CB Center">
					</div>
					<div class="basis-3/4 p-4">
						<div class="text-xs">
							<strong>CB Center</strong></div>
						<div class="text-xs">

							<a href="https://cbcentergt.com/" rel="nofollow" target="_blank">Web</a>
						</div>

						<div class="text-xs">
							@<a href="https://twitter.com/cbcentergt" class="company_twitter">cbcentergt</a></div>
					</div>
				</div>
				<div class="">
					<p class="text-gray-400">Encuentra el empleo perfecto para ti</p></div>
			</div>
		</div>

	</div>
	<?php if ( $apply = get_the_job_application_method() ) :
		wp_enqueue_script( 'wp-job-manager-job-application' );
		?>
		<div class="job_application application">
			<?php do_action( 'job_application_start', $apply ); ?>

			<input type="button" class="application_button button bg-teal-600 rounded-2xl text-white mx-10 px-10 py-4 mx-auto" value="<?php esc_attr_e( 'Apply for job', 'wp-job-manager' ); ?>" />

			<div class="application_details">
				<?php
				/**
				 * job_manager_application_details_email or job_manager_application_details_url hook
				 */
				do_action( 'job_manager_application_details_' . $apply->type, $apply );
				?>
			</div>
			<?php do_action( 'job_application_end', $apply ); ?>
		</div>
	<?php endif; ?>
</div>
<?php else : ?>

	<?php get_job_manager_template_part('access-denied', 'single-job_listing'); ?>

<?php endif; ?>
