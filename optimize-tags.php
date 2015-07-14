<?php
/**
 * @package Limitar etiquetas
 * @version 0.1
 */
/*
Plugin Name: Limitar número de etiquetas
Description: Este plugin impide que se muestre una etiqueta si ésta no está asociada al menos a tres entradas.
Author: José Fernández
Version: 0.1
Author URI: http://www.jose-fernandez.com.es/
License: GPLv3
*/



function mistags() {
global $post;
$tags = wp_get_post_tags($post->ID);
  if ($tags) {
    foreach($tags as $tag) {
      if ($tag->count > 2) { // Cambiar el número si se requiere 
        echo '' . $title . '<a href="' . get_term_link( $tag->term_id, 'post_tag' ) . '" title="' . sprintf( __( "Noticias sobre %s" ), $tag->name ) . '" ' . '>' . $tag->name.'</a> | '; 
      }
    }
  }


};

add_filter( 'the_tags', 'mistags');


?>
