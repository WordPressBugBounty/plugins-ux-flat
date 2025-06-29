<?php
if (!class_exists('UserAvatar')) {
    class UserAvatar {
        public function __construct() {
            add_action('show_user_profile', [$this, 'add_avatar_field']);
            add_action('edit_user_profile', [$this, 'add_avatar_field']);
            add_action('personal_options_update', [$this, 'save_avatar_field']);
            add_action('edit_user_profile_update', [$this, 'save_avatar_field']);
            add_action('delete_user', [$this, 'delete_avatar_on_user_delete'], 10, 1);
            add_filter('get_avatar', [$this, 'filter_avatar'], 10, 5);
        }

        public function add_avatar_field($user) {
            $image_id = get_user_meta($user->ID, '_avatar', true);
            $image_url = $image_id ? wp_get_attachment_image_url($image_id, 'thumbnail') : '';
            wp_nonce_field('save_avatar_action', 'avatar_nonce');
            ?>
            <h3><?php esc_html_e('Default Avatar'); ?></h3>
            <table class="form-table">
                <tr>
                    <th><label for="avatar"><?php esc_html_e('Avatars'); ?></label></th>
                    <td>
                        <input type="hidden" name="avatar" id="avatar" value="<?php echo esc_attr($image_id); ?>" />
                        <input type="button" class="button" value="<?php esc_html_e('Select'); ?>" id="select-avatar-button" />
                        <?php if ($image_url): ?>
                            <br /><img src="<?php echo esc_url($image_url); ?>" style="max-width: 150px;" />
                            <br /><input type="button" class="button" value="<?php esc_html_e('Delete'); ?>" id="delete-avatar-button" />
                        <?php endif; ?>
                    </td>
                </tr>
            </table>
            <script type="text/javascript">
                jQuery(document).ready(function($) {
                    var mediaUploader;
                    $('#select-avatar-button').click(function() {
                        mediaUploader = wp.media.frames.file_frame = wp.media({
                            title: 'Select',
                            button: { text: 'Select' },
                            multiple: false
                        }).on('select', function() {
                            var attachment = mediaUploader.state().get('selection').first().toJSON();
                            $('#avatar').val(attachment.id);
                            $('#select-avatar-button').after('<br /><img src="' + attachment.url + '" style="max-width: 150px;" />');
                        }).open();
                    });

                    $('#delete-avatar-button').click(function() {
                        if (confirm('<?php esc_html_e("Are you sure you want to delete these files?"); ?>')) {
                            $('#avatar').val('');
                            $('#delete-avatar-button').hide();
                            $('#select-avatar-button').show();
                        }
                    });
                });
            </script>
            <?php
        }

        public function save_avatar_field($user_id) {
            if (!isset($_POST['avatar_nonce']) || !check_admin_referer('save_avatar_action', 'avatar_nonce')) {
                return;
            }
            if (isset($_POST['avatar']) && is_numeric($_POST['avatar'])) {
                $avatar_id = intval($_POST['avatar']);
                update_user_meta($user_id, '_avatar', $avatar_id);
            } else {
                delete_user_meta($user_id, '_avatar');
            }
        }

        public function delete_avatar_on_user_delete($user_id) {
            $image_id = get_user_meta($user_id, '_avatar', true);
            if ($image_id) {
                if (wp_delete_attachment($image_id, true)) {
                    delete_user_meta($user_id, '_avatar');
                }
            }
        }
        
        public function filter_avatar($avatar, $id_or_email, $size, $default, $alt) {
            if (is_a($id_or_email, 'WP_Comment')) {
                $user_id = $id_or_email->user_id;
            } else {
                $user = is_numeric($id_or_email) ? get_user_by('id', $id_or_email) : get_user_by('email', $id_or_email);
                $user_id = $user ? $user->ID : null;
            }
            $url = $user_id ? $this->get_avatar_url($user_id) : null;
            return $url ? sprintf('<img src="%s" alt="%s" class="avatar avatar-%d" height="%d" width="%d" />', esc_url($url), esc_attr($alt), $size, $size, $size) : $avatar;
        }

        private function get_avatar_url($user_id) {
            $image_id = get_user_meta($user_id, '_avatar', true);
            return $image_id ? wp_get_attachment_image_url($image_id, 'thumbnail') : null;
        }
    }
    new UserAvatar();
}
?>
