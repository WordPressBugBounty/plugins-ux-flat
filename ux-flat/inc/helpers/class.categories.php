<?php
if (!class_exists('UXF_TAX_IMG')) {

    class UXF_TAX_IMG {

        public function __construct() {
            add_action('admin_enqueue_scripts', [$this, 'load_wp_media_files']);
            add_action('category_add_form_fields', [$this, 'add_category_image']);
            add_action('created_category', [$this, 'save_category_image']);
            add_action('category_edit_form_fields', [$this, 'update_category_image']);
            add_action('edited_category', [$this, 'updated_category_image']);
            add_action('admin_footer', [$this, 'add_script']);
        }

        public function add_category_image($taxonomy) {
            wp_nonce_field('save_cat_image', 'category_image_nonce');
            ?>
            <div class="form-field term-group">
                <label for="_thumbnail_id"><?php esc_html_e('Featured Images', 'text-domain'); ?></label>
                <input type="hidden" id="_thumbnail_id" name="_thumbnail_id" class="custom_media_url" value="">
                <div id="category-image-wrapper"></div>
                <p>
                    <input type="button" class="button button-secondary ct_tax_media_button" id="ct_tax_media_button" name="ct_tax_media_button" value="<?php esc_attr_e('Choose Image', 'text-domain'); ?>" />
                    <input type="button" class="button button-secondary ct_tax_media_remove" id="ct_tax_media_remove" name="ct_tax_media_remove" value="<?php esc_attr_e('Remove Image', 'text-domain'); ?>" />
                </p>
            </div>
            <?php
        }

        public function save_category_image($term_id) {
            if (
                isset($_POST['_thumbnail_id']) &&
                !empty($_POST['_thumbnail_id']) &&
                isset($_POST['category_image_nonce']) &&
                wp_verify_nonce($_POST['category_image_nonce'], 'save_cat_image')
            ) {
                $image = sanitize_text_field($_POST['_thumbnail_id']);
                add_term_meta($term_id, '_thumbnail_id', $image, true);
            }
        }

        public function update_category_image($term) {
            if (is_a($term, 'WP_Term')) {
                $image_id = get_term_meta($term->term_id, '_thumbnail_id', true);
                $image_url = wp_get_attachment_image_url($image_id, 'thumbnail');
                ?>
                <tr class="form-field term-group-wrap">
                    <th scope="row">
                        <label for="_thumbnail_id"><?php esc_html_e('Featured Images', 'text-domain'); ?></label>
                    </th>
                    <td>
                        <input type="hidden" name="category_image_nonce" value="<?php echo esc_attr(wp_create_nonce('save_cat_image')); ?>">
                        <input type="hidden" id="_thumbnail_id" name="_thumbnail_id" value="<?php echo esc_attr($image_id); ?>">
                        <div id="category-image-wrapper">
                            <?php if ($image_url) { ?>
                                <img src="<?php echo esc_url($image_url); ?>" alt="" style="max-height: 100px; float: none;">
                            <?php } ?>
                        </div>
                        <p>
                            <input type="button" class="button button-secondary ct_tax_media_button" id="ct_tax_media_button" name="ct_tax_media_button" value="<?php esc_attr_e('Choose Image', 'text-domain'); ?>" />
                            <input type="button" class="button button-secondary ct_tax_media_remove" id="ct_tax_media_remove" name="ct_tax_media_remove" value="<?php esc_attr_e('Remove Image', 'text-domain'); ?>" />
                        </p>
                    </td>
                </tr>
                <?php
            }
        }

        public function updated_category_image($term_id) {
            if (
                isset($_POST['_thumbnail_id']) &&
                !empty($_POST['_thumbnail_id']) &&
                isset($_POST['category_image_nonce']) &&
                wp_verify_nonce($_POST['category_image_nonce'], 'save_cat_image')
            ) {
                $image = sanitize_text_field($_POST['_thumbnail_id']);
                update_term_meta($term_id, '_thumbnail_id', $image);
            } else {
                delete_term_meta($term_id, '_thumbnail_id');
            }
        }

        public function add_script() {
            ?>
            <script>
                jQuery(document).ready(function($) {
                    function ct_media_upload(button_class) {
                        var _custom_media = true;
                        var _orig_send_attachment = wp.media.editor.send.attachment;

                        $(document).on('click', button_class, function(e) {
                            e.preventDefault();

                            var button = $(this);
                            _custom_media = true;
                            wp.media.editor.send.attachment = function(props, attachment) {
                                if (_custom_media) {
                                    $('#_thumbnail_id').val(attachment.id);
                                    $('#category-image-wrapper').html('<img class="custom_media_image" src="' + attachment.url + '" style="margin:0;padding:0;max-height:100px;float:none;" />');
                                } else {
                                    return _orig_send_attachment.apply(button, [props, attachment]);
                                }
                            }

                            wp.media.editor.open(button);
                        });

                        $(document).on('click', '.ct_tax_media_remove', function(e) {
                            e.preventDefault();
                            $('#_thumbnail_id').val('');
                            $('#category-image-wrapper').html('');
                        });
                    }

                    ct_media_upload('.ct_tax_media_button.button');
                });
            </script>
            <?php
        }

        public function load_wp_media_files() {
            wp_enqueue_media();
        }
    }
    $UXF_TAX_IMG = new UXF_TAX_IMG();
}
?>
