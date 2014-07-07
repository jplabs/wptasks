<?php
/** 
 * As configurações básicas do WordPress.
 *
 * Esse arquivo contém as seguintes configurações: configurações de MySQL, Prefixo de Tabelas,
 * Chaves secretas, Idioma do WordPress, e ABSPATH. Você pode encontrar mais informações
 * visitando {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Codex page. Você pode obter as configurações de MySQL de seu servidor de hospedagem.
 *
 * Esse arquivo é usado pelo script ed criação wp-config.php durante a
 * instalação. Você não precisa usar o site, você pode apenas salvar esse arquivo
 * como "wp-config.php" e preencher os valores.
 *
 * @package WordPress
 */

// ** Configurações do MySQL - Você pode pegar essas informações com o serviço de hospedagem ** //
/** O nome do banco de dados do WordPress */
define('DB_NAME', 'db_wptasks');

/** Usuário do banco de dados MySQL */
define('DB_USER', 'root');

/** Senha do banco de dados MySQL */
define('DB_PASSWORD', '');

/** nome do host do MySQL */
define('DB_HOST', 'localhost');

/** Conjunto de caracteres do banco de dados a ser usado na criação das tabelas. */
define('DB_CHARSET', 'utf8');

/** O tipo de collate do banco de dados. Não altere isso se tiver dúvidas. */
define('DB_COLLATE', '');

/**#@+
 * Chaves únicas de autenticação e salts.
 *
 * Altere cada chave para um frase única!
 * Você pode gerá-las usando o {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * Você pode alterá-las a qualquer momento para desvalidar quaisquer cookies existentes. Isto irá forçar todos os usuários a fazerem login novamente.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'u7nEsSg9!$:|g[Zzpk3c4Ip$=5@{Okr+kvt53_QPQi*^G6<tL|HNb?K,5 |no|]w');
define('SECURE_AUTH_KEY',  '`B5r/ @f!>+1OC7za$.|9,bDXr58puoU%pCzXxX;i]!3;KDQpv1?dNEBWO/S(D|9');
define('LOGGED_IN_KEY',    'dQL{RdOOB-.nWu]ZSlMv2L<O,0f c5[LUU2pjWO0Y|wZ@.Zx9_n~?s@5<Gr/;Ru7');
define('NONCE_KEY',        'KG5;,[`tm2+L~v:k3F4ueW[:@w>=72TbFi|;7&gDwa%;?VFmHooACzicz0|g&N++');
define('AUTH_SALT',        'xq-I/w0,X@,:*f:+?E@>a$$Z!Zz|o-)=CESWk+B/t7THM2Wts0VtBUjlM<>JY*4q');
define('SECURE_AUTH_SALT', 'mL*Z8A+(*!e|&u9One{;N1^-9*PhAJHG%U/iSO~,j+@[fNl?C%Zc+-(-fIsDzgrW');
define('LOGGED_IN_SALT',   '0nL*Y5@+Cuq#tV4xP2{-mG-mBCI&h^dGMy`{M7?pO~&H=ke3pJ`9ujf9CX;rga7n');
define('NONCE_SALT',       'rDnssL?IF%aT^-|qRb)bRo5tKktk-94osV1kpN8*xJc@?P:XZjlL%`XOaGKn%#P3');

/**#@-*/

/**
 * Prefixo da tabela do banco de dados do WordPress.
 *
 * Você pode ter várias instalações em um único banco de dados se você der para cada um um único
 * prefixo. Somente números, letras e sublinhados!
 */
$table_prefix  = 'wp_';

/**
 * O idioma localizado do WordPress é o inglês por padrão.
 *
 * Altere esta definição para localizar o WordPress. Um arquivo MO correspondente ao
 * idioma escolhido deve ser instalado em wp-content/languages. Por exemplo, instale
 * pt_BR.mo em wp-content/languages e altere WPLANG para 'pt_BR' para habilitar o suporte
 * ao português do Brasil.
 */
define('WPLANG', '');

/**
 * Para desenvolvedores: Modo debugging WordPress.
 *
 * altere isto para true para ativar a exibição de avisos durante o desenvolvimento.
 * é altamente recomendável que os desenvolvedores de plugins e temas usem o WP_DEBUG
 * em seus ambientes de desenvolvimento.
 */
define('WP_DEBUG', false);

/* Isto é tudo, pode parar de editar! :) */

/** Caminho absoluto para o diretório WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');
	
/** Configura as variáveis do WordPress e arquivos inclusos. */
require_once(ABSPATH . 'wp-settings.php');
