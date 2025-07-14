document.getElementById("registerForm").addEventListener("submit", async function(e) {
  e.preventDefault();
  const formData = new FormData(this);
  const res = await fetch('php/register.php', { method: 'POST', body: formData });
  if (res.ok) window.location.href = 'index.html';
  else alert("Error al registrar" + res);
});