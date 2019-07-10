$('.description').editable({
    type: 'textarea',
    pk: $(this).find('.action-id').val(),
    url: '/post'
});

$('.name').editable({
    type: 'text',
    pk: $(this).find('.action-id').val(),
    url: '/post'
});

$('.price').editable({
    type: 'number',
    pk: $(this).find('.action-id').val(),
    url: '/post'
});

$('.surface').editable({
    type: 'number',
    pk: $(this).find('.action-id').val(),
    url: '/post'
});