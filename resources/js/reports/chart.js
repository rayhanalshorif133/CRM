var reportChart = '';
var dataValue = [];
var year = '';
var month = '';
$(document).ready(function() {
    handleDatePicker();
    handleChart();
    handleSearchBtn();
});

function handleChart(){
    month = new Date().getMonth() + 1;
    year = new Date().getFullYear();
    const labels = getLabels(year,month);
    const data = {
      labels: labels,
      datasets: [{
        label: 'Totals Leads',
        backgroundColor: '#007BFF',
        borderColor: '#007BFF',
        data: [0],
      },
      {
        label: 'Completed Leads',
        backgroundColor: 'rgb(0,128,0)',
        borderColor: 'rgb(0,128,0)',
        data: [0],
      }]
    };
    const config = {
        type: 'bar',
        data: data,
        options: {
            plugins: {
                title: {
                display: true,
                    text: 'Lead Reports Chart'
                },
                legend: {
                    position: 'bottom',
                },
            },
            scales: {
               x: {
            display: true,
            title: {
            display: true,
            text: 'Days of Month'
            }
            },
            y: {
            display: true,
            title: {
            display: true,
            text: 'Value'
            }
            }
            }
        },
      };

        reportChart = new Chart(
          $('#reportChart'),
          config
        );

        updateChart(year+'-'+month,0);
        $('.select-date').text(getMonthName(month)+'-'+year);
        getLabels(year,month).map(function(item){
            dataValue.push({day:item,leads:0,completed:0});
        });
    }

    function getLabels(year,month){
        var labels = [];
        var days = new Date(year, month, 0).getDate();
        for (let index = 1; index <= days; index++) {
            labels.push(index);
        }
        return labels;
    }
   function handleDatePicker(){
    $('#searchDate').datetimepicker({
        format: 'YYYY-MM'
        });
    $('.dateSearch').val(new Date().getFullYear()+'-'+(new Date().getMonth() + 1));
   }
   function handleSearchBtn(){
    $('.searchBtn').on('click',function(){
        var date = $('.dateSearch').val();
        var user = $('.selectUser').val();
        let month = date.split('-')[1];
        let year = date.split('-')[0];
        dataValue = [];
        getLabels(year,month).map(function(item){
            dataValue.push({day:item,leads:0,completed:0});
        });
        updateChart(date,user);
        $('.select-date').text(getMonthName(month)+'-'+year);
        $('.select-user').text($('.selectUser option:selected').text() == 'Select User' ? 'Not Selected' : $('.selectUser option:selected').text());
    });
   }
   function updateChart(date,user){
    if(user == null){
        user = 0;
    }
    axios.get(`/report/chart/get-data/${date}/${user}`)
        .then(function (response) {
            let data = response.data.data;
            data.map(function(item){
                let day = item.date.split('-')[2];
                let {leads,completed} = item;
                dataValue.map(function(item){
                    if(item.day == day){
                        item.leads = leads;
                        item.completed = completed;
                    }
                });
            });
            leads = dataValue.map(function(item){
                return item.leads;
            });
            completed = dataValue.map(function(item){
                return item.completed;
            });


            if(data.length == 0){
                leads = [0];
                completed = [0];
            }


            let config = reportChart.config;
            year = date.split('-')[0];
            month = date.split('-')[1];
            config.data.labels = getLabels(year,month);
            config.data.datasets[0].data = leads;
            config.data.datasets[1].data = completed;
            reportChart.update();


            // Total Leads
            let totalLeads = 0;
            dataValue.map(function(item){
                totalLeads += item.leads;
            });
            $('.totalLeads').text(totalLeads);

            // Completed Leads
            let completedLeads = 0;
            dataValue.map(function(item){
                completedLeads += item.completed;
            });
            $('.completedLeads').text(completedLeads);
        });
   }

   function getMonthName(month){
    var monthNames = ["Jan", "Feb", "Mar", "Apr", "May", "Jun","Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];
    return monthNames[month-1];
   }
