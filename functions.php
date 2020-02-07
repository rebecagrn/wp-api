<?php 

$dir = get_template_directory();
require_once($dir . "/custom-post-type/transacao.php");
require_once($dir . "/custom-post-type/produto.php");

require_once($dir . "/endpoints/usuario_post.php");
require_once($dir . "/endpoints/usuario_get.php");
require_once($dir . "/endpoints/usuario_put.php");

?>