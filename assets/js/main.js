function changeBackground(obj) {
    $(obj).removeClass("bg-success");
    $(obj).addClass("bg-warning");
}

function saveData(obj, customerNumber, column) {
    var customer = {
        customerNumber: customerNumber,
        column: column,
        value: obj.innerHTML
    }
    $.ajax({
        type: "POST",
        url: "savecustomer.php",
        data: customer,
        dataType: 'json',
        success: function (data) {
            if (data) {
                $(obj).removeClass("bg-warning");
                $(obj).addClass("bg-success");
            }
        }
    });
}