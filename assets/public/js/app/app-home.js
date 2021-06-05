 ( function ( $ ) {   
    var ctx = document.getElementById( "doughutChart" );
    ctx.height = 150;
    var myChart = new Chart( ctx, {
        type: 'doughnut',
        data: {
            datasets: [ {
                data: [ 35, 35, 30 ],
                backgroundColor: [
                                    "#22215B",
                                    "#567DF4",
                                    "#FFC700"
                                ],
                hoverBackgroundColor: [
                                    "#22215B",
                                    "#567DF4",
                                    "#FFC700"
                                ]

                            } ],
            labels: [
                            "New",
                            "Progress",
                            "Finish"
                        ]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            legend:{
                display: true,
                position: 'bottom',
                align: 'center'
            },
            // tooltips:{
            //     callbacks:{
            //         label: function(tooltipItem,data){
            //             var label = data.datasets[tooltipItem.datasetIndex].label || '';
            //             return label + '%';
            //         }
            //     }
            // }
        }
    } );

    var ctx = document.getElementById( "doughutChartEmail" );
    ctx.height = 150;
    var myChart = new Chart( ctx, {
        type: 'doughnut',
        data: {
            datasets: [ {
                data: [ 35, 35, 30 ],
                backgroundColor: [
                                    "#22215B",
                                    "#567DF4",
                                    "#FFC700"
                                ],
                hoverBackgroundColor: [
                                    "#22215B",
                                    "#567DF4",
                                    "#FFC700"
                                ]

                            } ],
            labels: [
                            "New",
                            "Progress",
                            "Finish"
                        ]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            legend:{
                display: true,
                position: 'bottom',
                align: 'center'
            },
            // tooltips:{
            //     callbacks:{
            //         label: function(tooltipItem,data){
            //             var label = data.datasets[tooltipItem.datasetIndex].label || '';
            //             return label + '%';
            //         }
            //     }
            // }
        }
    } );

    var ctx = document.getElementById( "doughutChartSMS" );
    ctx.height = 150;
    var myChart = new Chart( ctx, {
        type: 'doughnut',
        data: {
            datasets: [ {
                data: [ 35, 35, 30 ],
                backgroundColor: [
                                    "#22215B",
                                    "#567DF4",
                                    "#FFC700"
                                ],
                hoverBackgroundColor: [
                                    "#22215B",
                                    "#567DF4",
                                    "#FFC700"
                                ]

                            } ],
            labels: [
                            "New",
                            "Progress",
                            "Finish"
                        ]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            legend:{
                display: true,
                position: 'bottom',
                align: 'center'
            },
            // tooltips:{
            //     callbacks:{
            //         label: function(tooltipItem,data){
            //             var label = data.datasets[tooltipItem.datasetIndex].label || '';
            //             return label + '%';
            //         }
            //     }
            // }
        }
    } );

    var ctx = document.getElementById( "doughutChartVoice" );
    ctx.height = 150;
    var myChart = new Chart( ctx, {
        type: 'doughnut',
        data: {
            datasets: [ {
                data: [ 35, 35, 30 ],
                backgroundColor: [
                                    "#22215B",
                                    "#567DF4",
                                    "#FFC700"
                                ],
                hoverBackgroundColor: [
                                    "#22215B",
                                    "#567DF4",
                                    "#FFC700"
                                ]

                            } ],
            labels: [
                            "New",
                            "Progress",
                            "Finish"
                        ]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            legend:{
                display: true,
                position: 'bottom',
                align: 'center'
            },
            // tooltips:{
            //     callbacks:{
            //         label: function(tooltipItem,data){
            //             var label = data.datasets[tooltipItem.datasetIndex].label || '';
            //             return label + '%';
            //         }
            //     }
            // }
        }
    } );



} )( jQuery );