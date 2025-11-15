// Gallery Filter Logic
const filterButtons = document.querySelectorAll('.filter-btn');
// FIX: Cast gallery items to HTMLElement to access the 'style' property.
const galleryItems = document.querySelectorAll<HTMLElement>('.gallery-item');

filterButtons.forEach(button => {
    button.addEventListener('click', () => {
        // Manage active button state
        filterButtons.forEach(btn => btn.classList.remove('active'));
        button.classList.add('active');

        const filter = button.getAttribute('data-filter');

        galleryItems.forEach(item => {
            const category = item.getAttribute('data-category');
            if (filter === 'all' || filter === category) {
                // Use Bootstrap's grid display properties
                item.style.display = 'block';
            } else {
                item.style.display = 'none';
            }
        });
    });
});


// Contact Form Submission
const contactForm = document.getElementById('contact-form') as HTMLFormElement | null;
const submitButton = document.getElementById('submit-button') as HTMLButtonElement | null;
const successMessage = document.getElementById('success-message');

if (contactForm && submitButton && successMessage) {
    contactForm.addEventListener('submit', (event) => {
        event.preventDefault();

        // Disable button to prevent multiple submissions
        submitButton.disabled = true;
        submitButton.textContent = 'جاري الإرسال...';

        // Simulate a network request
        setTimeout(() => {
            // Show success message
            successMessage.classList.remove('d-none');

            // Reset form
            contactForm.reset();

            // Re-enable button and restore text
            submitButton.disabled = false;
            submitButton.textContent = 'إرسال الطلب';

            // Hide message after a delay
            setTimeout(() => {
                successMessage.classList.add('d-none');
            }, 5000);

        }, 1000);
    });
}
