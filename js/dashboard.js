document.addEventListener('DOMContentLoaded', function() {
  var calendarEl = document.getElementById('calendar');
  var selectedDate = null;

  var calendar = new FullCalendar.Calendar(calendarEl, {
    initialView: 'dayGridMonth',
    locale: 'es',
    events: 'php/get_calendar.php',

    // 👉 Cuando se hace click en una fecha, ABRE EL MODAL (no prompt)
    dateClick: function(info) {
      selectedDate = info.dateStr;
      document.getElementById('selectedDate').textContent = "Fecha seleccionada: " + selectedDate;
      var myModal = new bootstrap.Modal(document.getElementById('shiftModal'));
      myModal.show();
    },

    // 👉 Cuando se hace click en un evento, PIDE CONFIRMACIÓN para eliminar
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

  // 👉 Manejar click en los botones del modal
  document.querySelectorAll('.shift-option').forEach(button => {
    button.addEventListener('click', () => {
      const shift = button.getAttribute('data-shift');
      fetch('php/save_shift.php', {
        method: 'POST',
        headers: {'Content-Type': 'application/json'},
        body: JSON.stringify({date: selectedDate, shift: shift})
      }).then(() => {
        var myModalEl = document.getElementById('shiftModal');
        var modal = bootstrap.Modal.getInstance(myModalEl);
        modal.hide();
        calendar.refetchEvents();
      });
    });
  });

  // 👉 Botón Exportar PDF
  document.getElementById("pdfBtn").onclick = () => {
    window.open('php/export_pdf.php', '_blank');
  };

  // 👉 Botón Ver Estadísticas
  document.getElementById("statsBtn").onclick = () => {
    fetch('php/get_stats.php')
      .then(res => res.json())
      .then(data => {
        let html = "";
        for (const [shift, count] of Object.entries(data)) {
          html += `<p><strong>${shift}</strong>: ${count}</p>`;
        }
        document.getElementById("stats").innerHTML = html;
      });
  };

  // 👉 Botón Logout
  document.getElementById("logoutBtn").onclick = () => {
    fetch('php/logout.php').then(() => window.location.href = '../register.html');
  };
});
