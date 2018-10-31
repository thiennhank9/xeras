<?php

require_once(porto_content_types . '/post.php');
require_once(porto_content_types . '/page.php');
require_once(porto_content_types . '/product.php');
require_once(porto_content_types . '/portfolio.php');
require_once(porto_content_types . '/member.php');
require_once(porto_content_types . '/faq.php');
require_once(porto_content_types . '/block.php');

// Show Meta Boxes
function porto_show_meta_boxes($meta_boxes) {
    if (!isset($meta_boxes) || empty($meta_boxes))
        return;

    echo '<div class="postoptions">';
    foreach ($meta_boxes as $meta_box) {
        porto_show_meta_box($meta_box);
    }
    echo'</div>';
}

// Show Meta Box
function porto_show_meta_box($meta_box) {

    if ( isset( $_GET['post'] ) ) {
        $post_id = (int)( $_GET['post'] );
        $post    = get_post( $post_id );
    }
    else {
        $post = $GLOBALS['post'];
    }

    extract(shortcode_atts(array(
        "name" => '',
        "title" => '',
        "desc" => '',
        "type" => '',
        "default" => '',
        "options" => ''
    ), $meta_box));

    $meta_box_value = get_post_meta($post->ID, $name, true);

    if ($meta_box_value == "")
        $meta_box_value = $default;

    echo '<input type="hidden" name="' . $name . '_noncename" id="' . $name . '_noncename" value="' . wp_create_nonce( plugin_basename(__FILE__) ) . '" />';

    if ($type == "text") : // text ?>
        <div class="metabox">
            <h3><?php echo $title ?></h3>
            <div class="metainner">
                <div class="box-option">
                    <input type="text" id="<?php echo $name ?>" name="<?php echo $name ?>" value="<?php echo stripslashes($meta_box_value) ?>" size="50%" />
                </div>
                <div class="box-info"><label for="<?php echo $name ?>"><?php echo $desc ?></label></div>
            </div>
        </div>
    <?php endif;

    if ($type == "select") : // select ?>
        <div class="metabox">
            <h3><?php echo $title ?></h3>
            <div class="metainner">
                <div class="box-option">
                    <select name="<?php echo $name ?>" id="<?php echo $name ?>">
                        <option value="">select</option>
                        <?php if (is_array($options)) :
                            foreach ($options as $key => $value) : ?>
                                <option value="<?php echo $key ?>"<?php echo ($meta_box_value == $key ? ' selected="selected"' : '') ?>>
                                    <?php echo $value ?>
                                </option>
                            <?php endforeach;
                        endif ?>
                    </select>
                </div>
                <div class="box-info"><label for="<?php echo $name ?>"><?php echo $desc ?></label></div>
            </div>
        </div>
    <?php endif;

    if ($type == "upload") : // upload image ?>
        <div class="metabox">
            <h3><?php echo $title ?></h3>
            <div class="metainner">
                <div class="box-option">
                    <label for='upload_image'>
                        <input value="<?php echo stripslashes($meta_box_value) ?>" type="text" name="<?php echo $name ?>"  id="<?php echo $name ?>" size="50%" />
                        <br/>
                        <input class="button_upload_image button" id="<?php echo $name ?>" type="button" value="<?php _e('Upload Image', 'porto') ?>" />&nbsp;
                        <input class="button_remove_image button" id="<?php echo $name ?>" type="button" value="<?php _e('Remove Image', 'porto') ?>" />
                    </label>
                </div>
            </div>
        </div>
    <?php endif;

    if ($type == "editor") : // editor ?>
        <div class="metabox">
            <h3 style="float:none;"><?php echo $title ?></h3>
            <div class="metainner">
                <div class="box-option">
                    <?php wp_editor( $meta_box_value, $name ) ?>
                </div>
                <div class="box-info"><label for="<?php echo $name ?>"><?php echo $desc ?></label></div>
            </div>
        </div>
    <?php endif;

    if ($type == "textarea") : // textarea ?>
        <div class="metabox">
            <h3><?php echo $title ?></h3>
            <div class="metainner">
                <div class="box-option">
                    <textarea id="<?php echo $name ?>" name="<?php echo $name ?>"><?php echo stripslashes($meta_box_value) ?></textarea>
                </div>
                <div class="box-info"><label for="<?php echo $name ?>"><?php echo $desc ?></label></div>
            </div>
        </div>
    <?php endif;

    if (($type == 'radio') && (!empty($options))) : // radio buttons ?>
        <div class="metabox">
            <h3><?php echo $title ?></h3>
            <div class="metainner">
                <div class="box-option radio">
                    <?php foreach ($options as $key => $value) : ?>
                        <input type="radio" id="<?php echo $name ?>_<?php echo $key ?>" name="<?php echo $name ?>" value="<?php echo $key ?>"
                            <?php echo (isset($meta_box_value) && ($meta_box_value == $key) ? ' checked="checked"' : '') ?>/>
                        <label for="<?php echo $name ?>_<?php echo $key ?>"><?php echo $value ?></label>
                    <?php endforeach; ?>
                    <br>
                </div>
                <div class="box-info"><label for="<?php echo $name ?>"><?php echo $desc ?></label></div>
            </div>
        </div>
    <?php endif;

    if ($type == "checkbox") : // checkbox
        if ( $meta_box_value == $name ) {
            $checked = "checked=\"checked\"";
        } else {
            $checked = "";
        } ?>
        <div class="metabox">
            <h3><?php echo $title ?></h3>
            <div class="metainner">
                <div class="box-option checkbox">
                    <label><input type="checkbox" name="<?php echo $name ?>" value="<?php echo $name ?>" <?php echo $checked ?>/> <?php echo $desc ?></label>
                </div>
            </div>
        </div>
    <?php endif;

    if (($type == 'multi_checkbox') && (!empty($options))) : // radio buttons ?>
        <div class="metabox">
            <h3><?php echo $title ?></h3>
            <div class="metainner">
                <div class="box-option radio">
                    <?php foreach ($options as $key => $value) : ?>
                    <input type="checkbox" id="<?php echo $name ?>_<?php echo $key ?>" name="<?php echo $name ?>[]" value="<?php echo $key ?>" <?php echo (isset($meta_box_value) && in_array($key, explode(',', $meta_box_value))) ? ' checked="checked"' : ''?>/><label for="<?php echo $name ?>_<?php echo $key ?>"> <?php echo $value ?> </label>
                    <?php endforeach; ?>
                </div>
                <div class="box-info"><label for="<?php echo $name ?>"><?php echo $desc ?></label></div>
            </div>
        </div>
    <?php endif;
}

