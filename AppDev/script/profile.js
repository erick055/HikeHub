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

// === SAVE CHANGES ===
saveBtn.onclick = () => {
  if (nameInput.value.trim() !== "") {
    displayName.textContent = nameInput.value;
  }
  displayBio.textContent = bioInput.value || "Adventure seeker from Hogwarts";
  closeModalWindow();
};
