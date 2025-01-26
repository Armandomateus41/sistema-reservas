<div class="wrap">
    <h1>Reservas</h1>
    <table class="widefat fixed" cellspacing="0">
        <thead>
            <tr>
                <th>Nome</th>
                <th>E-mail</th>
                <th>Data</th>
                <th>Hora</th>
                <th>Status</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $reservas = SR_Cadastro::get_reservas();
            if ( ! empty( $reservas ) ) {
                foreach ( $reservas as $reserva ) {
                    echo '<tr>';
                    echo '<td>' . esc_html( $reserva['nome'] ) . '</td>';
                    echo '<td>' . esc_html( $reserva['email'] ) . '</td>';
                    echo '<td>' . esc_html( $reserva['data_reserva'] ) . '</td>';
                    echo '<td>' . esc_html( $reserva['hora_reserva'] ) . '</td>';
                    echo '<td>' . esc_html( $reserva['status'] ) . '</td>';
                    echo '<td>
                        <button class="button confirm" data-id="' . esc_attr( $reserva['id'] ) . '">Confirmar</button>
                        <button class="button cancel" data-id="' . esc_attr( $reserva['id'] ) . '">Cancelar</button>
                    </td>';
                    echo '</tr>';
                }
            } else {
                echo '<tr><td colspan="6">Nenhuma reserva encontrada.</td></tr>';
            }
            ?>
        </tbody>
    </table>
</div>

<script>
    jQuery(document).ready(function($) {
        $('.confirm, .cancel').on('click', function() {
            const id = $(this).data('id');
            const status = $(this).hasClass('confirm') ? 'Confirmado' : 'Cancelado';

            $.post(sr_ajax.ajax_url, {
                action: 'sr_update_status',
                id: id,
                status: status,
            }, function(response) {
                if (response.success) {
                    location.reload();
                } else {
                    alert(response.data || 'Erro ao atualizar status.');
                }
            });
        });
    });
</script>
