<form id="sr-form" method="POST" enctype="multipart/form-data">
    <label for="nome">Nome:</label>
    <input type="text" id="nome" name="nome" required>

    <label for="email">E-mail:</label>
    <input type="email" id="email" name="email" required>

    <label for="data_reserva">Data da Reserva:</label>
    <input type="date" id="data_reserva" name="data_reserva" required>

    <label for="hora_reserva">Hora da Reserva:</label>
    <input type="time" id="hora_reserva" name="hora_reserva" required>

    <label for="observacoes">Observações (opcional):</label>
    <textarea id="observacoes" name="observacoes"></textarea>

    <button type="submit">Enviar Reserva</button>
</form>

<script>
    jQuery(document).ready(function($) {
        $('#sr-form').on('submit', function(e) {
            e.preventDefault();

            const formData = new FormData(this);

            $.ajax({
                url: sr_ajax.ajax_url,
                type: 'POST',
                data: formData,
                contentType: false,
                processData: false,
                success: function(response) {
                    if (response.success) {
                        alert(response.data);
                        location.reload();
                    } else {
                        alert(response.data || 'Erro ao enviar a reserva.');
                    }
                },
                error: function() {
                    alert('Erro inesperado. Tente novamente.');
                }
            });
        });
    });
</script>
