<?php
/**
 * Secure quotation request workflow.
 *
 * @package EndpointCore
 */

defined( 'ABSPATH' ) || exit;

/**
 * Render and process the public quote form.
 */
final class Endpoint_Core_Enquiry {

	/**
	 * Attach form and admin hooks.
	 *
	 * @return void
	 */
	public static function init() {
		add_shortcode( 'endpoint_quote_form', array( __CLASS__, 'shortcode' ) );
		add_action( 'admin_post_endpoint_quote', array( __CLASS__, 'handle' ) );
		add_action( 'admin_post_nopriv_endpoint_quote', array( __CLASS__, 'handle' ) );
		add_action( 'add_meta_boxes_endpoint_enquiry', array( __CLASS__, 'meta_box' ) );
	}

	/**
	 * Available service families.
	 *
	 * @return array<string, string>
	 */
	private static function services() {
		return array(
			'internet'       => __( 'Internet services', 'endpoint-core' ),
			'networking'     => __( 'Networking and Wi-Fi', 'endpoint-core' ),
			'starlink'       => __( 'Starlink services', 'endpoint-core' ),
			'security'       => __( 'CCTV and security systems', 'endpoint-core' ),
			'software'       => __( 'Software and websites', 'endpoint-core' ),
			'cloud'          => __( 'Cloud and business solutions', 'endpoint-core' ),
			'cybersecurity'  => __( 'Cybersecurity', 'endpoint-core' ),
			'equipment'      => __( 'ICT equipment and supplies', 'endpoint-core' ),
			'telecoms'       => __( 'Telecommunications', 'endpoint-core' ),
			'consulting'     => __( 'IT consulting and support', 'endpoint-core' ),
			'marketing'      => __( 'Digital marketing and design', 'endpoint-core' ),
			'other'          => __( 'Multiple services / not sure', 'endpoint-core' ),
		);
	}

	/**
	 * Render the quote form shortcode.
	 *
	 * @return string
	 */
	public static function shortcode() {
		$status    = isset( $_GET['endpoint_status'] ) ? sanitize_key( wp_unslash( $_GET['endpoint_status'] ) ) : '';
		$reference = isset( $_GET['reference'] ) ? sanitize_text_field( wp_unslash( $_GET['reference'] ) ) : '';
		$settings  = Endpoint_Core_Settings::get();

		ob_start();
		if ( 'success' === $status ) {
			?>
			<div class="endpoint-notice endpoint-notice--success" role="status" tabindex="-1">
				<strong><?php esc_html_e( 'Thank you—your request has been received.', 'endpoint-core' ); ?></strong>
				<?php if ( $reference ) : ?>
					<?php
					printf(
						/* translators: %s: enquiry reference. */
						esc_html__( 'Your reference is %s.', 'endpoint-core' ),
						esc_html( $reference )
					);
					?>
				<?php endif; ?>
			</div>
			<?php
		} elseif ( 'preview' === $status ) {
			?>
			<div class="endpoint-notice endpoint-notice--success" role="status" tabindex="-1">
				<strong><?php esc_html_e( 'Preview submission successful.', 'endpoint-core' ); ?></strong>
				<?php esc_html_e( 'No personal information was stored or sent because preview mode is active.', 'endpoint-core' ); ?>
			</div>
			<?php
		} elseif ( 'error' === $status ) {
			?>
			<div class="endpoint-notice endpoint-notice--error" role="alert" tabindex="-1">
				<strong><?php esc_html_e( 'We could not submit your request.', 'endpoint-core' ); ?></strong>
				<?php esc_html_e( 'Check the required details and try again. You must provide either an email address or phone number.', 'endpoint-core' ); ?>
			</div>
			<?php
		}

		if ( ! empty( $settings['demo_mode'] ) ) {
			?>
			<div class="endpoint-notice">
				<strong><?php esc_html_e( 'Preview form:', 'endpoint-core' ); ?></strong>
				<?php esc_html_e( 'submissions are validated but are not stored or delivered.', 'endpoint-core' ); ?>
			</div>
			<?php
		}
		?>
		<form class="endpoint-form" method="post" action="<?php echo esc_url( admin_url( 'admin-post.php' ) ); ?>">
			<input type="hidden" name="action" value="endpoint_quote">
			<input type="hidden" name="started_at" value="<?php echo esc_attr( time() ); ?>">
			<?php wp_nonce_field( 'endpoint_quote_submit', 'endpoint_quote_nonce' ); ?>

			<div class="endpoint-form__grid">
				<div class="endpoint-field">
					<label for="endpoint-name"><?php esc_html_e( 'Your name', 'endpoint-core' ); ?> <span aria-hidden="true">*</span></label>
					<input id="endpoint-name" name="name" type="text" autocomplete="name" maxlength="100" required>
				</div>
				<div class="endpoint-field">
					<label for="endpoint-organization"><?php esc_html_e( 'Organization', 'endpoint-core' ); ?></label>
					<input id="endpoint-organization" name="organization" type="text" autocomplete="organization" maxlength="120">
				</div>
				<div class="endpoint-field">
					<label for="endpoint-email"><?php esc_html_e( 'Email address', 'endpoint-core' ); ?></label>
					<input id="endpoint-email" name="email" type="email" autocomplete="email" maxlength="190">
				</div>
				<div class="endpoint-field">
					<label for="endpoint-phone"><?php esc_html_e( 'Phone / WhatsApp', 'endpoint-core' ); ?></label>
					<input id="endpoint-phone" name="phone" type="tel" autocomplete="tel" maxlength="40">
					<small><?php esc_html_e( 'Provide a phone number or email address.', 'endpoint-core' ); ?></small>
				</div>
				<div class="endpoint-field">
					<label for="endpoint-service"><?php esc_html_e( 'What do you need?', 'endpoint-core' ); ?> <span aria-hidden="true">*</span></label>
					<select id="endpoint-service" name="service" required>
						<option value=""><?php esc_html_e( 'Select a service', 'endpoint-core' ); ?></option>
						<?php foreach ( self::services() as $value => $label ) : ?>
							<option value="<?php echo esc_attr( $value ); ?>"><?php echo esc_html( $label ); ?></option>
						<?php endforeach; ?>
					</select>
				</div>
				<div class="endpoint-field">
					<label for="endpoint-location"><?php esc_html_e( 'Project location', 'endpoint-core' ); ?> <span aria-hidden="true">*</span></label>
					<input id="endpoint-location" name="location" type="text" autocomplete="address-level2" maxlength="120" required>
				</div>
			</div>

			<div class="endpoint-field">
				<label for="endpoint-requirements"><?php esc_html_e( 'Tell us about the requirement', 'endpoint-core' ); ?> <span aria-hidden="true">*</span></label>
				<textarea id="endpoint-requirements" name="requirements" maxlength="3000" required></textarea>
				<small><?php esc_html_e( 'Do not include passwords, financial information or other sensitive data.', 'endpoint-core' ); ?></small>
			</div>

			<div class="endpoint-honeypot" aria-hidden="true">
				<label for="endpoint-company-website"><?php esc_html_e( 'Leave this field empty', 'endpoint-core' ); ?></label>
				<input id="endpoint-company-website" name="company_website" type="text" tabindex="-1" autocomplete="off">
			</div>

			<label class="endpoint-field--check">
				<input name="privacy_acknowledged" type="checkbox" value="1" required>
				<span><?php esc_html_e( 'I agree that Endpoint may use these details to respond to my request, as described in the Privacy Policy.', 'endpoint-core' ); ?></span>
			</label>

			<div>
				<button class="button" type="submit"><?php esc_html_e( 'Send request', 'endpoint-core' ); ?></button>
			</div>
		</form>
		<?php
		return (string) ob_get_clean();
	}

