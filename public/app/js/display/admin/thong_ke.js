function chartOnLoad(start, end) {
    // var curDate = new Date();
    // console.log(cu)
    $.ajax({
        type: 'GET',
        url: '/api/getHotelStatisticsApi',
        data: {
            'start': start,
            'end': end,
        },
        dataTyoe: 'Json',
        success: function (data) {
            var options = {
                backgroundColor: "#F5DEB3",
                width: 1400,
                height: 700,
                fillOpacity: 10,

                animationEnabled: true,
                title: {
                    text: "BIỂU ĐỒ THỐNG KÊ DOANH THU KHÁCH SẠN",
                    fontSize: 30,
                    margin: 55,

                },
                axisY: {
                    title: "Doanh Thu",
                    suffix: "VND",
                    margin: 55,
                },
                axisX: {
                    // title: "Khách sạn",
                    margin: 55,
                },
                data: [{
                    type: "column",
                    yValueFormatString: "#,##0.0#" % "",
                    dataPoints: data
                }]
            };
            $("#chartContainer").CanvasJSChart(options);
        }
    })
}

$(function ($) {
    $(".dashboard-hotel .submit").on('click', function () {
        var start = document.getElementById('hotel-start').value;
        var end = document.getElementById('hotel-end').value;

        if (start === null || end === null) {
            chartOnLoad();
        }
        else {
            chartOnLoad(start, end);
        }

    });
});

// THống kê doanh thu khách sạn
chartOnLoad();

