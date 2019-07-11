$(document).ready(function() {

    $('.tab-pane').on('mousedown', '.editable', function(){

        if($(this).hasClass('name')){
            $('.name').editable(
                {
                    params: {type: 'name'}
                }
            );
        }

        if($(this).hasClass('description')) {
            $('.description').editable(
                {
                    rows: 15,
                    params: {type: 'description'}
                }
            );
        }

        if($(this).hasClass('size')) {
            $('.size').editable(
                {
                    params: {type: 'size'}
                }
            );
        }

        if($(this).hasClass('price')) {
            $('.price').editable(
                {
                    params: {type: 'price'}
                }
            );
        }

    });

});