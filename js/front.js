( function( $, window, document, undefined ) {
	'use strict';

	const forminator_number_format = {

		run : function( event, form_id ) {
			var _form = '#forminator-module-'+ form_id,
				_form_el = $(_form);
			if( 0 === _form_el.length ) return;

			// Custom Phone Format = xxx-xxx-xxxx
			if( _form_el.find('.phone .forminator-input').length ){
				var cleave_phone = new Cleave(_form +' .phone .forminator-input', {
					prefix: '+',
				    delimiters: ['-', '-'],
				    blocks: [3, 3, 4 ],
				    uppercase: true
				});
			}
			
			// Custom Number Format = x,xxx,xxx
			if( _form_el.find('.number .forminator-input').length ){			
				var cleave_number = new Cleave(_form +' .number .forminator-input', {
					numeral: true,
					numeralThousandsGroupStyle: 'thousand'
				});
			}

			// Format = xxx,xxx,xxx....
			// if( _form_el.find('.currency .forminator-input').length ){			
				// var cleave_currency = new Cleave(_form +' .currency .forminator-input', {
				// 	prefix: '$',
				// 	numeral: true,
				// 	numeralThousandsGroupStyle: 'thousand'
				// });	
			// }

			/*
			if( _form_el.find('.credit-card .forminator-input').length ){					
				var cleave_cc = new Cleave(_form +' .credit-card .forminator-input', {
				    creditCard: true,
				    //onCreditCardTypeChanged: function (type) {
				        // update UI ...
				    //}
				});
			}
			*/

		}
	}

	$( document ).ready( function(){		
		$( document ).on( 'after.load.forminator', forminator_number_format.run );
	} );

}( jQuery, window, document ) );
