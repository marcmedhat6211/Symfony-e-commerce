jQuery(document).ready(function () {
    var searchRequest = null;
    $("#search").keyup(function () {
        var minlength = 1;
        var that = this;
        var value = $(this).val();
        var entitySelector = $("#result").html('');
        var codeSearch = $("#codeSearch").html('');
        if (value.length >= minlength) {
            if (searchRequest != null)
                searchRequest.abort();
            searchRequest = $.ajax({
                type: "GET",
                url: "/search",
                data: {
                    'q': value
                },
                dataType: "text",
                success: function (msg) {
                    //we need to check if the value is the same
                    if (value === $(that).val()) {
                        var result = JSON.parse(msg);
                        $.each(result, function (key, arr) {
                            $.each(arr, function (id, value) {
                                if (!(key === 'products' && key === 'productsByCode')) {
                                    if (id !== 'error') {
                                        console.log(value);
                                        entitySelector.append('<li class="list-group-item"><a href="/product/show/' + id + '" style="text-decoration: none; color: black;">' +value[0]+ ' | <span class="text-muted">' +value[1]+ '</span></a></li>');
                                    } else {
                                        entitySelector.append('<li class="list-group-item">' + value + '</li>');
                                    }
                                }
                            });
                        });
                    }
                }
            });
        }
    });
});