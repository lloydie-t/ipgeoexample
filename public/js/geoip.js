$(document).ready(function () {
    $(".form-geoip form .btn").click(function (event) {
        event.preventDefault();
        $(".form-geoip form .btn").addClass("btn-disabled");
        $(".form-geoip form .btn").attr("disabled", "disabled");
        $(".form-geoip form .btn").prop("disabled", true);
        GetIPGeo();
    });

    function GetIPGeo() {
        let form_data = $(".form-geoip form").serialize();
        $.ajax({
            type: "POST",
            url: "/ajax/Network/getIPGeo",
            data: form_data,
            success: function (data) {
                console.log(data);
                $(".form-geoip form .btn").removeClass("btn-disabled");
                $(".form-geoip form .btn").removeAttr("disabled");
                $(".form-geoip form .btn").prop("disabled", false);
            },
            error: function (jqXHR, textStatus, errorThrown) {
                $(".form-geoip form .btn").removeClass("btn-disabled");
                $(".form-geoip form .btn").removeAttr("disabled");
                $(".form-geoip form .btn").prop("disabled", false);
            },
        });
    }
});
