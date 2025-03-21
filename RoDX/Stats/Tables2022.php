<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>2022</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            padding: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        th, td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #A9D5DD;
        }

        tr:hover {
            background-color: #A9D5DD;
        }

        .go-back {
            position: absolute;
            top: 10px;
            left: 20px;
            padding: 7px 15px;
            background-color: #f0f0f0;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            text-decoration: none;
            font-family: Inter Tight;
            color: #333;
            transition: background-color 0.3s;
            margin-bottom: 10px; 
            box-shadow: 0 1px 1px rgba(0, 0, 0, 0.35);;
        }

        .go-back:hover {
            background-color: #e0e0e0;
        }
    </style>
</head>
    <button class="go-back" onclick="window.location.href='../Generate.php';">Go back</button>

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

    // tabel 1
    $sql1 = "SELECT * FROM 2022_confiscations"; 

    $result1 = $conn->query($sql1);

    if ($result1->num_rows > 0) {
        echo "<h2>Confiscations </h2>";
        echo "<table>";
        echo "<tr><th>Drugs</th><th>Grams</th><th>Tablets</th><th>Doses</th><th>Milliliters</th><th>Total Confiscations</th></tr>"; 

        // Iterăm prin fiecare rând de rezultate
        while ($row = $result1->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["Drugs"] . "</td>"; 
            echo "<td>" . $row["Grams"] . "</td>"; 
            echo "<td>" . $row["Tablets"] . "</td>"; 
            echo "<td>" . $row["Doses"] . "</td>"; 
            echo "<td>" . $row["Milliliters"] . "</td>"; 
            echo "<td>" . $row["Total Confiscations"] . "</td>"; 
            echo "</tr>";
        }

        echo "</table>";
    } else {
        echo "<p>Nu s-au găsit înregistrări.</p>";
    }
// Tabelul 2: Persons Count
$sql2 = "SELECT * FROM 2022_criminality"; 
$result2 = $conn->query($sql2);

if ($result2->num_rows > 0) {
    echo "<table>";
    echo "<h2>Criminality </h2>";
    echo "<tr><th>Persons</th><th>Count</th></tr>"; 

    while ($row = $result2->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["Persons"] . "</td>"; 
        echo "<td>" . $row["Count"] . "</td>"; 
        echo "</tr>";
    }

    echo "</table>";
} else {
    echo "<p>Nu s-au găsit înregistrări pentru Tabelul 2.</p>";
}

// Tabelul 3: Situation of Penalty, Drug Use, Drug Operations
$sql3 = "SELECT * FROM 2022_criminality_applied_penalties"; 
$result3 = $conn->query($sql3);

if ($result3->num_rows > 0) {
    echo "<table>";
    echo "<h2>Criminality applied penalties </h2>";
    echo "<tr><th>Situation of Penalty</th><th>Drug Use</th><th>Drug Operations</th></tr>"; 

    while ($row = $result3->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["Situation of Penalty"] . "</td>"; 
        echo "<td>" . $row["Drug Use"] . "</td>"; 
        echo "<td>" . $row["Drug Operations"] . "</td>"; 
        echo "</tr>";
    }

    echo "</table>";
} else {
    echo "<p>Nu s-au găsit înregistrări pentru Tabelul 3.</p>";
}

$sql4 = "SELECT * FROM 2022_criminality_convictions"; 
$result4 = $conn->query($sql4);

if ($result4->num_rows > 0) {
    echo "<table>";
    echo "<h2>Criminality convictions </h2>";
    echo "<tr><th>Article</th><th>Count</th></tr>"; 

    while ($row = $result4->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["Article"] . "</td>"; 
        echo "<td>" . $row["Count"] . "</td>"; 
        echo "</tr>";
    }

    echo "</table>";
} else {
    echo "<p>Nu s-au găsit înregistrări pentru Tabelul 4.</p>";
}

