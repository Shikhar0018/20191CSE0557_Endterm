// Get references to the form elements
const nameField = document.getElementById('name');
const mobileNumberField = document.getElementById('mobile-number');
const form = document.getElementById('purchase-form');

// Listen for the form's submit event
form.addEventListener('submit', (event) => {
  // Prevent the form from submitting
  event.preventDefault();

  // Get the values of the form elements
  const name = nameField.value;
  const mobileNumber = mobileNumberField.value;

  // Check if the name is too long
  if (name.length > 30) {
    alert('Name is too long');
    return;
  }

  // Check if the mobile number is valid
  if (!/^\d{10}$/.test(mobileNumber)) {
    alert('Invalid mobile number');
    return;
  }
})

var purchaseButtons = document.querySelectorAll('.purchase-button');
var purchaseFrames = document.querySelectorAll('[id^="purchase-frame"]');

purchaseButtons.forEach(function(purchaseButton) {
  purchaseButton.addEventListener('click', function() {
    // Get the id of the purchase frame from the button
    var purchaseFrameId = this.getAttribute('data-purchase-frame');
    // Find the purchase frame element
    var purchaseFrame = document.getElementById(purchaseFrameId);
    // Show the purchase frame
    purchaseFrame.style.display = 'block';
  });
});


function validateForm() {
  var name = document.getElementById("name").value;
  var phone = document.getElementById("phone").value;
  var email = document.getElementById("email").value;
  var address = document.getElementById("address").value;

  if (name == "" || phone == "" || email == "" || address == "") {
    alert("All fields must be filled out");
    return false;
  }

  if (isNaN(phone) || phone.length != 10) {
    alert("Invalid phone number");
    return false;
  }

  return true;
}






