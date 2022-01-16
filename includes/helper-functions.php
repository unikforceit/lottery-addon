<?php
function theoriemakkie_check_odd_even($data){
    if($data % 2 == 0){
        $data = "Even";
    }
    else{
        $data = "Odd";
    }

    return $data;
}
function theoriemakkie_course_meta($id, $default = null)
{
    $options = get_post_meta(get_the_ID(), '_coursedatemeta', true);
    return ( isset( $options[$id] ) ) ? $options[$id] : $default;
}
function theoriemakkie_client_ratings($count){
    $out = '';
    for ($i=0; $i<$count; $i++) {
        $out.= '<i class="fas fa-star"></i>';
    }
    return $out;
}

function theoriemakkie_get_that_link($link){

    $url = $link['url'] ? 'href='.esc_url($link['url']). '' : '';
    $ext = $link['is_external'] ? 'target= _blank' : '';
    $nofollow = $link['nofollow'] ? 'rel="nofollow"' : '';
    $link = $url.' '.$ext.' '.$nofollow;
    return $link;
}
function theoriemakkie_get_that_image($source, $class = 'image'){
    if ($source){
        $image = '<img class="'.$class.'" src="'. esc_url( $source['url'] ).'" alt="'.get_bloginfo( 'name' ).'">';
    }
    return $image;
}

function theoriemakkie_cats_arr($tax = 'category') {

    $categories_obj = get_categories('taxonomy='.$tax.'');
    $categories = array();

    foreach ($categories_obj as $pn_cat) {
        $categories[$pn_cat->cat_ID] = $pn_cat->cat_name;
    }
    return $categories;
}
function theoriemakkie_single_category() {
        $categories = get_categories(['taxonomy'=>'week']);
        $separator = ',';
        $output = '';
        if($categories){
            foreach($categories as $category) {
                $output .= '<a href="'.get_category_link( $category->cat_ID ).'">'.$category->cat_name.'</a>'.$separator;
            }
            $cat= trim($output, $separator);
            return $cat;
        }
}

function theoriemakkie_posts_arr($post_type = 'post'){
    $args = array(
        'numberposts' => -1,
        'post_type'   => $post_type
    );

    $posts = get_posts( $args );
    $list = array();
    foreach ($posts as $cpost){
        $list[$cpost->ID] = $cpost->post_title;
    }
    return $list;
}