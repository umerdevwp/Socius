<script>
	$(document).ready(function() {
	/* *********************
 	* COOKIES
 	******************** */
	$.urlParam = function( name ) {
		var results = new RegExp('[\\?&]' + name + '=([^&#]*)').exec(window.location.href);
		if (results==null){
			return null;
		}
		else {
			return results[1] || 0;
		}
	}

	if( $.urlParam( 'source' ) ) {
		$.cookie( "source" , $.urlParam( 'source' ), {path: "/", domain: "", expires: 30});
	}
		var cookieSrc = $.cookie("source");
		if( cookieSrc ) {
			if( $('.ppc-source').length ) {
				$('.ppc-source').val( cookieSrc );
			}
		}
	});
</script>