<?php
/**
 * Show job application when viewing a single job listing.
 *
 * This template can be overridden by copying it to yourtheme/job_manager/job-application.php.
 *
 * @see         https://wpjobmanager.com/document/template-overrides/
 * @author      Automattic
 * @package     wp-job-manager
 * @category    Template
 * @version     1.31.1
 */

if (!defined('ABSPATH')) {
	exit; // Exit if accessed directly.
}
?>
<?php if ($apply = get_the_job_application_method()) :
	wp_enqueue_script('wp-job-manager-job-application');
	?>
	<div class="basis-1/3">
		<?php do_action('job_application_start', $apply); ?>
		<div class="flex flex-col space-y-4 shadow-md rounded-2xl p-4">

			<div class="bg-gray-50 flex flex-row rounded-xl overflow-hidden">
				<div class="basis-1/4">
					<?php the_company_logo(); ?>
				</div>

				<div class="basis-3/4 p-4">
					<div class="text-xs">
						<?php the_company_name('<strong>', '</strong>'); ?>
					</div>
					<div class="text-xs">
						<?php if ( $website = get_the_company_website() ) : ?>
							<a href="<?php echo esc_url( $website ); ?>" rel="nofollow" target="_blank"><?php esc_html_e( 'Website', 'wp-job-manager' ); ?></a>
						<?php endif; ?>
					</div>

					<div class="text-xs">
						@<?php the_company_twitter(); ?>
					</div>
				</div>

			</div>
			<div class="">
				<?php the_company_tagline( '<p class="text-gray-400">', '</p>' ); ?>
			</div>
			<div>
				<?php
				/**
				 * single_job_listing_start hook
				 *
				 * @hooked job_listing_meta_display - 20
				 * @hooked job_listing_company_display - 30
				 */
				do_action('single_job_listing_start');
				?>
			</div>



			<a href="#"
			   class="no-underline ">
				<div class="bg-teal-600 rounded-2xl text-white mx-10 px-10 py-4 mx-auto"><?php esc_attr_e('Apply for job', 'wp-job-manager'); ?></div>
			</a>
		</div>


		<?php do_action('job_application_end', $apply); ?>
	</div>
<?php endif; ?>
