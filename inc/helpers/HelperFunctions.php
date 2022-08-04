<?php
class HelperFunctions {

    public function getOptionsByGroupName($group) {
        $settings = get_option('bstg_general_settings');
        if (isset($settings[$group])) {
            return $settings[$group];
        } else {
            return false;
        }
    }


    public function get_components_imports() {

        $components = $this->getOptionsByGroupName('components');
        if (isset($components['_state'])) unset($components['_state']);

        $string = '';
        foreach ($components as $component) {

            foreach ($component as $import) {
                $string .= $import;
            }
        }
        return $string;
    }


    public function get_color_pairs() {
        $colors = $this->getOptionsByGroupName('colors');

        // if no colors are set return, so the default values will apply then!
        if (!$colors) return;

        $string = '';
        foreach ($colors as $key => $value) {
            $string .= "
            \${$key} : {$value};\n
            ";
        }
        return $string;
    }

    public function get_gutenberg_colors() {

        // get theme slug including a check if it's a child-theme or not
        $theme = wp_get_theme()->parent();
        if (!$theme) $theme = wp_get_theme();
        $theme_slug = $theme->get('TextDomain');

        $colors = $this->getOptionsByGroupName('colors');

        if (!$colors) return;
        unset($colors['_state']);

        $gb_colors = [];

        $i = 0;
        foreach ($colors as $key => $value) {
            $gb_colors[$i] = [
                'name' => esc_html__($key, $theme_slug),
                'slug' => $key,
                'color' => $value,
            ];
            $i++;
        }

        return $gb_colors;
    }
}