$sql5 = "SELECT * FROM 2022_Criminality_convictions_gender_age"; 
$result5 = $conn->query($sql5);

if ($result5->num_rows > 0) {
    echo "<table>";
    echo "<h2>Criminality convictions by gender and age </h2>";
    echo "<tr><th>Gender</th><th>+18</th><th>Minors</th></tr>"; 

    while ($row = $result5->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["Gender"] . "</td>"; 
        echo "<td>" . $row["+18"] . "</td>"; 
        echo "<td>" . $row["Minors"] . "</td>"; 
        echo "</tr>";
    }

    echo "</table>";
} else {
    echo "<p>Nu s-au găsit înregistrări pentru Tabelul 5.</p>";
}

$sql6 = "SELECT * FROM 2022_medical_emergencies_administrare"; 
$result6 = $conn->query($sql6);

if ($result6->num_rows > 0) {
    echo "<table>";
    echo "<h2>Medical emergencies administration</h2>";
    echo "<tr><th>Administration method</th><th>Cannabis</th><th>Stimulants</th><th>Opioids</th><th>NSP</th></tr>"; 

    while ($row = $result6->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["Administration method"] . "</td>"; 
        echo "<td>" . $row["Cannabis"] . "</td>"; 
        echo "<td>" . $row["Stimulants"] . "</td>"; 
        echo "<td>" . $row["Opioids"] . "</td>"; 
        echo "<td>" . $row["NSP"] . "</td>"; 
        echo "</tr>";
    }

    echo "</table>";
} else {
    echo "<p>Nu s-au găsit înregistrări pentru Tabelul 6.</p>";
}

$sql7 = "SELECT * FROM 2022_medical_emergencies_age"; 
$result7 = $conn->query($sql7);

if ($result7->num_rows > 0) {
    echo "<table>";
    echo "<h2>Medical emergencies by age </h2>";
    echo "<tr><th>Age</th><th>Cannabis</th><th>Stimulants</th><th>Opioids</th><th>NSP</th></tr>"; 

    while ($row = $result7->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["Age"] . "</td>"; 
        echo "<td>" . $row["Cannabis"] . "</td>"; 
        echo "<td>" . $row["Stimulants"] . "</td>"; 
        echo "<td>" . $row["Opioids"] . "</td>"; 
        echo "<td>" . $row["NSP"] . "</td>"; 
        echo "</tr>";
    }

    echo "</table>";
} else {
    echo "<p>Nu s-au găsit înregistrări pentru Tabelul 7.</p>";
}

$sql8 = "SELECT * FROM 2022_medical_emergencies_diagnostic"; 
$result8 = $conn->query($sql8);

if ($result8->num_rows > 0) {
    echo "<table>";
    echo "<h2>Medical emergencies diagnostic </h2>";
    echo "<tr><th>Diagnostic</th><th>Cannabis</th><th>Stimulants</th><th>Opioids</th><th>NSP</th></tr>"; 

    while ($row = $result8->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["Diagnostic"] . "</td>"; 
        echo "<td>" . $row["Cannabis"] . "</td>"; 
        echo "<td>" . $row["Stimulants"] . "</td>"; 
        echo "<td>" . $row["Opioids"] . "</td>"; 
        echo "<td>" . $row["NSP"] . "</td>"; 
        echo "</tr>";
    }

    echo "</table>";
} else {
    echo "<p>Nu s-au găsit înregistrări pentru Tabelul 8.</p>";
}

$sql9 = "SELECT * FROM 2022_medical_emergencies_gender";
$result9 = $conn->query($sql9);

if ($result9->num_rows > 0) {
    echo "<table>";
    echo "<h2>Medical emergencies by gender </h2>";
    echo "<tr><th>Gender</th><th>Cannabis</th><th>Stimulants</th><th>Opioids</th><th>NSP</th></tr>"; 

    while ($row = $result9->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["Gender"] . "</td>"; 
        echo "<td>" . $row["Cannabis"] . "</td>"; 
        echo "<td>" . $row["Stimulants"] . "</td>"; 
        echo "<td>" . $row["Opioids"] . "</td>"; 
        echo "<td>" . $row["NSP"] . "</td>"; 
        echo "</tr>";
    }

    echo "</table>";
} else {
    echo "<p>Nu s-au găsit înregistrări pentru Tabelul 9.</p>";
}

