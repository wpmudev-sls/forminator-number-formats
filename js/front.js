( function( $, window, document, undefined ) {
	'use strict';

	const forminator_number_format = {

		run : function( event, form_id ) {

			// Custom Phone Format = xxx-xxx-xxxx
			var cleave_phone = new Cleave('.phone .forminator-input', {
			    delimiters: ['-', '-'],
			    blocks: [3, 3, 4 ],
			    uppercase: true
			});

			// Format = xxx,xxx,xxx....
			var cleave_currency = new Cleave('.currency .forminator-input', {
				numeral: true,
				numeralThousandsGroupStyle: 'thousand'
			});	

			/*			
			var cleave_cc = new Cleave('.credit-card .forminator-input', {
			    creditCard: true,
			    //onCreditCardTypeChanged: function (type) {
			        // update UI ...
			    //}
			});	
			*/

		}
	}

	$( document ).ready( function(){		
		$( document ).on( 'after.load.forminator', forminator_number_format.run );
	} );

}( jQuery, window, document ) );
