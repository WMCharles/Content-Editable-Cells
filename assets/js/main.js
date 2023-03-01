$(document).ready(function () {

    // retrieve data and populate table
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

    $("#editable_table td").click(function () {
        var td = $(this);
        var input = $("<input>").val(td.text()).appendTo(td.empty()).focus();
        input.blur(function () {
            var newText = $(this).val();
            if (newText !== "") {
                td.text(newText);
                var row = td.closest("tr");
                var rowData = {
                    id: row.data("id"),
                    name: row.find("td:eq(0)").text(),
                    email: row.find("td:eq(1)").text(),
                    phone: row.find("td:eq(2)").text()
                };
                $.ajax({
                    type: "POST",
                    url: "update_data.php",
                    data: rowData,
                    success: function (data) {
                        console.log("Data updated successfully!");
                    }
                });
            }
            else {
                td.text(td.data("origText"));
            }
        });
        input.keypress(function (event) {
            if (event.keyCode === 13) {
                input.blur();
            }
        });
        td.data("origText", td.text());
    });
})