$sql10 = "SELECT * FROM 2022_diseases"; 
$result10 = $conn->query($sql10);

if ($result10->num_rows > 0) {
    echo "<table>";
    echo "<h2>Diseases</h2>";
    echo "<tr><th>Infection</th><th>Tested positive</th><th>Total Tested</th></tr>"; 

    while ($row = $result10->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["Infection"] . "</td>"; 
        echo "<td>" . $row["Tested positive"] . "</td>"; 
        echo "<td>" . $row["Total Tested"] . "</td>"; 
        echo "</tr>";
    }

    echo "</table>";
} else {
    echo "<p>Nu s-au găsit înregistrări pentru Tabelul 10.</p>";
}

$sql11 = "SELECT * FROM 2022_prevention_activities"; 
$result11 = $conn->query($sql11);

if ($result11->num_rows > 0) {
    echo "<table>";
    echo "<h2>Prevention activities</h2>";
    echo "<tr><th>Context</th><th>Activities</th><th>Parents</th><th>Teachers</th></tr>"; 

    while ($row = $result11->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["Context"] . "</td>"; 
        echo "<td>" . $row["Activities"] . "</td>"; 
        echo "<td>" . $row["Number of Participants"] . "</td>";  
        echo "</tr>";
    }

    echo "</table>";
} else {
    echo "<p>Nu s-au găsit înregistrări pentru Tabelul 11.</p>";
}

$sql12 = "SELECT * FROM 2022_prevention_campaigns"; 
$result12 = $conn->query($sql12);

if ($result12->num_rows > 0) {
    echo "<table>";
    echo "<h2>Prevention campaigns </h2>";
    echo "<tr><th>Campaign</th><th>Duration</th><th>Number of people</th></tr>"; 

    while ($row = $result12->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["Campaign"] . "</td>"; 
        echo "<td>" . $row["Duration"] . "</td>"; 
        echo "<td>" . $row["Number of people"] . "</td>"; 
        echo "</tr>";
    }

    echo "</table>";
} else {
    echo "<p>Nu s-au găsit înregistrări pentru Tabelul 12.</p>";
}

$sql13 = "SELECT * FROM 2022_prevention_national_school_projects"; 
$result13 = $conn->query($sql13);

if ($result13->num_rows > 0) {
    echo "<table>";
    echo "<h2>Prevention National School Projects</h2>";
    echo "<tr><th>Project</th><th>People benefitting</th><th>Number of activities</th><th>Target audience</th></tr>"; 

    while ($row = $result13->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["Project"] . "</td>"; 
        echo "<td>" . $row["People benefitting"] . "</td>"; 
        echo "<td>" . $row["Number of activities"] . "</td>"; 
        echo "<td>" . $row["Target Audience"] . "</td>"; 
        echo "</tr>";
    }

    echo "</table>";
} else {
    echo "<p>Nu s-au găsit înregistrări pentru Tabelul 13.</p>";
}

$sql14 = "SELECT * FROM 2022_treatment_admission_age"; 
$result14 = $conn->query($sql14);

