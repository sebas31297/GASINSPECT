<!-- views/visitas/index.php -->
<?php foreach ($visitas as $v): ?>
  <tr>
    <td><?= htmlspecialchars($v['nombre_cliente']) ?></td>
    <td><?= htmlspecialchars($v['fecha']) ?></td>
    <td><a href="?action=edit&id=<?= $v['id_visita'] ?>">Editar</a></td>
  </tr>
<?php endforeach; ?>
