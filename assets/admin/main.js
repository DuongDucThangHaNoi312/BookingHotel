$(document).ready(function(){

    $('#imagesHotel').change(function(){

        let form_data = new FormData();

        // Read selected files
        let totalFiles = document.getElementById('imagesHotel').files.length;
        for (let index = 0; index < totalFiles; index++) {
            form_data.append("images[]", document.getElementById('imagesHotel').files[index]);
        }
        // AJAX request
        $.ajax({
            url: 'http://127.0.0.1/BookingHotel/a.upload',
            type: 'POST',
            data: form_data,
            dataType: 'json',
            contentType: false,
            processData: false,
            success: function (response) {
                if (response.status){
                    let dataIMG=JSON.parse(response.data);
                    for(let index = 0; index < dataIMG.length; index++) {
                        let src = dataIMG[index];
                        // Add img element in <div id='preview'>
                        $('#preview').append('<img src="'+src+'" width="200px;" height="200px">');
                        $('#inputIMG').append('<input name="images[]" type="hidden" value="'+src+'">');
                    }
                }else {
                    alert(response.data)
                }

            }
        });

    });
    $('#imagesLocation').change(function(){

        let form_data = new FormData();

        // Read selected files
        let totalFiles = document.getElementById('imagesLocation').files.length;
        for (let index = 0; index < totalFiles; index++) {
            form_data.append("images[]", document.getElementById('imagesLocation').files[index]);
        }
        // AJAX request
        $.ajax({
            url: 'http://127.0.0.1/BookingHotel/a.upload',
            type: 'POST',
            data: form_data,
            dataType: 'json',
            contentType: false,
            processData: false,
            success: function (response) {
                if (response.status){
                    let dataIMG=JSON.parse(response.data);
                    for(let index = 0; index < dataIMG.length; index++) {
                        let src = dataIMG[index];
                        // Add img element in <div id='preview'>
                        $('#previewLocation').append('<img src="'+src+'" width="200px;" height="200px">');
                        $('#inputIMGLocation').append('<input name="images[]" type="hidden" value="'+src+'">');
                    }
                }else {
                    alert(response.data)
                }

            }
        });

    });
    $('#imagesRoom').change(function(){

        let form_data = new FormData();

        // Read selected files
        let totalFiles = document.getElementById('imagesRoom').files.length;
        for (let index = 0; index < totalFiles; index++) {
            form_data.append("images[]", document.getElementById('imagesRoom').files[index]);
        }
        // AJAX request
        $.ajax({
            url: 'http://127.0.0.1/BookingHotel/a.upload',
            type: 'POST',
            data: form_data,
            dataType: 'json',
            contentType: false,
            processData: false,
            success: function (response) {
                if (response.status){
                    let dataIMG=JSON.parse(response.data);
                    for(let index = 0; index < dataIMG.length; index++) {
                        let src = dataIMG[index];
                        // Add img element in <div id='preview'>
                        $('#previewRoom').append('<img src="'+src+'" width="200px;" height="200px">');
                        $('#inputIMGRoom').append('<input name="images[]" type="hidden" value="'+src+'">');
                    }
                }else {
                    alert(response.data)
                }

            }
        });

    });
});

