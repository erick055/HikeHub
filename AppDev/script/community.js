document.addEventListener('DOMContentLoaded', function() {
    
    const modal = document.getElementById('reviewModal');
    const openBtn = document.getElementById('openReviewModalBtn');
    const closeBtn = document.getElementById('closeReviewModalBtn');

    if (openBtn) {
        openBtn.onclick = function() {
            modal.classList.add('show');
        }
    }

    if (closeBtn) {
        closeBtn.onclick = function() {
            modal.classList.remove('show');
            resetForm();
        }
    }

    window.onclick = function(event) {
        if (event.target == modal) {
            modal.classList.remove('show');
            resetForm();
        }
    }

    const modalStars = document.querySelectorAll('.modal-stars span');
    const ratingInput = document.getElementById('ratingInput');
    
    modalStars.forEach(star => {
        star.addEventListener('click', () => {
            const ratingValue = star.dataset.value;
            ratingInput.value = ratingValue;
            updateStarDisplay(ratingValue);
        });
    });

    function updateStarDisplay(rating) {
        modalStars.forEach(star => {
            if (star.dataset.value <= rating) {
                star.innerHTML = '★';
                star.classList.add('filled');
            } else {
                star.innerHTML = '☆';
                star.classList.remove('filled');
            }
        });
    }

    const reviewForm = document.getElementById('addReviewForm');
    const formMessage = document.getElementById('reviewFormMessage');
    const submitBtn = document.getElementById('submitReviewBtn');

    reviewForm.addEventListener('submit', function(e) {
        e.preventDefault();
        
        submitBtn.disabled = true;
        submitBtn.textContent = 'Posting...';
        formMessage.textContent = '';
        formMessage.className = 'form-message';

        const formData = new FormData(reviewForm);

        fetch('add_review.php', {
            method: 'POST',
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            if (data.status === 'success') {
                formMessage.textContent = data.message;
                formMessage.classList.add('success');
                setTimeout(() => {
                    location.reload(); 
                }, 1500);
            } else {
                formMessage.textContent = data.message;
                formMessage.classList.add('error');
                submitBtn.disabled = false;
                submitBtn.textContent = 'Post Review';
            }
        })
        .catch(error => {
            console.error('Error:', error);
            formMessage.textContent = 'A network error occurred. Please try again.';
            formMessage.classList.add('error');
            submitBtn.disabled = false;
            submitBtn.textContent = 'Post Review';
        });
    });

    function resetForm() {
        reviewForm.reset();
        ratingInput.value = '0';
        updateStarDisplay('0');
        formMessage.textContent = '';
        formMessage.className = 'form-message';
    }
});

function deleteReview(reviewId) {
    if (confirm("Are you sure you want to delete this review? This action cannot be undone.")) {
        
        const formData = new FormData();
        formData.append('review_id', reviewId);

        fetch('delete_review.php', {
            method: 'POST',
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            if (data.status === 'success') {
                const reviewCard = document.getElementById('review-' + reviewId);
                if (reviewCard) {
                    reviewCard.style.opacity = '0';
                    setTimeout(() => reviewCard.remove(), 500);
                } else {
                    location.reload();
                }
            } else {
                alert('Error: ' + data.message);
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('A connection error occurred.');
        });
    }
}