if ($result14->num_rows > 0) {
    echo "<table>";
    echo "<h2>Treatment admission by age</h2>";
    echo "<tr><th>Drugs</th><th><15</th><th>15-19</th><th>20-24</th><th>25-29</th><th>30-34</th><th>35-39</th><th>40-44</th><th>45-49</th><th>50-54</th><th>55-59</th><th>60-64</th><th>>=65</th><th>Total</th></tr>"; 

    while ($row = $result14->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["Drugs"] . "</td>"; 
        echo "<td>" . $row["<15"] . "</td>"; 
        echo "<td>" . $row["15-19"] . "</td>"; 
        echo "<td>" . $row["20-24"] . "</td>"; 
        echo "<td>" . $row["25-29"] . "</td>"; 
        echo "<td>" . $row["30-34"] . "</td>"; 
        echo "<td>" . $row["35-39"] . "</td>"; 
        echo "<td>" . $row["40-44"] . "</td>"; 
        echo "<td>" . $row["45-49"] . "</td>"; 
        echo "<td>" . $row["50-54"] . "</td>"; 
        echo "<td>" . $row["55-59"] . "</td>"; 
        echo "<td>" . $row["60-64"] . "</td>"; 
        echo "<td>" . $row[">=65"] . "</td>"; 
        echo "<td>" . $row["Total"] . "</td>"; 
        echo "</tr>";
    }

    echo "</table>";
} else {
    echo "<p>Nu s-au găsit înregistrări pentru Tabelul 14.</p>";
}

$sql15 = "SELECT * FROM 2022_treatment_admission_gen"; 
$result15 = $conn->query($sql15);

if ($result15->num_rows > 0) {
    echo "<table>";
    echo "<h2>Treatment admission by gen</h2>";
    echo "<tr><th>Drugs</th><th>Men</th><th>Women</th><th>Total</th></tr>"; 

    while ($row = $result15->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["Drugs"] . "</td>"; 
        echo "<td>" . $row["Men"] . "</td>"; 
        echo "<td>" . $row["Women"] . "</td>"; 
        echo "<td>" . $row["Total"] . "</td>"; 
        echo "</tr>";
    }

    echo "</table>";
} else {
    echo "<p>Nu s-au găsit înregistrări pentru Tabelul 15.</p>";
}

$sql16 = "SELECT * FROM 2022_treatment_admission_locuinta"; 
$result16 = $conn->query($sql16);

if ($result16->num_rows > 0) {
    echo "<table>";
    echo "<h2>Treatment admission by Housing Status </h2>";
    echo "<tr><th>Drugs</th><th>Stable housing</th><th>Unstable housing and/or homeless</th><th>In detention</th><th>Dont know/Missing</th><th>Total</th></tr>"; 

    while ($row = $result16->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["Drugs"] . "</td>"; 
        echo "<td>" . $row["Stable housing"] . "</td>"; 
        echo "<td>" . $row["Unstable housing and/or homeless"] . "</td>"; 
        echo "<td>" . $row["In detention"] . "</td>"; 
        echo "<td>" . $row["Don't know/Missing"] . "</td>"; 
        echo "<td>" . $row["TOTAL"] . "</td>"; 
        echo "</tr>";
    }

    echo "</table>";
} else {
    echo "<p>Nu s-au găsit înregistrări pentru Tabelul 16.</p>";
}

$sql17 = "SELECT * FROM 2022_treatment_admission_occupation"; 
$result17 = $conn->query($sql17);

if ($result17->num_rows > 0) {
    echo "<table>";
    echo "<h2>Treatment admission by occupation</h2>";
    echo "<tr><th>Drugs</th><th>Occasionally employed</th><th>Permanently employed</th><th>In school/Student</th><th>Unemployed/Not working</th><th>Social assistance recipient/Retiree/Homemaker/Medical reti</th><th>Dont know/Missing</th><th>Total</th></tr>"; 

    while ($row = $result17->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["Drugs"] . "</td>"; 
        echo "<td>" . $row["Occasionally employed"] . "</td>"; 
        echo "<td>" . $row["Permanently employed"] . "</td>"; 
        echo "<td>" . $row["In school/Student"] . "</td>"; 
        echo "<td>" . $row["Unemployed / Not working"] . "</td>"; 
        echo "<td>" . $row["Social assistance recipient / Retiree / Homemaker / Medical reti"] . "</td>"; 
        echo "<td>" . $row["Don't know/Missing"] . "</td>"; 
        echo "<td>" . $row["Total"] . "</td>"; 
        echo "</tr>";
    }

    echo "</table>";
} else {
    echo "<p>Nu s-au găsit înregistrări pentru Tabelul 17.</p>";
}

