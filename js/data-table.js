$(document).ready(function () {
    $('#sidebarCollapse').on('click', function () {
        $('#sidebar').toggleClass('active');
    });
});

$(document).ready( function () {
    $('#table_id').DataTable({
        //"info" : false,
        "language" : {
            "lengthMenu": "Mostrando _MENU_ registros por página",
            "zeroRecords": "Nenhum produto cadastrado no sistema.",
            "info": "Mostrando página _PAGE_ de _PAGES_",
            "infoEmpty": "Nenhum produto cadastrado no sistema.",
            "search": "Buscar:",
            "paginate": {
                "first": "Primeiro",
                "last": "Último",
                "next": ">",
                "previous": "<"
            }
        }
    });
} );