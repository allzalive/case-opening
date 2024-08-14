// scripts.js

document.addEventListener("DOMContentLoaded", function() {
    const openCaseBtn = document.querySelector(".btn-gradient");
    const caseDisplay = document.querySelector(".case-display img");
    const caseResultModal = new bootstrap.Modal(document.getElementById('caseResultModal'));

    // Fetch and display the case price
    fetch('./api/get-case-price.php')
        .then(response => response.json())
        .then(data => {
            document.querySelector(".case-price").textContent = `$${data.price}`;
        });

    // Fetch and display the user balance
    fetch('./api/get-user-balance.php')
        .then(response => response.json())
        .then(data => {
            document.querySelector(".balance").textContent = `$${data.balance}`;
        });

    // Handle the case opening logic
    openCaseBtn.addEventListener("click", function() {
        // Start the spinning animation
        caseDisplay.classList.add("spin-animation");

        // Wait for the spinning animation to complete before fetching the case result
        setTimeout(() => {
            fetch('./api/open-case.php', { method: 'POST' })
                .then(response => response.json())
                .then(data => {
                    // Stop the spinning animation
                    caseDisplay.classList.remove("spin-animation");

                    // Show the result of opening the case in the modal
                    document.querySelector('#caseResultModal .modal-body').innerHTML = 
                        `<p class=${data.color}> Congratulations! You've received ${data.item_name}, which is ${data.rarity} and worth $${data.value}.</p>`;
                    caseResultModal.show();
                });
        }, 3000); // 3 seconds delay to match the animation duration
    });
});
