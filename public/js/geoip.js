$(document).ready(function () {
    $(".form-geoip form .btn").click(function (event) {
        event.preventDefault();
        $(".form-geoip form .btn").addClass("btn-disabled");
        $(".form-geoip form .btn").attr("disabled", "disabled");
        $(".form-geoip form .btn").prop("disabled", true);
        $(".form-geoip form #error").addClass("d-none");
        $(".form-geoip form #ip_address").removeClass("border-danger");
        $(".form-geoip #flag-loading").removeClass("d-none");
        $(".form-geoip #flag-result").addClass("d-none");

        GetIPGeo();
    });

    function GetIPGeo() {
        let form_data = $(".form-geoip form").serialize();
        $.ajax({
            type: "POST",
            url: "/ajax/Network/getIPGeo",
            data: form_data,
            success: function (data) {
                handleAjaxSuccess(data.data);
                $(".form-geoip form .btn").removeClass("btn-disabled");
                $(".form-geoip form .btn").removeAttr("disabled");
                $(".form-geoip form .btn").prop("disabled", false);
            },
            error: function (jqXHR, textStatus, errorThrown) {
                let response = JSON.parse(jqXHR.responseText);
                handleAjaxError(response.errors.ip_address[0]);
                $(".form-geoip form .btn").removeClass("btn-disabled");
                $(".form-geoip form .btn").removeAttr("disabled");
                $(".form-geoip form .btn").prop("disabled", false);
            },
        });
    }

    function handleAjaxSuccess($data) {
        $(".form-geoip #flag-loading").addClass("d-none");
        $(".form-geoip #flag-result").removeClass("d-none");
        $(".form-geoip #flag-result #flag-image").removeClass();
        $(".form-geoip #flag-result #flag-image").addClass("fi");
        $(".form-geoip #flag-result #flag-image").addClass(
            "fi-" + $data.iso_code
        );
        $(".form-geoip #ip_result").html($data.ip_address);
        $(".form-geoip #ip_country").html($data.country);
        console.log($data.iso_code);
    }

    function handleAjaxError($message) {
        $(".form-geoip form #error").removeClass("d-none");
        $(".form-geoip form #ip_address").addClass("border-danger");
        $(".form-geoip form #error").html("<b>!Error: </b>" + $message);
        $(".form-geoip #flag-loading").addClass("d-none");
        $(".form-geoip #flag-result").addClass("d-none");
    }
});
