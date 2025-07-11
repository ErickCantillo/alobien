
<h1 class="titulo-principal"><i class="fas fa-cogs"></i> <?php echo $this->titlesection; ?></h1>
<div class="container-fluid">
	<form class="text-left" enctype="multipart/form-data" method="post" action="<?php echo $this->routeform;?>"  data-bs-toggle="validator">
		<div class="content-dashboard">
			<input type="hidden" name="csrf" id="csrf" value="<?php echo $this->csrf ?>">
			<input type="hidden" name="csrf_section" id="csrf_section" value="<?php echo $this->csrf_section ?>">
			<?php if ($this->content->subscripcion_id) { ?>
				<input type="hidden" name="id" id="id" value="<?= $this->content->subscripcion_id; ?>" />
			<?php }?>
			<div class="row">
				<div class="col-4 form-group">
					<label for="subscripcion_name"  class="control-label">Nombre</label>
					<label class="input-group">
						<div class="input-group-prepend">
							<span class="input-group-text input-icono " ><i class="fas fa-pencil-alt"></i></span>
						</div>
						<input type="text" value="<?= $this->content->subscripcion_name; ?>" name="subscripcion_name" id="subscripcion_name" class="form-control"  required >
					</label>
					<div class="help-block with-errors"></div>
				</div>
				<div class="col-4 form-group">
					<label for="subscripcion_phone"  class="control-label">Teléfono</label>
					<label class="input-group">
						<div class="input-group-prepend">
							<span class="input-group-text input-icono " ><i class="fas fa-pencil-alt"></i></span>
						</div>
						<input type="text" value="<?= $this->content->subscripcion_phone; ?>" name="subscripcion_phone" id="subscripcion_phone" class="form-control"  required >
					</label>
					<div class="help-block with-errors"></div>
				</div>
				<div class="col-4 form-group">
					<label for="subscripcion_email"  class="control-label">Correo</label>
					<label class="input-group">
						<div class="input-group-prepend">
							<span class="input-group-text input-icono " ><i class="fas fa-pencil-alt"></i></span>
						</div>
						<input type="text" value="<?= $this->content->subscripcion_email; ?>" name="subscripcion_email" id="subscripcion_email" class="form-control"  required >
					</label>
					<div class="help-block with-errors"></div>
				</div>
				<div class="col-4 form-group">
					<label for="subscripcion_date"  class="control-label">Fecha</label>
					<label class="input-group">
						<div class="input-group-prepend">
							<span class="input-group-text input-icono " ><i class="fas fa-pencil-alt"></i></span>
						</div>
						<input type="text" value="<?= $this->content->subscripcion_date; ?>" name="subscripcion_date" id="subscripcion_date" class="form-control"   >
					</label>
					<div class="help-block with-errors"></div>
				</div>
		<div class="col-4 form-group">
			<label   class="control-label">Estado</label>
				<input type="checkbox" name="subscripcion_state" value="1" class="form-control switch-form " <?php if ($this->getObjectVariable($this->content, 'subscripcion_state') == 1) { echo "checked";} ?>   ></input>
				<div class="help-block with-errors"></div>
		</div>
			</div>
		</div>
		<div class="botones-acciones">
			<button class="btn btn-guardar" type="submit">Guardar</button>
			<a href="<?php echo $this->route; ?>" class="btn btn-cancelar">Cancelar</a>
		</div>
	</form>
</div>