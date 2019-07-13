$(document).ready(function() {

    $('.title-admin').on('click', function(){
        $('.title-tabs').removeClass('active');
        $(this).parents('.title-tabs').addClass('active');
    });

    $('.add-element').on('click',function (e) {

        e.preventDefault();

        let thisButton = $(this);
        let form = thisButton.parents('form')[0];

        let formData = new FormData(form);
        formData.append('type', thisButton.data('type'));
        formData.append('selectName', thisButton.parents('form').find('select').val())

        $.ajax({
            type: "POST",
            url: route_add_element,
            data: formData, // serializes the form's elements.
            contentType: false,
            processData: false,
            success: function(data)
            {
                console.log(Routing.generate('home'))
                form.reset();
                if(data['type'] === 'models'){
                    let element = "<tr><td><a href=\"#\" class=\"editable name\" data-type=\"text\" data-pk="+ data.id +" data-url="+ data.path +" data-name=\"models\">"+ data.house_model.name +"</a><i class=\"fas fa-pen-alt min-size\"></i></td><td><a href=\"#\" class=\"editable price\" data-pk="+ data.id +">"+ data.house_model.price +"</a><i class=\"fas fa-pen-alt min-size\"></i></td><td><a href=\"#\" class=\"editable description\" data-pk="+ data.id +">"+ data.house_model.description +"</a><i class=\"fas fa-pen-alt min-size\"></i></td><td><img class=\"imgModeleBase\" src=\"#\"></td><td class='list-actions'><button class=\"trash-element\" data-id="+ data.id +"><i class=\"fas fa-trash-alt\"></i></button></td></tr>";
                    thisButton.parents('.tab-pane.active').find('.model-list').append(element);
                    let newModelInSelect = "<option value="+ data.house_model.name +">"+data.house_model.name+"</option>";
                    thisButton.parents('.tab-content').find('#all-models').append(newModelInSelect);
                }

                if(data['type'] === 'surfaces'){
                    let element = "<tr><td><a href=\"#\" class=\"editable name\" data-type=\"text\" data-pk="+ data.id +">"+ data.selectName +"</a><i class=\"fas fa-pen-alt min-size\"></i></td><td><a href=\"#\" class=\"editable surface\" data-pk="+ data.id +">"+ data.house_size.surface +"</a><i class=\"fas fa-pen-alt min-size\"></i></td><td><a href=\"#\" class=\"editable price\" data-pk="+ data.id +">"+ data.house_size.price +"</a><i class=\"fas fa-pen-alt min-size\"></i></td><td><a href=\"#\" class=\"editable description\" data-pk="+ data.id +">"+ data.house_size.description +"</a><i class=\"fas fa-pen-alt min-size\"></i></td><td><img class=\"imgModeleBase\" src=\"#\"></td><td class='list-actions'><button class=\"trash-element\" data-id="+ data.id +"><i class=\"fas fa-trash-alt\"></i></button></td></tr>";
                    thisButton.parents('.tab-pane.active').find('.surface-list').append(element);
                }

                if(data['type'] === 'categories'){
                    let element = "<tr><td><a href=\"#\" class=\"editable name\" data-type=\"text\" data-pk="+ data.id +">"+ data.category.name +"</a><i class=\"fas fa-pen-alt min-size\"></i></td><td class='list-actions'><button class=\"trash-element\" data-id="+ data.id +"><i class=\"fas fa-trash-alt\"></i></button></td></tr>";
                    thisButton.parents('.tab-pane.active').find('.category-list').append(element);
                    let newCategoryInSelect = "<option value="+ data.category.name +">"+data.category.name+"</option>";
                    thisButton.parents('.tab-content').find('#all-categories').append(newCategoryInSelect);
                }

                if(data['type'] === 'options'){
                    let element = "<tr><td><a href=\"#\" class=\"editable name\" data-type=\"text\" data-pk="+ data.id +">"+ data.options.name +"</a><i class=\"fas fa-pen-alt min-size\"></i></td><td><a href=\"#\" class=\"editable category\" data-type=\"select\" data-pk="+ data.id +">"+ data.selectName +"</a><i class=\"fas fa-pen-alt min-size\"></i></td><td><a href=\"#\" class=\"editable price\" data-pk="+ data.id +">"+ data.options.price +"</a><i class=\"fas fa-pen-alt min-size\"></i></td><td><a href=\"#\" class=\"editable description\" data-pk="+ data.id +">"+ data.options.description +"</a><i class=\"fas fa-pen-alt min-size\"></i></td><td class='list-actions'><button class=\"trash-element\" data-id="+ data.id +"><i class=\"fas fa-trash-alt\"></i></button></td></tr>";
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