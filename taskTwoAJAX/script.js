
document.addEventListener('DOMContentLoaded', () => {
    
    let form = document.getElementById('form');
    let inputDisplay = document.getElementById('display-currency__value');

    
    form.addEventListener('submit', async (e) => {
        e.preventDefault();
        let formData = new FormData(form);
        let response = await fetch('/taskTwoAJAX/handler.php', {
            method: "POST",
            body: formData,
        });
        console.log(response);
        if (response.ok) {
            // form.reset();
            let result = await response.json();
            inputDisplay.value = result + ' руб';
        }
    });
});