$(document).ready(function() {
    var urlParams = new URLSearchParams(window.location.search);
    var id = urlParams.get('id');
    $.ajax({
        url: 'select_db.php',
        type: 'GET',
        data: {id:id},
        success: function(data) {
            var parsedData = JSON.parse(data);

            var image = parsedData[0].image;
            var name = parsedData[0].name;
            var description = parsedData[0].description;
            var price = parsedData[0].price;
            var id = parsedData[0].id;
            var header_name = $('<a href="list.php">Home</a> &gt; <a href="list.php">Top products</a> &gt; <a href="#">'+name+'</a>')
            
            $('#header').append(header_name);
            var Boxtop = $('<div class="boxbot"></div>');
            var img_top = $('<div style="width:100%"><img class="img-main" src="' + image + '" alt = "img"></div>');
            Boxtop.append(img_top);

            var Boxbot = $('<div class="boxbot"></div>');
            var img_bot = $('<div style="width:25%"><img class="img-main" src="' + image + '" alt = "img"></div>');
            for (var i = 0; i < 4; i++) {
                Boxbot.append(img_bot.clone()); // Thêm một bản sao của img_bot vào Boxbot
            }

            $('.box-large').append(Boxtop, Boxbot);
            
            var name_product = $('<h5>' + name + '</h5>');
            var price_product = $('<h6>Giá tiền: ' + price + '<sup>đ</sup></h5>');
            var buttonBuy = $('<button class="btn btn-primary" type="button">Mua ngay</button>')
            $('.col-md-5.summary').append(name_product, price_product, buttonBuy);

            var description_product = $('<p>' + description + '</p>');
            $('#description').append(description_product);
        }
    });
});