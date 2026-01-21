<div style="margin-top: 5rem; flex-direction: row; display: flex; align-items: normal;">
  <label for="admin_password"><h4 style="font-size: 1.5em">Password : </h4></label>
  <input type="password" id="admin_password" name="admin_password" value="test_for_test" readonly>
  <input type="checkbox" onclick="togglePassword()"> Show password
</div>

<script>
function togglePassword() {
  var passwordField = document.getElementById("admin_password");
  var showPasswordCheckbox = document.querySelector("input[type='checkbox']");

  if (showPasswordCheckbox.checked) {
    passwordField.type = "text";
  } else {
    passwordField.type = "password";
  }
}
</script>
