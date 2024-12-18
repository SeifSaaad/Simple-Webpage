// Function to display a popup message
function displayPopup(message, isSuccess) {
    const popup = document.createElement('div');
    popup.className = `popup ${isSuccess ? 'success' : 'error'}`;
    popup.textContent = message;
    document.body.appendChild(popup);

    setTimeout(() => {
        popup.remove();
    }, 3000);
}

// Form Validation for Sign Up
document.getElementById('signupForm').addEventListener('submit', function(event) {
    event.preventDefault();
    const name = document.getElementById('name').value;
    const email = document.getElementById('email').value;
    const password = document.getElementById('password').value;
    const confirmPassword = document.getElementById('confirmPassword').value;

    if (password !== confirmPassword) {
        displayPopup('Passwords do not match', false);
        return;
    }

    // Send form data to the server
    fetch('../backend/scripts/signup.php', {
        method: 'POST',
        body: new URLSearchParams({
            name: name,
            email: email,
            password: password,
            confirmPassword: confirmPassword
        })
    })
    .then(response => response.text())
    .then(data => {
        displayPopup(data, true);
    })
    .catch(error => {
        displayPopup('Error: ' + error, false);
    });
});

// Smooth Scrolling
document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
        e.preventDefault();

        document.querySelector(this.getAttribute('href')).scrollIntoView({
            behavior: 'smooth'
        });
    });
});

// Custom Scrollbar Styling
const scrollbar = document.querySelector('body');
scrollbar.style.scrollbarWidth = 'thin';
scrollbar.style.scrollbarColor = '#2C3E50 #0F0F14';

scrollbar.addEventListener('mouseenter', () => {
    scrollbar.style.scrollbarColor = '#34495E #0F0F14';
});

scrollbar.addEventListener('mouseleave', () => {
    scrollbar.style.scrollbarColor = '#2C3E50 #0F0F14';
});

// Hover Effects
document.querySelectorAll('a, button').forEach(element => {
    element.addEventListener('mouseenter', () => {
        element.style.transform = 'scale(1.05)';
    });

    element.addEventListener('mouseleave', () => {
        element.style.transform = 'scale(1)';
    });
});

// Loading Transitions and Animations
document.addEventListener('DOMContentLoaded', () => {
    document.body.classList.add('fade-in');
});