// Save Post Data
function porto_save_postdata($post_id, $meta_boxes) {

    if (!isset($meta_boxes) || empty($meta_boxes))
        return;

    foreach ($meta_boxes as $meta_box) {

        extract(shortcode_atts(array(
            "name" => '',
            "title" => '',
            "desc" => '',
            "type" => '',
            "default" => '',
            "options" => ''
        ), $meta_box));

        if ( !isset($_POST[$name.'_noncename']))
            return $post_id;

        if ( !wp_verify_nonce( $_POST[$name.'_noncename'], plugin_basename(__FILE__) ) ) {
            return $post_id;
        }

        if ( 'page' == $_POST['post_type'] ) {
            if ( !current_user_can( 'edit_page', $post_id ))
                return $post_id;
        } else {
            if ( !current_user_can( 'edit_post', $post_id ))
                return $post_id;
        }

        $meta_box_value = get_post_meta($post_id, $name, true);

        if (!isset($_POST[$name])) {
            delete_post_meta($post_id, $name, $meta_box_value);
            continue;
        }

        $data = $_POST[$name];

        if (is_array($data))
            $data = implode(',', $data);

        if (!$meta_box_value && !$data)
            add_post_meta($post_id, $name, $data, true);
        elseif ($data != $meta_box_value)
            update_post_meta($post_id, $name, $data);
        elseif (!$data)
            delete_post_meta($post_id, $name, $meta_box_value);
    }
}

// Show Taxonomy Add Meta Boxes
function porto_show_tax_add_meta_boxes($meta_boxes) {
    if (!isset($meta_boxes) || empty($meta_boxes))
        return;

    foreach ($meta_boxes as $meta_box) {
        porto_show_tax_add_meta_box($meta_box);
    }
}

