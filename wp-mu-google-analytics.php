<?php
/**
  * Plugin Name:       WordPress Must-Use Google Analytics
  * Plugin URI:        https://github.com/FissioMedia/wp-mu-google-analytics
  * Description:       Simple Must-Use plugin for adding Google Analytics to your site. Tracking code, UA-xxxxxxxxx-x.
  * Version:           1.0.0
  * Requires at least: 1.5.0
  * Requires PHP:      5.3
  * Author:            FissioMedia
  * Author URI:        https://www.fissiomedia.fi/
  * License:           GPL v2 or later
  * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
  */

namespace FissioMedia\Plugin\Tracking\Google\Analytics;

if ( ! defined( 'ABSPATH' ) ) {
  exit;
}

function tracking_code() {
  // Don't track administrator users
  if ( current_user_can( 'manage_options' ) ) {
    return;
  }
  ?>
  <script async src="https://www.googletagmanager.com/gtag/js?id=UA-xxxxxxxxx-x"></script>
  <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());
    gtag('config', 'UA-xxxxxxxxx-x', { 'anonymize_ip': true });
  </script>
  <?php
}
add_action( 'wp_head', __NAMESPACE__ . '\\tracking_code', 99 );
