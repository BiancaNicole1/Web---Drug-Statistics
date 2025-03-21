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

// Extragerea datelor din prima tabelă
$sql1 = "SELECT * FROM 2021_criminality";
$result1 = $conn->query($sql1);
$data1 = array();
while($row = $result1->fetch_assoc()) {
    $data1[] = $row;
}

// Extragerea datelor din a doua tabelă
$sql2 = "SELECT * FROM 2021_criminality_applied_penalties";
$result2 = $conn->query($sql2);
$data2 = array();
while($row = $result2->fetch_assoc()) {
    $data2[] = $row;
}

$sql3 = "SELECT * FROM 2021_criminality_convictions";
$result3 = $conn->query($sql3);
$data3 = array();
while($row = $result3->fetch_assoc()) {
    $data3[] = $row;
}

$sql4 = "SELECT * FROM 2021_criminality_convictions_gender_age";
$result4 = $conn->query($sql4);
$data4 = array();
while($row = $result4->fetch_assoc()) {
    $data4[] = $row;
}

$sql5 = "SELECT * FROM 2021_medical_emergencies_administrare";
$result5 = $conn->query($sql5);
$data5 = array();
while($row = $result5->fetch_assoc()) {
    $data5[] = $row;
}

$sql6 = "SELECT * FROM 2021_medical_emergencies_age";
$result6 = $conn->query($sql6);
$data6 = array();
while($row = $result6->fetch_assoc()) {
    $data6[] = $row;
}

$sql7 = "SELECT * FROM 2021_medical_emergencies_diagnostic";
$result7 = $conn->query($sql7);
$data7 = array();
while($row = $result7->fetch_assoc()) {
    $data7[] = $row;
}

$sql8 = "SELECT * FROM 2021_medical_emergencies_gender";
$result8 = $conn->query($sql8);
$data8 = array();
while($row = $result8->fetch_assoc()) {
    $data8[] = $row;
}

$sql9 = "SELECT * FROM 2021_confiscations";
$result9 = $conn->query($sql9);
$data9 = array();
while($row = $result9->fetch_assoc()) {
    $data9[] = $row;
}

$sql10 = "SELECT * FROM 2021_diseases";
$result10 = $conn->query($sql10);
$data10 = array();
while($row = $result10->fetch_assoc()) {
    $data10[] = $row;
}

$sql11 = "SELECT * FROM 2021_prevention_activities";
$result11 = $conn->query($sql11);
$data11 = array();
while($row = $result11->fetch_assoc()) {
    $data11[] = $row;
}

$sql12 = "SELECT * FROM 2021_prevention_campaigns";
$result12 = $conn->query($sql12);
$data12 = array();
while($row = $result12->fetch_assoc()) {
    $data12[] = $row;
}

$sql13 = "SELECT * FROM 2021_prevention_national_school_projects";
$result13 = $conn->query($sql13);
$data13 = array();
while($row = $result13->fetch_assoc()) {
    $data13[] = $row;
}

$sql14 = "SELECT * FROM 2021_treatment_admission_age";
$result14 = $conn->query($sql14);
$data14 = array();
while($row = $result14->fetch_assoc()) {
    $data14[] = $row;
}

$sql15 = "SELECT * FROM 2021_treatment_admission_gen";
$result15 = $conn->query($sql15);
$data15 = array();
while($row = $result15->fetch_assoc()) {
    $data15[] = $row;
}

$sql16 = "SELECT * FROM 2021_treatment_admission_locuinta";
$result16 = $conn->query($sql16);
$data16 = array();
while($row = $result16->fetch_assoc()) {
    $data16[] = $row;
}

$sql17 = "SELECT * FROM 2021_treatment_admission_occupation";
$result17 = $conn->query($sql17);
$data17 = array();
while($row = $result17->fetch_assoc()) {
    $data17[] = $row;
}

$sql18 = "SELECT * FROM 2021_treatment_admission_regime";
$result18 = $conn->query($sql18);
$data18 = array();
while($row = $result18->fetch_assoc()) {
    $data18[] = $row;
}

$sql19 = "SELECT * FROM 2021_treatment_admission_studii";
$result19 = $conn->query($sql19);
$data19 = array();
while($row = $result19->fetch_assoc()) {
    $data19[] = $row;
}

