$(function() {
    const agreement = document.getElementById('agreement');
    const registerButton = document.querySelector('button[type="submit"]');

    if(agreement){
        agreement.addEventListener('change', function() {
            registerButton.disabled = !this.checked;
        });
    }
});
