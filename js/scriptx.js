const form = document.querySelector("form"),

  nameField = form.querySelector(".name-field"),
  nameInput = nameField.querySelector(".name"),

  emailField = form.querySelector(".email-field"),
  emailInput = emailField.querySelector(".email"),

  contactField = form.querySelector(".contact-field"),
  contactInput = contactField.querySelector(".contact"),

  roleField = form.querySelector(".role-field"),
  roleInput = roleField.querySelector(".role"),

  passField = form.querySelector(".create-password"),
  passInput = passField.querySelector(".password"),

  cPassField = form.querySelector(".confirm-password"),
  cPassInput = cPassField.querySelector(".cPassword");

// name Validtion
function checkName() {
  if (nameInput.value=="") {
    return nameField.classList.add("invalid"); //adding invalid class 
  }
  nameField.classList.remove("invalid"); //removing invalid class
}

// Email Validtion
function checkEmail() {
  const emaiPattern = /^[^ ]+@[^ ]+\.[a-z]{2,3}$/;
  if (!emailInput.value.match(emaiPattern)) {
    return emailField.classList.add("invalid"); //adding invalid class if email value do not mathced with email pattern
  }
  emailField.classList.remove("invalid"); //removing invalid class if email value matched with emaiPattern
}

// contact Validtion
function checkcontact() {
  const contactPattern = /^\d{10}$/;
  if (!contactInput.value.match(contactPattern)) {
    return contactField.classList.add("invalid"); //adding invalid class if email value do not mathced with email pattern
  }
  contactField.classList.remove("invalid"); //removing invalid class if email value matched with emaiPattern
}

// userrole Validtion
function checkUserrole() {
  if (roleInput.value=="S") 
  {
    return roleField.classList.add("invalid"); //adding invalid class if email value do not mathced with email pattern
  }
  roleField.classList.remove("invalid"); //removing invalid class if email value matched with emaiPattern
}


// Hide and show password
const eyeIcons = document.querySelectorAll(".show-hide");

eyeIcons.forEach((eyeIcon) => {
  eyeIcon.addEventListener("click", () => {
    const pInput = eyeIcon.parentElement.querySelector("input"); //getting parent element of eye icon and selecting the password input
    if (pInput.type === "password") {
      eyeIcon.classList.replace("bx-hide", "bx-show");
      return (pInput.type = "text");
    }
    eyeIcon.classList.replace("bx-show", "bx-hide");
    pInput.type = "password";
  });
});

// Password Validation
function createPass() {
  const passPattern =
    /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/;

  if (!passInput.value.match(passPattern)) {
    return passField.classList.add("invalid"); //adding invalid class if password input value do not match with passPattern
  }
  passField.classList.remove("invalid"); //removing invalid class if password input value matched with passPattern
}

// Confirm Password Validtion
function confirmPass() {
  if (passInput.value !== cPassInput.value || cPassInput.value === "") {
    return cPassField.classList.add("invalid");
  }
  cPassField.classList.remove("invalid");
}

// Calling Funtion on Form Sumbit
form.addEventListener("submit", (e) => {

  checkName();
  checkEmail();
  checkcontact();
  //checkUserrole();
  createPass();
  confirmPass();

   //calling function on key up
  nameInput.addEventListener("keyup", checkName);
  emailInput.addEventListener("keyup", checkEmail);
  contactInput.addEventListener("keyup", checkcontact);
  //roleInput.addEventListener("keyup", checkUserrole);
  passInput.addEventListener("keyup", createPass);
  cPassInput.addEventListener("keyup", confirmPass);


if
   (
    !nameField.classList.contains("invalid") &&
    !emailField.classList.contains("invalid") &&
    !contactField.classList.contains("invalid") &&
    //!roleField.classList.contains("invalid") &&
    !passField.classList.contains("invalid") &&
    !cPassField.classList.contains("invalid")
  ) 
 { 
  console.log('form is valid');
    //location.href = form.getAttribute("action");
 }
else
{
  e.preventDefault(); //preventing form submitting
} 
 
});





