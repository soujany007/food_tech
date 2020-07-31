function daterangeto()
{
    var sdate = document.getElementById("start_date").value;
    var edate = document.getElementById("end_date").value;

    if ((sdate > edate) && (sdate != '') && (edate != ''))
    {
        alert("Start date is greater than end date.");
        document.getElementById("start_date").value = '';
    }
}

function daterangefrom()
{
    var sdate = document.getElementById("start_date").value;
    var edate = document.getElementById("end_date").value;

    if ((sdate > edate) && (sdate != '') && (edate != ''))
    {
        alert("Start date is greater than end date.");
        document.getElementById("end_date").value = '';
    }
}

function updateStatusBox(id, status, title, changeStatusPath) {

    if (id != '' && title != '' && changeStatusPath != '') {
        if (status == 1) {
            var msg = 'Do You Want Deactivate This - ' + title;
        }else if (status == 2) {
            var msg = 'Do You Want Complete This - ' + title;
        } else {
            var msg = 'Do You Want Activate This - ' + title;
        }
        bootbox.dialog({
            message: msg,
            title: "Confirmation",
            className: "modal-danger",
            buttons: {
                danger: {
                    label: "No",
                    className: "btn-danger",
                    callback: function () {}
                },
                success: {
                    label: "Yes",
                    className: "btn-success",
                    callback: function () {
                        $.ajax({
                            type: "POST",
                            url: base_url + changeStatusPath,
                            cache: false,
                            data: {'id': id, 'status': status},
                            success: function () {
                               location.reload();
                            }
                        });
                    }
                }

            }
        });
    }
}

function deleteBox(id, title, deletePath) {
    if (id != '' && title != '' && deletePath != '') {
        var msg = 'Do You Want Delete This - ' + title;
        bootbox.dialog({
            message: msg,
            title: "Confirmation",
            className: "modal-danger",
            buttons: {
                danger: {
                    label: "No",
                    className: "btn-danger",
                    callback: function () {}
                },
                success: {
                    label: "Yes",
                    className: "btn-success",
                    callback: function () {
                        $.ajax({
                            type: "POST",
                            url: base_url + deletePath,
                            cache: false,
                            data: {'id': id},
                            success: function () {
                                location.reload();
                            }
                        });
                    }
                }

            }
        });
    }

}

$(document).on('change', '#country_id', function () {
    //$country_id = $("#country_id").val();
    //alert($country_id);
    $.ajax({
        type: 'POST',
        url: base_url+'state/getAllStateByCountryId',
        data: {id: $("#country_id").val(), state_id : $state_id},
        dataType: 'JSON',
        success: function (reponceData) {
            if (reponceData.code == 100) {
                $('#state_id').html(reponceData.data);
                if($state_id!=''){
                    $( "#state_id" ).trigger( "change" );
                }
            }
        }
    });
});
$(document).on('change', '#state_id', function () {
    /*if($state_id == ''){
        $state_id = $("#state_id").val();
    }*/
    $.ajax({
        type: 'POST',
        url: base_url+'city/getAllCityByStateId',
        data: {id: $("#state_id").val(), city_id : $city_id},
        dataType: 'JSON',
        success: function (reponceData) {
            if (reponceData.code == 100) {
                $('#city_id').html(reponceData.data);
                if($city_id!=''){
                    $( "#city_id" ).trigger( "change" );
                }
            }
        }
    });
});
$(document).on('change', '#city_id', function () {
    if($city_id == ''){
        $city_id = $("#city_id").val();
    }
    
    $.ajax({
        type: 'POST',
        url: base_url+'zipcode/getAllZipcodeByCityId',
        data: {id: $("#city_id").val(), zipcode_id : $zipcode_id},
        dataType: 'JSON',
        success: function (reponceData) {
            if (reponceData.data) {
                $('#zipcode_id').html(reponceData.data);
                if($zipcode_id!=''){
                    $( "#zipcode_id" ).trigger( "change" );
                }
            }
        }
    });
});
$(document).on('change','.get_territory', function(){
    $franchisor_lead_id = $(this).val();
    $.ajax({
        type : 'POST',
        url : base_url+'lead/getFranchisorLeadDataById',
        data : {franchisor_lead_id : $franchisor_lead_id, territory_id : $territory_id},
        dataType : 'JSON',
        success : function (reponceData){
            //console.log(reponceData);
            if(reponceData.code == 100){
                var data = reponceData.data;
                $('#franchisor_id').val(data.franchisor_id);
                $('#contact_id').val(data.contact_id);
            }
            $('#territory_id').html(reponceData.territory_list);
        }
      
    });
});
        
