var BlankonFormPicker = function () {

    return {

        // =========================================================================
        // CONSTRUCTOR APP
        // =========================================================================
        init: function () {
            BlankonFormPicker.bootstrapDatepicker();
          
        },

        // =========================================================================
        // BOOTSTRAP DATEPICKER
        // =========================================================================
        bootstrapDatepicker: function () {
                // Default datepicker (options)
                $('#datePicker').datepicker({
                    format: 'yyyy-mm-dd',
                    todayBtn: 'linked',
                    
                });
                
                $('.datePicker').datepicker({
                    format: 'yyyy-mm-dd',
                    todayBtn: 'linked',
                });
				
				$(".datepickerMonth").datepicker({
					format: "mm-yyyy",
					startView: "months", 
					minViewMode: "months"
				});
        }

    };

}();

// Call main app init
BlankonFormPicker.init();