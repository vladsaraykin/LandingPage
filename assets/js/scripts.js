var button =$(".btn-download");
button.on("click", function (e) {
    e.preventDefault();
    alert("Hello World!");
});

$(".testimonials-quote").slick({dots:true});
$(".home-first_screen .container").slick({dots:true});

$("form").on("submit", sendForm);
$(".user_name").on("click", GetDateTime);
function sendForm(e) {
    e.preventDefault();
    var data = $("form").serialize();
    $.ajax({
        url: 'ajaxForm.php',
        type: 'POST',
        data: data,
        dataType: "json",
        success: function (data) {
            if(data.result == 'success'){
                $('form')[0].reset();
                $('.contact-form').hide();
                $('.form-success').css('display', 'flex');
                $('.form-success').show();
            } else {
                $('input').removeClass('error_input');
                $('label').hide()
                for(var errorField in data.text_error){
                     $('.'+ errorField+'_error').html(data.text_error[errorField]);
                     $('.'+ errorField+'_error').show();
                    $('.'+errorField).addClass('error_input');
                }
            }
        }
    });
    $("form")[0].reset();
}

ymaps.ready(init);
function init(){
    // Создание карты.
    var myMap = new ymaps.Map("map", {
        // Координаты центра карты.
        // Порядок по умолчанию: «широта, долгота».
        // Чтобы не определять координаты центра карты вручную,
        // воспользуйтесь инструментом Определение координат.
        center: [54.212286, 45.120280],
        // Уровень масштабирования. Допустимые значения:
        // от 0 (весь мир) до 19.
        zoom: 7
    });

    var myGeoObject = new ymaps.Placemark([[54.212286, 45.120280]]);
    myMap.geoObjects.add(myGeoObject);
}

function GetDateTime() {
    var currentdate = new Date().getTime() / 1000;
    document.getElementById('date').value=currentdate;
}