<?php get_header();
$category_data = get_term_meta($cat, 'cat_layout', true);
$category_type = isset($category_data) ?$category_data : '';
if($category_type == 'list1' ) : include( 'template-parts/list-1.php' );
elseif($category_type == 'list2') : include( 'template-parts/list-2.php' );
elseif($category_type == 'list3') : include( 'template-parts/list-3.php' );
elseif($category_type == 'list4') : include( 'template-parts/list-4.php' );
else : include( 'template-parts/list-1.php' );
endif;
get_footer(); 