document.addEventListener('DOMContentLoaded', () => {
    // Delegación de eventos para botones dinámicos
    document.addEventListener('click', (e) => {
        if (e.target.closest('.btn-inspeccion')) {
            const boton = e.target.closest('.btn-inspeccion');
            try {
                const visita = JSON.parse(boton.dataset.visita);
                mostrarInspeccionModal(visita);
            } catch (error) {
                console.error("Error al parsear datos:", error);
            }
        }
    });
});


function mostrarInspeccionModal(visita) {
    const contenido = `
        <div class="modal-inspeccion mb-4">
            <p><strong>Cliente:</strong> ${visita.nombre_cliente || 'N/A'}</p>
            <p><strong>Identificación:</strong> ${visita.identificacion || 'N/A'}</p>
            <p><strong>Teléfono:</strong> ${visita.telefono || 'N/A'}</p>
            <p><strong>Dirección:</strong> ${visita.direccion || 'N/A'}</p>
            <p><strong>Fecha:</strong> ${visita.fecha || 'N/A'}</p>
            <p><strong>N° Contrato:</strong> ${visita.numero_contrato || 'N/A'}</p>
            <p><strong>Valor revisión:</strong> $${visita.valor_revicion?.toLocaleString() || 'N/A'}</p>
            <p><strong>Tipo documento:</strong> ${visita.tipo_documento || 'N/A'}</p>
            <p><strong>Departamento:</strong> ${visita.nombre_depto || 'N/A'}</p>
            <p><strong>Municipio:</strong> ${visita.nombre_municipio || 'N/A'}</p>
            <p><strong>Distribuidora:</strong> ${visita.nombre_distribuidora || 'N/A'}</p>
            <p><strong>Tipo de gas:</strong> ${visita.nombre_tipo_gas || 'N/A'}</p>
            <p><strong>Tipo instalación:</strong> ${visita.nombre_instalacion || 'N/A'}</p>
            <p><strong>Tipo servicio:</strong> ${visita.nombre_servicio || 'N/A'}</p>
            <p><strong>Estado:</strong> ${visita.nombre_estado || 'N/A'}</p>
            <p><strong>Observaciones:</strong> ${visita.observaciones || 'N/A'}</p>
        </div>
    `;

    document.getElementById('contenidoInspeccion').innerHTML = contenido;
    
    // Botón Editar (opcional)
    document.getElementById('btnEditarInspeccion').onclick = function() {
        window.location.href = `../controllers/FormularioController.php?id=${visita.id_visita}&modo=editar`;
    };

    // Mostrar modal
    new bootstrap.Modal(document.getElementById('modalInspeccion')).show();
}