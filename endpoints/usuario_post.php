<?php

function api_usuario_post($request) {

$response = array(
  'nome' => 'Rebeca',
  'email' => 'rebecagpacheco@outlook.com'
);
  return rest_ensure_response($response);
}

function register_api_usuario_post() {
  register_rest_route('api', '/usuario', array(
  array(
    'methods' => 'GET',
    'callback' => 'api_usuario_post',
  ),
  ));
}

add_action('rest_api_init', 'register_api_usuario_post');



?>