// Show Taxonomy Add Meta Box
function porto_show_tax_add_meta_box($meta_box) {

    extract(shortcode_atts(array(
        "name" => '',
        "title" => '',
        "desc" => '',
        "type" => '',
        "default" => '',
        "options" => ''
    ), $meta_box));

    ?>

    <input type="hidden" name="<?php echo $name ?>_noncename" id="<?php echo $name ?>_noncename"
        value="<?php echo wp_create_nonce( plugin_basename(__FILE__) ) ?>" />

    <?php

    if ($type == "text") : // text ?>
        <div class="form-field">
            <label for="<?php echo $name ?>"><?php echo $title ?></label>
            <input type="text" id="<?php echo $name ?>" name="<?php echo $name ?>" />
            <?php if ($desc) : ?><p><?php echo $desc ?></p><?php endif; ?>
        </div>
    <?php endif;

    if ($type == "select") : // select ?>
        <div class="form-field">
            <label for="<?php echo $name ?>"><?php echo $title ?></label>
            <select name="<?php echo $name ?>" id="<?php echo $name ?>">
                <option value="">select</option>
                <?php if (is_array($options)) :
                    foreach ($options as $key => $value) : ?>
                        <option value="<?php echo $key ?>"><?php echo $value ?></option>
                    <?php endforeach;
                endif; ?>
            </select>
            <?php if ($desc) : ?><p><?php echo $desc ?></p><?php endif; ?>
        </div>
    <?php endif;

    if ($type == "upload") : // upload image ?>
        <div class="form-field">
            <label for="<?php echo $name ?>"><?php echo $title ?></label>
            <label for='upload_image'>
                <input style="margin-bottom:5px;" type="text" name="<?php echo $name ?>"  id="<?php echo $name ?>" /><br/>
                <button class="button_upload_image button" id="<?php echo $name ?>"><?php _e('Upload Image', 'porto') ?></button>
                <button class="button_remove_image button" id="<?php echo $name ?>"><?php _e('Remove Image', 'porto') ?></button>
            </label>
            <?php if ($desc) : ?><p><?php echo $desc ?></p><?php endif; ?>
        </div>
    <?php endif; 

    if ($type == "editor") : // editor ?>
        <div class="form-field">
            <label for="<?php echo $name ?>"><?php echo $title ?></label>
            <?php wp_editor( '', $name ) ?>
            <?php if ($desc) : ?><p><?php echo $desc ?></p><?php endif; ?>
        </div>
    <?php endif;

    if ($type == "textarea") : // textarea ?>
        <div class="form-field">
            <label for="<?php echo $name ?>"><?php echo $title ?></label>
            <textarea id="<?php echo $name ?>" name="<?php echo $name ?>"></textarea>
            <?php if ($desc) : ?><p><?php echo $desc ?></p><?php endif; ?>
        </div>
    <?php endif;

    if (($type == 'radio') && (!empty($options))) : // radio buttons ?>
        <div class="form-field">
            <label for="<?php echo $name ?>"><?php echo $title ?></label>
            <?php foreach ($options as $key => $value) : ?>
                <input style="display:inline-block; width:auto;" type="radio" id="<?php echo $name ?>_<?php echo $key ?>" name="<?php echo $name ?>"  value="<?php echo $key ?>"/>
                <label style="display:inline-block" for="<?php echo $name ?>_<?php echo $key ?>"><?php echo $value ?></label>
            <?php endforeach; ?>
            <?php if ($desc) : ?><p><?php echo $desc ?></p><?php endif; ?>
        </div>
    <?php endif;

    if ($type == "checkbox") : // checkbox ?>
        <div class="form-field">
            <label for="<?php echo $name ?>"><?php echo $title ?></label>
            <label><input style="display:inline-block; width:auto;" type="checkbox" name="<?php echo $name ?>" value="<?php echo $name ?>" /> <?php echo $desc ?></label>
        </div>
    <?php endif;

    if (($type == 'multi_checkbox') && (!empty($options))) : // radio buttons ?>
        <div class="form-field">
            <label for="<?php echo $name ?>"><?php echo $title ?></label>
            <?php foreach ($options as $key => $value) : ?>
                <input style="display:inline-block; width:auto;" type="checkbox" id="<?php echo $name ?>_<?php echo $key ?>" name="<?php echo $name ?>[]" value="<?php echo $key ?>" />
                <label style="display:inline-block" for="<?php echo $name ?>_<?php echo $key ?>"><?php echo $value ?></label>
            <?php endforeach; ?>
            <?php if ($desc) : ?><p><?php echo $desc ?></p><?php endif; ?>
        </div>
    <?php endif;
}

