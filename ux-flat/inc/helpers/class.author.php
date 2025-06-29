<?php
if (!class_exists('AuthorBoxs')) {
    class AuthorBoxs {
        private $fields = [
            'phone'      => 'Phone',
            'zalo'      => 'Zalo',
            'tiktok'     => 'TikTok',
            'facebook'   => 'Facebook',
            'instagram'  => 'Instagram',
            'linkedin'   => 'LinkedIn',
            'myspace'  => 'Myspace',
            'pinterest'  => 'Pinterest',
            'soundcloud'  => 'SoundCloud',
            'tumblr'  => 'Tumblr',
            'wikipedia'  => 'Wikipedia',
            'x'    => 'X',
            'youtube'    => 'YouTube',
            'threads'    => 'Threads',
        ];

        public function __construct() {
            add_action('show_user_profile', [$this, 'add_profile_fields'], 1);
            add_action('edit_user_profile', [$this, 'add_profile_fields'], 1);
            add_action('personal_options_update', [$this, 'save_profile_fields'], 1);
            add_action('edit_user_profile_update', [$this, 'save_profile_fields'], 1);
            add_shortcode('social', [$this, 'render_author_box']);
        }

        public function add_profile_fields($user) {
            ?>
            <h2><?php _e('Social'); ?></h2>
            <table class="form-table">
                <?php foreach ($this->fields as $key => $label) : ?>
                    <tr>
                        <th><label for="<?php echo esc_attr($key); ?>"><?php echo esc_html($label); ?></label></th>
                        <td>
                            <input type="text" name="<?php echo esc_attr($key); ?>" id="<?php echo esc_attr($key); ?>" 
                                   value="<?php echo esc_attr(get_user_meta($user->ID, $key, true)); ?>" class="regular-text" />
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
            <?php
        }

        public function save_profile_fields($user_id) {
            if (!current_user_can('edit_user', $user_id)) {
                return false;
            }

            foreach ($this->fields as $key => $label) {
                if (isset($_POST[$key])) {
                    update_user_meta($user_id, $key, sanitize_text_field($_POST[$key]));
                }
            }
        }

        public function render_author_box($atts) {
            $atts = shortcode_atts([
                'id' => '',
            ], $atts);

            $author_id = !empty($atts['id']) ? intval($atts['id']) : get_the_author_meta('ID');
            if (!$author_id) {
                return ''; 
            }

            $socials = [
                'zalo'   => get_user_meta($author_id, 'zalo', true),
                'tiktok'   => get_user_meta($author_id, 'tiktok', true),
                'facebook'   => get_user_meta($author_id, 'facebook', true),
                'instagram'   => get_user_meta($author_id, 'instagram', true),
                'linkedin'   => get_user_meta($author_id, 'linkedin', true),
                'myspace'   => get_user_meta($author_id, 'myspace', true),
                'pinterest'   => get_user_meta($author_id, 'pinterest', true),
                'soundcloud'   => get_user_meta($author_id, 'soundcloud', true),
                'tumblr'   => get_user_meta($author_id, 'tumblr', true),
                'wikipedia'   => get_user_meta($author_id, 'wikipedia', true),
                'x'   => get_user_meta($author_id, 'x', true),
                'youtube'   => get_user_meta($author_id, 'youtube', true),
                'threads'   => get_user_meta($author_id, 'threads', true),
            ];

            $social_links = [];
            foreach ($socials as $key => $url) {
                if (!empty($url)) {
                    $social_links[$key] = esc_attr($url);
                }
            }

            ob_start();
            if (!empty($social_links)) {
                echo flatsome_apply_shortcode('follow', array_merge(
                    ['style' => 'small', 'tooltip' => true],
                    $social_links
                ));
            }
            return ob_get_clean();
        }
    }
    new AuthorBoxs();
}
?>