$sql20 = "SELECT * FROM 2021_treatment_admission_sursa";
$result20 = $conn->query($sql20);
$data20 = array();
while($row = $result20->fetch_assoc()) {
    $data20[] = $row;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>2021</title>
    <link rel="stylesheet" href="../CSS/Tables.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
</head>
<body>

    <button class="go-back" onclick="window.location.href='../Generate.php';">Go back</button>

<!-- Primul rand de grafice -->
<div class="charts-container">
    <div class="chart-item">
        <div class="chart-title">Criminality in 2021</div>
        <canvas id="chart1"></canvas>
    </div>
    <div class="chart-item">
        <div class="chart-title">Criminality applied penalties</div>
        <canvas id="chart2"></canvas>
    </div>
    <div class="chart-item">
        <div class="chart-title">Criminality convictions</div>
        <canvas id="chart3"></canvas>
    </div>
    <div class="chart-item">
        <div class="chart-title">Criminality by gender and age</div>
        <canvas id="chart4"></canvas>
    </div>
</div>

 <!-- Al doilea rând de grafice -->
 <div class="second-row-container">
    <div class="chart-item-second">
        <div class="chart-title">Medical emergencies administrations</div>
        <canvas id="chart5"></canvas>
    </div>
    <div class="chart-item-second">
        <div class="chart-title">Medical emergencies by age</div>
        <canvas id="chart6"></canvas>
    </div>
    <div class="chart-item-second">
        <div class="chart-title">Medical emergencies diagnostics</div>
        <canvas id="chart7"></canvas>
    </div>
    <div class="chart-item-second">
        <div class="chart-title">Medical emergencies by gender</div>
        <canvas id="chart8"></canvas>
    </div>
</div>

<!-- Al treilea rând de grafice -->
<div class="third-row-container">
    <div class="chart-item-third">
        <div class="chart-title">Confiscations</div>
        <canvas id="chart9"></canvas>
    </div>
</div>

<!-- Al patrulea rând de grafice -->
<div class="fourth-row-container">
    <div class="chart-item-fourth">
        <div class="chart-title">Diseases</div>
        <canvas id="chart10"></canvas>
    </div>
</div>

<!-- Al cincilea rând de grafice -->
<div class="fifth-row-container">
    <div class="chart-item-fifth">
        <div class="chart-title">Prevention activities</div>
        <canvas id="chart11"></canvas>
    </div>
    <div class="chart-item-fifth">
        <div class="chart-title">Prevention campaigns</div>
        <canvas id="chart12"></canvas>
    </div>
    <div class="chart-item-fifth">
        <div class="chart-title">Prevention national school projects</div>
        <canvas id="chart13"></canvas>
    </div>
</div>

<!-- Al saselea rând de grafice -->
<div class="sixth-row-container">
    <div class="chart-item-sixth">
        <div class="chart-title">Treatment admission by age</div>
        <canvas id="chart14"></canvas>
    </div>
    <div class="chart-item-sixth">
        <div class="chart-title">Treatment admission by gender</div>
        <canvas id="chart15"></canvas>
    </div>
    <div class="chart-item-sixth">
        <div class="chart-title">Treatment admission by residence </div>
        <canvas id="chart16"></canvas>
    </div>
    <div class="chart-item-sixth">
        <div class="chart-title">Treatment admission by occupation</div>
        <canvas id="chart17"></canvas>
    </div>
    <div class="chart-item-sixth">
        <div class="chart-title">Treatment admission by regime</div>
        <canvas id="chart18"></canvas>
    </div>
    <div class="chart-item-sixth">
        <div class="chart-title">Treatment admission by studies</div>
        <canvas id="chart19"></canvas>
    </div>
    <div class="chart-item-sixth">
        <div class="chart-title">Treatment admission by source</div>
        <canvas id="chart20"></canvas>
    </div>
</div>

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
const data13 = <?php echo json_encode($data13); ?>;
const data14 = <?php echo json_encode($data14); ?>;
const data15 = <?php echo json_encode($data15); ?>;
const data16 = <?php echo json_encode($data16); ?>;
const data17 = <?php echo json_encode($data17); ?>;
const data18 = <?php echo json_encode($data18); ?>;
const data19 = <?php echo json_encode($data19); ?>;
const data20 = <?php echo json_encode($data20); ?>;

// Procesarea datelor pentru Chart.js
// Pentru prima tabelă
const labels1 = data1.map(item => item['Persons']); 
const values1 = data1.map(item => parseInt(item['Count'])); 

// Pentru a doua tabelă
const labels2 = data2.map(item => item['Situation of Penalty']); 
const values2DrugUse = data2.map(item => parseInt(item['Drug Use'])); 
const values2DrugOperations = data2.map(item => parseInt(item['Drug Operations'])); 

//a treia
const labels3 = data3.map(item => item['Article']);
const values3 = data3.map(item => parseInt(item['Count']));

//a patra
const labels4 = data4.map(item => item['Gender']);
const values4Plus18 = data4.map(item => parseInt(item['+18']));
const values4Minors = data4.map(item => parseInt(item['Minors']));

//a cincea
const labels5 = data5.map(item => item['Administration method']);
const values5Cannabis = data5.map(item => parseInt(item['Cannabis']));
const values5Stimulants = data5.map(item => parseInt(item['Stimulants']));
const values5Opioids = data5.map(item => parseInt(item['Opioids']));
const values5NSP = data5.map(item => parseInt(item['NSP']));

//a sasea
const labels6 = data6.map(item => item['Age']);
const values6Cannabis = data6.map(item => parseInt(item['Cannabis']));
const values6Stimulants = data6.map(item => parseInt(item['Stimulants']));
const values6Opioids = data6.map(item => parseInt(item['Opioids']));
const values6NSP = data6.map(item => parseInt(item['NSP']));

//a saptea
const labels7 = data7.map(item => item['Diagnostic']);
const values7Cannabis = data7.map(item => parseInt(item['Cannabis']));
const values7Stimulants = data7.map(item => parseInt(item['Stimulants']));
const values7Opioids = data7.map(item => parseInt(item['Opioids']));
const values7NSP = data7.map(item => parseInt(item['NSP']));

//opt
const labels8 = data8.map(item => item['Gender']);
const values8Cannabis = data8.map(item => parseInt(item['Cannabis']));
const values8Stimulants = data8.map(item => parseInt(item['Stimulants']));
const values8Opioids = data8.map(item => parseInt(item['Opioids']));
const values8NSP = data8.map(item => parseInt(item['NSP']));

//noua
const labels9 = data9.map(item =>item['Drugs']);
const values9Grams = data9.map(item => parseInt(item['Grams']));
const values9Tablets = data9.map(item => parseInt(item['Tablets']));
const values9Doses = data9.map(item => parseInt(item['Doses']));
const values9Milliliters = data9.map(item => parseInt(item['Milliliters']));
const values9Total = data9.map(item => parseInt(item['Total Confiscations']));

//zece
const labels10 = data10.map(item => item['Infection']);
const values10Pozitive = data10.map(item => parseInt(item['Tested positive']));
const values10Total = data10.map(item => parseInt(item['Total Tested']));

//11
const labels11 = data11.map(item => item['Context']);
const values11Activ = data11.map(item => item['Activities']);
const values11Children = data11.map(item => parseInt(item['Parents']));
const values11Teacher = data11.map(item => parseInt(item['Teachers']));

//12
const labels12 = data12.map(item => item['Campaign']);
const values12Duration = data12.map(item => item['Duration']);
const values12Number = data12.map(item => parseInt(item['Number of people']));

//13
const labels13 = data13.map(item => item['Project']);
const values13people = data13.map(item => parseInt(item['People benefitting']));
const values13number = data13.map(item => item['Number of activities']);
const values13target = data13.map(item => item['Target Audience']);

//14
const labels14 = data14.map(item => item['Drugs']);
const values14Min15 = data14.map(item => parseInt(item['<15']));
const values14Min15max19 = data14.map(item => parseInt(item['15-19']));
const values14Min20max24 = data14.map(item => parseInt(item['20-24']));
const values14Min25max29 = data14.map(item => parseInt(item['25-29']));
const values14Min30max34 = data14.map(item => parseInt(item['30-34']));
const values14Min35max39 = data14.map(item => parseInt(item['35-39']));
const values14Min40max44 = data14.map(item => parseInt(item['40-44']));
const values14Min45max49 = data14.map(item => parseInt(item['45-49']));
const values14Min50max54 = data14.map(item => parseInt(item['50-54']));
const values14Min55max59 = data14.map(item => parseInt(item['55-59']));
const values14Min60max64 = data14.map(item => parseInt(item['60-64']));
const values14max65 = data14.map(item => parseInt(item['>=65']));
const values14total = data14.map(item => parseInt(item['Total']));

//15
const labels15 = data15.map(item => item['Drugs']);
const values15men = data15.map(item => parseInt(item['Men']));
const values15women = data15.map(item => parseInt(item['Women']));
const values15Total = data15.map(item => parseInt(item['Total']));

//16
const labels16 = data16.map(item => item['Drugs']);
const values16housing = data16.map(item => parseInt(item['Stable housing']));
const values16unstable = data16.map(item => parseInt(item['Unstable housing and/or homeless']));
const values16detention = data16.map(item => parseInt(item['In detention']));
const values16missing = data16.map(item => parseInt(item['Dont know/Missing']));
const values16total= data16.map(item => parseInt(item['Total']));

//17
const labels17 = data17.map(item => item['Drugs']);
const values17ocasionallyemployed = data17.map(item => parseInt(item['Occasionally employed']));
const values17permanently = data17.map(item => parseInt(item['Permanently employed']));
const values17student = data17.map(item => parseInt(item['In school/Student']));
const values17unemployed = data17.map(item => parseInt(item['Unemployed/Not working']));
const values17socialaasistance = data17.map(item => parseInt(item['Social assistance recipient/Retiree/Homemaker/Medical reti']));
const values17missing = data17.map(item => parseInt(item['Dont know/Missing']));
const values17total= data17.map(item => parseInt(item['Total']));

//18
const labels18 = data18.map(item => item['Drugs']);
const values18outpatient = data18.map(item => parseInt(item['Outpatient Regime']));
const values18inpatient = data18.map(item => parseInt(item['Inpatient Regime']));
const values18prison = data17.map(item => parseInt(item['Treatment in Prisons']));
const values18total= data17.map(item => parseInt(item['Total']));

//19
const labels19 = data19.map(item => item['Drugs']);
const values19never = data19.map(item => parseInt(item['Never attended school/Incomplete primary education']));
const values19primary = data19.map(item => parseInt(item['Primary school']));
const values19secondary = data19.map(item => parseInt(item['Secondary education']));
const values19higher = data19.map(item => parseInt(item['Higher education']));
const values19missing = data19.map(item => parseInt(item['Dont know/Missing']));
const values19total = data19.map(item => parseInt(item['TOTAL']));

//20
const labels20 = data20.map(item => item['Drugs']);
const values20court = data20.map(item => parseInt(item['Court/Probation/Police']));
const values20doctors = data20.map(item => parseInt(item['Doctors']));
const values20otherdrug = data20.map(item => parseInt(item['Other drug treatment centers']));
const values20othermedical= data20.map(item => parseInt(item['other medical or social services']));
const values20educational = data20.map(item => parseInt(item['Educational services']));
const values20onown = data20.map(item => parseInt(item['On own initiative, on the recommendation of friends or family']));
const values20missing = data20.map(item => parseInt(item['Dont know/Missing']));
const values20others = data20.map(item => parseInt(item['Others']));
const values20total = data20.map(item => parseInt(item['TOTAL']));


// Crearea graficelor cu Chart.js
const ctx1 = document.getElementById('chart1').getContext('2d');
const chart1 = new Chart(ctx1, {
    type: 'pie',
    data: {
        labels: labels1,
        datasets: [{
            label: 'Persons, Count',
            data: values1,
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1
        }]
    }
});

const ctx2 = document.getElementById('chart2').getContext('2d');
const chart2 = new Chart(ctx2, {
    type: 'doughnut',
    data: {
        labels: labels2,
        datasets: [{
            label: 'Situation of Penalty vs Drug Use vs Drug Operations',
            data: [values2DrugUse[0], values2DrugOperations[0]],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1
        }]
    }
});
    const ctx3 = document.getElementById('chart3').getContext('2d');
    const chart3 = new Chart(ctx3, {
        type: 'bar',
        data: {
            labels: labels3,
            datasets: [{
                label: 'Articles vs Count',
                data: values3,
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                ],
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
        type: 'bar', 
        data: {
            labels: labels4,
            datasets: [{
                label: '+18',
                data: values4Plus18,
                backgroundColor: 'rgba(255, 99, 132, 0.2)',
                borderColor: 'rgba(255, 99, 132, 1)',
                borderWidth: 1
            }, {
                label: 'Minors',
                data: values4Minors,
                backgroundColor: 'rgba(54, 162, 235, 0.2)',
                borderColor: 'rgba(54, 162, 235, 1)',
                borderWidth: 1
            }]
        },
        options: {
            indexAxis: 'y',
            scales: {
                x: {
                    beginAtZero: true
                }
            }
        }
    });


    const ctx5 = document.getElementById('chart5').getContext('2d');
const chart5 = new Chart(ctx5, {
    type: 'bar',
    data: {
        labels: labels5,
        datasets: [{
            label: 'Cannabis',
            data: values5Cannabis,
            backgroundColor: 'rgba(255, 99, 132, 0.2)',
            borderColor: 'rgba(255, 99, 132, 1)',
            borderWidth: 1
        }, {
            label: 'Stimulants',
            data: values5Stimulants,
            backgroundColor: 'rgba(54, 162, 235, 0.2)',
            borderColor: 'rgba(54, 162, 235, 1)',
            borderWidth: 1
        }, {
            label: 'Opioids',
            data: values5Opioids,
            backgroundColor: 'rgba(255, 206, 86, 0.2)',
            borderColor: 'rgba(255, 206, 86, 1)',
            borderWidth: 1
        }, {
            label: 'NSP',
            data: values5NSP,
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

new Chart("chart6", {
    type: "line",
    data: {
        labels: labels6,
        datasets: [{
            label: 'Cannabis',
            data: values6Cannabis,
            borderColor: 'red',
            fill: false
        }, {
            label: 'Stimulants',
            data: values6Stimulants,
            borderColor: 'green',
            fill: false
        }, {
            label: 'Opioids',
            data: values6Opioids,
            borderColor: 'blue',
            fill: false
        }, {
            label: 'NSP',
            data: values6NSP,
            borderColor: 'orange',
            fill: false
        }]
    },
    options: {
        legend: {
            display: true,
            position: 'top',
            labels: {
                fontColor: 'black'
            }
        },
        scales: {
            x: {
                title: {
                    display: true,
                    text: 'Age'
                }
            },
            y: {
                title: {
                    display: true,
                    text: 'Consumption'
                },
                beginAtZero: true
            }
        }
    }
});

const ctx7 = document.getElementById('chart7').getContext('2d');
const chart7 = new Chart(ctx7, {
    type: 'pie', 
    data: {
        labels: labels7, 
        datasets: [
            {
                label: 'Cannabis', 
                data: values7Cannabis, 
                backgroundColor: 'rgba(255, 99, 132, 0.2)', 
                borderColor: 'rgba(255, 99, 132, 1)', 
                borderWidth: 1 
            },
            {
                label: 'Stimulants', 
                data: values7Stimulants,
                backgroundColor: 'rgba(54, 162, 235, 0.2)', 
                borderColor: 'rgba(54, 162, 235, 1)', 
                borderWidth: 1 
            },
            {
                label: 'Opioids', 
                data: values7Opioids, 
                backgroundColor: 'rgba(255, 206, 86, 0.2)', 
                borderColor: 'rgba(255, 206, 86, 1)', 
                borderWidth: 1
            },
            {
                label: 'NSP', 
                data: values7NSP, 
                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                borderColor: 'rgba(75, 192, 192, 1)', 
                borderWidth: 1 
            }
        ]
    },
    options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
            title: {
                display: true,
                text: 'Diagnostic Distribution' 
            },
            legend: {
                display: true,
                position: 'top' 
            }
        }
    }
});

const ctx8 = document.getElementById('chart8').getContext('2d');
const chart8 = new Chart(ctx8, {
    type: 'bar', // Tipul graficului (aici bar chart)
    data: {
        labels: labels8, // Etichetele pentru barele graficului
        datasets: [
            {
                label: 'Cannabis', // Label pentru dataset (opțional)
                data: values8Cannabis, // Datele pentru grafic
                backgroundColor: 'rgba(255, 99, 132, 0.2)', // Culoare pentru bare
                borderColor: 'rgba(255, 99, 132, 1)', // Culoare pentru contur
                borderWidth: 1 // Grosimea conturului
            },
            {
                label: 'Stimulants', // Label pentru dataset (opțional)
                data: values8Stimulants, // Datele pentru grafic
                backgroundColor: 'rgba(54, 162, 235, 0.2)', // Culoare pentru bare
                borderColor: 'rgba(54, 162, 235, 1)', // Culoare pentru contur
                borderWidth: 1 // Grosimea conturului
            },
            {
                label: 'Opioids', // Label pentru dataset (opțional)
                data: values8Opioids, // Datele pentru grafic
                backgroundColor: 'rgba(255, 206, 86, 0.2)', // Culoare pentru bare
                borderColor: 'rgba(255, 206, 86, 1)', // Culoare pentru contur
                borderWidth: 1 // Grosimea conturului
            },
            {
                label: 'NSP', // Label pentru dataset (opțional)
                data: values8NSP, // Datele pentru grafic
                backgroundColor: 'rgba(75, 192, 192, 0.2)', // Culoare pentru bare
                borderColor: 'rgba(75, 192, 192, 1)', // Culoare pentru contur
                borderWidth: 1 // Grosimea conturului
            }
        ]
    }
});

const ctx9 = document.getElementById('chart9').getContext('2d');
const chart9 = new Chart(ctx9, {
    type: 'radar',
    data: {
        labels: labels9,
        datasets: [{
            label: 'Grams',
            data: values9Grams,
            backgroundColor: 'rgba(255, 99, 132, 0.2)',
            borderColor: 'rgba(255, 99, 132, 1)',
            borderWidth: 1
        }, {
            label: 'Tablets',
            data: values9Tablets,
            backgroundColor: 'rgba(54, 162, 235, 0.2)',
            borderColor: 'rgba(54, 162, 235, 1)',
            borderWidth: 1
        }, {
            label: 'Doses',
            data: values9Doses,
            backgroundColor: 'rgba(255, 206, 86, 0.2)',
            borderColor: 'rgba(255, 206, 86, 1)',
            borderWidth: 1
        }, {
            label: 'Milliliters',
            data: values9Milliliters,
            backgroundColor: 'rgba(75, 192, 192, 0.2)',
            borderColor: 'rgba(75, 192, 192, 1)',
            borderWidth: 1
        }, {
            label: 'Total Confiscations',
            data: values9Total,
            backgroundColor: 'rgba(153, 102, 255, 0.2)',
            borderColor: 'rgba(153, 102, 255, 1)',
            borderWidth: 1
        }]
    },
    options: {
        scale: {
            ticks: {
                beginAtZero: true,
                max: 1000 // Setează maximul pe axa radială la 1000
            }
        }
    }
});

const ctx10 = document.getElementById('chart10').getContext('2d');
const chart10 = new Chart(ctx10, {
    type: 'horizontalBar',
    data: {
        labels: labels10,
        datasets: [{
            label: 'Tested positive',
            data: values10Pozitive,
            backgroundColor: 'rgba(255, 99, 132, 0.2)',
            borderColor: 'rgba(255, 99, 132, 1)',
            borderWidth: 1
        }, {
            label: 'Total Tested',
            data: values10Total,
            backgroundColor: 'rgba(54, 162, 235, 0.2)',
            borderColor: 'rgba(54, 162, 235, 1)',
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            xAxes: [{
                ticks: {
                    beginAtZero: true,
                    max: 170
                }
            }]
        }
    }
});
const ctx11 = document.getElementById('chart11').getContext('2d');
const chart11 = new Chart(ctx11, {
    type: 'doughnut',
    data: {
        labels: labels11,
        datasets: [{
            label: 'Activities',
            data: values11Activ,
            backgroundColor: 'rgba(255, 99, 132, 0.2)',
            borderColor: 'rgba(255, 99, 132, 1)',
            borderWidth: 1
        }, {
            label: 'Parents',
            data: values11Children,
            backgroundColor: 'rgba(54, 162, 235, 0.2)',
            borderColor: 'rgba(54, 162, 235, 1)',
            borderWidth: 1
        }, {
            label: 'Teachers',
            data: values11Teacher,
            backgroundColor: 'rgba(75, 192, 192, 0.2)',
            borderColor: 'rgba(75, 192, 192, 1)',
            borderWidth: 1
        }]
    }
});


const ctx12 = document.getElementById('chart12').getContext('2d');
const chart12 = new Chart(ctx12, {
    type: 'doughnut',
    data: {
        labels: labels12,
        datasets: [{
            label: 'Prevention campaign',
            data: [values12Duration[0], values12Number[0]],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1
        }]
    }
});

const ctx13 = document.getElementById('chart13').getContext('2d');

        const chart13 = new Chart(ctx13, {
            type: 'pie',
            data: {
                labels: labels13,
                datasets: [{
                    label: 'People benefitting per project',
                    data: values13people,
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.6)',
                        'rgba(54, 162, 235, 0.6)',
                        'rgba(255, 206, 86, 0.6)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)'
                    ],
                    borderWidth: 1
                }]
            }
        });

  const ctx14 = document.getElementById('chart14').getContext('2d');

new Chart(ctx14, {
    type: 'bar',
    data: {
        labels: labels14,
        datasets: [
            {
                label: '< 15',
                data: values14Min15,
                backgroundColor: '#FF5733'
            },
            {
                label: '15-19',
                data: values14Min15max19,
                backgroundColor: '#FFC300'
            },
            {
                label: '20-24',
                data: values14Min20max24,
                backgroundColor: '#DAF7A6'
            },
            {
                label: '25-29',
                data: values14Min25max29,
                backgroundColor: '#9EECEF'
            },
            {
                label: '30-34',
                data: values14Min30max34,
                backgroundColor: '#00A3E0'
            },
            {
                label: '35-39',
                data: values14Min35max39,
                backgroundColor: '#0052CC'
            },
            {
                label: '40-44',
                data: values14Min40max44,
                backgroundColor: '#001F54'
            },
            {
                label: '45-49',
                data: values14Min45max49,
                backgroundColor: '#7200FF'
            },
            {
                label: '50-54',
                data: values14Min50max54,
                backgroundColor: '#FF00BF'
            },
            {
                label: '55-59',
                data: values14Min55max59,
                backgroundColor: '#FF5733'
            },
            {
                label: '60-64',
                data: values14Min60max64,
                backgroundColor: '#FFC300'
            },
            {
                label: '>= 65',
                data: values14max65,
                backgroundColor: '#DAF7A6'
            },
            {
                label: 'Total',
                data: values14total,
                backgroundColor: '#9EECEF'
            }
        ]
    },
    options: {
        scales: {
            xAxes: [{ stacked: true }],
            yAxes: [{ stacked: true }]
        }
    }
});

const ctx15 = document.getElementById('chart15').getContext('2d');

// Crearea instanței graficului folosind Chart.js
new Chart(ctx15, {
    type: 'bar',
    data: {
        labels: labels15,
        datasets: [
            {
                label: 'Men',
                data: values15men,
                backgroundColor: '#3498db'
            },
            {
                label: 'Women',
                data: values15women,
                backgroundColor: '#e74c3c'
            },
            {
                label: 'Total',
                data: values15Total,
                backgroundColor: '#2ecc71'
            }
        ]
    },
    options: {
        scales: {
            xAxes: [{ stacked: true }],
            yAxes: [{ stacked: true }]
        }
    }
});

const ctx16 = document.getElementById('chart16').getContext('2d');

new Chart(ctx16, {
    type: 'line',
    data: {
        labels: labels16,
        datasets: [
            {
                label: 'Stable Housing',
                data: values16housing,
                borderColor: '#3498db',
                fill: false
            },
            {
                label: 'Unstable Housing / Homeless',
                data: values16unstable,
                borderColor: '#e74c3c',
                fill: false
            },
            {
                label: 'In Detention',
                data: values16detention,
                borderColor: '#2ecc71',
                fill: false
            },
            {
                label: 'Dont know / Missing',
                data: values16missing,
                borderColor: '#f39c12',
                fill: false
            },
            {
                label: 'Total',
                data: values16total,
                borderColor: '#9b59b6',
                fill: false
            }
        ]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }]
        }
    }
});

const ctx17 = document.getElementById('chart17').getContext('2d');

// Crearea instanței graficului folosind Chart.js
new Chart(ctx17, {
    type: 'radar',
    data: {
        labels: labels17,
        datasets: [
            {
                label: 'Occasionally Employed',
                data: values17ocasionallyemployed,
                borderColor: '#3498db',
                backgroundColor: 'rgba(52, 152, 219, 0.2)'
            },
            {
                label: 'Permanently Employed',
                data: values17permanently,
                borderColor: '#e74c3c',
                backgroundColor: 'rgba(231, 76, 60, 0.2)'
            },
            {
                label: 'In School/Student',
                data: values17student,
                borderColor: '#2ecc71',
                backgroundColor: 'rgba(46, 204, 113, 0.2)'
            },
            {
                label: 'Unemployed/Not Working',
                data: values17unemployed,
                borderColor: '#f39c12',
                backgroundColor: 'rgba(243, 156, 18, 0.2)'
            },
            {
                label: 'Social Assistance Recipient/Retiree/Homemaker/Medical Reti',
                data: values17socialaasistance,
                borderColor: '#9b59b6',
                backgroundColor: 'rgba(155, 89, 182, 0.2)'
            },
            {
                label: 'Dont know/Missing',
                data: values17missing,
                borderColor: '#34495e',
                backgroundColor: 'rgba(52, 73, 94, 0.2)'
            },
            {
                label: 'Total',
                data: values17total,
                borderColor: '#95a5a6',
                backgroundColor: 'rgba(149, 165, 166, 0.2)'
            }
        ]
    },
    options: {
        scale: {
            ticks: {
                beginAtZero: true
            }
        }
    }
});

const ctx18 = document.getElementById('chart18').getContext('2d');

new Chart(ctx18, {
    type: 'bar',
    data: {
        labels: labels18,
        datasets: [
            {
                label: 'Outpatient Regime',
                data: values18outpatient,
                backgroundColor: '#3498db'
            },
            {
                label: 'Inpatient Regime',
                data: values18inpatient,
                backgroundColor: '#e74c3c'
            },
            {
                label: 'Treatment in Prisons',
                data: values18prison,
                backgroundColor: '#2ecc71'
            },
            {
                label: 'Total',
                data: values18total,
                backgroundColor: '#f39c12'
            }
        ]
    },
    options: {
        scales: {
            x: {
                stacked: true,
            },
            y: {
                stacked: true
            }
        }
    }
});

const ctx19 = document.getElementById('chart19').getContext('2d');

// Crearea instanței graficului folosind Chart.js
new Chart(ctx19, {
    type: 'pie',
    data: {
        labels: labels19,
        datasets: [{
            label: 'Education Level Distribution for Drugs',
            data: values19total,
            backgroundColor: [
                'rgba(255, 99, 132, 0.8)',
                'rgba(54, 162, 235, 0.8)',
                'rgba(255, 206, 86, 0.8)',
                'rgba(75, 192, 192, 0.8)',
                'rgba(153, 102, 255, 0.8)',
                'rgba(255, 159, 64, 0.8)',
                'rgba(255, 99, 132, 0.6)',
                'rgba(54, 162, 235, 0.6)',
                'rgba(255, 206, 86, 0.6)',
                'rgba(75, 192, 192, 0.6)',
                'rgba(153, 102, 255, 0.6)',
                'rgba(255, 159, 64, 0.6)',
            ],
            borderWidth: 1
        }]
    },
    options: {
        plugins: {
            legend: {
                position: 'right',
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

const ctx20 = document.getElementById('chart20').getContext('2d');

new Chart(ctx20, {
    type: 'pie',
    data: {
        labels: labels20,
        datasets: [{
            label: 'Drug Treatment Services Usage Distribution',
            data: [
                values20court.reduce((a, b) => a + b, 0), // Suma pentru instanțe legale (court/probation/police)
                values20doctors.reduce((a, b) => a + b, 0), // Suma pentru instanțe medicale (doctors)
                values20otherdrug.reduce((a, b) => a + b, 0), // Suma pentru alte centre de tratament droguri (other drug treatment centers)
                values20othermedical.reduce((a, b) => a + b, 0), // Suma pentru alte servicii medicale sau sociale (other medical or social services)
                values20educational.reduce((a, b) => a + b, 0), // Suma pentru servicii educaționale (educational services)
                values20onown.reduce((a, b) => a + b, 0), // Suma pentru inițiativă proprie sau recomandare de la prieteni/familie (on own initiative)
                values20others.reduce((a, b) => a + b, 0), // Suma pentru alte categorii (others)
                values20missing.reduce((a, b) => a + b, 0) // Suma pentru cazurile lipsă sau necunoscute (dont know/missing)
            ],
            backgroundColor: [
                'rgba(255, 99, 132, 0.8)',
                'rgba(54, 162, 235, 0.8)',
                'rgba(255, 206, 86, 0.8)',
                'rgba(75, 192, 192, 0.8)',
                'rgba(153, 102, 255, 0.8)',
                'rgba(255, 159, 64, 0.8)',
                'rgba(255, 125, 64, 0.8)',
                'rgba(75, 192, 100, 0.8)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        plugins: {
            legend: {
                position: 'right',
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
