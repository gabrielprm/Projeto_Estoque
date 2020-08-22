$(document).ready(function () {
    /*
        INSTANCIA DA SIDEBAR QUE CHAMA O MENU LATERAL:
        1-TRANSIÇÃO PRIMEIRO.
        2-TRAVA SCROLL FORA DO MENU.
        3-SELECIONA O EVENT DO MENU.
    */
    $('.ui.sidebar')
        .first().sidebar('setting', 'transition', 'slide along')
            .sidebar('setting', 'scrollLock', true)
            .sidebar('attach events', '.ui .item.mobileMenu');

    /*
    |-----------------------------------------------------|
    |  INSTANCIA QUE CHAMA O PLUGIN DATATABLE,            |
    |  SERÁ CHAMADO SOMENTE NAS PAGINAS QUE FIZEREM USO,  |
    |  NÃO USAR AGORA!!!                                  |
    |-----------------------------------------------------|
    */
    $('.ui.table').DataTable( {
        "language": {
            "sEmptyTable": "Nenhum registro encontrado",
            "sInfo": "Mostrando de _START_ até _END_ de _TOTAL_ registros",
            "sInfoEmpty": "Mostrando 0 até 0 de 0 registros",
            "sInfoFiltered": "(Filtrados de _MAX_ registros)",
            "sInfoPostFix": "",
            "sInfoThousands": ".",
            "sLengthMenu": "_MENU_ resultados por página",
            "sLoadingRecords": "Carregando...",
            "sProcessing": "Processando...",
            "sZeroRecords": "Nenhum registro encontrado",
            "sSearch": "Pesquisar",
            "oPaginate": {
                "sNext": "Próximo",
                "sPrevious": "Anterior",
                "sFirst": "Primeiro",
                "sLast": "Último"
            },
            "oAria": {
                "sSortAscending": ": Ordenar colunas de forma ascendente",
                "sSortDescending": ": Ordenar colunas de forma descendente"
            },
            "select": {
                "rows": {
                    "_": "Selecionado %d linhas",
                    "0": "Nenhuma linha selecionada",
                    "1": "Selecionado 1 linha"
                }
            },
            "buttons": {
                "copy": "Copiar para a área de transferência",
                "copyTitle": "Cópia bem sucedida",
                "copySuccess": {
                    "1": "Uma linha copiada com sucesso",
                    "_": "%d linhas copiadas com sucesso"
                }
            }
        },
        "ordering": false,
        responsive: {
            details: {
                display: $.fn.dataTable.Responsive.display.modal( {
                    header: function ( row ) {
                        var data = row.data();
                        return 'Detalhes de '+data[0]+' - '+data[1];
                    }
                } ),
                renderer: $.fn.dataTable.Responsive.renderer.tableAll( {
                    tableClass: 'ui table'
                } )
            }
        },
        dom: 
            "<'ui container grid'"+
                "<'row'"+
                    "<'sixteen wide column'B>"+
                ">"+
                "<'row stackable'"+
                    "<'eight wide column'l>"+
                    "<'eight wide right aligned column'f>"+
                ">"+
                "<'row dt-table'"+
                    "<'sixteen wide column'tr>"+
                ">"+
                "<'row stackable'"+
                    "<'eight wide column'i>"+
                    "<'eight wide right aligned column'p>"+
                ">"+
            ">",
        buttons: [
            'excel', 'pdf'
        ]
    });
});