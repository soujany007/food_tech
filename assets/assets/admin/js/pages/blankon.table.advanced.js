'use strict';
var BlankonTableAdvanced = function () {

    // =========================================================================
    // SETTINGS APP
    // =========================================================================
    var getBaseURL = BlankonApp.handleBaseURL();

    return {

        // =========================================================================
        // CONSTRUCTOR APP
        // =========================================================================
        init: function (tableId,data_url,last_column_pos) {
            //BlankonTableAdvanced.callModal();
            BlankonTableAdvanced.handleDatatable(tableId,data_url,last_column_pos);
            //BlankonTableAdvanced.handleAJAXSimulation();
            BlankonTableAdvanced.handleDatatableColors(tableId);
        },

        // =========================================================================
        // CALL MODAL FIRST
        // =========================================================================
        callModal: function () {
            $('#modal-feature-datatable').modal(
                {
                    show: true,
                    keyboard: false
                }
            );
        },

        // =========================================================================
        // DATATABLE INIT
        // =========================================================================
        handleDatatable: function (tableId,data_url,last_column_pos) {
            //Updates "Select all" control in a data table
            function updateDataTableSelectAllCtrl(table){
                var $table             = table.table().node();
                var $chkbox_all        = $('tbody input[type="checkbox"]', $table);
                var $chkbox_checked    = $('tbody input[type="checkbox"]:checked', $table);
                var chkbox_select_all  = $('thead input[name="select_all"]', $table).get(0);

                // If none of the checkboxes are checked
                if($chkbox_checked.length === 0){
                    chkbox_select_all.checked = false;
                    if('indeterminate' in chkbox_select_all){
                        chkbox_select_all.indeterminate = false;
                    }

                    // If all of the checkboxes are checked
                } else if ($chkbox_checked.length === $chkbox_all.length){
                    chkbox_select_all.checked = true;
                    if('indeterminate' in chkbox_select_all){
                        chkbox_select_all.indeterminate = false;
                    }

                    // If some of the checkboxes are checked
                } else {
                    chkbox_select_all.checked = true;
                    if('indeterminate' in chkbox_select_all){
                        chkbox_select_all.indeterminate = true;
                    }
                }
            }

            // Array holding selected row IDs
            var rows_selected = [];

            var responsiveHelper;
            var breakpointDefinition = {
                tablet: 1024,
                phone_landscape : 480,
                phone_portrait : 320
            };
            var tableID = $('#'+tableId);
            var table = $('#'+tableId).DataTable({
                'ajax': {
//                    'url': getBaseURL+'/assets/admin/data/table-advanced/datatable-sample.json'
                        'url': data_url
                },
                'columnDefs': [
//                    {
//                        'targets': 0,
//                        'searchable': false,
//                        'orderable': false,
//                        'className': 'dt-body-center',
//                        'render': function (data, type, full, meta){
//                            return '<div class="ckbox ckbox-primary">' +
//                                '<input id="checkbox-item-'+data+'" type="checkbox" name="select_all" value="1" class="display-hide">' +
//                                '<label for="checkbox-item-'+data+'"></label>' +
//                                '</div>';
//                        }
//                    },
                    {
                        'targets': [0,last_column_pos],
                        'sortable': false
                    },
                    {
                        'targets': last_column_pos,
                        'class': 'text-center',
//                        'render': function ( data, type, full, meta ) {
//                            console.log(meta);
//                            return '<div class="btn-group">' +
//                                '<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">' +
//                                '<i class="fa fa-cogs"></i>' +
//                                '</button>' +
//                                '<ul class="dropdown-menu pull-right">' +
//                                '<li>' +
//                                '<a href="#" class="btn-view">View</a>' +
//                                '</li>' +
//                                '<li><a href="#" class="btn-edit">Edit</a></li>' +
//                                '<li role="separator" class="divider"></li>' +
//                                '<li><a href="#" class="btn-delete">Delete</a></li>' +
//                                '</ul>' +
//                                '</div>'
//                        }
                    }
                ],
                'order': [[1, 'asc']],
                'autoWidth' : false,
                'iDisplayLength': 10,
                'lengthMenu': [[5, 10, 25, 50, 100, -1], [5, 10, 25, 50, 100, "All"]],
                'select': true,
                'dom': 'Blfrtip',
                buttons: [
                    {
                        extend: 'collection',
                        text: 'Export',
                        buttons: [
                            {
                                extend: 'copy',
                                exportOptions: {
                                    //columns: [1,2,3,4,5,6]
                                }
                            },
                            {
                                extend: 'excel',
                                exportOptions: {
                                    //columns: [1,2,3,4,5,6]
                                }
                            },
                            {
                                extend: 'csv',
                                exportOptions: {
                                   // columns: [1,2,3,4,5,6]
                                }
                            },
                            {
                                extend: 'pdf',
                                exportOptions: {
                                   // columns: [1,2,3,4,5,6]
                                }
                            },
                            {
                                extend: 'print',
                                exportOptions: {
                                    //columns: [1,2,3,4,5,6]
                                }
                            }
                        ]
                    }
                ],
                'pagingType': 'full_numbers',
                'deferRender':true,
                'preDrawCallback': function () {
                    // Initialize the responsive datatables helper once.
                    if (!responsiveHelper) {
                        responsiveHelper = new ResponsiveDatatablesHelper(tableID, breakpointDefinition);
                    }
                },
                'rowCallback' : function (nRow, row, data, dataIndex) {
                    // Get row ID
                    var rowId = data[0];

                    // If row ID is in the list of selected row IDs
                    if($.inArray(rowId, rows_selected) !== -1){
                        $(row).find('input[type="checkbox"]').prop('checked', true);
                        $(row).addClass('selected');
                    }

                    responsiveHelper.createExpandIcon(nRow);
                },
                'drawCallback' : function(oSettings) {
                    responsiveHelper.respond();
                    // call dropdown bootstrap
                    $('body .dropdown-toggle').dropdown();
                    // call actions on last column datatable
                    BlankonTableAdvanced.handleActionViewDatatable(tableId);
                    BlankonTableAdvanced.handleActionEditDatatable();
                    BlankonTableAdvanced.handleActionDeleteDatatable();
                }
            });

            // Change language dinamically
            $('.change-language').on('click', function () {

                // Change state language
                $('.text-language').text($(this).data('title'));

                table.destroy();
                table = null;

                var tableLanguage = BlankonTableAdvanced.handleNotificationDatatable('Table language '+$(this).data('title'));

                var rows_selected = [];

                var responsiveHelper;
                var breakpointDefinition = {
                    tablet: 1024,
                    phone_landscape : 480,
                    phone_portrait : 320
                };
                var tableID = $('#'+tableId);
                table = $('#'+tableId).DataTable( {
                    'language': {
                        'url': getBaseURL+'/assets/assets/global/plugins/bower_components/datatables/i18n/'+$(this).data('language')+'.json'
                    },
                    'ajax': {
                        'url': data_url
                    },
                    'columnDefs': [
                        {
                            'targets': 0,
                            'searchable': false,
                            'orderable': false,
                            'className': 'dt-body-center',
//                            'render': function (data, type, full, meta){
//                                return '<div class="ckbox ckbox-primary">' +
//                                    '<input id="checkbox-item-'+data+'" type="checkbox" name="select_all" value="1" class="display-hide">' +
//                                    '<label for="checkbox-item-'+data+'"></label>' +
//                                    '</div>';
//                            }
                        },
                        {
                            'targets': [0,last_column_pos],
                            'sortable': false
                        },
                        {
                            'targets': last_column_pos,
                            'class': 'text-center',
//                            'render': function ( data, type, full, meta ) {
//                                return '<div class="btn-group">' +
//                                    '<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">' +
//                                    '<i class="fa fa-cogs"></i>' +
//                                    '</button>' +
//                                    '<ul class="dropdown-menu pull-right">' +
//                                    '<li>' +
//                                    '<a href="#" class="btn-view">View</a>' +
//                                    '</li>' +
//                                    '<li><a href="#" class="btn-edit">Edit</a></li>' +
//                                    '<li role="separator" class="divider"></li>' +
//                                    '<li><a href="#" class="btn-delete">Delete</a></li>' +
//                                    '</ul>' +
//                                    '</div>'
//                            }
                        }
                    ],
                    'order': [[1, 'asc']],
                    'autoWidth' : false,
                    'iDisplayLength': 10,
                    'lengthMenu': [[5, 10, 25, 50, 100, -1], [5, 10, 25, 50, 100, "All"]],
                    'select': true,
                    'dom': 'Blfrtip',
                    buttons: [
                        {
                            extend: 'collection',
                            text: 'Export',
                            buttons: [
                                {
                                    extend: 'copy',
                                    exportOptions: {
                                        //columns: [1,2,3,4,5,6]
                                    }
                                },
                                {
                                    extend: 'excel',
                                    exportOptions: {
                                        //columns: [1,2,3,4,5,6]
                                    }
                                },
                                {
                                    extend: 'csv',
                                    exportOptions: {
                                        //columns: [1,2,3,4,5,6]
                                    }
                                },
                                {
                                    extend: 'pdf',
                                    exportOptions: {
                                        //columns: [1,2,3,4,5,6]
                                    }
                                },
                                {
                                    extend: 'print',
                                    exportOptions: {
                                        //columns: [1,2,3,4,5,6]
                                    }
                                }
                            ]
                        }
                    ],
                    'pagingType': 'full_numbers_no_ellipses',
                    'preDrawCallback': function () {
                        // Initialize the responsive datatables helper once.
                        if (!responsiveHelper) {
                            responsiveHelper = new ResponsiveDatatablesHelper(tableID, breakpointDefinition);
                        }
                    },
                    'rowCallback' : function (nRow, row, data, dataIndex) {
                        // Get row ID
                        var rowId = data[0];

                        // If row ID is in the list of selected row IDs
                        if($.inArray(rowId, rows_selected) !== -1){
                            $(row).find('input[type="checkbox"]').prop('checked', true);
                            $(row).addClass('selected');
                        }

                        responsiveHelper.createExpandIcon(nRow);
                    },
                    'drawCallback' : function(oSettings) {
                        responsiveHelper.respond();
                        // call dropdown bootstrap
                        $('body .dropdown-toggle').dropdown();
                        // call actions on last column datatable
                        BlankonTableAdvanced.handleActionViewDatatable();
                        BlankonTableAdvanced.handleActionEditDatatable();
                        BlankonTableAdvanced.handleActionDeleteDatatable();
                        // Call notifications
                        tableLanguage;
                    }
                } );
            });

            // Toggle column
            $('a.toggle-column').on( 'click', function (e) {
                e.preventDefault();

                // Change state
                $(this).parents('li').toggleClass('selected');

                // Get the column API object
                var column = table.column( $(this).attr('data-column') );

                // Toggle the visibility
                column.visible( ! column.visible() );

                // Call notifications
                BlankonTableAdvanced.handleNotificationDatatable($(this).text()+' Column');

            } );

            // Handle click on checkbox
            $('#'+tableId+' tbody').on('click', '.ckbox, input[type="checkbox"]', function(e){
                var $row = $(this).closest('tr');

                // Get row data
                var data = table.row($row).data();

                // Get row ID
                var rowId = data[0];

                // Determine whether row ID is in the list of selected row IDs
                var index = $.inArray(rowId, rows_selected);

                // If checkbox is checked and row ID is not in list of selected row IDs
                if(this.checked && index === -1){
                    rows_selected.push(rowId);

                    // Otherwise, if checkbox is not checked and row ID is in list of selected row IDs
                } else if (!this.checked && index !== -1){
                    rows_selected.splice(index, 1);
                }

                if(this.checked){
                    $row.addClass('selected');
                } else {
                    $row.removeClass('selected');
                }

                // Update state of "Select all" control
                updateDataTableSelectAllCtrl(table);

                // Prevent click event from propagating to parent
                e.stopPropagation();
            });

            // Handle click on table cells with checkboxes
//            $('#'+tableId).on('click', 'tbody td', function(e){
//                if($(this).is(':last-child')){
//                    return false;
//                }else{
//                    $(this).parent().find('input[type="checkbox"]').trigger('click');
//                }
//            });

            // Handle click on "Select all" control
            $('#'+tableId+' thead input[name="select_all"]').on('click', function(e){
                if(this.checked){
                    $('#'+tableId+' tbody input[type="checkbox"]:not(:checked)').trigger('click');
                } else {
                    $('#'+tableId+' tbody input[type="checkbox"]:checked').trigger('click');
                }

                // Prevent click event from propagating to parent
                e.stopPropagation();
            });

            // Handle table draw event
            table.on('draw', function(){
                // Update state of "Select all" control
                updateDataTableSelectAllCtrl(table);
            });

            // Handle form submission event
            $('#frm-example').on('submit', function(e){
                var form = this;

                // Iterate over all selected checkboxes
                $.each(rows_selected, function(index, rowId){
                    // Create a hidden element
                    $(form).append(
                        $('<input>')
                            .attr('type', 'hidden')
                            .attr('name', 'id[]')
                            .val(rowId)
                    );
                });

                // FOR DEMONSTRATION ONLY

                // Output form data to a console
                $('#example-console').text($(form).serialize());
                console.log("Form submission", $(form).serialize());

                // Remove added elements
                $('input[name="id\[\]"]', form).remove();

                // Prevent actual form submission
                e.preventDefault();
            });
        },

        // =========================================================================
        // DATATABLE AJAX SIMULATION USING JQUERY MOCKJAX
        // =========================================================================
        handleAJAXSimulation: function () {
            // AJAX emulation
            //fnAddData(data);
        },

        // =========================================================================
        // ACTION VIEW ROW DATATABLES
        // =========================================================================
        handleActionViewDatatable: function (tableId) {
        },

        // =========================================================================
        // ACTION EDIT ROW DATATABLES
        // =========================================================================
        handleActionEditDatatable: function () {
        },

        // =========================================================================
        // ACTION DELETE ROW DATATABLES
        // =========================================================================
        handleActionDeleteDatatable: function () {
        },

        handleNotificationDatatable: function (e) {
            // Call notification state
            var unique_id = $.gritter.add({
                // (string | mandatory) the heading of the notification
                title: e,
                // (string | mandatory) the text inside the notification
                text: 'Success changed!',
                // (string | optional) the image to display on the left
                image: BlankonApp.handleBaseURL()+'/assets/assets/global/img/icon/64/check.png',
                // (bool | optional) if you want it to fade out on its own or just sit there
                sticky: false,
                // (int | optional) the time you want it to be alive for before fading out
                time: '',
                class_name: 'gritter-position'
            });

            // You can have it return a unique id, this can be used to manually remove it later using
            setTimeout(function () {
                $.gritter.remove(unique_id, {
                    fade: true,
                    speed: 'slow'
                });
            }, 1000);
        },

        // =========================================================================
        // DATATABLE COLORS
        // =========================================================================
        handleDatatableColors: function (tableId) {
            $('.dropdown-table-colors .dropdown-list').on('click', function () {
                if($('.table-default, .table-primary, .table-danger, .table-success, .table-info, .table-warning, .table-lilac, .table-inverse').length){
                    $('.table-default, .table-primary, .table-danger, .table-success, .table-info, .table-warning, .table-lilac, .table-inverse').removeClass();
                }
                $('#'+tableId).addClass('table table-middle table-striped table-bordered table-condensed dataTable table-'+$(this).data('color'));

                // Call notifications
                BlankonTableAdvanced.handleNotificationDatatable('Table color '+$(this).data('color'));
            });
        }

    };

}();

// Call main app init
//BlankonTableAdvanced.init();


