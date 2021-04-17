( function( $, window, document, undefined ) {
	'use strict';

	const forminator_number_format = {

		run : function( event, form_id ) {
			var _form = '#forminator-module-'+ form_id,
				_form_el = $(_form);
			if( 0 === _form_el.length ) return;

			// Custom Phone Format = xxx-xxx-xxxx
			let _phones = _form_el.find('.phone .forminator-input');
			if( _phones.length ){
				_phones.each( function(){
					let _id = _form + ' #'+ $(this).attr('id');
					 new Cleave( _id, {
							// prefix: '+',
					    delimiters: ['-', '-'],
					    blocks: [3, 3, 3 ],
					    uppercase: true
					});
				});
			}
			
			// Custom Number Format = x,xxx,xxx
			let _numbers = _form_el.find('.number .forminator-input');
			if( _numbers.length ){
				_numbers.each(function(){
					let _id = _form + ' #'+ $(this).attr('id');
					new Cleave( _id, {
					  numeral: true,
						numeralThousandsGroupStyle: 'thousand'
					});
				});
			}
			// Format = xxx,xxx,xxx....
			let _currencies = _form_el.find('.currency .forminator-input');
			if( _currencies.length ){
				_currencies.each(function(){
					let _id = _form + ' #'+ $(this).attr('id');		
					var cleave_currency = new Cleave( _id, {
						prefix: '$',
						numeral: true,
						numeralThousandsGroupStyle: 'thousand'
					});	
				});
			}

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
		$('.forminator-custom-form').each(function(){
			forminator_number_format.run(null, $(this).data('form-id'));
		});
	} );

}( jQuery, window, document ) );
