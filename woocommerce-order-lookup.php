<?php
/* 
Plugin Name: WooCommerce Order Lookup Dashboard Widget
Description: Look up a WooCommerce order in an admin dashboard widget. A big time saver.
Version: 0.1
Author: Jake Peterson
Author URI: https://jake101.com
Text Domain: woocommerce-order-lookup
*/
function woo_order_lookup_dashboard_widget() { ?>

  <div class="form-field form-field-wide">
    <input type="test" style="width:100%;margin-bottom:8px;" class="form-control" id="woolookup" placeholder="Enter an Order Number">
  </div>
  <button id="openorder" type="submit" class="button button-primary">Open Order</button>
<script>

jQuery( "#openorder" ).click(function() {
    var ordernum = jQuery("#woolookup").val();
    window.open(
       '<?php echo admin_url() ?>post.php?post='+ ordernum +'&action=edit',
  '_blank' // <- This is what makes it open in a new window.
);
});

jQuery(document).on('keypress',function(e) {
    var ordernum = jQuery("#woolookup").val();
    if (ordernum.length > 3) {
        if(e.which == 13) {
            window.open(
              '<?php echo admin_url() ?>post.php?post='+ ordernum +'&action=edit',
  '_blank' // <- This is what makes it open in a new window.
);
    }
    }

});
</script>
    <?php };
    function add_woo_order_lookup_dashboard_widget() {
      wp_add_dashboard_widget( 'woo_order_lookup_dashboard_widget', __( 'Look Up a WooCommerce Order Number' ), 'woo_order_lookup_dashboard_widget' );
    }
    add_action('wp_dashboard_setup', 'add_woo_order_lookup_dashboard_widget' );


?>