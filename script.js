// Select all dropdown toggle elements
const dropdowns = document.querySelectorAll('nav ul li');

// Add click event listener to each dropdown toggle
dropdowns.forEach(dropdown => {
    dropdown.addEventListener('click', function(event) {
        // Prevent the default action of the link only if it's a dropdown
        if (dropdown.querySelector('.dropdown')) {
            event.preventDefault();
        }

        // Close other dropdowns
        dropdowns.forEach(item => {
            if (item !== dropdown) {
                item.querySelector('.dropdown').classList.remove('show');
            }
        });

        // Toggle the display of the clicked dropdown
        const dropdownMenu = dropdown.querySelector('.dropdown');
        dropdownMenu.classList.toggle('show');
    });
});

// Close dropdowns when clicking outside
document.addEventListener('click', function(event) {
    const isClickInside = event.target.closest('nav');
    if (!isClickInside) {
        dropdowns.forEach(item => {
            item.querySelector('.dropdown').classList.remove('show');
        });
    }
});

// Modal functionality
const serviceLinks = document.querySelectorAll('.service-link');
const modal = document.getElementById('serviceModal');
const modalTitle = document.getElementById('modalTitle');
const modalDescription = document.getElementById('modalDescription');
const closeModal = document.querySelector('.close');

// Add click event listener to service links
serviceLinks.forEach(link => {
    link.addEventListener('click', function(event) {
        event.preventDefault(); // Prevent default anchor behavior for service links
        const service = link.getAttribute('data-service');

        // Set modal content based on the service clicked
        switch (service) {
            case 'booking':
                modalTitle.textContent = 'Online Booking';
                modalDescription.textContent = 'With our online booking system, you can easily reserve your seat from the comfort of your home. Simply select your route, choose your seat, and make your payment securely.';
                break;
            case 'tracking':
                modalTitle.textContent = 'Real-time Tracking';
                modalDescription.textContent = 'Track your bus in real-time with our GPS tracking system. Stay updated on your bus’s location and estimated arrival time.';
                break;
            case 'support':
                modalTitle.textContent = 'Customer Support';
                modalDescription.textContent = 'Our customer support team is available 24/7 to assist you with any inquiries or issues you may have.';
                break;
            case 'payment':
                modalTitle.textContent = 'Secure Payment';
                modalDescription.textContent = 'We offer secure payment options to ensure your transactions are safe and protected.';
                break;
        }

        // Show the modal
        modal.style.display = 'block';
    });
});

// Close the modal when the user clicks on <span> (x)
closeModal.addEventListener('click', function() {
    modal.style.display = 'none';
});

// Close the modal when the user clicks anywhere outside of the modal
window.addEventListener('click', function(event) {
    if (event.target === modal) {
        modal.style.display = 'none';
    }
});

// CSS for dropdown visibility
const style = document.createElement('style');
style.innerHTML = `
    .dropdown {
        display: none;
    }
    .dropdown.show {
        display: block;
    }
`;
document.head.appendChild(style);