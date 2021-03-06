<?php 
/** Add Colorpicker Field to "Add New Category" Form **/
function category_form_custom_field_add( $taxonomy ) {
?>
<div class="form-field">
    <label for="category_custom_color">Cor</label>
    <input name="cat_meta[catBG]" class="" type="color" value="" />
    <p class="description">Cor da Categoria</p>
</div>
<?php
}
add_action('category_add_form_fields', 'category_form_custom_field_add', 10 );

/** Add New Field To Category **/
function extra_category_fields( $tag ) {
    $t_id = $tag->term_id;
    $cat_meta = get_option( "category_$t_id" );
?>
<tr class="form-field">
    <th scope="row" valign="top"><label for="meta-color"><?php _e('Cor da Categoria'); ?></label></th>
    <td>
        <div id="colorpicker">
            <input type="color" name="cat_meta[catBG]" class="" size="3" style="width:20%;" value="<?php echo (isset($cat_meta['catBG'])) ? $cat_meta['catBG'] : '#fff'; ?>" />
        </div>
            <br />
        <span class="description"><?php _e(''); ?></span>
            <br />
        </td>
</tr>
<?php
}
add_action('category_edit_form_fields','extra_category_fields');

/** Save Category Meta **/
function save_extra_category_fileds( $term_id ) {

    if ( isset( $_POST['cat_meta'] ) ) {
        $t_id = $term_id;
        $cat_meta = get_option( "category_$t_id");
        $cat_keys = array_keys($_POST['cat_meta']);
            foreach ($cat_keys as $key){
            if (isset($_POST['cat_meta'][$key])){
                $cat_meta[$key] = $_POST['cat_meta'][$key];
            }
        }
        //save the option array
        update_option( "category_$t_id", $cat_meta );
    }
}
add_action ('edited_category', 'save_extra_category_fileds');
add_action('created_category', 'save_extra_category_fileds', 11, 1);