// Show Taxonomy Add Meta Boxes
function porto_show_tax_edit_meta_boxes($tag, $taxonomy, $meta_boxes) {
    if (!isset($meta_boxes) || empty($meta_boxes))
        return;

    foreach ($meta_boxes as $meta_box) {
        porto_show_tax_edit_meta_box($tag, $taxonomy, $meta_box);
    }
}

// Show Taxonomy Add Meta Box
function porto_show_tax_edit_meta_box($tag, $taxonomy, $meta_box) {

    extract(shortcode_atts(array(
        "name" => '',
        "title" => '',
        "desc" => '',
        "type" => '',
        "default" => '',
        "options" => ''
    ), $meta_box));

	?>

    <input type="hidden" name="<?php echo $name ?>_noncename" id="<?php echo $name ?>_noncename" 
		value="<?php echo wp_create_nonce( plugin_basename(__FILE__) ) ?>" />

	<?php
    $meta_box_value = get_metadata($tag->taxonomy, $tag->term_id, $name, true);

    if ($meta_box_value == "")
        $meta_box_value = $default;

    if ($type == "text") : // text ?>
        <tr class="form-field">
			<th scope="row" valign="top"><label for="<?php echo $name ?>"><?php echo $title ?></label></th>
	        <td>
		        <input type="text" id="<?php echo $name ?>" name="<?php echo $name ?>" value="<?php echo stripslashes($meta_box_value) ?>" size="50%" />
				<?php if ($desc) : ?><p class="description"><?php echo $desc ?></p><?php endif; ?>
			</td>
		</tr>
    <?php endif;

    if ($type == "select") : // select ?>
        <tr class="form-field">
	        <th scope="row" valign="top"><label for="<?php echo $name ?>"><?php echo $title ?></label></th>
	        <td>
				<select name="<?php echo $name ?>" id="<?php echo $name ?>">
					<option value="">select</option>
			        <?php if (is_array($options)) :
			            foreach ($options as $key => $value) : ?>
			                <option value="<?php echo $key ?>"<?php echo $meta_box_value == $key ? ' selected="selected"' : '' ?>><?php echo $value ?></option>
						<?php endforeach;
					endif; ?>
                </select>
				<?php if ($desc) : ?><p class="description"><?php echo $desc ?></p><?php endif; ?>
			</td>
		</tr>
    <?php endif; 

    if ($type == "upload") : // upload image ?>
        <tr class="form-field">
	        <th scope="row" valign="top"><label for="<?php echo $name ?>"><?php echo $title ?></label></th>
	        <td>
				<label for='upload_image'>
					<input style="margin-bottom:5px;" value="<?php echo stripslashes($meta_box_value) ?>" type="text" name="<?php echo $name ?>"  id="<?php echo $name ?>" size="50%" />
			        <br/>
					<button class="button_upload_image button" id="<?php echo $name ?>"><?php _e('Upload Image', 'porto') ?></button>
					<button class="button_remove_image button" id="<?php echo $name ?>"><?php _e('Remove Image', 'porto') ?></button>
				</label>
				<?php if ($desc) : ?><p class="description"><?php echo $desc ?></p><?php endif; ?>
			</td>
		</tr>
    <?php endif; 

	if ($type == "editor") : // editor ?>
        <tr class="form-field">
			<th colspan="2" scope="row" valign="top"><label for="<?php echo $name ?>"><?php echo $title ?></label></th>
		<tr>
			<td colspan="2">
				<?php wp_editor( $meta_box_value, $name ) ?>
				<?php if ($desc) : ?><p class="description"><?php echo $desc ?></p><?php endif; ?>
			</td>
		</tr>
    <?php endif;

    if ($type == "textarea") : // textarea ?>
        <tr class="form-field">
            <th scope="row" valign="top"><label for="<?php echo $name ?>"><?php echo $title ?></label></th>
            <td>
                <textarea id="<?php echo $name ?>" name="<?php echo $name ?>"><?php echo stripslashes($meta_box_value) ?></textarea>
                <?php if ($desc) : ?><p class="description"><?php echo $desc ?></p><?php endif; ?>
            </td>
        </tr>
    <?php endif;

	if (($type == 'radio') && (!empty($options))) : // radio buttons ?>
        <tr class="form-field">
	        <th scope="row" valign="top"><label for="<?php echo $name ?>"><?php echo $title ?></label></th>
	        <td>
		        <?php foreach ($options as $key => $value) : ?>
					<input style="display:inline-block; width:auto;" type="radio" id="<?php echo $name ?>_<?php echo $key ?>" name="<?php echo $name ?>"  value="<?php echo $key ?>"
						<?php echo (isset($meta_box_value) && ($meta_box_value == $key) ? ' checked="checked"' : '') ?>/>
					<label for="<?php echo $name ?>_<?php echo $key ?>"><?php echo $value ?></label>
				<?php endforeach; ?>
        		<?php if ($desc) : ?><p class="description"><?php echo $desc ?></p><?php endif; ?>
			</td>
		</tr>
    <?php endif; 

    if ($type == "checkbox") :  // checkbox ?>
        <?php if ( $meta_box_value == $name ) {
            $checked = "checked=\"checked\"";
        } else {
            $checked = "";
        } ?>
        <tr class="form-field">
	        <th scope="row" valign="top"><label for="<?php echo $name ?>"><?php echo $title ?></label></th>
			<td>
		        <label><input style="display:inline-block; width:auto;" type="checkbox" name="<?php echo $name ?>" value="<?php echo $name ?>" <?php echo $checked ?> /> <?php echo $desc ?></label>
			</td>
		</tr>
    <?php endif;

    if (($type == 'multi_checkbox') && (!empty($options))) : // radio buttons ?>
        <tr class="form-field">
	        <th scope="row" valign="top"><label for="<?php echo $name ?>"><?php echo $title ?></label></th>
			<td>
				<?php foreach ($options as $key => $value) : ?>
					<input style="display:inline-block; width:auto;" type="checkbox" id="<?php echo $name ?>_<?php echo $key ?>" name="<?php echo $name ?>[]" value="<?php echo $key ?>" <?php echo ((isset($meta_box_value) && in_array($key, explode(',', $meta_box_value))) ? ' checked="checked"' : '') ?>/>
					<label for="<?php echo $name ?>_<?php echo $key ?>"> <?php echo $value ?></label>
				<?php endforeach; ?>
		        <?php if ($desc) : ?><p class="description"><?php echo $desc ?></p><?php endif; ?>
			</td>
		</tr>
    <?php endif;
}

