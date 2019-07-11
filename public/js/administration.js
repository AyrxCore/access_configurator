$(document).ready(function() {

    $('.title-admin').on('click', function(){
        $('.title-tabs').removeClass('active');
        $(this).parents('.title-tabs').addClass('active');
    });

    $('.add-element').on('click',function (e) {

        e.preventDefault();

        let thisButton = $(this);

        let formData = new FormData(thisButton.parents('#form-admin')[0]);
        formData.append('type', thisButton.data('type'));
        formData.append('name', thisButton.parents('.form-admin').find('select option:selected').attr('value'))

        $.ajax({
            type: "POST",
            url: route_add_element,
            data: formData, // serializes the form's elements.
            contentType: false,
            processData: false,
            success: function(data)
            {
                console.log(data)
                if(data['type'] === 'modeles'){
                    let element = "<tr><td><a href=\"#\" class=\"name\" data-type=\"text\" data-pk="+ data.id +" data-url="+ data.path +" data-name=\"models\" data-pk="+ data.id +">"+ data.house_model.name +"</a></td><td><a href=\"#\" class=\"price\" data-id="+ data.id +">"+ data.house_model.price +"</a></td><td><a href=\"#\" class=\"description\" data-id="+ data.id +">"+ data.house_model.description +"</a></td><td><img class=\"imgModeleBase\" src=\"#\"></td><td class='list-actions'><button class=\"trash-element\" data-id="+ data.id +"><i class=\"fas fa-trash-alt\"></i></button></td></tr>";
                    thisButton.parents('.tab-pane.active').find('.model-list').append(element);
                }

                if(data['type'] === 'surfaces'){
                    let element = "<tr><td><a href=\"#\" class=\"name\" data-pk="+ data.id +">"+ data.house_size.name +"</a></td><td><a href=\"#\" class=\"surface\" data-id="+ data.id +">"+ data.house_size.surface +"</a></td><td><a href=\"#\" class=\"price\" data-id="+ data.id +">"+ data.house_size.price +"</a></td><td><a href=\"#\" class=\"description\" data-id="+ data.id +">"+ data.house_size.description +"</a></td><td><img class=\"imgModeleBase\" src=\"#\"></td><td class='list-actions'><button class=\"trash-element\" data-id="+ data.id +"><i class=\"fas fa-trash-alt\"></i></button></td></tr>";
                    thisButton.parents('.tab-pane.active').find('.surface-list').append(element);
                }

                if(data['type'] === 'categories'){
                    let element = "<tr><td><a href=\"#\" class=\"name\" data-pk="+ data.id +">"+ data.category.name +"</a></td><td class='list-actions'><button class=\"trash-element\" data-id="+ data.id +"><i class=\"fas fa-trash-alt\"></i></button></td></tr>";
                    thisButton.parents('.tab-pane.active').find('.category-list').append(element);
                }

                if(data['type'] === 'options'){
                    let element = "<tr><td><a href=\"#\" class=\"name\" data-pk="+ data.id +">"+ data.options.name +"</a></td><td><a href=\"#\" class=\"price\" data-id="+ data.id +">"+ data.options.price +"</a></td><td><a href=\"#\" class=\"description\" data-id="+ data.id +">"+ data.options.description +"</a></td><td class='list-actions'><button class=\"trash-element\" data-id="+ data.id +"><i class=\"fas fa-trash-alt\"></i></button></td></tr>";
                    thisButton.parents('.tab-pane.active').find('.option-list').append(element);
                }
            }
        });
    });

    $('.tab-content').on('click', '.trash-element', function () {

        let thisButton = $(this);

        let idToSupp = thisButton.data('id');
        let typeEntity = thisButton.parents('.tab-pane').find('.add-element').data('type');

        if(confirm('Voulez-vous supprimer cet élément ?')){

            $.post(
                route_supp_element,
                {id: idToSupp, type: typeEntity},
                function(){
                    thisButton.parents('tr').text('');
                });
        }
        else {
            return false;
        }
    });

});