var button =$(".btn-download");
button.on("click", function (e) {
    e.preventDefault();
    alert("Hello World!");
});

$(".testimonials-quote").slick({dots:true});