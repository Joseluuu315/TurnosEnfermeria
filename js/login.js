document.getElementById("loginForm").addEventListener("submit", async function(e) {
  e.preventDefault();
  const formData = new FormData(this);
  const res = await fetch('php/login.php', { method: 'POST', body: formData });
  if (res.ok) window.location.href = 'dashboard.html';
  else alert("Login incorrecto");
});