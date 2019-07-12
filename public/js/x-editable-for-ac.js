$(document).ready(function() {

    $('.tab-pane').on('mousedown', '.editable', function(){

        var tab = [];

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

        if($(this).hasClass('category')) {
            var allCategories = $(this).parents('.tab-pane').find('#all-categories')[0];

            for(var i=0; i < allCategories.length; i++){
                tab[i] = allCategories[i].text
            }

            $('.category').editable(
                {
                    params: {type: 'category'},
                    source: JSON.stringify(tab)
                }
            );
        }

    });

});