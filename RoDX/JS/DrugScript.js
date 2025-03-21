
const drugs = document.querySelectorAll('.drug');

drugs.forEach(drug => {
    
    const openButton = drug.querySelector('.open-popup');
    const popup = drug.querySelector('.popup');
    const closeButton = drug.querySelector('.close-button');

    openButton.addEventListener('click', () => {
        popup.style.display = 'block';
    });

    closeButton.addEventListener('click', () => {
        popup.style.display = 'none';
    });
});