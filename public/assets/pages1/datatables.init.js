/*
 Template Name: Stexo - Responsive Bootstrap 4 Admin Dashboard
 Author: Themesdesign
 Website: www.themesdesign.in
 File: Datatable js
 */
$(document).ready(function () {
    

    var table = $('#datatable-buttons').DataTable({
        // 'columnDefs': [{
        //     'targets': 0,
        //     'searchable': false,
        //     'orderable': false,
        //     'className': 'dt-body-center',
        //     'render': function (data, type, full, meta) {
        //         return '<input type="checkbox" name="id[]" value="' + $('<div/>').text(data).html() + '">';
        //     }
        // }],
        // 'order': [[1, 'asc']],
        lengthChange: true,
       // buttons: ['copy', 'excel', 'pdf']
    });

    table.buttons().container()
        .appendTo('#datatable-buttons_wrapper .col-md-6:eq(0)');

    // Handle click on "Select all" control
    // $('#example-select-all').on('click', function () {
    //     // Get all rows with search applied
    //     var rows = table.rows({ 'search': 'applied' }).nodes();
    //     // Check/uncheck checkboxes for all rows in the table
    //     $('input[type="checkbox"]', rows).prop('checked', this.checked);
    // });

    // // Handle click on checkbox to set state of "Select all" control
    // $('#datatable-buttons tbody').on('change', 'input[type="checkbox"]', function () {
    //     // If checkbox is not checked
    //     if (!this.checked) {
    //         var el = $('#example-select-all').get(0);
    //         // If "Select all" control is checked and has 'indeterminate' property
    //         if (el && el.checked && ('indeterminate' in el)) {
    //             // Set visual state of "Select all" control
    //             // as 'indeterminate'
    //             el.indeterminate = true;
    //         }
    //     }
    // });

    // Handle form submission event
    $('#multiAssign').on('click', function (e) {
        var Records = [];
        var url = $('#multiAssign').attr("data-request-url");
        // Iterate over all checkboxes in the table
        table.$('input[type="checkbox"]').each(function () {
            // If checkbox is checked
            if (this.checked) {
                var id = $(this).closest('td').attr('data-id');
                id = parseInt(id);
                Records.push(id);
            }
        });
        if (Records.length > 0) {
            url = url.replace("-1", JSON.stringify(Records));
            console.log("data", url)
            $.ajax({
                url: url,
                type: 'GET',
                success: function (data) {
                    $("#multiAssignModal").html(data);
                    $("#multiAssignModal").modal('show');
                },
                error: function (err) {
                    alert(err.responseText);
                }
            });
            //$.get(url, function (data) {
            //    $("#multiAssignModal").html(data);
            //    $("#multiAssignModal").modal('show');
            //}).fail(function () { alert("Error!") });
        }
    });

});