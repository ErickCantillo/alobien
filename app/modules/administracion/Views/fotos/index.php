<h1 class="titulo-principal"><i class="fas fa-cogs"></i> <?php echo $this->titlesection; ?></h1>
<div class="container-fluid">
	<a href="/administracion/album"
		class="btn btn-outline-success mt-3 d-flex justify-content-center align-items-center gap-2" style="width:fit-content"><i
			class="fa-solid fa-circle-arrow-left"></i> Back</a>
	<form action="<?php echo $this->route . "?album=" . $this->album . ""; ?>" method="post">
		<div class="content-dashboard">
			<div class="row">
				<div class="col-3">
					<label>Title</label>
					<label class="input-group">
						<div class="input-group-prepend">
							<span class="input-group-text input-icono fondo-rojo-claro "><i class="fas fa-pencil-alt"></i></span>
						</div>
						<input type="text" class="form-control" name="fotos_titulo"
							value="<?php echo $this->getObjectVariable($this->filters, 'fotos_titulo') ?>"></input>
					</label>
				</div>
				<div class="col-3">
					<label>Photo</label>
					<label class="input-group">
						<div class="input-group-prepend">
							<span class="input-group-text input-icono fondo-morado "><i class="fas fa-pencil-alt"></i></span>
						</div>
						<input type="text" class="form-control" name="fotos_foto"
							value="<?php echo $this->getObjectVariable($this->filters, 'fotos_foto') ?>"></input>
					</label>
				</div>
				<div class="col-3">
					<label>Photo album</label>
					<label class="input-group">
						<div class="input-group-prepend">
							<span class="input-group-text input-icono fondo-verde "><i class="fas fa-pencil-alt"></i></span>
						</div>
						<input type="text" class="form-control" name="fotos_album"
							value="<?php echo $this->getObjectVariable($this->filters, 'fotos_album') ?>"></input>
					</label>
				</div>
				<div class="col-3">
					<label>&nbsp;</label>
					<button type="submit" class="btn btn-block btn-azul"> <i class="fas fa-filter"></i> Filter</button>
				</div>
				<div class="col-3">
					<label>&nbsp;</label>
					<a class="btn btn-block btn-azul-claro " href="<?php echo $this->route; ?>?cleanfilter=1"> <i
							class="fas fa-eraser"></i> Clear Filter</a>
				</div>
			</div>
		</div>
	</form>
	<div align="center">
		<ul class="pagination justify-content-center">
			<?php
			$url = $this->route;
			if ($this->totalpages > 1) {
				if ($this->page != 1)
					echo '<li class="page-item" ><a class="page-link"  href="' . $url . '?page=' . ($this->page - 1) . '&album=' . $this->album . '"> &laquo; Previous </a></li>';
				for ($i = 1; $i <= $this->totalpages; $i++) {
					if ($this->page == $i)
						echo '<li class="active page-item"><a class="page-link">' . $this->page . '</a></li>';
					else
						echo '<li class="page-item"><a class="page-link" href="' . $url . '?page=' . $i . '&album=' . $this->album . '">' . $i . '</a></li>  ';
				}
				if ($this->page != $this->totalpages)
					echo '<li class="page-item"><a class="page-link" href="' . $url . '?page=' . ($this->page + 1) . '&album=' . $this->album . '">Next &raquo;</a></li>';
			}
			?>
		</ul>
	</div>
	<div class="content-dashboard">
		<div class="franja-paginas">
			<div class="row">
				<div class="col-5">
					<div class="titulo-registro">Found <?php echo $this->register_number; ?> records</div>
				</div>
				<div class="col-3 text-right">
					<div class="texto-paginas">Records per page:</div>
				</div>
				<div class="col-1">
					<select class="form-control form-control-sm selectpagination">
						<option value="20" <?php if ($this->pages == 20) {
							echo 'selected';
						} ?>>20</option>
						<option value="30" <?php if ($this->pages == 30) {
							echo 'selected';
						} ?>>30</option>
						<option value="50" <?php if ($this->pages == 50) {
							echo 'selected';
						} ?>>50</option>
						<option value="100" <?php if ($this->pages == 100) {
							echo 'selected';
						} ?>>100</option>
					</select>
				</div>
				<div class="col-3">
					<div class="text-right"><a class="btn btn-sm btn-success"
							href="<?php echo $this->route . "\manage" . "?album=" . $this->album . ""; ?>"> <i class="fas fa-plus-square"></i>
							Create New</a></div>
				</div>
			</div>
		</div>
		<div class="content-table">
			<table class=" table table-striped  table-hover table-administrator text-left">
				<thead>
					<tr>
						<td>Title</td>
						<td>Photo</td>
						<td>Photo album</td>
						<td width="100">Order</td>
						<td width="100"></td>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($this->lists as $content) { ?>
						<?php $id = $content->fotos_id; ?>
						<tr>
							<td><?= $content->fotos_titulo; ?></td>
							<td>
								<?php if ($content->fotos_foto) { ?>
									<img src="/images/<?= $content->fotos_foto; ?>" class="img-thumbnail thumbnail-administrator" />
								<?php } ?>
								<div><?= $content->fotos_foto; ?></div>
							</td>
							<td><?= $content->fotos_album; ?></td>
							<td>
								<input type="hidden" id="<?= $id; ?>" value="<?= $content->orden; ?>"></input>
								<button class="up_table btn btn-primary btn-sm"><i class="fas fa-angle-up"></i></button>
								<button class="down_table btn btn-primary btn-sm"><i class="fas fa-angle-down"></i></button>
							</td>
							<td class="text-right">
								<div>
									<a class="btn btn-azul btn-sm" href="<?php echo $this->route; ?>/manage?id=<?= $id ?>"
										data-bs-toggle="tooltip" data-placement="top" title="Edit"><i class="fas fa-pen-alt"></i></a>
									<span data-bs-toggle="tooltip" data-placement="top" title="Delete"><a class="btn btn-rojo btn-sm"
											data-bs-toggle="modal" data-bs-target="#modal<?= $id ?>"><i class="fas fa-trash-alt"></i></a></span>
								</div>
								<!-- Modal -->
								<div class="modal fade text-left" id="modal<?= $id ?>" tabindex="-1" role="dialog"
									aria-labelledby="myModalLabel">
									<div class="modal-dialog" role="document">
										<div class="modal-content">
											<div class="modal-header">
												<h4 class="modal-title" id="myModalLabel">Delete Record</h4>
												<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

											</div>
											<div class="modal-body">
												<div class="">Are you sure you want to delete this record?</div>
											</div>
											<div class="modal-footer">
												<button type="button" class="btn btn-default" data-bs-dismiss="modal">Cancel</button>
												<a class="btn btn-danger"
													href="<?php echo $this->route; ?>/delete?id=<?= $id ?>&csrf=<?= $this->csrf; ?><?php echo '' . '&album=' . $this->album; ?>">Delete</a>
											</div>
										</div>
									</div>
								</div>
							</td>
						</tr>
					<?php } ?>
				</tbody>
			</table>
		</div>
		<input type="hidden" id="csrf" value="<?php echo $this->csrf ?>"><input type="hidden" id="order-route"
			value="<?php echo $this->route; ?>/order"><input type="hidden" id="page-route"
			value="<?php echo $this->route; ?>/changepage">
	</div>
	<div align="center">
		<ul class="pagination justify-content-center">
			<?php
			$url = $this->route;
			if ($this->totalpages > 1) {
				if ($this->page != 1)
					echo '<li class="page-item"><a class="page-link" href="' . $url . '?page=' . ($this->page - 1) . '&album=' . $this->album . '"> &laquo; Previous </a></li>';
				for ($i = 1; $i <= $this->totalpages; $i++) {
					if ($this->page == $i)
						echo '<li class="active page-item"><a class="page-link">' . $this->page . '</a></li>';
					else
						echo '<li class="page-item"><a class="page-link" href="' . $url . '?page=' . $i . '&album=' . $this->album . '">' . $i . '</a></li>  ';
				}
				if ($this->page != $this->totalpages)
					echo '<li class="page-item"><a class="page-link" href="' . $url . '?page=' . ($this->page + 1) . '&album=' . $this->album . '">Next &raquo;</a></li>';
			}
			?>
		</ul>
	</div>
</div>