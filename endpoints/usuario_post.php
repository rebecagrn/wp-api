<?php

function api_usuario_post($request) {

  $email = sanitize_email($request['email']);
  $nome = sanitize_text_field($request['nome']);
  $senha = $request['senha'];
  $rua = sanitize_text_field($request['rua']);
  $bairro = sanitize_text_field($request['bairro']);
  $numero = sanitize_text_field($request['numero']);
  $cidade = sanitize_text_field($request['cidade']);
  $cep = sanitize_text_field($request['cep']);
  $estado = sanitize_text_field($request['estado']);

  $user_exists = username_exists($email);
  $email_exists = email_exists($email);

  if(!$user_exists && !$email_exists && $email && $senha) {
    $user_id = wp_create_user($email, $senha, $email);

    $response = array(
      'ID' => $user_id,
      'display_name' => $name,
      'first_name' => $nome,
      'role' => 'subscriber'
    );
    wp_update_user($response);

    update_user_meta($user_id, 'cep', $cep);
    update_user_meta($user_id, 'rua', $rua);
    update_user_meta($user_id, 'bairro', $bairro);
    update_user_meta($user_id, 'numero', $numero);
    update_user_meta($user_id, 'cidade', $cidade);
    update_user_meta($user_id, 'estado', $estado);
  } else {
    $response = new WP_Error('email', 'E-mail já cadastrado.', array('status' => 403));
  }

  return rest_ensure_response($response);
}

function register_api_usuario_post() {
  register_rest_route('api', '/usuario', array(
  array(
    'methods' => WP_REST_Server::CREATABLE,
    'callback' => 'api_usuario_post',
  ),
  ));
}

add_action('rest_api_init', 'register_api_usuario_post');



?>