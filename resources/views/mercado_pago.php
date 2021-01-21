<?php
// SDK de Mercado Pago
// require __DIR__ .  '/vendor/autoload.php';



// Agrega credenciales
MercadoPago\SDK::setAccessToken('TEST-3259208657251687-012011-776d3f76fad5986008ff10512342639d-182897662');


// require __DIR__ .  '/vendor/autoload.php';

// Agrega credenciales
MercadoPago\SDK::setAccessToken('TEST-3259208657251687-012011-776d3f76fad5986008ff10512342639d-182897662');

// Crea un objeto de preferencia
$preference = new MercadoPago\Preference();

// Crea un ítem en la preferencia
$item = new MercadoPago\Item();
$item->title = 'Mi producto';
$item->quantity = 1;
$item->unit_price = 75.56;
$preference->items = array($item);
$preference->save();

?>   

<script
  src="https://www.mercadopago.com.ar/integrations/v1/web-payment-checkout.js"
  data-preference-id="<?php echo $preference->id; ?>">
</script>














