<div class="container-fluid">
	<div class="card">
		<div class="card-body">
			<div class="table-responsive">
				<table class="table table-bordered">
					<thead>
						<tr>
							<th>#</th>
							<th>Nombres</th>
							<th>Dirección</th>
							<th>Email</th>
							<th>Celular</th>
							<th>Estado</th>
							<th>Acciones</th>
						</tr>
					</thead>
					<tbody>
						<?php 
						$i = 1;
						include 'db_connect.php';
						$qry = $conn->query("SELECT * FROM orders ");
						while($row=$qry->fetch_assoc()):
						?>
						<tr>
							<td><?php echo $i++ ?></td>
							<td><?php echo $row['name'] ?></td>
							<td><?php echo $row['address'] ?></td>
							<td><?php echo $row['email'] ?></td>
							<td><?php echo $row['mobile'] ?></td>
							<?php if($row['status'] == 1): ?>
								<td class="text-center"><span class="badge badge-success">Confirmado</span></td>
							<?php else: ?>
								<td class="text-center"><span class="badge badge-secondary">Para Verificar</span></td>
							<?php endif; ?>
							<td>
								<button class="btn btn-sm btn-primary view_order" data-id="<?php echo $row['id'] ?>" >Ver Reporte</button>
								<button class="btn btn-sm btn-info generate_report" data-id="<?php echo $row['id'] ?>" data-name="<?php echo $row['name'] ?>" >Imprimir Reporte</button>

							</td>
						</tr>
						<?php endwhile; ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
<script>
	$('.view_order').click(function(){
		uni_modal('Order','view_order.php?id='+$(this).attr('data-id'))
	});
	$('.generate_report').click(function(){
		// Aquí puedes agregar el código para generar el reporte para imprimir
		alert('Generando reporte para imprimir para el pedido #' + $(this).attr('data-id'));
	});
	$('table').dataTable();
</script>
