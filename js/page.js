$(document).ready(function () {
    var page = 1;
    var total = 1;
    var pages = 1;

    $('#btSearch').click(function () {
        Load();
    });

    $('#title').change(function () {
        if ($('#title').is(":checked")) {
            $('#title').attr("checked", true);
        } else {
            $('#title').attr("checked", false);
        }
    });
    $('#description').change(function () {
        if ($('#description').is(":checked")) {
            $('#description').attr("checked", true);
        } else {
            $('#description').attr("checked", false);
        }
    });
    $('#artist').change(function () {
        if ($('#artist').is(":checked")) {
            $('#artist').attr("checked", true);
        } else {
            $('#artist').attr("checked", false);
        }
    });
    $('input[name=label]').change(
        function () {
            if ($('#heat').is(":checked")) {
                $('#heat').attr("checked", true);
                $('#price').attr("checked", false);
            } else {
                $('#heat').attr("checked", false);
                $('#price').attr("checked", true);
            }
            Load();
        }
    );


    $('#prePage').click(function () {
        page = (page === 1) ? 1 : (page - 1);
        Load();
    });

    $('#nextPage').click(function () {
        page = (page === pages) ? page : (page + 1);
        Load();
    });




    function Load() {
        var key = $('#key').val();
        let title = 0;
        let description = 0;
        let artist = 0;
        let order = 0;

        if ($('#title').is(":checked")) {
            title = 1;
        }
        if ($('#description').is(":checked")) {
            description = 1;
        }
        if ($('#artist').is(":checked")) {
            artist = 1;
        }
        if ($('#heat').is(":checked")) {
            order = 1;
        }

        $.ajax({
            url: "php/totalPage.php",
            data: {
                key: key,
                title: title,
                description: description,
                artist: artist,
                order: order
            },
            type: "POST",
            dataType: "JSON",
            success: function (data0) {
                total = data0;
                pages = (total % 5 === 0) ? (total / 5) : ((total - (total % 5)) / 5 + 1);
                $("[--id]").remove();
                for (var i = pages; i > 0; i--)
                {
                    $("#pin").after("<li><a href=\"#\"  --id=\"" + i + "\">" + i + "</a></li>");
                }
                $("[--id]").click(function (event) {
                    page = $(this).attr("--id");
                    Load();
                });
            }
        });

        $.ajax({
            url: "php/page.php",
            data: {
                page: page,
                key: key,
                title: title,
                description: description,
                artist: artist,
                order: order
            },
            type: "POST",
            dataType: "JSON",
            success: function (data0) {
                var str = '';
                var data = eval(data0);
                for (var k in data) {
                    str += '<div class="row row-vertical-center" style="padding-top: 50px" >\n' +
                        '            <div class="col-md-6">\n' +
                        '                <a href="display.php?id=' + data[k].artworkID + '" ><img src="./resources/img/' +  data[k].imageFileName + '" height="400px" width="400px" class="img-circle"></a>\n' +
                        '            </div>\n' +
                        '\n' +
                        '            <div class="col-md-6" ">\n' +
                        '                <div class="row" style="font-size: 30px">\n' +
                        '                    <b>Name</b>: ' + data[k].title + '\n' +
                        '                    <hr class="hr">\n' +
                        '                </div>\n' +
                        '                <div class="row" style="font-size: 30px">\n' +
                        '                    <b>Artist</b>: ' + data[k].artist + '\n' +
                        '                    <hr class="hr">\n' +
                        '                </div>\n' +
                        '                <div class="row" style="font-size: 30px">\n' +
                        '                    <b>ReleasedTime</b>: ' + data[k].timeReleased + '\n' +
                        '                    <hr class="hr">\n' +
                        '                </div>\n' +
                        '                <div class="row" style="font-size: 30px">\n' +
                        '                    <b>View</b>: ' + data[k].view + '\n' +
                        '                    <hr class="hr">\n' +
                        '                </div>\n' +
                        '                <div class="row" style="font-size: 30px">\n' +
                        '                    <b>Price</b>: ' + data[k].price + '\n' +
                        '                    <hr class="hr">\n' +
                        '                </div>\n' +
                        '            </div>\n' +
                        '        </div>'
                    ;
                }
                $("#item").html(str);
            }
        });

    }
});


