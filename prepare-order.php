<?php



function getOrder() {
	$order = array(
		'intent' => 'CAPTURE',
		'application_context' => array(
			'return_url' => 'http://xanatarot.local/paypal-funciona/capture-order.php',
	    'cancel_url' => 'http://xanatarot.local/paypal-funciona/capture-order.php',
	    'brand_name' => 'XANATAROT',
	    'locale' => 'es-ES',
	    'landing_page' => 'BILLING',
	    'shipping_preferences' => 'SET_PROVIDED_ADDRESS',
	    'user_action' => 'PAY_NOW',
		),
		'purchase_units' => array(
			0 => array(
				'reference_id' => 'LT30M',
	      'description' => 'Lectura tarot',
	      'custom_id' => 'xantarot',
	      'soft_descriptor' => 'HighTarot',
	      'amount' => array(
	      	'currency_code' => 'EUR',
					'value' => '13.00',
	        'breakdown' => array(
	        	'item_total' => array(
	  					'currency_code' => 'EUR',
	  					'value' => '8.00',
						),
						'shipping' => array(
	            'currency_code' => 'EUR',
	            'value' => '2.00',
	          ),
	          'handling' => array(
	            'currency_code' => 'EUR',
	            'value' => '2.00',
	          ),
	          'tax_total' => array(
	            'currency_code' => 'EUR',
	            'value' => '1.00',
	          ),
	          'shipping_discount' => array(
	            'currency_code' => 'EUR',
	            'value' => '00.00',
	          ),
	        ),
	      ),
	      'items' => array(
					0 => array(
	          'name' => 'T-Shirt',
	          'description' => 'Green XL',
	          'sku' => 'sku01',
	          'unit_amount' => array(
	            'currency_code' => 'EUR',
	            'value' => '8.00',
	          ),
	          'tax' =>	array(
	          	'currency_code' => 'EUR',
	            'value' => '1.00',
	          ),
	          'quantity' => '1',
	          'category' => 'PHYSICAL_GOODS',
	        ),
	      ),
	      'shipping' => array(
	      	'method' => 'Seur',
	      	'name' => array(
	          'full_name' => 'John Doex',
	        ),
	        'address' =>	array(
	          'address_line_1' => 'avd de la cruz',
	          'address_line_2' => 'Planta 1',
	          'admin_area_2' => 'Museros vlc',
	          'admin_area_1' => 'CA',
	          'postal_code' => '94107',
	          'country_code' => 'ES',
	        ),
	      ),
			),
		),
	);
	return json_encode($order);	
}