// Save Tax Data
function porto_save_taxdata( $term_id, $tt_id, $taxonomy, $meta_boxes ) {
    if (!isset($meta_boxes) || empty($meta_boxes))
        return;

    foreach ($meta_boxes as $meta_box) {

        extract(shortcode_atts(array(
            "name" => '',
            "title" => '',
            "desc" => '',
            "type" => '',
            "default" => '',
            "options" => ''
        ), $meta_box));

        if ( !isset($_POST[$name.'_noncename']))
            return;

        if ( !wp_verify_nonce( $_POST[$name.'_noncename'], plugin_basename(__FILE__) ) ) {
            return;
        }

        $meta_box_value = get_metadata($taxonomy, $term_id, $name, true);

        if (!isset($_POST[$name])) {
            delete_metadata($taxonomy, $term_id, $name, $meta_box_value);
            continue;
        }

        $data = $_POST[$name];

        if (is_array($data))
            $data = implode(',', $data);

        if (!$meta_box_value && !$data)
            add_metadata($taxonomy, $term_id, $name, $data, true);
        elseif ($data != $meta_box_value)
            update_metadata($taxonomy, $term_id, $name, $data);
        elseif (!$data)
            delete_metadata($taxonomy, $term_id, $name, $meta_box_value);
    }
}

// Create Meta Table
function create_metadata_table($table_name, $type) {
    global $wpdb;

    if (!empty ($wpdb->charset))
        $charset_collate = "DEFAULT CHARACTER SET {$wpdb->charset}";
    if (!empty ($wpdb->collate))
        $charset_collate .= " COLLATE {$wpdb->collate}";

    if (!$wpdb->get_var("SHOW TABLES LIKE '$table_name'") == $table_name) {
        $sql = "CREATE TABLE {$table_name} (
            meta_id bigint(20) NOT NULL AUTO_INCREMENT,
            {$type}_id bigint(20) NOT NULL default 0,
            meta_key varchar(255) DEFAULT NULL,
            meta_value longtext DEFAULT NULL,
            UNIQUE KEY meta_id (meta_id)
        ) {$charset_collate};";

        require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
        dbDelta($sql);
    }
}