$sql18 = "SELECT * FROM 2022_treatment_admission_regime"; 
$result18 = $conn->query($sql18);

if ($result18->num_rows > 0) {
    echo "<table>";
    echo "<h2> Treatment admission by regime</h2>";
    echo "<tr><th>Drugs</th><th>Outpatient Regime</th><th>Inpatient Regime</th><th>Treatment in Prisons</th><th>Total</th></tr>"; 

    while ($row = $result18->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["Drugs"] . "</td>"; 
        echo "<td>" . $row["Outpatient Regime"] . "</td>"; 
        echo "<td>" . $row["Inpatient Regime"] . "</td>"; 
        echo "<td>" . $row["Treatment in Prisons"] . "</td>"; 
        echo "<td>" . $row["Total"] . "</td>"; 
        echo "</tr>";
    }

    echo "</table>";
} else {
    echo "<p>Nu s-au găsit înregistrări pentru Tabelul 18.</p>";
}

$sql19 = "SELECT * FROM 2022_treatment_admission_studii"; 
$result19 = $conn->query($sql19);

if ($result19->num_rows > 0) {
    echo "<table>";
    echo "<h2>Treatment admission by studies</h2>";
    echo "<tr><th>Drugs</th><th>Never attended school/Incomplete primary education</th><th>Primary school</th><th>Secondary school</th><th>Higher education</th><th>Dont know/Missing</th><th>TOTAL</th></tr>"; 

    while ($row = $result19->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["Drugs"] . "</td>"; 
        echo "<td>" . $row["Never attended school / incomplete primary education"] . "</td>"; 
        echo "<td>" . $row["Primary education"] . "</td>"; 
        echo "<td>" . $row["Secondary education"] . "</td>"; 
        echo "<td>" . $row["Higher education"] . "</td>"; 
        echo "<td>" . $row["Don't know/Missing"] . "</td>"; 
        echo "<td>" . $row["TOTAL"] . "</td>"; 
        echo "</tr>";
    }

    echo "</table>";
} else {
    echo "<p>Nu s-au găsit înregistrări pentru Tabelul 19.</p>";
}

$sql20 = "SELECT * FROM 2022_treatment_admission_sursa"; 
$result20 = $conn->query($sql20);

if ($result20->num_rows > 0) {
    echo "<table>";
    echo "<h2>Treatment admission by source </h2>";
    echo "<tr><th>Drugs</th><th>Court/Probation/Police</th><th>Doctors</th><th>Other drug treatment centers</th><th>Other medical or social services</th><th>Educational services</th><th>On own initiative</th><th>On the recommendation of friends or family</th><th>Dont know/Missing</th><th>Others</th><th>TOTAL</th></tr>"; 

    while ($row = $result20->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["Drugs"] . "</td>"; 
        echo "<td>" . $row["Court / Probation / Police"] . "</td>"; 
        echo "<td>" . $row["Doctors"] . "</td>"; 
        echo "<td>" . $row["Other drug treatment centers"] . "</td>"; 
        echo "<td>" . $row["Other medical or social services"] . "</td>"; 
        echo "<td>" . $row["Educational services"] . "</td>"; 
        echo "<td>" . $row["On own initiative, on the recommendation of friends or family"] . "</td>"; 
        echo "<td>" . $row["Others"] . "</td>"; 
        echo "<td>" . $row["Don't know/Missing"] . "</td>"; 
        echo "<td>" . $row["TOTAL"] . "</td>"; 
        echo "</tr>";
    }

    echo "</table>";
} else {
    echo "<p>Nu s-au găsit înregistrări pentru Tabelul 20.</p>";
}

    $conn->close();
    ?>
</body>
</html>
