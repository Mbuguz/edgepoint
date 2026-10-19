<?php
/**
 * Secure quotation request workflow.
 *
 * @package EdgepointCore
 */

defined( 'ABSPATH' ) || exit;

/**
 * Render and process the public quote form.
 */
final class Edgepoint_Core_Enquiry {

	/**
	 * Attach form and admin hooks.
	 *
	 * @return void
	 */
	public static function init() {
		add_shortcode( 'edgepoint_quote_form', array( __CLASS__, 'shortcode' ) );
		add_action( 'admin_post_edgepoint_quote', array( __CLASS__, 'handle' ) );
		add_action( 'admin_post_nopriv_edgepoint_quote', array( __CLASS__, 'handle' ) );
		add_action( 'add_meta_boxes_edgepoint_enquiry', array( __CLASS__, 'meta_box' ) );
	}

	/**
	 * Available service families.
	 *
	 * @return array<string, string>
	 */
	private static function services() {
		return array(
			'internet'       => __( 'Internet services', 'edgepoint-core' ),
			'networking'     => __( 'Networking and Wi-Fi', 'edgepoint-core' ),
			'starlink'       => __( 'Starlink services', 'edgepoint-core' ),
			'security'       => __( 'CCTV and security systems', 'edgepoint-core' ),
			'software'       => __( 'Software and websites', 'edgepoint-core' ),
			'cloud'          => __( 'Cloud and business solutions', 'edgepoint-core' ),
			'cybersecurity'  => __( 'Cybersecurity', 'edgepoint-core' ),
			'equipment'      => __( 'ICT equipment and supplies', 'edgepoint-core' ),
			'telecoms'       => __( 'Telecommunications', 'edgepoint-core' ),
			'consulting'     => __( 'IT consulting and support', 'edgepoint-core' ),
			'marketing'      => __( 'Digital marketing and design', 'edgepoint-core' ),
			'other'          => __( 'Multiple services / not sure', 'edgepoint-core' ),
		);
	}

