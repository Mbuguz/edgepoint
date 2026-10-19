<?php
/**
 * Business identity and integration settings.
 *
 * @package EdgepointCore
 */

defined( 'ABSPATH' ) || exit;

/**
 * Manage the single source of truth for business details.
 */
final class Edgepoint_Core_Settings {

	/**
	 * Attach settings hooks.
	 *
	 * @return void
	 */
	public static function init() {
		self::correct_business_center_name();
		add_action( 'admin_menu', array( __CLASS__, 'add_page' ) );
		add_action( 'admin_init', array( __CLASS__, 'register' ) );
		add_action( 'admin_notices', array( __CLASS__, 'demo_notice' ) );
	}

	/**
	 * Correct the former office-name typo in saved settings and page content.
	 *
	 * @return void
	 */
	private static function correct_business_center_name() {
		if ( 'contour-2026-10' === get_option( 'edgepoint_location_spelling_version' ) ) {
			return;
		}

		$old_name = 'Counter Business Center';
		$new_name = 'Contour Business Center';
		$details  = get_option( 'edgepoint_business_details', array() );

		if ( is_array( $details ) && isset( $details['address'] ) ) {
			$details['address'] = str_replace( $old_name, $new_name, (string) $details['address'] );
			update_option( 'edgepoint_business_details', $details );
		}

		global $wpdb;

		$encoded_old = rawurlencode( $old_name );
		$encoded_new = rawurlencode( $new_name );
		$like_plain  = '%' . $wpdb->esc_like( $old_name ) . '%';
		$like_url    = '%' . $wpdb->esc_like( $encoded_old ) . '%';
		$post_ids    = $wpdb->get_col(
			$wpdb->prepare(
				"SELECT ID FROM {$wpdb->posts} WHERE post_content LIKE %s OR post_content LIKE %s",
				$like_plain,
				$like_url
			)
		);

		foreach ( $post_ids as $post_id ) {
			$post = get_post( $post_id );
			if ( ! $post ) {
				continue;
			}

			$content = str_replace(
				array( $old_name, $encoded_old ),
				array( $new_name, $encoded_new ),
				$post->post_content
			);

			if ( $content !== $post->post_content ) {
				wp_update_post(
					wp_slash(
						array(
							'ID'           => $post->ID,
							'post_content' => $content,
						)
					)
				);
			}
		}

		update_option( 'edgepoint_location_spelling_version', 'contour-2026-10' );
	}

	/**
	 * Return safe preview defaults.
	 *
	 * @return array<string, string|int>
	 */
	public static function defaults() {
		return array(
			'name'         => 'Edgepoint Internet Solutions Ltd',
			'phone'        => '0754 931 100',
			'email'        => 'edgepointinternet@gmail.com',
			'address'      => 'Contour Business Center, Shop B08, Kasarani, Nairobi',
			'service_area' => 'Kasarani, Nairobi, Ruiru, Gwakairu and the surrounding Nairobi metropolitan area',
			'hours'        => '24/7',
			'quote_email'  => 'edgepointinternet@gmail.com',
			'facebook'     => 'https://www.facebook.com/profile.php?id=61592300426611',
			'instagram'    => '',
			'linkedin'     => '',
			'tiktok'       => 'https://www.tiktok.com/@edgepoint.internet',
			'x'            => 'https://x.com/Edgepointt',
			'demo_mode'    => 1,
		);
	}

	/**
	 * Return merged settings.
	 *
	 * @return array<string, string|int>
	 */
	public static function get() {
		return wp_parse_args( get_option( 'edgepoint_business_details', array() ), self::defaults() );
	}

	/**
	 * Register the settings page.
	 *
	 * @return void
	 */
	public static function add_page() {
		add_options_page(
			__( 'Edgepoint business details', 'edgepoint-core' ),
			__( 'Edgepoint details', 'edgepoint-core' ),
			'manage_options',
			'edgepoint-settings',
			array( __CLASS__, 'render' )
		);
	}

	/**
	 * Register the option with a strict sanitizer.
	 *
	 * @return void
	 */
	public static function register() {
		register_setting(
			'edgepoint_settings',
			'edgepoint_business_details',
			array(
				'type'              => 'array',
				'default'           => self::defaults(),
				'sanitize_callback' => array( __CLASS__, 'sanitize' ),
			)
		);
	}

