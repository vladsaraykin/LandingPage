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
    console.log("Привет");
    var data = $("form").serialize();
    console.dir(data);
    $.ajax({
        url: 'ajaxForm.php',
        type: 'POST',
        data: data,
        success: function (data) {
            console.dir(data)
            if(data == 'OK'){
                alert('Сообщение отправлено');
            } else {
                alert('Сообщение не отправлено, скоро с вами свяжутся')
            }
        }
    });
    $("form")[0].reset();
}

