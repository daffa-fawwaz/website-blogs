// Mengirimkan data ke file PH

 /**
         * For usage, visit Chart.js docs https://www.chartjs.org/docs/latest/
         */
        const barConfig = {
            type: 'bar',
            data: {
                labels: ['June', 'July', 'August', 'Sept', 'Oct', 'Nov', 'Des'],
                datasets: [{
                    label: 'Shoes',
                    backgroundColor: '#0694a2',
                    // borderColor: window.chartColors.red,
                    borderWidth: 1,
                    data: [-3, 14, 52, 74, 33, 90, 70],
                }, ],
            },
            options: {
                responsive: true,
                legend: {
                    display: false,
                },
            },
        }

        const barsCtx = document.getElementById('bars')
        window.myBar = new Chart(barsCtx, barConfig)