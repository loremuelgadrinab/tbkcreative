<div class="wrap">
	<h1 class="wp-heading-inline">
		SpruceXam Settings 
	</h1>
	<?php
		if ( isset( $_GET["message"] ) ){
			?>
			<div class="notice notice-<?php echo $_GET["message"]; ?> is-dismissible">
				<?php if ( $_GET["message"] == "success" ) : ?>
					<p>Changes Saved!</p>
				<?php else : ?>
					<p>Error: Something is wrong!</p>
				<?php endif; ?>
         	</div>
			<?php
		} 
	?>
	<hr />
	<form action="<?php echo esc_html( admin_url( 'admin-post.php' ) ); ?>" method="post" id="sx_data_form">
		<input type="hidden" name="action" value="sx_save_settings">
		<?php wp_nonce_field( 'sx-data-nonce', 'sx-save-settings' ); ?>
		<table class="form-table">
			<tbody>
				<tr>
					<th>
						Client ID
					</th>
					<td>
						<input name="sx_client_id" type="text" id="sx_client_id" value="<?php echo ( isset( $sx_data['sx_client_id'] ) ? $sx_data['sx_client_id'] : '' ); ?>" required>
					</td>
				</tr>
				<tr>
					<th>
						Client Secret
					</th>
					<td>
						<input name="sx_client_secret" type="text" id="sx_client_secret" value="<?php echo ( isset( $sx_data['sx_client_secret'] ) ? $sx_data['sx_client_secret'] : '' ); ?>" required>
					</td>
				</tr>
				<tr>
					<th>
						Page to Display
					</th>
					<td>
						<select name="sx_page_id" id="sx_page_id" required>
							<option value=""> -- Select Here -- </option>
							<?php
								foreach ( $pages as $page ) {
									echo "<option value='" . $page->ID . "' " . ( isset( $sx_data['sx_page_id'] ) && $sx_data['sx_page_id'] == $page->ID ? 'selected' : '' ). " >" . $page->post_title . "</option>";
								}
							?>
						</select>
					</td>
				</tr>
			</tbody>
		</table>
		<p class="submit">
			<input type="submit" name="submit" id="submit" class="button button-primary" value="Save Data">
		</p>
	</form>
</div>
