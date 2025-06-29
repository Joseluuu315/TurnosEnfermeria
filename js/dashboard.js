
// Dashboard con FullCalendar
document.addEventListener('DOMContentLoaded', function() {
  var calendarEl = document.getElementById('calendar');
  var calendar = new FullCalendar.Calendar(calendarEl, {
    initialView: 'dayGridMonth',
    locale: 'es',
    dateClick: function(info) {
      const shift = prompt("Turno: Mañana, Tarde, Noche, Mañana y Tarde, Libre");
      if (shift) {
        fetch('php/save_shift.php', {
          method: 'POST',
          headers: {'Content-Type': 'application/json'},
          body: JSON.stringify({date: info.dateStr, shift: shift})
        }).then(() => calendar.refetchEvents());
      }
    },
    events: 'php/get_calendar.php',
    eventClick: function(info) {
      if (confirm("¿Eliminar este turno?")) {
        fetch('php/delete_shift.php', {
          method: 'POST',
          headers: {'Content-Type': 'application/json'},
          body: JSON.stringify({id: info.event.id})
        }).then(() => calendar.refetchEvents());
      }
    }
  });
  calendar.render();
});

// Botón Exportar PDF
document.getElementById("pdfBtn").onclick = () => {
  window.open('php/export_pdf.php', '_blank');
};

// Botón Estadísticas
document.getElementById("statsBtn").onclick = () => {
  fetch('php/get_stats.php')
    .then(res => res.json())
    .then(data => {
      let html = "";
      for (const [shift, count] of Object.entries(data)) {
        html += `<p>${shift}: ${count}</p>`;
      }
      document.getElementById("stats").innerHTML = html;
    });
};

// Logout
document.getElementById("logoutBtn").onclick = () => {
  fetch('php/logout.php').then(() => window.location.href = '../index.html');
};