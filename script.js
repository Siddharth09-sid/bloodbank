function validate() {
  const phone = document.getElementById("phone").textContent;
  const password = document.getElementById("password").textContent;
  console.log(phone);

  if (!phone) {
    alert("Invalid phone");
    return;
  }

  if (password.length < 6) {
    alert("Password should be of atleast 6 characters");
    return;
  }
}