	/**
	 * Process a public quote request using PRG redirects.
	 *
	 * @return void
	 */
	public static function handle() {
		$redirect = wp_get_referer() ?: home_url( '/get-a-quote/' );
		$redirect = remove_query_arg( array( 'endpoint_status', 'reference' ), $redirect );

		if (
			! isset( $_POST['endpoint_quote_nonce'] )
			|| ! wp_verify_nonce(
				sanitize_text_field( wp_unslash( $_POST['endpoint_quote_nonce'] ) ),
				'endpoint_quote_submit'
			)
		) {
			self::redirect( $redirect, 'error' );
		}

		$honeypot  = sanitize_text_field( wp_unslash( $_POST['company_website'] ?? '' ) );
		$started   = absint( $_POST['started_at'] ?? 0 );
		$client_ip = sanitize_text_field( wp_unslash( $_SERVER['REMOTE_ADDR'] ?? '' ) );
		$rate_key  = 'endpoint_quote_' . hash_hmac( 'sha256', $client_ip, wp_salt( 'nonce' ) );

		if ( $honeypot || ! $started || ( time() - $started ) < 2 || get_transient( $rate_key ) ) {
			self::redirect( $redirect, 'error' );
		}

		$name         = sanitize_text_field( wp_unslash( $_POST['name'] ?? '' ) );
		$organization = sanitize_text_field( wp_unslash( $_POST['organization'] ?? '' ) );
		$email        = sanitize_email( wp_unslash( $_POST['email'] ?? '' ) );
		$phone        = preg_replace( '/[^0-9+() .-]/', '', sanitize_text_field( wp_unslash( $_POST['phone'] ?? '' ) ) );
		$service      = sanitize_key( wp_unslash( $_POST['service'] ?? '' ) );
		$location     = sanitize_text_field( wp_unslash( $_POST['location'] ?? '' ) );
		$requirements = sanitize_textarea_field( wp_unslash( $_POST['requirements'] ?? '' ) );
		$consent      = ! empty( $_POST['privacy_acknowledged'] );
		$services     = self::services();

		if (
			! $name
			|| ( ! $email && ! $phone )
			|| ! isset( $services[ $service ] )
			|| ! $location
			|| ! $requirements
			|| ! $consent
		) {
			self::redirect( $redirect, 'error' );
		}

		set_transient( $rate_key, 1, MINUTE_IN_SECONDS );
		$settings = Endpoint_Core_Settings::get();

		if ( ! empty( $settings['demo_mode'] ) ) {
			self::redirect( $redirect, 'preview' );
		}

		$reference = 'EP-' . gmdate( 'Ymd' ) . '-' . strtoupper( wp_generate_password( 5, false, false ) );
		$post_id   = wp_insert_post(
			array(
				'post_type'   => 'endpoint_enquiry',
				'post_status' => 'private',
				'post_title'  => $reference . ' — ' . $name,
			),
			true
		);

		if ( is_wp_error( $post_id ) ) {
			self::redirect( $redirect, 'error' );
		}

		$data = array(
			'reference'            => $reference,
			'name'                 => $name,
			'organization'         => $organization,
			'email'                => $email,
			'phone'                => $phone,
			'service'              => $services[ $service ],
			'location'             => $location,
			'requirements'         => $requirements,
			'privacy_acknowledged' => gmdate( DATE_ATOM ),
			'status'               => 'new',
			'source'               => $redirect,
		);

		foreach ( $data as $key => $value ) {
			update_post_meta( $post_id, '_endpoint_' . $key, $value );
		}

		$delivered = false;
		if ( is_email( $settings['quote_email'] ) ) {
			$subject   = sprintf(
				/* translators: %s: enquiry reference. */
				__( 'New Endpoint quote request %s', 'endpoint-core' ),
				$reference
			);
			$message   = sprintf(
				/* translators: 1: reference, 2: name, 3: service, 4: location. */
				__( "Reference: %1\$s\nName: %2\$s\nService: %3\$s\nLocation: %4\$s\n\nSign in to WordPress to review the full request.", 'endpoint-core' ),
				$reference,
				$name,
				$services[ $service ],
				$location
			);
			$delivered = wp_mail( $settings['quote_email'], $subject, $message );
		}
		update_post_meta( $post_id, '_endpoint_delivery_status', $delivered ? 'sent' : 'pending' );

		self::redirect( $redirect, 'success', $reference );
	}

