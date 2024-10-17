<?php

/**
 * Description tab
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.0.0
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

global $post;

$heading = 'Доставка и оплата';

?>

<?php if ($heading) : ?>
    <h2><?php echo $heading; ?></h2>
<?php endif; ?>

<?php
$content = get_field('tab_shipping', 'options');
echo $content;
?>