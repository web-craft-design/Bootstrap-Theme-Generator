<?php
//FRONTEND STYLES:
function enq_styles(){
   wp_enqueue_style('bootstrap');
   wp_enqueue_style('gutenberg-bs-styles');
   wp_enqueue_script('bootstrapJS');
}


add_action('wp_head', function() {
    $bstg = new HelperFunctions;
    $settings = $bstg->getOptionsByGroupName('general_settings');


    // Load Bootstrap Globally, everywhere on Frontend!
    if ( isset($settings['bs_globally']) && $settings['bs_globally'] ){
        enq_styles();
        return;
    }


    // Load Bootstrap on chosen CPTs
    if ( isset($settings['bs_cpt_selection']) && $settings['bs_cpt_selection'] ){
        if (in_array(get_post_type(), $settings['bs_cpt_selection']) ){
            enq_styles();
        }
    }

    if ( isset($settings['bs_pages_globally']) && $settings['bs_pages_globally'] ){
        if (get_post_type() == 'page'){
            enq_styles();
            return;
        }
    }


    if ( isset($settings['bs_pages_selection']) && $settings['bs_pages_selection'] ){
        global $post;
        if (in_array($post->ID, $settings['bs_pages_selection'])){
            enq_styles();
            return;
        }

    }

}, 9999);
