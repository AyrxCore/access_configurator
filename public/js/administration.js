$(document).ready(function() {

    $('.title-admin').on('click', function(){
        $('.title-tabs').removeClass('active');
        $(this).parents('.title-tabs').addClass('active');
    });

    $('.btn.bg-olive').on('click',function (e) {

        e.preventDefault();

        let thisButton = $(this);
        let name = thisButton.parents('.form-edit').find('#name').val();
        let price = thisButton.parents('.form-edit').find('#price').val();
        let description = thisButton.parents('.form-edit').find('#description').val();
        let surface = thisButton.parents('.form-edit').find('#surface').val();
        let formData = new FormData($('#truc')[0]);
        console.log($('#truc')[0])
        console.log(formData)

        // if(thisButton.data('type') === 'modeles'){
        //     formData.append('type', 'modeles');
        //     formData.append('name', name);
        //     formData.append('price', price);
        //     formData.append('description', description);
        // }
        //
        // if(thisButton.data('type') === 'surfaces'){
        //     formData.append('type', 'surfaces');
        //     formData.append('name', name);
        //     formData.append('surface', surface);
        //     formData.append('price', price);
        //     formData.append('description', description);
        // }
        //
        // if(thisButton.data('type') === 'categories'){
        //     formData.append('type', 'categories');
        //     formData.append('name', name);
        // }
        //
        // if(thisButton.data('type') === 'options'){
        //     formData.append('type', 'options');
        //     formData.append('name', name);
        //     formData.append('price', price);
        // }

        $.ajax({
            type: "POST",
            url: route_admin,
            data: formData, // serializes the form's elements.
            contentType: false,
            processData: false,
            success: function(data)
            {
                if(data['type'] === 'modeles'){
                    let element = "<tr><td>"+ data.name +"</td><td>"+ data.price +" €</td><td>"+ data.description +"</td><td><img class=\"imgModeleBase\" src=\"#\"></td></tr>";
                    thisButton.parents('.tab-pane.active').find('.model-list').append(element);
                }

                if(data['type'] === 'surfaces'){
                    let element = "<tr><td>"+ data.name +"</td><td>"+ data.surface +"</td><td>"+ data.price +" €</td><td>"+ data.description +"</td><td><img class=\"imgModeleBase\" src=\"#\"></td></tr>";
                    thisButton.parents('.tab-pane.active').find('.surface-list').append(element);
                }

                if(data['type'] === 'categories'){
                    let element = "<tr><td>"+ data.name +"</td></tr>";
                    thisButton.parents('.tab-pane.active').find('.category-list').append(element);
                }

                if(data['type'] === 'options'){
                    let element = "<tr><td>"+ data.name +"</td><td>"+ data.price +" €</td></tr>";
                    thisButton.parents('.tab-pane.active').find('.option-list').append(element);
                }
            }
        });
    })

});