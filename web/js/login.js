function togglePassword() {
    var passwordInput = document.getElementById("passwords");
    if (passwordInput.type === "password") {
      passwordInput.type = "text";
    } else {
      passwordInput.type = "password";
    }
  }
  