import Chart from 'chart.js/auto';


const dataTemp = {
    labels: weathers.labels,
    datasets: [{
        label: 'Temperatura',
        backgroundColor: 'rgb(255, 0, 0)',
        borderColor: 'rgb(255, 0, 0)',
        data: weathers.temperature,
    }]
};


const dataH = {
    labels: weathers.labels,
    datasets: [{
        label: 'Wilgotność',
        backgroundColor: 'rgb(0, 0, 255)',
        borderColor: 'rgb(0, 0, 255)',
        data: weathers.humidity,
    }]
};

const configTemp = {
    type: 'line',
    data: dataTemp,
    options: {}
};

const configH = {
    type: 'line',
    data: dataH,
    options: {

    }
};


new Chart(
    document.getElementById('chartTemperature'),
    configTemp
);

new Chart(
    document.getElementById('chartHumidity'),
    configH
);