	/**
	 * Redirect safely after processing.
	 *
	 * @param string $url       Return URL.
	 * @param string $status    Public status.
	 * @param string $reference Optional reference.
	 * @return never
	 */
	private static function redirect( $url, $status, $reference = '' ) {
		$args = array( 'endpoint_status' => $status );
		if ( $reference ) {
			$args['reference'] = $reference;
		}
		wp_safe_redirect( add_query_arg( $args, $url ) );
		exit;
	}

	/**
	 * Register a read-only enquiry details panel.
	 *
	 * @return void
	 */
	public static function meta_box() {
		add_meta_box(
			'endpoint-enquiry-details',
			__( 'Enquiry details', 'endpoint-core' ),
			array( __CLASS__, 'render_meta_box' ),
			'endpoint_enquiry',
			'normal',
			'high'
		);
	}

	/**
	 * Render sanitized private details for authorized administrators.
	 *
	 * @param WP_Post $post Enquiry post.
	 * @return void
	 */
	public static function render_meta_box( $post ) {
		if ( ! current_user_can( 'edit_post', $post->ID ) ) {
			return;
		}

		$fields = array(
			'reference'            => __( 'Reference', 'endpoint-core' ),
			'name'                 => __( 'Name', 'endpoint-core' ),
			'organization'         => __( 'Organization', 'endpoint-core' ),
			'email'                => __( 'Email', 'endpoint-core' ),
			'phone'                => __( 'Phone', 'endpoint-core' ),
			'service'              => __( 'Service', 'endpoint-core' ),
			'location'             => __( 'Location', 'endpoint-core' ),
			'requirements'         => __( 'Requirements', 'endpoint-core' ),
			'privacy_acknowledged' => __( 'Privacy acknowledgement', 'endpoint-core' ),
			'status'               => __( 'Status', 'endpoint-core' ),
			'delivery_status'      => __( 'Notification', 'endpoint-core' ),
		);
		?>
		<table class="widefat striped">
			<tbody>
			<?php foreach ( $fields as $key => $label ) : ?>
				<tr>
					<th scope="row" style="width: 12rem;"><?php echo esc_html( $label ); ?></th>
					<td><?php echo nl2br( esc_html( (string) get_post_meta( $post->ID, '_endpoint_' . $key, true ) ) ); ?></td>
				</tr>
			<?php endforeach; ?>
			</tbody>
		</table>
		<?php
	}
}
