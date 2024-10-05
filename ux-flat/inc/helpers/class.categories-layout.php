<?php
if (!class_exists('UXF_TAX_LAYOUT')) {

    class UXF_TAX_LAYOUT {

        public function __construct() {
            add_action('category_add_form_fields', [$this, 'add_layout_field']);
            add_action('category_edit_form_fields', [$this, 'update_layout_field']);
            add_action('created_category', [$this, 'save_layout']);
            add_action('edited_category', [$this, 'save_layout']);
            add_filter('category_template', [$this, 'category_layout']);
        }

        public function add_layout_field($taxonomy) {
            wp_nonce_field('save_layout', 'layout_nonce');
            $layout_options = $this->get_layout_options();
            ?>
            <div class="form-field term-group">
                <label for="layout"><?php echo esc_attr__('Layout'); ?></label>
                <select name="layout" id="layout">
                    <?php $this->render_layout_options($layout_options, ''); ?>
                </select>
            </div>
            <?php
        }

        public function save_layout($term_id) {
            if (isset($_POST['layout']) && isset($_POST['layout_nonce']) && wp_verify_nonce($_POST['layout_nonce'], 'save_layout')) {
                $layout = sanitize_text_field($_POST['layout']);
                update_term_meta($term_id, 'layout', $layout);
            }
        }

        public function update_layout_field($term) {
            $layout = get_term_meta($term->term_id, 'layout', true);
            $layout_options = $this->get_layout_options();
            ?>
            <tr class="form-field term-group-wrap">
                <th scope="row">
                    <label for="layout"><?php echo esc_attr__('Layout'); ?></label>
                </th>
                <td>
                    <input type="hidden" name="layout_nonce" value="<?php echo esc_attr(wp_create_nonce('save_layout')); ?>">
                    <select name="layout" id="layout">
                        <?php $this->render_layout_options($layout_options, $layout); ?>
                    </select>
                </td>
            </tr>
            <?php
        }

        public function category_layout($template) {
            if (is_category()) {
                $category = get_term_by('slug', get_query_var('category_name'), 'category');
                if ($category && !is_wp_error($category)) {
                    $layout = get_term_meta($category->term_id, 'layout', true);
                    if ($layout) {
                        $template = UXF_PATH . 'template-parts/posts/archive-layout.php';
                    }
                }
            }
            return $template;
        }

        private function get_layout_options() {
            return array(
                ''      => __('Default'),
                'list'  => __('List'),
                'inline'=> __('Inline'),
                '2-col' => __('2 Col'),
                '3-col' => __('3 Col'),
            );
        }

        private function render_layout_options($options, $selected) {
            foreach ($options as $value => $label) {
                printf('<option value="%s" %s>%s</option>', esc_attr($value), selected($selected, $value, false), esc_html($label));
            }
        }
        
    }
    $UXF_TAX_LAYOUT = new UXF_TAX_LAYOUT();
}
?>