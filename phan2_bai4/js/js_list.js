$(document).ready(function() {
    $.ajax({
        url: './db.php',
        type: 'GET',
        dataType: 'json',
        success: function(response) {
            $.each(response, function(index, row) {
                var parsedData = JSON.parse(row);
                console.log(parsedData);
                var image = row.Link_img_raw;
                var name = row.Name;
                var description = row.Description;
                var price = row.Price;
                var id = row.ID;
                var card = $('<div class="card col-md-4 col-6"></div>');
                var link = $('<a href="detail.php?id=' + id + '"></a>');
                var img = $('<img class="card-img-top" src ="' + image + '"alt = "img" style="width:100%">');

                link.append(img);

                var cardBody = $('<div class="card-body"></div>');
                cardBody.append('<h6 class="text-muted">' + name + '</h6>');

                var cardFooter = $('<div class="card-footer"></div>');
                cardFooter.append('<h6 class="text-muted">Price: ' + price + '<sup>đ</sup></h6>');

                var buttonBuynow = $('<button type="button" class="btn btn-success">Buy now</button>');
                buttonBuynow.on('click', function() {
                    window.location.href='detail.php?id='+id;
                });

                card.append(link, cardBody, cardFooter, buttonBuynow);

                $('#list.row').append(card);
            });
        }
    });
});