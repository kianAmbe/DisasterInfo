// Function to open the modal with activity details and animation
function closeAllModals() {
    var modal = document.getElementById('myModal');
    var joinForm = document.getElementById('join-form');

    // Remove the 'show' class from all modals for fade-out animation
    modal.classList.remove('show');
    joinForm.style.display = "none";

    // Hide all modals after the animation is complete
    setTimeout(function () {
        modal.style.display = "none";
    }, 300); // Wait for the duration of the transition (0.3 seconds)
}
function openModal() {
    var modal = document.getElementById('myModal');
    var joinForm = document.getElementById('join-form');

    // Show the modal with a fade-in effect
    modal.style.display = "block";
    var activityDescription = "This is a fun and exciting activity. Join us to have a great time!";
    document.getElementById('activity-description').textContent = activityDescription;


    // Add the 'show' class for the animation
    modal.classList.add('show');
}

// Function to close the modal (including any open forms) with animation
function closeModal() {
    var modal = document.getElementById('myModal');
    var joinForm = document.getElementById('join-form');
    modal.classList.remove('show'); // Remove the 'show' class for fade-out animation
    joinForm.style.display = "none";

    // Hide the modal after the animation is complete
    setTimeout(function () {
        modal.style.display = "none";
    }, 300); // Wait for the duration of the transition (0.3 seconds)
}

// Function to show the join form
function showJoinForm() {
    var joinForm = document.getElementById('join-form');
    joinForm.style.display = "block";
}

// Function to simulate joining the activity
function joinActivity() {
    // You can implement your join logic here, such as sending a request to a server.
    var name = document.getElementById('name').value;
    var email = document.getElementById('email').value;

    // Replace this alert with your actual logic for joining the activity.
    alert("You have joined the activity!\nName: " + name + "\nEmail: " + email);

    // Clear the form fields after submission
    document.getElementById('name').value = '';
    document.getElementById('email').value = '';

    // Hide the join form after submission
    var joinForm = document.getElementById('join-form');
    joinForm.style.display = "none";
    
    closeAllModals(); 
}
