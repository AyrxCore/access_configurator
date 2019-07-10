$('.tab-pane').on('mousedown', $('.description'), function(){
    $('.description').editable({
        type: 'textarea',
        params: {
            type: $(this).parents('.tab-pane').find('.add-element').data('type'),
            id: $(this).parents('tr').find('.action-id').val(),
            name: 'description'
        },
        pk: 1,
        url: route_edit_element,
        name: 'description',
        success: function (data) {
            console.log(data)
        }
    });
});

$('.tab-pane').on('mousedown', $('.name') ,function() {
    $('.name').editable({
        type: 'text',
        params: {
            type: $(this).parents('.tab-pane').find('.add-element').data('type'),
            id: $(this).parents('tr').find('.action-id').val(),
            name: 'name'
        },
        pk: 1,
        url: route_edit_element,
        success: function (data) {
            console.log(data)
        }
    });
});

$('.tab-pane').on('mousedown', $('.price'), function() {
    $('.price').editable({
        type: 'number',
        params: {
            type: $(this).parents('.tab-pane').find('.add-element').data('type'),
            id: $(this).parents('tr').find('.action-id').val(),
            name: 'price'
        },
        pk: 1,
        url: route_edit_element,
        success: function (data) {
            console.log(data)
        }
    });
});

$('.tab-pane').on('mousedown', $('.surface'), function() {
    $('.surface').editable({
        type: 'number',
        params: {
            type: $(this).parents('.tab-pane').find('.add-element').data('type'),
            id: $(this).parents('tr').find('.action-id').val(),
            name: 'surface'
        },
        pk: 1,
        url: route_edit_element,
        success: function (data) {
            console.log(data)
        }
    });
});