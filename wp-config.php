<?php
# Database Configuration
define( 'DB_NAME', 'wp_xm42newdev' );
define( 'DB_USER', 'xm42newdev' );
define( 'DB_PASSWORD', 'kN2_vtzaRYGtDpkhK-ms' );
define( 'DB_HOST', '127.0.0.1:3306' );
define( 'DB_HOST_SLAVE', '127.0.0.1:3306' );
define('DB_CHARSET', 'utf8');
define('DB_COLLATE', 'utf8_unicode_ci');
$table_prefix = 'wp_';

# Security Salts, Keys, Etc
define('AUTH_KEY',         '^m+o6RyEEj2/:@_k]owM8{f3J,f/J5Du*xi=HtqeH<}n-(DK.x`gVhQf1XF=DSVL');
define('SECURE_AUTH_KEY',  '4jAT@0Pgxj,=>VcQ>KD}a{GG Y6$-7CG:FO,M]+-ic|AS*<xV}qDvn*V[.x&3O8a');
define('LOGGED_IN_KEY',    '|hZ,dL/+WE*WkjG;XGK+q)aU&hj!?L)@&{H3aq41oa301GdIxwa}x9$9)h|!|ErE');
define('NONCE_KEY',        '/]ConpiJp++eVaqPD>;D&e+-`gRrJqXU1:-q s0+o~l~{J7YM{Tad25nNNica4,9');
define('AUTH_SALT',        'efi#Yl@D%]/YDr%v)s7x&+<|qWU5-THYNVLBK7Br.HY1L[M49#H$NI2z(y(,}b+E');
define('SECURE_AUTH_SALT', '<:,5<@BA)Q~d+13H]$l|+&1dgFa>x*Y`N= [[~Nn`zIQ/8.A+Pc<Bd}`Y}e&6774');
define('LOGGED_IN_SALT',   'jbP0:lpZBPaK.j@M_KppqRN,:nB>^_}Q&~L~/2?C)XZp5N{)oHt[^(.:(=W&:^WN');
define('NONCE_SALT',       'Ew!3;z49RI8jrYfScO }/x8C8iG Z=]6Mczx2@:u0C0LV]V=493<,TR;q)^2s#;Y');


# Localized Language Stuff

define( 'WP_CACHE', TRUE );

define( 'WP_AUTO_UPDATE_CORE', false );

define( 'PWP_NAME', 'xm42newdev' );

define( 'FS_METHOD', 'direct' );

define( 'FS_CHMOD_DIR', 0775 );

define( 'FS_CHMOD_FILE', 0664 );

define( 'WPE_APIKEY', '8126255df1a26d06fb3c9d0bfac1c5a56c22fc10' );

define( 'WPE_CLUSTER_ID', '140337' );

define( 'WPE_CLUSTER_TYPE', 'pod' );

define( 'WPE_ISP', true );

define( 'WPE_BPOD', false );

define( 'WPE_RO_FILESYSTEM', false );

define( 'WPE_LARGEFS_BUCKET', 'largefs.wpengine' );

define( 'WPE_SFTP_PORT', 2222 );

define( 'WPE_SFTP_ENDPOINT', '' );

define( 'WPE_LBMASTER_IP', '' );

define( 'WPE_CDN_DISABLE_ALLOWED', true );

define( 'DISALLOW_FILE_MODS', FALSE );

define( 'DISALLOW_FILE_EDIT', FALSE );

define( 'DISABLE_WP_CRON', false );

define( 'WPE_FORCE_SSL_LOGIN', false );

define( 'FORCE_SSL_LOGIN', false );

/*SSLSTART*/ if ( isset($_SERVER['HTTP_X_WPE_SSL']) && $_SERVER['HTTP_X_WPE_SSL'] ) $_SERVER['HTTPS'] = 'on'; /*SSLEND*/

define( 'WPE_EXTERNAL_URL', false );

define( 'WP_POST_REVISIONS', FALSE );

define( 'WPE_WHITELABEL', 'wpengine' );

define( 'WP_TURN_OFF_ADMIN_BAR', false );

define( 'WPE_BETA_TESTER', false );

umask(0002);

$wpe_cdn_uris=array ( );

$wpe_no_cdn_uris=array ( );

$wpe_content_regexs=array ( );

$wpe_all_domains=array ( 0 => 'xm42newdev.wpengine.com', 1 => 'xm42newdev.wpenginepowered.com', );

$wpe_varnish_servers=array ( 0 => 'pod-140337', );

$wpe_special_ips=array ( 0 => '35.231.234.75', );

$wpe_netdna_domains=array ( );

$wpe_netdna_domains_secure=array ( );

$wpe_netdna_push_domains=array ( );

$wpe_domain_mappings=array ( );

$memcached_servers=array ( 'default' =>  array ( 0 => 'unix:///tmp/memcached.sock', ), );
define('WPLANG','');

# WP Engine ID


# WP Engine Settings






# That's It. Pencils down
if ( !defined('ABSPATH') )
	define('ABSPATH', __DIR__ . '/');
require_once(ABSPATH . 'wp-settings.php');
