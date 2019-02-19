function dvppl_css_font_size( control, selector ) {

	wp.customize( control, function( value ) {
		value.bind( function( size ) {

			if ( size ) {

				control = control.replace( '[', '-' );
				control = control.replace( ']', '' );
				jQuery( 'style#' + control ).remove();

				var fontSize = 'font-size: ' + size + 'px';

				// Concat and append new <style>.
				jQuery( 'head' ).append(
					'<style id="' + control + '">'
					+ selector + '	{ ' + fontSize + ' !important }'
					+ '</style>'
				);

			} else {

				jQuery( 'style#' + control ).remove();
			}

		} );
	} );
}

dvppl_css_font_size('dvppl_h1_font_size', 'h1');
dvppl_css_font_size('dvppl_h2_font_size', 'h2');
dvppl_css_font_size('dvppl_h3_font_size', 'h3');
dvppl_css_font_size('dvppl_h4_font_size', 'h4');
dvppl_css_font_size('dvppl_h5_font_size', 'h5');
dvppl_css_font_size('dvppl_h6_font_size', 'h6');

function dvppl_css_line_height( control, selector ) {

	wp.customize( control, function( value ) {
		value.bind( function( height ) {

			if ( height ) {

				control = control.replace( '[', '-' );
				control = control.replace( ']', '' );
				jQuery( 'style#' + control ).remove();

				var lineHeight = 'line-height: ' + height + 'em';

				// Concat and append new <style>.
				jQuery( 'head' ).append(
					'<style id="' + control + '">'
					+ selector + '	{ ' + lineHeight + ' !important }'
					+ '</style>'
				);

			} else {

				jQuery( 'style#' + control ).remove();
			}

		} );
	} );
}

dvppl_css_line_height( 'dvppl_h1_line_height', 'h1' );
dvppl_css_line_height( 'dvppl_h2_line_height', 'h2' );
dvppl_css_line_height( 'dvppl_h3_line_height', 'h3' );
dvppl_css_line_height( 'dvppl_h4_line_height', 'h4' );
dvppl_css_line_height( 'dvppl_h5_line_height', 'h5' );
dvppl_css_line_height( 'dvppl_h6_line_height', 'h6' );

function dvppl_css_text_spacing( control, selector ) {
	
	wp.customize( control, function( value ) {
		value.bind( function( spacing ) {

			if ( spacing ) {

				control = control.replace( '[', '-' );
				control = control.replace( ']', '' );
				jQuery( 'style#' + control ).remove();

				var lineHeight = 'letter-spacing: ' + spacing + 'px';

				// Concat and append new <style>.
				jQuery( 'head' ).append(
					'<style id="' + control + '">'
					+ selector + '	{ ' + lineHeight + ' !important }'
					+ '</style>'
				);

			} else {

				jQuery( 'style#' + control ).remove();
			}

		} );
	} );
}

dvppl_css_text_spacing( 'dvppl_h1_spacing', 'h1' );
dvppl_css_text_spacing( 'dvppl_h2_spacing', 'h2' );
dvppl_css_text_spacing( 'dvppl_h3_spacing', 'h3' );
dvppl_css_text_spacing( 'dvppl_h4_spacing', 'h4' );
dvppl_css_text_spacing( 'dvppl_h5_spacing', 'h5' );
dvppl_css_text_spacing( 'dvppl_h6_spacing', 'h6' );

function dvppl_css_font_styles( control, selector ) {
	
	wp.customize( control, function( value ) {

		value.bind( function( styles ) {

			if  (styles ) {

				control = control.replace( '[', '-' );
				control = control.replace( ']', '' );

				jQuery( 'style#' + control ).remove();

				var  font_styles = dvppl_set_font_styles( styles );

				// Concat and append new <style>.
				jQuery( 'head' ).append(
					'<style id="' + control + '">'
					+ selector + '	{ ' + font_styles + '}'
					+ '</style>'
				);

			} else {

				jQuery( 'style#' + control ).remove();
			}

		} );
	} );
}

dvppl_css_font_styles( 'dvppl_h1_style', 'h1' );
dvppl_css_font_styles( 'dvppl_h2_style', 'h2' );
dvppl_css_font_styles( 'dvppl_h3_style', 'h3' );
dvppl_css_font_styles( 'dvppl_h4_style', 'h4' );
dvppl_css_font_styles( 'dvppl_h5_style', 'h5' );
dvppl_css_font_styles( 'dvppl_h6_style', 'h6' );

function dvppl_set_font_styles( value ) {
		var font_styles = value.split( '|' ),
			style = '';

		if ( $.inArray( 'bold', font_styles ) >= 0 ) {
			style += 'font-weight: bold !important;';
		} else {
			style += 'font-weight: inherit !important;';
		}

		if ( $.inArray( 'italic', font_styles ) >= 0 ) {
			style += 'font-style: italic !important;';
		} else {
			style += 'font-style: inherit !important;';
		}

		if ( $.inArray( 'underline', font_styles ) >= 0 ) {
			style += 'text-decoration: underline !important;';
		} else {
			style += 'text-decoration: inherit !important;';
		}

		if ( $.inArray( 'uppercase', font_styles ) >= 0 ) {
			style += 'text-transform: uppercase !important;';
		} else {
			style += 'text-transform: inherit !important;';
		}

		return style;
}

function dvppl_css_font_weight( control, selector ) {
	
	wp.customize( control, function( value ) {
		value.bind( function( weight ) {

			if ( weight ) {

				control = control.replace( '[', '-' );
				control = control.replace( ']', '' );
				jQuery( 'style#' + control ).remove();

				var fontWeight = 'font-weight: ' + weight;

				// Concat and append new <style>.
				jQuery( 'head' ).append(
					'<style id="' + control + '">'
					+ selector + '	{ ' + fontWeight + ' !important }'
					+ '</style>'
				);

			} else {

				jQuery( 'style#' + control ).remove();
			}

		} );
	} );
}

dvppl_css_font_weight( 'dvppl_h1_weight', 'h1' );
dvppl_css_font_weight( 'dvppl_h2_weight', 'h2' );
dvppl_css_font_weight( 'dvppl_h3_weight', 'h3' );
dvppl_css_font_weight( 'dvppl_h4_weight', 'h4' );
dvppl_css_font_weight( 'dvppl_h5_weight', 'h5' );
dvppl_css_font_weight( 'dvppl_h6_weight', 'h6' );

function dvppl_css_heading_color( control, selector ) {
	
	wp.customize( control, function( value ) {
		value.bind( function( color ) {

			if ( color ) {

				control = control.replace( '[', '-' );
				control = control.replace( ']', '' );
				jQuery( 'style#' + control ).remove();

				var textColor = 'color: ' + color;

				// Concat and append new <style>.
				jQuery( 'head' ).append(
					'<style id="' + control + '">'
					+ selector + '	{ ' + textColor + ' !important }'
					+ '</style>'
				);

			} else {

				jQuery( 'style#' + control ).remove();
			}

		} );
	} );
}

dvppl_css_heading_color( 'dvppl_h1_color', 'h1' );
dvppl_css_heading_color( 'dvppl_h2_color', 'h2' );
dvppl_css_heading_color( 'dvppl_h3_color', 'h3' );
dvppl_css_heading_color( 'dvppl_h4_color', 'h4' );
dvppl_css_heading_color( 'dvppl_h5_color', 'h5' );
dvppl_css_heading_color( 'dvppl_h6_color', 'h6' );