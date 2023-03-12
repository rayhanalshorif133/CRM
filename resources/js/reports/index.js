const { default: axios } = require("axios");

 $(document).ready(function(){
        handleDatePicker();
        handleSearchBtn();
    });


    function handleSearchBtn(){
        $('.searchBtn').on('click', function(){
            var user_id = $(".selectUser").val();
            var date = $('#searchDate .datetimepicker-input').val();
            let data = {
                user_id: user_id,
                date: date
            };
            axios.post("reports/get/", data)
                .then(function (response) {
                    console.log(response.data);
                });
        });
    }

    function handleDatePicker(){
        $('#searchDate').datetimepicker({
        format: 'L',
        icons: {
        time: "fa fa-clock-o",
        date: "fa fa-calendar",
        up: "fa fa-arrow-up",
        down: "fa fa-arrow-down"
        },
        autoclose: true,
        });
    }
