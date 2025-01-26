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
