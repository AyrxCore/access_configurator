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
                    let element = "<tr><td>"+ data.house_model.name +"</td><td>"+ data.house_model.price +" €</td><td>"+ data.house_model.description +"</td><td><img class=\"imgModeleBase\" src=\"#\"></td></tr>";
                    thisButton.parents('.tab-pane.active').find('.model-list').append(element);
                }

                if(data['type'] === 'surfaces'){
                    let element = "<tr><td>"+ data.house_size.name +"</td><td>"+ data.house_size.surface +"</td><td>"+ data.house_size.price +" €</td><td>"+ data.house_size.description +"</td><td><img class=\"imgModeleBase\" src=\"#\"></td></tr>";
                    thisButton.parents('.tab-pane.active').find('.surface-list').append(element);
                }

                if(data['type'] === 'categories'){
                    let element = "<tr><td>"+ data.category.name +"</td></tr>";
                    thisButton.parents('.tab-pane.active').find('.category-list').append(element);
                }

                if(data['type'] === 'options'){
                    let element = "<tr><td>"+ data.options.name +"</td><td>"+ data.options.price +" €</td></tr>";
                    thisButton.parents('.tab-pane.active').find('.option-list').append(element);
                }
            }
        });
    });

    $('.trash-element').on('click', function () {

        let thisButton = $(this);

        let idToSupp = thisButton.parents('tr').find('.action-id').val();
        let typeEntity = thisButton.parents('.tab-pane').find('.add-element').data('type');

        let data = {
          'id' : idToSupp,
          'type' : typeEntity
        };

        $.ajax({
            type: "POST",
            url: route_supp_element,
            data: JSON.stringify(data), // serializes the form's elements.
            contentType: false,
            processData: false,
            success: function(data)
            {
                console.log(data)
            }
        });

    })

});