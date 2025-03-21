let selectedYear = null;

function openPopup(year) {
    selectedYear = year; // Store the selected year
    document.getElementById("popup").style.display = "block";
}

function closePopup() {
    document.getElementById('popup').style.display = 'none';
    selectedYear = null;
}

function downloadCSV() {
    if (selectedYear) {
        // Define the file path based on the selected year
        const filePath = `Stats/${selectedYear}.csv`;
        
        // Fetch the CSV data
        fetch(filePath)
            .then(response => response.text())
            .then(csvData => {
                const encodedUri = "data:text/csv;charset=utf-8," + encodeURIComponent(csvData);

                // Create a temporary link element
                const downloadLink = document.createElement("a");

                // Set the download attribute with the file name
                downloadLink.setAttribute("href", encodedUri);
                downloadLink.setAttribute("download", `${selectedYear}.csv`);

                // Append the link to the document body
                document.body.appendChild(downloadLink);

                // Programmatically click the link to trigger the download
                downloadLink.click();

                // Remove the link from the document
                document.body.removeChild(downloadLink);

                closePopup();
            })
            .catch(error => {
                console.error('Error fetching CSV data:', error);
            });
    }
}

function downloadPNG() {
    if (selectedYear) {
        // Define the file path based on the selected year, relative to the server's root
        const filePath = `http://localhost/login/images/${selectedYear}data.png`;

        // Use fetch to check if the file exists
        fetch(filePath, { method: 'HEAD' })
            .then(response => {
                if (response.ok) {
                    // The file exists, proceed with download
                    const downloadLink = document.createElement("a");
                    downloadLink.setAttribute("href", filePath);
                    downloadLink.setAttribute("download", `${selectedYear}data.png`);
                    document.body.appendChild(downloadLink);
                    downloadLink.click();
                    document.body.removeChild(downloadLink);
                    closePopup();
                } else {
                    // The file doesn't exist
                    alert("File wasn't available on site or check your internet connection.");
                }
            })
            .catch(() => {
                // There was an error with the fetch request
                alert("Check your internet connection.");
            });
    }
}

function closePopup() {
    document.getElementById('popup').style.display = 'none';
}

