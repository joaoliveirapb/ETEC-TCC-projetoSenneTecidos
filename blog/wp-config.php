<?php
/**
 * As configurações básicas do WordPress
 *
 * O script de criação wp-config.php usa esse arquivo durante a instalação.
 * Você não precisa usar o site, você pode copiar este arquivo
 * para "wp-config.php" e preencher os valores.
 *
 * Este arquivo contém as seguintes configurações:
 *
 * * Configurações do MySQL
 * * Chaves secretas
 * * Prefixo do banco de dados
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Configurações do MySQL - Você pode pegar estas informações com o serviço de hospedagem ** //
/** O nome do banco de dados do WordPress */
define( 'DB_NAME', 'wordpress' );

/** Usuário do banco de dados MySQL */
define( 'DB_USER', 'root' );

/** Senha do banco de dados MySQL */
define( 'DB_PASSWORD', '' );

/** Nome do host do MySQL */
define( 'DB_HOST', 'localhost' );

/** Charset do banco de dados a ser usado na criação das tabelas. */
define( 'DB_CHARSET', 'utf8mb4' );

/** O tipo de Collate do banco de dados. Não altere isso se tiver dúvidas. */
define( 'DB_COLLATE', '' );

/**#@+
 * Chaves únicas de autenticação e salts.
 *
 * Altere cada chave para um frase única!
 * Você pode gerá-las
 * usando o {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org
 * secret-key service}
 * Você pode alterá-las a qualquer momento para invalidar quaisquer
 * cookies existentes. Isto irá forçar todos os
 * usuários a fazerem login novamente.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         '(A=p+m^og=km:>LOrtaUtR5BA#F`eWaPLbhNmUiJ(J&q]?!t=AUZvF^0~ii{B;lc' );
define( 'SECURE_AUTH_KEY',  '|&*4Z<rdKl4yx}2.*$JIWL Z`CGTnE_N >#j2%.X+_m;Lu1:f+v+Z<1+&i/kjI^J' );
define( 'LOGGED_IN_KEY',    'v#h7^){1qIGi~}:h5TR3rxr,BQMtl]Y{b`juS?<N:Z(b$`p-Fm-[7{U%,OfaAv`.' );
define( 'NONCE_KEY',        '?3J$qxf~NQ`!~{a~~haUG{aoi+Ad:k{fv&u8X~TUK+:j6+D76~f`5]tY3ml<=Fz$' );
define( 'AUTH_SALT',        '/na+rUbdKZj_eN{Y*I8=n&qlw:] 6pwGa2fb`PZY-]7<|k! gX!6pbF?~9IsyY:A' );
define( 'SECURE_AUTH_SALT', '*Z6LhX~RQjbk0[R#wb. 9m&9QlBYl*KKUTvJ-mb(HXcQ8eEjg4erSn>Z%CT=3mKd' );
define( 'LOGGED_IN_SALT',   '*:3e4aRqJPe2L$=^,OK99:[aT47.@2HqO9T1T#q!#dW8S :^Fp@;Qghi.p?UTVt`' );
define( 'NONCE_SALT',       'WjxlpUKM/eWQY*KecdX^q;)%,yL80T-]dizaG?sngTRAD>n;>b^9BOc+rr2fME.[' );

/**#@-*/

/**
 * Prefixo da tabela do banco de dados do WordPress.
 *
 * Você pode ter várias instalações em um único banco de dados se você der
 * um prefixo único para cada um. Somente números, letras e sublinhados!
 */
$table_prefix = 'wp_';

/**
 * Para desenvolvedores: Modo de debug do WordPress.
 *
 * Altere isto para true para ativar a exibição de avisos
 * durante o desenvolvimento. É altamente recomendável que os
 * desenvolvedores de plugins e temas usem o WP_DEBUG
 * em seus ambientes de desenvolvimento.
 *
 * Para informações sobre outras constantes que podem ser utilizadas
 * para depuração, visite o Codex.
 *
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* Isto é tudo, pode parar de editar! :) */

/** Caminho absoluto para o diretório WordPress. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Configura as variáveis e arquivos do WordPress. */
require_once ABSPATH . 'wp-settings.php';
