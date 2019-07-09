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
                    let element = "<tr><td>"+ data.house_model.name +"</td><td>"+ data.house_model.price +" €</td><td>"+ data.house_model.description +"</td><td><img class=\"imgModeleBase\" src=\"#\"></td><td><button class=\"trash-element\"><i class=\"fas fa-trash-alt\"></i></button><button class=\"edit-element\"><i class=\"fas fa-edit\"></i></button></td><input class=\"action-id\" type=\"hidden\" value="+ data.id +"></tr>";
                    thisButton.parents('.tab-pane.active').find('.model-list').append(element);
                }

                if(data['type'] === 'surfaces'){
                    let element = "<tr><td>"+ data.house_size.name +"</td><td>"+ data.house_size.surface +"</td><td>"+ data.house_size.price +" €</td><td>"+ data.house_size.description +"</td><td><img class=\"imgModeleBase\" src=\"#\"></td><td><button class=\"trash-element\"><i class=\"fas fa-trash-alt\"></i></button><button class=\"edit-element\"><i class=\"fas fa-edit\"></i></button></td><input class=\"action-id\" type=\"hidden\" value="+ data.id +"></tr>";
                    thisButton.parents('.tab-pane.active').find('.surface-list').append(element);
                }

                if(data['type'] === 'categories'){
                    let element = "<tr><td>"+ data.category.name +"</td><td><button class=\"trash-element\"><i class=\"fas fa-trash-alt\"></i></button><button class=\"edit-element\"><i class=\"fas fa-edit\"></i></button></td><input class=\"action-id\" type=\"hidden\" value="+ data.id +"></tr>";
                    thisButton.parents('.tab-pane.active').find('.category-list').append(element);
                }

                if(data['type'] === 'options'){
                    let element = "<tr><td>"+ data.options.name +"</td><td>"+ data.options.price +" €</td><td><button class=\"trash-element\"><i class=\"fas fa-trash-alt\"></i></button><button class=\"edit-element\"><i class=\"fas fa-edit\"></i></button></td><input class=\"action-id\" type=\"hidden\" value="+ data.id +"></tr>";
                    thisButton.parents('.tab-pane.active').find('.option-list').append(element);
                }
            }
        });
    });

    $('.model-list').on('click', '.trash-element', function () {

        let thisButton = $(this);

        let idToSupp = thisButton.parents('tr').find('.action-id').val();
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

    $('#name').editable({
        type: 'text',
        pk: $(this).find('.action-id').val(),
        url: '/post',
        title: 'Modifier le nom du modèle'
    });

});