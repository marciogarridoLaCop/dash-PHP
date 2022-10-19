$(document).ready(function() {
    var table = $('#tabela').DataTable( {
        responsive: true
    } );
     new $.fn.dataTable.FixedHeader( table );
} );