	/**
	 * Render the quote form shortcode.
	 *
	 * @return string
	 */
	public static function shortcode() {
		$status    = isset( $_GET['edgepoint_status'] ) ? sanitize_key( wp_unslash( $_GET['edgepoint_status'] ) ) : '';
		$reference = isset( $_GET['reference'] ) ? sanitize_text_field( wp_unslash( $_GET['reference'] ) ) : '';
		$settings  = Edgepoint_Core_Settings::get();

		ob_start();
		if ( 'success' === $status ) {
			?>
			<div class="edgepoint-notice edgepoint-notice--success" role="status" tabindex="-1">
				<strong><?php esc_html_e( 'Thank you—your request has been received.', 'edgepoint-core' ); ?></strong>
				<?php if ( $reference ) : ?>
					<?php
					printf(
						/* translators: %s: enquiry reference. */
						esc_html__( 'Your reference is %s.', 'edgepoint-core' ),
						esc_html( $reference )
					);
					?>
				<?php endif; ?>
			</div>
			<?php
		} elseif ( 'preview' === $status ) {
			?>
			<div class="edgepoint-notice edgepoint-notice--success" role="status" tabindex="-1">
				<strong><?php esc_html_e( 'Preview submission successful.', 'edgepoint-core' ); ?></strong>
				<?php esc_html_e( 'No personal information was stored or sent because preview mode is active.', 'edgepoint-core' ); ?>
			</div>
			<?php
		} elseif ( 'error' === $status ) {
			?>
			<div class="edgepoint-notice edgepoint-notice--error" role="alert" tabindex="-1">
				<strong><?php esc_html_e( 'We could not submit your request.', 'edgepoint-core' ); ?></strong>
				<?php esc_html_e( 'Check the required details and try again. You must provide either an email address or phone number.', 'edgepoint-core' ); ?>
			</div>
			<?php
		}

		if ( ! empty( $settings['demo_mode'] ) ) {
			?>
			<div class="edgepoint-notice">
				<strong><?php esc_html_e( 'Preview form:', 'edgepoint-core' ); ?></strong>
				<?php esc_html_e( 'submissions are validated but are not stored or delivered.', 'edgepoint-core' ); ?>
			</div>
			<?php
		}
		?>
		<form class="edgepoint-form" method="post" action="<?php echo esc_url( admin_url( 'admin-post.php' ) ); ?>">
			<input type="hidden" name="action" value="edgepoint_quote">
			<input type="hidden" name="started_at" value="<?php echo esc_attr( time() ); ?>">
			<?php wp_nonce_field( 'edgepoint_quote_submit', 'edgepoint_quote_nonce' ); ?>

			<div class="edgepoint-form__grid">
				<div class="edgepoint-field">
					<label for="edgepoint-name"><?php esc_html_e( 'Your name', 'edgepoint-core' ); ?> <span aria-hidden="true">*</span></label>
					<input id="edgepoint-name" name="name" type="text" autocomplete="name" maxlength="100" required>
				</div>
				<div class="edgepoint-field">
					<label for="edgepoint-organization"><?php esc_html_e( 'Organization', 'edgepoint-core' ); ?></label>
					<input id="edgepoint-organization" name="organization" type="text" autocomplete="organization" maxlength="120">
				</div>
				<div class="edgepoint-field">
					<label for="edgepoint-email"><?php esc_html_e( 'Email address', 'edgepoint-core' ); ?></label>
					<input id="edgepoint-email" name="email" type="email" autocomplete="email" maxlength="190">
				</div>
				<div class="edgepoint-field">
					<label for="edgepoint-phone"><?php esc_html_e( 'Phone / WhatsApp', 'edgepoint-core' ); ?></label>
					<input id="edgepoint-phone" name="phone" type="tel" autocomplete="tel" maxlength="40">
					<small><?php esc_html_e( 'Provide a phone number or email address.', 'edgepoint-core' ); ?></small>
				</div>
				<div class="edgepoint-field">
					<label for="edgepoint-service"><?php esc_html_e( 'What do you need?', 'edgepoint-core' ); ?> <span aria-hidden="true">*</span></label>
					<select id="edgepoint-service" name="service" required>
						<option value=""><?php esc_html_e( 'Select a service', 'edgepoint-core' ); ?></option>
						<?php foreach ( self::services() as $value => $label ) : ?>
							<option value="<?php echo esc_attr( $value ); ?>"><?php echo esc_html( $label ); ?></option>
						<?php endforeach; ?>
					</select>
				</div>
				<div class="edgepoint-field">
					<label for="edgepoint-location"><?php esc_html_e( 'Project location', 'edgepoint-core' ); ?> <span aria-hidden="true">*</span></label>
					<input id="edgepoint-location" name="location" type="text" autocomplete="address-level2" maxlength="120" required>
				</div>
			</div>

			<div class="edgepoint-field">
				<label for="edgepoint-requirements"><?php esc_html_e( 'Tell us about the requirement', 'edgepoint-core' ); ?> <span aria-hidden="true">*</span></label>
				<textarea id="edgepoint-requirements" name="requirements" maxlength="3000" required></textarea>
				<small><?php esc_html_e( 'Do not include passwords, financial information or other sensitive data.', 'edgepoint-core' ); ?></small>
			</div>

			<div class="edgepoint-honeypot" aria-hidden="true">
				<label for="edgepoint-company-website"><?php esc_html_e( 'Leave this field empty', 'edgepoint-core' ); ?></label>
				<input id="edgepoint-company-website" name="company_website" type="text" tabindex="-1" autocomplete="off">
			</div>

			<label class="edgepoint-field--check">
				<input name="privacy_acknowledged" type="checkbox" value="1" required>
				<span><?php esc_html_e( 'I agree that Edgepoint may use these details to respond to my request, as described in the Privacy Policy.', 'edgepoint-core' ); ?></span>
			</label>

			<div>
				<button class="button" type="submit"><?php esc_html_e( 'Send request', 'edgepoint-core' ); ?></button>
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
		$redirect = remove_query_arg( array( 'edgepoint_status', 'reference' ), $redirect );

		if (
			! isset( $_POST['edgepoint_quote_nonce'] )
			|| ! wp_verify_nonce(
				sanitize_text_field( wp_unslash( $_POST['edgepoint_quote_nonce'] ) ),
				'edgepoint_quote_submit'
			)
		) {
			self::redirect( $redirect, 'error' );
		}

		$honeypot  = sanitize_text_field( wp_unslash( $_POST['company_website'] ?? '' ) );
		$started   = absint( $_POST['started_at'] ?? 0 );
		$client_ip = sanitize_text_field( wp_unslash( $_SERVER['REMOTE_ADDR'] ?? '' ) );
		$rate_key  = 'edgepoint_quote_' . hash_hmac( 'sha256', $client_ip, wp_salt( 'nonce' ) );

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
		$settings = Edgepoint_Core_Settings::get();

		if ( ! empty( $settings['demo_mode'] ) ) {
			self::redirect( $redirect, 'preview' );
		}

		$reference = 'EP-' . gmdate( 'Ymd' ) . '-' . strtoupper( wp_generate_password( 5, false, false ) );
		$post_id   = wp_insert_post(
			array(
				'post_type'   => 'edgepoint_enquiry',
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
			update_post_meta( $post_id, '_edgepoint_' . $key, $value );
		}

		$delivered = false;
		$mail_note = '';
		if ( is_email( $settings['quote_email'] ) ) {
			$subject = sprintf(
				/* translators: %s: enquiry reference. */
				__( 'New Edgepoint quote request %s', 'edgepoint-core' ),
				$reference
			);
			$message = sprintf(
				/* translators: 1: reference, 2: name, 3: service, 4: location, 5: phone, 6: email, 7: requirements. */
				__( "Reference: %1\$s\nName: %2\$s\nService: %3\$s\nLocation: %4\$s\nPhone: %5\$s\nEmail: %6\$s\n\n%7\$s\n\nSign in to WordPress to review the request.", 'edgepoint-core' ),
				$reference,
				$name,
				$services[ $service ],
				$location,
				$phone,
				$email,
				$requirements
			);
			$mail_failure = '';
			$capture_failure = static function ( $error ) use ( &$mail_failure ) {
				if ( is_wp_error( $error ) ) {
					$mail_failure = $error->get_error_message();
				}
			};
			add_action( 'wp_mail_failed', $capture_failure );
			try {
				$delivered = (bool) wp_mail( $settings['quote_email'], $subject, $message );
			} catch ( \Throwable $exception ) {
				$delivered = false;
				$mail_failure = $exception->getMessage();
			}
			remove_action( 'wp_mail_failed', $capture_failure );
			if ( $mail_failure ) {
				$mail_note = self::explain_mail_failure( $mail_failure );
			}
		} else {
			$mail_note = 'Quote recipient email is missing.';
		}
		update_post_meta( $post_id, '_edgepoint_delivery_status', $delivered ? 'sent' : 'pending' );
		if ( $mail_note ) {
			update_post_meta( $post_id, '_edgepoint_mail_error', $mail_note );
		}

		self::redirect( $redirect, 'success', $reference );
	}

	/**
	 * Explain a mail failure in admin without hiding the saved enquiry.
	 *
	 * @param string $message Raw mailer error.
	 * @return string
	 */
	private static function explain_mail_failure( $message ) {
		if ( str_contains( $message, 'PHPMailer' ) && str_contains( $message, 'mail' ) ) {
			return __( 'Saved in WordPress. Email was not sent because this hosting account has disabled PHP mail().', 'edgepoint-core' );
		}

		return sprintf(
			/* translators: %s: mailer error message. */
			__( 'Saved in WordPress. Email was not sent: %s', 'edgepoint-core' ),
			$message
		);
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
		$args = array( 'edgepoint_status' => $status );
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
			'edgepoint-enquiry-details',
			__( 'Enquiry details', 'edgepoint-core' ),
			array( __CLASS__, 'render_meta_box' ),
			'edgepoint_enquiry',
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
			'reference'            => __( 'Reference', 'edgepoint-core' ),
			'name'                 => __( 'Name', 'edgepoint-core' ),
			'organization'         => __( 'Organization', 'edgepoint-core' ),
			'email'                => __( 'Email', 'edgepoint-core' ),
			'phone'                => __( 'Phone', 'edgepoint-core' ),
			'service'              => __( 'Service', 'edgepoint-core' ),
			'location'             => __( 'Location', 'edgepoint-core' ),
			'requirements'         => __( 'Requirements', 'edgepoint-core' ),
			'privacy_acknowledged' => __( 'Privacy acknowledgement', 'edgepoint-core' ),
			'status'               => __( 'Status', 'edgepoint-core' ),
			'delivery_status'      => __( 'Notification', 'edgepoint-core' ),
			'mail_error'           => __( 'Mail result', 'edgepoint-core' ),
		);
		?>
		<table class="widefat striped">
			<tbody>
			<?php foreach ( $fields as $key => $label ) : ?>
				<tr>
					<th scope="row" style="width: 12rem;"><?php echo esc_html( $label ); ?></th>
					<td><?php echo nl2br( esc_html( (string) get_post_meta( $post->ID, '_edgepoint_' . $key, true ) ) ); ?></td>
				</tr>
			<?php endforeach; ?>
			</tbody>
		</table>
		<?php
	}
}
