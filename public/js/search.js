jQuery(document).ready(function () {
    var searchRequest = null;
    $("#search").keyup(function () {
        var minlength = 1;
        var that = this;
        var value = $(this).val();
        var entitySelector = $("#entitiesNav").html('');
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
                                if (key === 'products') {
                                    if (id !== 'error') {
                                        entitySelector.append('<li><a href="/product/show/' + id + '" style="text-decoration: none; color: black;">' + value[0] + '</a></li>');
                                    } else {
                                        entitySelector.append('<li class="errorLi">' + value + '</li><br>');
                                    }
                                } else if (key === 'productsByCode') {
                                    if (id !== 'error') {
                                        codeSearch.append('<li><a href="/product/show/' + id + '" style="text-decoration: none; color: black;">' + value[0] + '</a></li>');
                                    } else {
                                        codeSearch.append('<li class="errorLi">' + value + '</li><br>');
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

// $(document).ready(function() {
//     var searchRequest = null;
//     $('#search').keyup(function() {
//         var that = this;
//         $('#entitiesNav').html('');
//         var searchField = $('#search').val();
//         var expression = new RegExp(searchField, "i");
//         searchRequest = $.ajax({
//             type: "GET",
//             url: "/search",
//             data: {
//                 'q': value
//             },
//             dataType: "text",
//             success: function(msg) {
//                 console.log(value);
//             }
//         });
//     });
// });