function searchByZipcode(zipcode_id)
{
    $.ajax({
        type: "POST",
        url: base_url + 'zipcode/getCountryStateCityZipcodeByZipcode',
        cache: false,
        dataType: 'json',
        data: {'zipcode_id': zipcode_id},
        success: function (response)
        {
            //console.log(response);
            var blanck_option = '<option>Select</option>';
            $state_id = response.state_id;
            if ($state_id == '')
                $('#state_id').html(blanck_option);
            $city_id = response.city_id;
            if ($city_id == '')
                $('#city_id').html(blanck_option);
            $zipcode_id = response.zipcode_id;
            if ($zipcode_id == '')
                $('#zipcode_id').html(blanck_option);
            $("#country_id").val(response.country_id).trigger("change");

            $('#assigned_to_user_id').html(blanck_option);
        }
    });
}
                                    
                                    function getLeadOwnerData(zipcode_id)
                                    {
                                        $.ajax({
                                            type: "POST",
                                            url: base_url + 'zipcode/getLeadOwnerByFranchisorIdZipcode',
                                            cache: false,
                                            dataType : 'JSON',
                                            data: {'zipcode_id': zipcode_id,'assigned_to_user_id':assigned_to_user_id,'franchisor_id':franchisor_id},
                                            success: function (response)
                                            {
                                                $('#assigned_to_user_id').html(response.html_containet);
                                            }
                                        });
                                    }
                                    
                                    
function initiateAutoCompleteForZipCode(prefixfield)
{
    $( "#searchby_zip_code" ).autocomplete({ 
      source: function( request, response ) {
          
        if(request.term.length>3){
        $.ajax({
          type:"POST",
          url: base_url + "zipcode/getSearchZipCOde/",
		  dataType: "json",
          data: {
            featureClass: "P",
            style: "full",
            maxRows: 100,
            name_startsWith: request.term
          },
          success: function( data ) {
			 if(data != null){
			$(".ui-helper-hidden-accessible").hide();
            response( $.map( data.results, function( item ) {
			  return {
                value: item.zipcode_text,
	        	realval : item.zipcode_id
              }
            }));
			}
          }
        });
        }
      },
      minlength: 3,
      select: function( event, ui ) {
       $(".ui-helper-hidden-accessible").hide();
	  //console.log(ui.item);
          //lead detail
          //console.log(prefixfield);
          if(prefixfield == 'lead detail'){
              searchByZipcode_lead(ui.item.realval);
          }else{
              searchByZipcode(ui.item.realval);
          }
          
      },
    });
}

function getBroker($lead_source_id){
    //alert($lead_source);
    $.ajax({
        type : 'POST',
        url : base_url+'broker/getBrokerByLeadSource',
        data : { lead_source_id : $lead_source_id, broker_contact_id : $broker_contact_id, franchisor_id : $franchisor_id},
        dataType : 'JSON',
        success : function (responceData){
            //alert(responceData);
            if(responceData.code == 100){
                $('#broker_container').show();
                $('#broker_value').html(responceData.label);
                $('#is_broker').val(true);
                $('#broker_contact_id').html(responceData.html); 
            }else{
                $('#broker_container').hide();
                $('#is_broker').val(false);
                $('#broker_contact_id').html(responceData.html); 
            }    
        }
    });
}

$(document).ready(function($){

	$(".phone").keyup(function() {
        text = $(this).val().replace(/(\d{3})(\d{3})(\d{4})/, "$1-$2-$3");
        $(this).val(text);
    });
});



function callDataTable(tableId,data_url,last_column_pos)
{
            var rows_selected = [];

            var responsiveHelper;
            var breakpointDefinition = {
                tablet: 1024,
                phone_landscape : 480,
                phone_portrait : 320
            };
            var tableID = $('#'+tableId);
            var table = $('#'+tableId).DataTable({
               "processing": true,
               "serverSide": true,
                'ajax': {
                        'url': data_url
                },
                'columnDefs': [
                    {
                        'targets': [0,last_column_pos],
                        'sortable': false
                    },
                    {
                        'targets': last_column_pos,
                        'class': 'text-center',
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




     tableId = tableId;
     table = table;
     data_url = data_url;
     last_column_pos = last_column_pos;

// Change language dynamically Starts Here
            $('.change-language').on('click', function () {
                var getBaseURL = base_url;

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
                    "processing": true,
                    "serverSide": true,
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
                        },
                        {
                            'targets': [0,last_column_pos],
                            'sortable': false
                        },
                        {
                            'targets': last_column_pos,
                            'class': 'text-center',
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
// Change language dynamically Ends Here

//Change Color Starts here
        BlankonTableAdvanced.handleDatatableColors(tableId);
//Change Color ends here

// Toggle column Starts Here
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
// Toggle column Starts Here

// Handle click on checkbox Starts Here
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
// Handle click on checkbox ends Here


}