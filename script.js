document.addEventListener("DOMContentLoaded", () => {
    const form = document.getElementById("complaintForm");

    if (form) {
        form.addEventListener("submit", (e) => {
            const name = document.getElementById("student_name").value.trim();
            const location = document.getElementById("block_room").value.trim();
            const desc = document.getElementById("description").value.trim();
            const errorDiv = document.getElementById("formError");

            if (!name || !location || !desc) {
                e.preventDefault();
                errorDiv.textContent = "Please fill in all required fields.";
                errorDiv.style.display = "block";
            } else if (desc.length < 10) {
                e.preventDefault();
                errorDiv.textContent = "Description must be at least 10 characters long.";
                errorDiv.style.display = "block";
            } else {
                errorDiv.style.display = "none";
            }
        });
    }
});