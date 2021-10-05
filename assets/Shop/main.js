$(document).ready(function () {
    for (let i = 1; i < 50; i++) {
        $('#btn-hotel_' + i).click(function () {
            $('#exampleModal_' + i).modal({
                'backdrop': true,
                'keyboard': true,
                'show': true,
                'focus': true
            });
        });
        $('#btn-booking_' + i).click(function () {
            $('#bookingModal_' + i).modal({
                'backdrop': true,
                'keyboard': true,
                'show': true,
                'focus': true
            });
        });
    }
    $('#btn-submit-bookRoom').click(function (ev) {
        ev.preventDefault();
        let startDate = $('#bookRoom_startDate').val();
        let endDate = $('#bookRoom_endDate').val();
        let idPhong = $('#bookRoom_idPhong').val();
        let email = $('#bookRoom_email').val();
        let gia = $('#bookRoom_gia').val();
        let tenPhong = $('#bookRoom_tenPhong').val();
        if (email === '') {
            alert('email is required');
        }
        let fullName = $('#bookRoom_fullName').val();
        if (fullName === '') {
            alert('fullName is required');
        }
        let sdt = $('#bookRoom_sdt').val();
        if (sdt === '') {
            alert('sdt is required');
        }
        let request = $('#bookRoom_request').val();
        if (email !== '' && fullName !== '' && sdt !== '') {
            $.ajax({
                    url: GLOBAL_HOTEL.url + 'bookRoom',
                    type: "POST",
                    data: {
                        startDate: startDate,
                        endDate: endDate,
                        MaPhong: idPhong,
                        tenPhong: tenPhong,
                        email: email,
                        gia: gia,
                        fullName: fullName,
                        SDT: sdt,
                        request: request,
                    },
                    success: function (response) {
                        let oResponse = JSON.parse(response);
                        if (oResponse.status === 'success') {
                            $('#bookRoomQRCode').empty().append('<img src="' + oResponse.data.src + '" style="height:' +
                                ' 400px;width: 400px; display: block;margin: 0 auto">');
                        } else {
                            alert(oResponse.message);
                        }
                    },
                }
            )
        }
    });

})