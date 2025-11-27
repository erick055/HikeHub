const modal = document.getElementById("editProfileModal");
const editBtn = document.getElementById("editProfileBtn");
const closeModal = document.getElementById("closeModal");
const cancelBtn = document.getElementById("cancelBtn");
const saveBtn = document.getElementById("saveBtn");

const displayName = document.getElementById("displayName");
const displayBio = document.getElementById("displayBio");
const displayLocation = document.getElementById("displayLocation");
const displayExperience = document.getElementById("displayExperience");
const displayPhone = document.getElementById("displayPhone");
const displayEmergency = document.getElementById("displayEmergency");
const displayTrailType = document.getElementById("displayTrailType");
const displayHikeTime = document.getElementById("displayHikeTime");
const displayCompanion = document.getElementById("displayCompanion");
const mainProfilePic = document.getElementById("mainProfilePic");
const headerProfilePic = document.getElementById("headerProfilePic");
const profilePicPreview = document.getElementById("profilePicPreview");


const nameInput = document.getElementById("nameInput");
const bioInput = document.getElementById("bioInput");
const locationInput = document.getElementById("locationInput");
const experienceInput = document.getElementById("experienceInput");
const emailInput = document.getElementById("emailInput");
const phoneInput = document.getElementById("phoneInput");
const emergencyInput = document.getElementById("emergencyInput");
const trailInput = document.getElementById("trailInput");
const timeInput = document.getElementById("timeInput");
const companionInput = document.getElementById("companionInput");
const profilePicInput = document.getElementById("profilePicInput");
let selectedFile = null;


profilePicInput.onchange = (e) => {
    if (e.target.files && e.target.files[0]) {
        selectedFile = e.target.files[0];
        
        const reader = new FileReader();
        reader.onload = (event) => {
            profilePicPreview.src = event.target.result;
        };
        reader.readAsDataURL(selectedFile);
    }
};


editBtn.onclick = () => {
    nameInput.value = displayName.textContent;
    bioInput.value = (displayBio.textContent === "No bio yet. Click 'Edit Profile' to add one!") ? "" : displayBio.textContent;
    locationInput.value = (displayLocation.textContent === "Not set") ? "" : displayLocation.textContent;
    experienceInput.value = (displayExperience.textContent === "Not set") ? "Beginner" : displayExperience.textContent;
    phoneInput.value = (displayPhone.textContent === "Not set") ? "" : displayPhone.textContent;
    emergencyInput.value = (displayEmergency.textContent === "Not set") ? "" : displayEmergency.textContent;
    trailInput.value = (displayTrailType.textContent === "Not set") ? "Mountain" : displayTrailType.textContent;
    timeInput.value = (displayHikeTime.textContent === "Not set") ? "Morning" : displayHikeTime.textContent;
    companionInput.value = (displayCompanion.textContent === "Not set") ? "Solo" : displayCompanion.textContent;
    
    profilePicInput.value = null;
    selectedFile = null;
    profilePicPreview.src = mainProfilePic.src;

    modal.style.display = "block";
};


function closeModalWindow() {
    modal.style.display = "none";
}
closeModal.onclick = closeModalWindow;
cancelBtn.onclick = closeModalWindow;
window.onclick = (e) => {
    if (e.target === modal) closeModalWindow();
};


saveBtn.onclick = () => {
    const newName = nameInput.value.trim();
    if (newName === "") {
        alert("Name cannot be empty.");
        return;
    }

    const formData = new FormData();
    formData.append('name', nameInput.value);
    formData.append('bio', bioInput.value);
    formData.append('location', locationInput.value);
    formData.append('experience_level', experienceInput.value);
    formData.append('phone_number', phoneInput.value);
    formData.append('emergency_contact', emergencyInput.value);
    formData.append('favorite_trail_type', trailInput.value);
    formData.append('best_hiking_time', timeInput.value);
    formData.append('companion_preference', companionInput.value);

    if (selectedFile) {
        formData.append('profile_picture', selectedFile);
    }


    saveBtn.disabled = true;
    saveBtn.textContent = "Saving...";

    fetch('update_profile.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        if (data.status === 'success') {
            location.reload();
        } else {
            alert(data.message || 'An error occurred.');
        }
    })
    .catch(error => {
        console.error('Error:', error);
        alert('A connection error occurred. Please try again.');
    })
    .finally(() => {
        saveBtn.disabled = false;
        saveBtn.textContent = "💾 Save Changes";
    });
};