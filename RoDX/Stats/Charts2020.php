<?php

$servername = "localhost:3306";
$username = "root";
$password = "";
$dbname = "test";

// Crearea conexiunii
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificarea conexiunii
if ($conn->connect_error) {
    die("Conexiune eșuată: " . $conn->connect_error);
}

$sql1 = "SELECT * FROM 2020_medical_emergencies_administrare";
$result1 = $conn->query($sql1);
$data1 = array();
while($row = $result1->fetch_assoc()) {
    $data1[] = $row;
}

$sql2 = "SELECT * FROM 2020_medical_emergencies_age";
$result2 = $conn->query($sql2);
$data2 = array();
while($row = $result2->fetch_assoc()) {
    $data2[] = $row;
}

$sql3 = "SELECT * FROM 2020_medical_emergencies_diagnostic";
$result3 = $conn->query($sql3);
$data3 = array();
while($row = $result3->fetch_assoc()) {
    $data3[] = $row;
}

$sql4 = "SELECT * FROM 2020_medical_emergencies_gender";
$result4 = $conn->query($sql4);
$data4 = array();
while($row = $result4->fetch_assoc()) {
    $data4[] = $row;
}

$sql5 = "SELECT * FROM 2020_treatment_admission_age";
$result5 = $conn->query($sql5);
$data5 = array();
while($row = $result5->fetch_assoc()) {
    $data5[] = $row;
}

$sql6 = "SELECT * FROM 2020_treatment_admission_gen";
$result6 = $conn->query($sql6);
$data6 = array();
while($row = $result6->fetch_assoc()) {
    $data6[] = $row;
}

$sql7 = "SELECT * FROM 2020_treatment_admission_locuinta";
$result7 = $conn->query($sql7);
$data7 = array();
while($row = $result7->fetch_assoc()) {
    $data7[] = $row;
}

$sql8 = "SELECT * FROM 2020_treatment_admission_occupation";
$result8 = $conn->query($sql8);
$data8 = array();
while($row = $result8->fetch_assoc()) {
    $data8[] = $row;
}

$sql9 = "SELECT * FROM 2020_treatment_admission_regime";
$result9 = $conn->query($sql9);
$data9 = array();
while($row = $result9->fetch_assoc()) {
    $data9[] = $row;
}

$sql10 = "SELECT * FROM 2020_treatment_admission_studii";
$result10 = $conn->query($sql10);
$data10 = array();
while($row = $result10->fetch_assoc()) {
    $data10[] = $row;
}

$sql11 = "SELECT * FROM 2020_treatment_admission_sursa";
$result11 = $conn->query($sql11);
$data11 = array();
while($row = $result11->fetch_assoc()) {
    $data11[] = $row;
}

