$(document).ready(function() {
    $('#tabela').DataTable( {
        dom: 'Bfrtip',
        buttons: [
          
                'copy', 'csv', 'excel', 'pdf', 'print'
            
        ],
        "oLanguage": {
            "sLengthMenu": "Mostrando _MENU_ registros",
            "sZeroRecords": "Nenhum registro encontrado",
            "sInfo": "Mostrando _START_ / _END_ de _TOTAL_ registro(s)",
            "sInfoEmpty": "Mostrando 0 / 0 de 0 registros",
            "sInfoFiltered": "(filtrado de _MAX_ registros)",
            "sSearch": "Pesquisar: ",
            "oPaginate": {
                "sFirst": "Início",
                "sPrevious": "Anterior",
                "sNext": "Próximo",
                "sLast": "Último"
            }
        }
    });
} );