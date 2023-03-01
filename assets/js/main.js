$(document).ready(function () {

    // ajax
    $.ajax({
        type: "GET",
        url: "db.php",
        dataType: "json",
        success: function (data) {
            var tbody = $("#editable_table tbody");
            $.each(data, function (index, row) {
                var tr = $("<tr>");
                $.each(row, function (key, value) {
                    $("<td>").text(value).appendTo(tr);
                });
                tbody.append(tr);
            });
        }
    });
})