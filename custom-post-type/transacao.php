<?php 

function register_custom_post_type_transacao() {
  register_post_type('transacao', array(
    'label' => 'Transação',
    'description' => 'Transações',
    'public' => true,
    'show_ui' => true,
    'capability_type' => 'post',
    'rewrite' => array('slug' => 'transacao', 'with_front' => true),
    'query_var' => true,
    'supports' => array('custom-fields', 'author', 'title'),
    'publicly_queryable' => true  
  ));
}

add_action('init', 'register_custom_post_type_transacao');

?>