$sql12 = "SELECT * FROM 2020_diseases";
$result12 = $conn->query($sql12);
$data12 = array();
while($row = $result12->fetch_assoc()) {
    $data12[] = $row;
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>2020</title>
    <link rel="stylesheet" href="CSS/Tables.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
</head>

<body>
<!-- Primul rand de grafice -->
<div class="charts-container">
    <div class="chart-item">
        <div class="chart-title">Medical emergencies in 2020</div>
        <canvas id="chart1"></canvas>
    </div>
    <div class="chart-item">
        <div class="chart-title">Medical emergencies by age</div>
        <canvas id="chart2"></canvas>
    </div>
    <div class="chart-item">
        <div class="chart-title">Medical emergencies diagnostics</div>
        <canvas id="chart3"></canvas>
    </div>
    <div class="chart-item">
        <div class="chart-title">Medical emergencies by gender</div>
        <canvas id="chart4"></canvas>
    </div>
</div>

<!-- al doilea rand -->
<div class="second-row-container">
    <div class="chart-item-second">
        <div class="chart-title">Treatment admission by age</div>
        <canvas id="chart5"></canvas>
    </div>
    <div class="chart-item-second">
        <div class="chart-title">Treatment admission by gender</div>
        <canvas id="chart6"></canvas>
    </div>
    <div class="chart-item-second">
        <div class="chart-title">Treatment admission by residence </div>
        <canvas id="chart7"></canvas>
    </div>
    <div class="chart-item-second">
        <div class="chart-title">Treatment admission by occupation</div>
        <canvas id="chart8"></canvas>
    </div>
    <div class="chart-item-second">
        <div class="chart-title">Treatment admission by regime</div>
        <canvas id="chart9"></canvas>
    </div>
    <div class="chart-item-second">
        <div class="chart-title">Treatment admission by studies</div>
        <canvas id="chart10"></canvas>
    </div>
    <div class="chart-item-second">
        <div class="chart-title">Treatment admission by source</div>
        <canvas id="chart11"></canvas>
    </div>
</div>

<!-- Al treilea rand de grafice -->
<div class="third-row-container">
    <div class="chart-item-third">
        <div class="chart-title">Diseases</div>
        <canvas id="chart12"></canvas>
    </div>
</div>

<button id="save-charts">Save All Charts</button>
    <canvas id="combined-canvas"></canvas>

<script>

// Datele extrase din PHP
const data1 = <?php echo json_encode($data1); ?>;
const data2 = <?php echo json_encode($data2); ?>;
const data3 = <?php echo json_encode($data3); ?>;
const data4 = <?php echo json_encode($data4); ?>;
const data5 = <?php echo json_encode($data5); ?>;
const data6 = <?php echo json_encode($data6); ?>;
const data7 = <?php echo json_encode($data7); ?>;
const data8 = <?php echo json_encode($data8); ?>;
const data9 = <?php echo json_encode($data9); ?>;
const data10 = <?php echo json_encode($data10); ?>;
const data11 = <?php echo json_encode($data11); ?>;
const data12 = <?php echo json_encode($data12); ?>;

// Procesarea datelor pentru Chart.js
// Pentru prima tabelă
const labels1 = data1.map(item => item['Administration method']);
const values1Cannabis = data1.map(item => parseInt(item['Cannabis']));
const values1Stimulants = data1.map(item => parseInt(item['Stimulants']));
const values1Opioids = data1.map(item => parseInt(item['Opioids']));
const values1NSP = data1.map(item => parseInt(item['NSP']));

//a doua
const labels2 = data2.map(item => item['Age']);
const values2Cannabis = data2.map(item => parseInt(item['Cannabis']));
const values2Stimulants = data2.map(item => parseInt(item['Stimulants']));
const values2Opioids = data2.map(item => parseInt(item['Opioids']));
const values2NSP = data2.map(item => parseInt(item['NSP']));

//a treia
const labels3 = data3.map(item => item['Diagnostic']);
const values3Cannabis = data3.map(item => parseInt(item['Cannabis']));
const values3Stimulants = data3.map(item => parseInt(item['Stimulants']));
const values3Opioids = data3.map(item => parseInt(item['Opioids']));
const values3NSP = data3.map(item => parseInt(item['NSP']));

//a patra
const labels4 = data4.map(item => item['Gender']);
const values4Cannabis = data4.map(item => parseInt(item['Cannabis']));
const values4Stimulants = data4.map(item => parseInt(item['Stimulants']));
const values4Opioids = data8.map(item => parseInt(item['Opioids']));
const values4NSP = data4.map(item => parseInt(item['NSP']));

//5
const labels5 = data5.map(item => item['Drugs']);
const values5Min15 = data5.map(item => parseInt(item['<15']));
const values5Min15max19 = data5.map(item => parseInt(item['15-19']));
const values5Min20max24 = data5.map(item => parseInt(item['20-24']));
const values5Min25max29 = data5.map(item => parseInt(item['25-29']));
const values5Min30max34 = data5.map(item => parseInt(item['30-34']));
const values5Min35max39 = data5.map(item => parseInt(item['35-39']));
const values5Min40max44 = data5.map(item => parseInt(item['40-44']));
const values5Min45max49 = data5.map(item => parseInt(item['45-49']));
const values5Min50max54 = data5.map(item => parseInt(item['50-54']));
const values5Min55max59 = data5.map(item => parseInt(item['55-59']));
const values5Min60max64 = data5.map(item => parseInt(item['60-64']));
const values5max65 = data5.map(item => parseInt(item['>=65']));
const values5total = data5.map(item => parseInt(item['Total']));

//6
const labels6 = data6.map(item => item['Drugs']);
const values6men = data6.map(item => parseInt(item['Men']));
const values6women = data6.map(item => parseInt(item['Women']));
const values6Total = data6.map(item => parseInt(item['Total']));

//7
const labels7 = data7.map(item => item['Drugs']);
const values7housing = data7.map(item => parseInt(item['Stable housing']));
const values7unstable = data7.map(item => parseInt(item['Unstable housing and/or homeless']));
const values7detention = data7.map(item => parseInt(item['In detention']));
const values7missing = data7.map(item => parseInt(item['Dont know/Missing']));
const values7total= data7.map(item => parseInt(item['Total']));

//8
const labels8 = data8.map(item => item['Drugs']);
const values8ocasionallyemployed = data8.map(item => parseInt(item['Occasionally employed']));
const values8permanently = data8.map(item => parseInt(item['Permanently employed']));
const values8student = data8.map(item => parseInt(item['In school/Student']));
const values8unemployed = data8.map(item => parseInt(item['Unemployed/Not working']));
const values8socialaasistance = data8.map(item => parseInt(item['Social assistance recipient/Retiree/Homemaker/Medical reti']));
const values8missing = data8.map(item => parseInt(item['Dont know/Missing']));
const values8total= data8.map(item => parseInt(item['Total']));

//9
const labels9 = data9.map(item => item['Drugs']);
const values9outpatient = data9.map(item => parseInt(item['Outpatient Regime']));
const values9inpatient = data9.map(item => parseInt(item['Inpatient Regime']));
const values9prison = data9.map(item => parseInt(item['Treatment in Prisons']));
const values9total= data9.map(item => parseInt(item['Total']));

//10
const labels10 = data10.map(item => item['Drugs']);
const values10never = data10.map(item => parseInt(item['Never attended school/Incomplete primary education']));
const values10primary = data10.map(item => parseInt(item['Primary school']));
const values10secondary = data10.map(item => parseInt(item['Secondary education']));
const values10higher = data10.map(item => parseInt(item['Higher education']));
const values10missing = data10.map(item => parseInt(item['Dont know/Missing']));
const values10total = data10.map(item => parseInt(item['TOTAL']));

//11
const labels11 = data11.map(item => item['Drugs']);
const values11court = data11.map(item => parseInt(item['Court/Probation/Police']));
const values11doctors = data11.map(item => parseInt(item['Doctors']));
const values11otherdrug = data11.map(item => parseInt(item['Other drug treatment centers']));
const values11othermedical= data11.map(item => parseInt(item['other medical or social services']));
const values11educational = data11.map(item => parseInt(item['Educational services']));
const values11onown = data11.map(item => parseInt(item['On own initiative, on the recommendation of friends or family']));
const values11missing = data11.map(item => parseInt(item['Dont know/Missing']));
const values11others = data11.map(item => parseInt(item['Others']));
const values11total = data11.map(item => parseInt(item['TOTAL']));

//12
const labels12 = data12.map(item => item['Infection']);
const values12Pozitive = data12.map(item => parseInt(item['Tested positive']));
const values12Total = data12.map(item => parseInt(item['Total Tested']));

//Charturile
const ctx1= document.getElementById('chart1').getContext('2d');
        const chart1 = new Chart(ctx1, {
            type: 'bar',
            data: {
                labels: labels1,
                datasets: [{
                    label: 'Cannabis',
                    data: values1Cannabis,
                    backgroundColor: 'rgba(255, 99, 132, 0.2)',
                    borderColor: 'rgba(255, 99, 132, 1)',
                    borderWidth: 1
                }, {
                    label: 'Stimulants',
                    data: values1Stimulants,
                    backgroundColor: 'rgba(54, 162, 235, 0.2)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1
                }, {
                    label: 'Opioids',
                    data: values1Opioids,
                    backgroundColor: 'rgba(255, 206, 86, 0.2)',
                    borderColor: 'rgba(255, 206, 86, 1)',
                    borderWidth: 1
                }, {
                    label: 'NSP',
                    data: values1NSP,
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        const ctx2 = document.getElementById('chart2').getContext('2d');
        const chart2 = new Chart(ctx2, {
            type: 'radar',
            data: {
                labels: labels2,
                datasets: [{
                    label: 'Cannabis',
                    data: values2Cannabis,
                    borderColor: 'rgba(255, 99, 132, 1)',
                    backgroundColor: 'rgba(255, 99, 132, 0.2)',
                    pointBackgroundColor: 'rgba(255, 99, 132, 1)',
                    borderWidth: 1
                }, {
                    label: 'Stimulants',
                    data: values2Stimulants,
                    borderColor: 'rgba(54, 162, 235, 1)',
                    backgroundColor: 'rgba(54, 162, 235, 0.2)',
                    pointBackgroundColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1
                }, {
                    label: 'Opioids',
                    data: values2Opioids,
                    borderColor: 'rgba(255, 206, 86, 1)',
                    backgroundColor: 'rgba(255, 206, 86, 0.2)',
                    pointBackgroundColor: 'rgba(255, 206, 86, 1)',
                    borderWidth: 1
                }, {
                    label: 'NSP',
                    data: values2NSP,
                    borderColor: 'rgba(75, 192, 192, 1)',
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    pointBackgroundColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    r: {
                        beginAtZero: true,
                        min: 0
                    }
                }
            }
        });

        const ctx3 = document.getElementById('chart3').getContext('2d');

const chart3 = new Chart(ctx3, {
    type: 'bar', 
    data: {
        labels: labels3, 
        datasets: [{
            label: 'Cannabis',
            data: values3Cannabis, 
            backgroundColor: 'rgba(255, 99, 132, 0.2)', 
            borderColor: 'rgba(255, 99, 132, 1)', 
            borderWidth: 1
        }, {
            label: 'Stimulants',
            data: values3Stimulants,
            backgroundColor: 'rgba(54, 162, 235, 0.2)',
            borderColor: 'rgba(54, 162, 235, 1)',
            borderWidth: 1
        }, {
            label: 'Opioids',
            data: values3Opioids,
            backgroundColor: 'rgba(255, 206, 86, 0.2)',
            borderColor: 'rgba(255, 206, 86, 1)',
            borderWidth: 1
        }, {
            label: 'NSP',
            data: values3NSP,
            backgroundColor: 'rgba(75, 192, 192, 0.2)',
            borderColor: 'rgba(75, 192, 192, 1)',
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            y: {
                beginAtZero: true 
            }
        }
    }
});

const ctx4 = document.getElementById('chart4').getContext('2d');

const chart4 = new Chart(ctx4, {
    type: 'pie', 
    data: {
        labels: labels4,
        datasets: [{
            label: 'Cannabis', 
            data: values4Cannabis, 
            backgroundColor: 'rgba(255, 99, 132, 0.2)', 
            borderColor: 'rgba(255, 99, 132, 1)', 
            borderWidth: 1 
        }, {
            label: 'Stimulants',
            data: values4Stimulants,
            backgroundColor: 'rgba(54, 162, 235, 0.2)',
            borderColor: 'rgba(54, 162, 235, 1)',
            borderWidth: 1
        }, {
            label: 'Opioids',
            data: values4Opioids,
            backgroundColor: 'rgba(255, 206, 86, 0.2)',
            borderColor: 'rgba(255, 206, 86, 1)',
            borderWidth: 1
        }, {
            label: 'NSP',
            data: values4NSP,
            backgroundColor: 'rgba(75, 192, 192, 0.2)',
            borderColor: 'rgba(75, 192, 192, 1)',
            borderWidth: 1
        }]
    }
});
const ctx5 = document.getElementById('chart5').getContext('2d');
        const chart5 = new Chart(ctx5, {
            type: 'bar',
            data: {
                labels: labels5,
                datasets: [
                    { label: '<15', data: values5Min15, backgroundColor: 'rgba(255, 99, 132, 0.2)', borderColor: 'rgba(255, 99, 132, 1)', borderWidth: 1 },
                    { label: '15-19', data: values5Min15max19, backgroundColor: 'rgba(54, 162, 235, 0.2)', borderColor: 'rgba(54, 162, 235, 1)', borderWidth: 1 },
                    { label: '20-24', data: values5Min20max24, backgroundColor: 'rgba(255, 206, 86, 0.2)', borderColor: 'rgba(255, 206, 86, 1)', borderWidth: 1 },
                    { label: '25-29', data: values5Min25max29, backgroundColor: 'rgba(75, 192, 192, 0.2)', borderColor: 'rgba(75, 192, 192, 1)', borderWidth: 1 },
                    { label: '30-34', data: values5Min30max34, backgroundColor: 'rgba(153, 102, 255, 0.2)', borderColor: 'rgba(153, 102, 255, 1)', borderWidth: 1 },
                    { label: '35-39', data: values5Min35max39, backgroundColor: 'rgba(255, 159, 64, 0.2)', borderColor: 'rgba(255, 159, 64, 1)', borderWidth: 1 },
                    { label: '40-44', data: values5Min40max44, backgroundColor: 'rgba(54, 162, 235, 0.2)', borderColor: 'rgba(54, 162, 235, 1)', borderWidth: 1 },
                    { label: '45-49', data: values5Min45max49, backgroundColor: 'rgba(255, 99, 132, 0.2)', borderColor: 'rgba(255, 99, 132, 1)', borderWidth: 1 },
                    { label: '50-54', data: values5Min50max54, backgroundColor: 'rgba(153, 102, 255, 0.2)', borderColor: 'rgba(153, 102, 255, 1)', borderWidth: 1 },
                    { label: '55-59', data: values5Min55max59, backgroundColor: 'rgba(255, 206, 86, 0.2)', borderColor: 'rgba(255, 206, 86, 1)', borderWidth: 1 },
                    { label: '60-64', data: values5Min60max64, backgroundColor: 'rgba(75, 192, 192, 0.2)', borderColor: 'rgba(75, 192, 192, 1)', borderWidth: 1 },
                    { label: '>=65', data: values5max65, backgroundColor: 'rgba(255, 159, 64, 0.2)', borderColor: 'rgba(255, 159, 64, 1)', borderWidth: 1 },
                    { label: 'Total', data: values5total, backgroundColor: 'rgba(153, 102, 255, 0.2)', borderColor: 'rgba(153, 102, 255, 1)', borderWidth: 1 }
                ]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        const ctx6 = document.getElementById('chart6').getContext('2d');
        const chart6 = new Chart(ctx6, {
            type: 'bar',
            data: {
                labels: labels6,
                datasets: [
                    { label: 'Men', data: values6men, backgroundColor: 'rgba(54, 162, 235, 0.2)', borderColor: 'rgba(54, 162, 235, 1)', borderWidth: 1 },
                    { label: 'Women', data: values6women, backgroundColor: 'rgba(255, 99, 132, 0.2)', borderColor: 'rgba(255, 99, 132, 1)', borderWidth: 1 },
                    { label: 'Total', data: values6Total, backgroundColor: 'rgba(75, 192, 192, 0.2)', borderColor: 'rgba(75, 192, 192, 1)', borderWidth: 1 }
                ]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        const ctx7 = document.getElementById('chart7').getContext('2d');
        const chart7 = new Chart(ctx7, {
            type: 'doughnut',
            data: {
                labels: labels7,
                datasets: [{
                    label: 'Housing Situation Distribution',
                    data: values7housing,
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.5)',
                        'rgba(54, 162, 235, 0.5)',
                        'rgba(255, 206, 86, 0.5)',
                        'rgba(75, 192, 192, 0.5)',
                        'rgba(153, 102, 255, 0.5)',
                        'rgba(255, 159, 64, 0.5)',
                        'rgba(255, 99, 132, 0.5)',
                        'rgba(54, 162, 235, 0.5)',
                        'rgba(255, 206, 86, 0.5)',
                        'rgba(75, 192, 192, 0.5)',
                        'rgba(153, 102, 255, 0.5)',
                        'rgba(255, 159, 64, 0.5)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top',
                    },
                    tooltip: {
                        callbacks: {
                            label: function(tooltipItem) {
                                return tooltipItem.label + ': ' + tooltipItem.raw.toLocaleString();
                            }
                        }
                    }
                }
            }
        });
        const ctx8 = document.getElementById('chart8').getContext('2d');
        const chart8 = new Chart(ctx8, {
            type: 'bar',
            data: {
                labels: labels8,
                datasets: [{
                    label: 'Occasionally Employed',
                    data: values8ocasionallyemployed,
                    backgroundColor: 'rgba(255, 99, 132, 0.5)',
                    borderColor: 'rgba(255, 99, 132, 1)',
                    borderWidth: 1
                }, {
                    label: 'Permanently Employed',
                    data: values8permanently,
                    backgroundColor: 'rgba(54, 162, 235, 0.5)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1
                }, {
                    label: 'In School/Student',
                    data: values8student,
                    backgroundColor: 'rgba(255, 206, 86, 0.5)',
                    borderColor: 'rgba(255, 206, 86, 1)',
                    borderWidth: 1
                }, {
                    label: 'Unemployed/Not Working',
                    data: values8unemployed,
                    backgroundColor: 'rgba(75, 192, 192, 0.5)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1
                }, {
                    label: 'Social Assistance Recipient/Retiree/Homemaker/Medical Reti',
                    data: values8socialaasistance,
                    backgroundColor: 'rgba(153, 102, 255, 0.5)',
                    borderColor: 'rgba(153, 102, 255, 1)',
                    borderWidth: 1
                }, {
                    label: 'Missing/Unknown',
                    data: values8missing,
                    backgroundColor: 'rgba(255, 159, 64, 0.5)',
                    borderColor: 'rgba(255, 159, 64, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top',
                    },
                    tooltip: {
                        callbacks: {
                            label: function(tooltipItem) {
                                return tooltipItem.label + ': ' + tooltipItem.raw.toLocaleString();
                            }
                        }
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        max: 1000
                    }
                }
            }
        });

        const ctx9 = document.getElementById('chart9').getContext('2d');
        const chart9 = new Chart(ctx9, {
            type: 'bar',
            data: {
                labels: labels9,
                datasets: [{
                    label: 'Outpatient Regime',
                    data: values9outpatient,
                    backgroundColor: 'rgba(255, 99, 132, 0.5)',
                    borderColor: 'rgba(255, 99, 132, 1)',
                    borderWidth: 1
                }, {
                    label: 'Inpatient Regime',
                    data: values9inpatient,
                    backgroundColor: 'rgba(54, 162, 235, 0.5)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1
                }, {
                    label: 'Treatment in Prisons',
                    data: values9prison,
                    backgroundColor: 'rgba(255, 206, 86, 0.5)',
                    borderColor: 'rgba(255, 206, 86, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true,
                        max: 1000
                    }
                },
                plugins: {
                    legend: {
                        position: 'top',
                    },
                    tooltip: {
                        callbacks: {
                            label: function(tooltipItem) {
                                return tooltipItem.label + ': ' + tooltipItem.raw.toLocaleString();
                            }
                        }
                    }
                }
            }
        });
        const ctx10 = document.getElementById('chart10').getContext('2d');
        const chart10 = new Chart(ctx10, {
            type: 'bar',
            data: {
                labels: labels10,
                datasets: [{
                    label: 'Never attended school/Incomplete primary education',
                    data: values10never,
                    backgroundColor: 'rgba(255, 99, 132, 0.5)',
                    borderColor: 'rgba(255, 99, 132, 1)',
                    borderWidth: 1
                }, {
                    label: 'Primary school',
                    data: values10primary,
                    backgroundColor: 'rgba(54, 162, 235, 0.5)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1
                }, {
                    label: 'Secondary education',
                    data: values10secondary,
                    backgroundColor: 'rgba(255, 206, 86, 0.5)',
                    borderColor: 'rgba(255, 206, 86, 1)',
                    borderWidth: 1
                }, {
                    label: 'Higher education',
                    data: values10higher,
                    backgroundColor: 'rgba(75, 192, 192, 0.5)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true,
                        max: 1000
                    }
                },
                plugins: {
                    legend: {
                        position: 'top',
                    },
                    tooltip: {
                        callbacks: {
                            label: function(tooltipItem) {
                                return tooltipItem.label + ': ' + tooltipItem.raw.toLocaleString();
                            }
                        }
                    }
                }
            }
        });
        const ctx11 = document.getElementById('chart11').getContext('2d');
        const chart11 = new Chart(ctx11, {
            type: 'bar',
            data: {
                labels: labels11,
                datasets: [{
                    label: 'Court/Probation/Police',
                    data: values11court,
                    backgroundColor: 'rgba(255, 99, 132, 0.5)',
                    borderColor: 'rgba(255, 99, 132, 1)',
                    borderWidth: 1
                }, {
                    label: 'Doctors',
                    data: values11doctors,
                    backgroundColor: 'rgba(54, 162, 235, 0.5)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1
                }, {
                    label: 'Other drug treatment centers',
                    data: values11otherdrug,
                    backgroundColor: 'rgba(255, 206, 86, 0.5)',
                    borderColor: 'rgba(255, 206, 86, 1)',
                    borderWidth: 1
                }, {
                    label: 'Other medical or social services',
                    data: values11othermedical,
                    backgroundColor: 'rgba(75, 192, 192, 0.5)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1
                }, {
                    label: 'Educational services',
                    data: values11educational,
                    backgroundColor: 'rgba(153, 102, 255, 0.5)',
                    borderColor: 'rgba(153, 102, 255, 1)',
                    borderWidth: 1
                }, {
                    label: 'On own initiative, on the recommendation of friends or family',
                    data: values11onown,
                    backgroundColor: 'rgba(255, 159, 64, 0.5)',
                    borderColor: 'rgba(255, 159, 64, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true,
                        max: 1000
                    }
                },
                plugins: {
                    legend: {
                        position: 'top',
                    },
                    tooltip: {
                        callbacks: {
                            label: function(tooltipItem) {
                                return tooltipItem.label + ': ' + tooltipItem.raw.toLocaleString();
                            }
                        }
                    }
                }
            }
        });

        const ctx12 = document.getElementById('chart12').getContext('2d');
        const chart12 = new Chart(ctx12, {
            type: 'bar',
            data: {
                labels: labels12,
                datasets: [{
                    label: 'Tested positive',
                    data: values12Pozitive,
                    backgroundColor: 'rgba(255, 99, 132, 0.5)',
                    borderColor: 'rgba(255, 99, 132, 1)',
                    borderWidth: 1
                }, {
                    label: 'Total Tested',
                    data: values12Total,
                    backgroundColor: 'rgba(54, 162, 235, 0.5)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true,
                        max: 1000
                    }
                },
                plugins: {
                    legend: {
                        position: 'top',
                    },
                    tooltip: {
                        callbacks: {
                            label: function(tooltipItem) {
                                return tooltipItem.label + ': ' + tooltipItem.raw.toLocaleString();
                            }
                        }
                    }
                }
            }
        });

</script>

</body>
</html>