	/**
	 * Sanitize the full settings payload.
	 *
	 * @param mixed $input Raw option input.
	 * @return array<string, string|int>
	 */
	public static function sanitize( $input ) {
		$input = is_array( $input ) ? $input : array();
		$clean = self::defaults();

		$clean['name']         = sanitize_text_field( $input['name'] ?? '' );
		$clean['phone']        = preg_replace( '/[^0-9+() .-]/', '', sanitize_text_field( $input['phone'] ?? '' ) );
		$clean['email']        = sanitize_email( $input['email'] ?? '' );
		$clean['address']      = sanitize_text_field( $input['address'] ?? '' );
		$clean['service_area'] = sanitize_textarea_field( $input['service_area'] ?? '' );
		$clean['hours']        = sanitize_text_field( $input['hours'] ?? '' );
		$clean['quote_email']  = sanitize_email( $input['quote_email'] ?? '' );
		$clean['facebook']     = esc_url_raw( $input['facebook'] ?? '' );
		$clean['instagram']    = esc_url_raw( $input['instagram'] ?? '' );
		$clean['linkedin']     = esc_url_raw( $input['linkedin'] ?? '' );
		$clean['tiktok']       = esc_url_raw( $input['tiktok'] ?? '' );
		$clean['x']            = esc_url_raw( $input['x'] ?? '' );
		$clean['demo_mode']    = empty( $input['demo_mode'] ) ? 0 : 1;

		if ( ! $clean['name'] ) {
			$clean['name'] = self::defaults()['name'];
		}

		return $clean;
	}

	/**
	 * Display a persistent warning while placeholder details are active.
	 *
	 * @return void
	 */
	public static function demo_notice() {
		if ( ! current_user_can( 'manage_options' ) ) {
			return;
		}

		$settings = self::get();
		if ( empty( $settings['demo_mode'] ) ) {
			return;
		}
		?>
		<div class="notice notice-warning">
			<p>
				<strong><?php esc_html_e( 'Edgepoint preview mode is active.', 'edgepoint-core' ); ?></strong>
				<?php esc_html_e( 'The phone number, email, social profiles and enquiry delivery are placeholders. Do not release this site until verified details are saved and preview mode is disabled.', 'edgepoint-core' ); ?>
				<a href="<?php echo esc_url( admin_url( 'options-general.php?page=edgepoint-settings' ) ); ?>"><?php esc_html_e( 'Review details', 'edgepoint-core' ); ?></a>
			</p>
		</div>
		<?php
	}

	/**
	 * Render the settings page.
	 *
	 * @return void
	 */
	public static function render() {
		if ( ! current_user_can( 'manage_options' ) ) {
			return;
		}

		$settings = self::get();
		$fields   = array(
			'name'         => array( __( 'Display name', 'edgepoint-core' ), 'text' ),
			'phone'        => array( __( 'Phone / WhatsApp', 'edgepoint-core' ), 'tel' ),
			'email'        => array( __( 'Public email', 'edgepoint-core' ), 'email' ),
			'address'      => array( __( 'Office address', 'edgepoint-core' ), 'text' ),
			'hours'        => array( __( 'Availability', 'edgepoint-core' ), 'text' ),
			'quote_email'  => array( __( 'Private quote recipient', 'edgepoint-core' ), 'email' ),
			'facebook'     => array( __( 'Facebook URL', 'edgepoint-core' ), 'url' ),
			'instagram'    => array( __( 'Instagram URL', 'edgepoint-core' ), 'url' ),
			'linkedin'     => array( __( 'LinkedIn URL', 'edgepoint-core' ), 'url' ),
			'tiktok'       => array( __( 'TikTok URL', 'edgepoint-core' ), 'url' ),
			'x'            => array( __( 'X URL', 'edgepoint-core' ), 'url' ),
		);
		?>
		<div class="wrap">
			<h1><?php esc_html_e( 'Edgepoint business details', 'edgepoint-core' ); ?></h1>
			<p><?php esc_html_e( 'These values power contact components and eligible structured data. Enter only verified information.', 'edgepoint-core' ); ?></p>
			<form method="post" action="options.php">
				<?php settings_fields( 'edgepoint_settings' ); ?>
				<table class="form-table" role="presentation">
					<?php foreach ( $fields as $key => $field ) : ?>
						<tr>
							<th scope="row"><label for="edgepoint-<?php echo esc_attr( $key ); ?>"><?php echo esc_html( $field[0] ); ?></label></th>
							<td>
								<input
									class="regular-text"
									id="edgepoint-<?php echo esc_attr( $key ); ?>"
									name="edgepoint_business_details[<?php echo esc_attr( $key ); ?>]"
									type="<?php echo esc_attr( $field[1] ); ?>"
									value="<?php echo esc_attr( $settings[ $key ] ); ?>"
								>
							</td>
						</tr>
					<?php endforeach; ?>
					<tr>
						<th scope="row"><label for="edgepoint-service-area"><?php esc_html_e( 'Service area', 'edgepoint-core' ); ?></label></th>
						<td><textarea class="large-text" id="edgepoint-service-area" name="edgepoint_business_details[service_area]" rows="3"><?php echo esc_textarea( $settings['service_area'] ); ?></textarea></td>
					</tr>
					<tr>
						<th scope="row"><?php esc_html_e( 'Release state', 'edgepoint-core' ); ?></th>
						<td>
							<label>
								<input name="edgepoint_business_details[demo_mode]" type="checkbox" value="1" <?php checked( 1, $settings['demo_mode'] ); ?>>
								<?php esc_html_e( 'Preview mode: placeholders remain and enquiry delivery is disabled', 'edgepoint-core' ); ?>
							</label>
						</td>
					</tr>
				</table>
				<?php submit_button(); ?>
			</form>
		</div>
		<?php
	}
}
