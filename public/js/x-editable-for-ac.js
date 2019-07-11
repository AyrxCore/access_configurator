$(document).ready(function() {

    $('.tab-pane').on('click', '.editable', function(){

        var editElementId = $(this).parents('tr').find('.action-id').val();
        console.log(editElementId);

        $('.name').editable({
            type: 'text',
            name: 'name',
            pk: editElementId,
            url: route_edit_element,
        });

    });

    // $('.name').on('mousedown', function () {

    // })

        // $('.description').editable({
        //     type: 'textarea',
        //     params: {
        //         type: type,
        //         id: id,
        //         name: 'description'
        //     },
        //     pk: 1,
        //     url: route_edit_element,
        //     success: function (data) {
        //         console.log(data)
        //     }
        // });

        // $('.price').editable({
        //     type: 'number',
        //     params: {
        //         type: $(e.target).parents('.tab-pane').find('.add-element').data('type'),
        //         id: $(e.target).parents('tr').find('.action-id').val(),
        //         name: 'price'
        //     },
        //     pk: 1,
        //     url: route_edit_element,
        //     success: function (data) {
        //         console.log(data)
        //     }
        // });
        //
        // $('.surface').editable({
        //     type: 'number',
        //     params: {
        //         type: $(e.target).parents('.tab-pane').find('.add-element').data('type'),
        //         id: $(e.target).parents('tr').find('.action-id').val(),
        //         name: 'surface'
        //     },
        //     pk: 1,
        //     url: route_edit_element,
        //     success: function (data) {
        //         console.log(data)
        //     }
        // });
});