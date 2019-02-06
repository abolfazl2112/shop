function AddToBasket(id) {
    //            e.preventDefault();
    //            var aData = [];
    //            aData[0] = $("#ddlSelectYear").val();
    //            $("#contentHolder").empty();
    //            var jsonData = JSON.stringify({ aData: aData });
    $.ajax({
        type: "POST",
        //getListOfCars is my webmethod
        url: "/index/AddToBaskets",
        data: "{productId: " + id + "}",
        contentType: "application/json; charset=utf-8",
        dataType: "json", // dataType is json format
        success: OnSuccess,
        error: OnErrorCall
    });
    function OnSuccess(response) {
        //alert('ok');
        console.log(response.d);
        //alert(response.d.ToString());
    }
    function OnErrorCall(response) { console.log(error);  }
}
function RemoveFromBasket(id) {
    //            e.preventDefault();
    //            var aData = [];
    //            aData[0] = $("#ddlSelectYear").val();
    //            $("#contentHolder").empty();
    //            var jsonData = JSON.stringify({ aData: aData });
    alert(id);
    $.ajax({
        type: "POST",
        //getListOfCars is my webmethod   
        url: "/index/DeleteFromBasket",
        data: "{rowId: " + id + "}",
        contentType: "application/json; charset=utf-8",
        dataType: "json", // dataType is json format
        success: OnSuccess,
        error: OnErrorCall
    });
    function OnSuccess(response) {
        console.log(response.d);
        $('#rowSpan' + (id + 1)).html('');
        $('#basketCounter').html(response.d.Items.Count);
        $('#sumSpan').html(response.d.Total);
        $('#mablaghSpan').html(response.d.Total);
    }
    function OnErrorCall(response) { console.log(error); }
}