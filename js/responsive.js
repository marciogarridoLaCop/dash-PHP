$(document).ready(function() {
	var table = $('#tabela').DataTable( {
		responsive: true,
		initComplete: function() {
            var api = this.api();
            var info = api.page.info();
        
            api.page(info.pages - 1).draw(false);
          },

		  dom: 'Bfrtip',
		  buttons: [
			  'copy',
			  'csv',
			  'excel',
			  {
				  extend: 'print',
				  text: 'Print all (not just selected)',
				  exportOptions: {
					  modifier: {
						  selected: null
					  }
				  }
			  }
		  ],
		  select: true

	} );

	new $.fn.dataTable.FixedHeader( table );
} );
