<div id="inlinks-plugin-container">
	<div class="inlinks-masthead">
		<div class="inlinks-masthead__inside-container">
			<div class="inlinks-masthead__logo-container">
				<img class="inlinks-masthead__logo" src="<?php echo esc_url(INLINKS_URL.'admin/images/inlinks-logo.png') ?>" alt="Inlinks">
			</div>
		</div>
	</div>
	<div class="inlinks-lower">
		<div class="inlinks-alert inlinks-active">
			<h3 class="inlinks-key-status"><?php _e('Content Optimization starts here','inlinks') ?></h3>
		</div>
		<div class="inlinks-card">
			<div class="inlinks-section-header">
				<div class="inlinks-section-header__label">
					<span><?php _e('Settings','inlinks') ?></span>
				</div>
			</div>
			<div class="inside">
			    <form method="post" action="options.php" class="inlinks-settings">
			    <?php settings_fields( 'inlinks_option_group' ); ?>
			    <table class="form-table">
			    <tbody>
				     <tr valign="top">
						  <th scope="row">
						  	<label for="inlinks_project_id"><?php _e('Project ID','inlinks') ?> <a class="inlinks-help" href="https://inlinks.net/p/plugin/" target="_BLANK"><span class="dashicons dashicons-editor-help"></span></a> </label>
						  </th>
						  <td>
						  	<?php
						  	$val = get_option( 'inlinks_project_id');
						  	?>
						  	<input
								id="inlinks_project_id"
								type="text"
								name="inlinks_project_id"
								value="<?php echo esc_html_e($val) ?>"
								/>
								<p><?php echo sprintf( __( 'If you do not have an account on Inlinks, <a href="%s" target="_BLANK">sign up</a> to get an ID.', 'inlinks' ), 'https://inlinks.net/i/session/login?r=1' ) ?> </p>
						  </td>

					  </tr>
					  <tr valign="top">
						  <th scope="row">
						  	<label for="inlinks_tracking_on"><?php _e('Turn on Inlinks Script','inlinks') ?></label>
						  </th>
						  <td>
						  	<input
								id="inlinks_tracking_on"
								type="radio"
								name="inlinks_tracking"
								value="yes"
								<?php echo (get_option( 'inlinks_tracking' ) == 'yes' || get_option( 'inlinks_tracking' ) == '') ? "checked='checked'" : "" ?>
									/>
								<label for="gv_dv_enable_on"><?php esc_html_e( 'On', 'inlinks' ); ?></label>&nbsp;&nbsp;
								<input
											id="inlinks_tracking_off"
											type="radio"
											name="inlinks_tracking"
											value="no"
											<?php echo get_option( 'inlinks_tracking' ) == 'no' ? "checked='checked'" : "" ?>
									/><label for="inlinks_tracking_off"><?php esc_html_e( 'Off', 'inlinks' ); ?></label>
								<p><?php esc_html_e( 'If you switch this off, the tool’s links and schema will be disabled', 'inlinks' ); ?></p>
						  </td>
					  </tr>
				  </tbody>
				  </table>

				 <div class="inlinks-card-actions">
				  	<div id="delete-action">
					</div>
				  	<div id="publishing-action">
						<input type="submit" name="submit" id="submit" class="inlinks-button inlinks-could-be-primary" value="Save Changes">
					</div>
					<div class="clear"></div>
				</div>
					
			    </form>
			</div>
		</div>
	</div>
</div>