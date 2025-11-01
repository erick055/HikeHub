// Get elements
const modal = document.getElementById("editProfileModal");
const editBtn = document.getElementById("editProfileBtn");
const closeModal = document.getElementById("closeModal");
const cancelBtn = document.getElementById("cancelBtn");
const saveBtn = document.getElementById("saveBtn");

// Display fields
const displayName = document.getElementById("displayName");
const displayBio = document.getElementById("displayBio");

// Input fields
const nameInput = document.getElementById("nameInput");
const bioInput = document.getElementById("bioInput");

// === OPEN MODAL ===
editBtn.onclick = () => {
  modal.style.display = "block";
  // Set modal inputs to current page text
  nameInput.value = displayName.textContent;
  bioInput.value = displayBio.textContent;
};

// === CLOSE MODAL ===
function closeModalWindow() {
  modal.style.display = "none";
}
closeModal.onclick = closeModalWindow;
cancelBtn.onclick = closeModalWindow;
window.onclick = (e) => {
  if (e.target === modal) closeModalWindow();
};

// === SAVE CHANGES (MODIFIED) ===
saveBtn.onclick = () => {
  const newName = nameInput.value.trim();
  const newBio = bioInput.value; // Get bio (don't trim, spaces are ok)

  if (newName === "") {
    alert("Name cannot be empty.");
    return;
  }

  // 1. Create a FormData object to send data
  const formData = new FormData();
  formData.append('name', newName);
  formData.append('bio', newBio);

  // Disable button to prevent double-clicking
  saveBtn.disabled = true;
  saveBtn.textContent = "Saving...";

  // 2. Send the data to your new PHP file
  fetch('update_profile.php', {
    method: 'POST',
    body: formData
  })
  .then(response => response.json()) // Expect a JSON response
  .then(data => {
    if (data.status === 'success') {
      // 3. Update the page text with the new data
      displayName.textContent = data.newName;
      displayBio.textContent = data.newBio || "No bio yet. Click 'Edit Profile' to add one!";
      
      // 4. Also update the header name
      const headerProfileName = document.querySelector('.name-profile');
      if (headerProfileName) {
          headerProfileName.textContent = data.newName;
      }

      // 5. Close the modal
      closeModalWindow();
    } else {
      // Show an error message from the server
      alert(data.message || 'An error occurred.');
    }
  })
  .catch(error => {
    console.error('Error:', error);
    alert('A connection error occurred. Please try again.');
  })
  .finally(() => {
    // Re-enable the save button whether it succeeded or failed
    saveBtn.disabled = false;
    saveBtn.textContent = "💾 Save Changes";
  });
};