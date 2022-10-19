$(document).ready(function() {
	var table = $('#tabela').DataTable( {
		responsive: true,
		initComplete: function() {
            var api = this.api();
            var info = api.page.info();
        
            api.page(info.pages - 1).draw(false);
          }
	} );

	new $.fn.dataTable.FixedHeader( table );
} );
