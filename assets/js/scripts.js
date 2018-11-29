var button =$(".btn-download");
button.on("click", function (e) {
    e.preventDefault();
    alert("Hello World!");
});

$(".testimonials-quote").slick({dots:true});
$(".home-content").slick({dots:true});

$("form").on("submit", sendForm);

function sendForm(e) {
    e.preventDefault();
    var data = $("form").serialize();
    $.ajax({
        url: 'ajaxForm.php',
        type: 'POST',
        data: data,
        success: function (data) {
            console.dir(data)
            if(data.result == 'success'){
                alert('форма корректно заполнена');
            } else {
                for(var errorField in data.text_error){
                    $('#'+errorField).html(data.text_error[errorField]);
                    $('#'+errorField).show(encodeURIComponent(errorField));
                    $('#'+errorField).addClass('error_input');
                }
                return false;
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
function encode_utf8(s) {

    return unescape(encodeURIComponent(s));

}