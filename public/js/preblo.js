$(".btn").on(
    'click', function () {
        alert('test');
    }
);


let ul = $('<p>');
ul.attr('style', 'margin:0;padding:0;');
let a = $('<a>');
a.attr('style', 'color:white; font-size:large; margin:0 10px;');

let selectCategory = $(".category").children("p");
let selectArea = $(".area").children("p");

selectCategory.on('click', function (element) {
    console.log($(this).text());
    a.attr('href', 'www.preblo.site');
    $(this).append(ul.append(a.text('test')));
});

selectArea.on('click', function (element) {
    console.log($(this).text());
    a.attr('href', 'www.preblo.site');
    $(this).append(ul.append(a.text('test')));
});