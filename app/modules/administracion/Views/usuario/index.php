<h1 class="titulo-principal"><i class="fas fa-cogs"></i> <?php echo $this->titlesection; ?></h1>
<div class="container-fluid">
  <form action="<?php echo $this->route; ?>" method="post">
    <div class="content-dashboard">
      <div class="row">
        <div class="col-2">
          <label>State</label>
          <label class="input-group">
            <div class="input-group-prepend">
              <span class="input-group-text input-icono fondo-verde-claro "><i class="far fa-list-alt"></i></span>
            </div>
            <select class="form-control" name="user_state">
              <option value="">All</option>
              <?php foreach ($this->list_user_state as $key => $value) : ?>
              <option value="<?= $key; ?>"
                <?php if ($this->getObjectVariable($this->filters, 'user_state') ==  $key) { echo "selected";} ?>>
                <?= $value; ?></option>
              <?php endforeach ?>
            </select>
          </label>
        </div>
        <!-- <div class="col-2">
	                <label>Creation Date</label>
	                <label class="input-group">
						<div class="input-group-prepend">
							<span class="input-group-text input-icono  fondo-azul-claro " ><i class="fas fa-calendar-alt"></i></span>
						</div>
	                <input type="text" class="form-control" name="user_date" value="<?php echo $this->getObjectVariable($this->filters, 'user_date') ?>"></input>
	                    </label>
	            </div> -->
        <div class="col-2">
          <label>Names</label>
          <label class="input-group">
            <div class="input-group-prepend">
              <span class="input-group-text input-icono fondo-rosado "><i class="fas fa-pencil-alt"></i></span>
            </div>
            <input type="text" class="form-control" name="user_names"
              value="<?php echo $this->getObjectVariable($this->filters, 'user_names') ?>"></input>
          </label>
        </div>
        <div class="col-2">
          <label>Level</label>
          <label class="input-group">
            <div class="input-group-prepend">
              <span class="input-group-text input-icono fondo-cafe "><i class="far fa-list-alt"></i></span>
            </div>
            <select class="form-control" name="user_level">
              <option value="">All</option>
              <?php foreach ($this->list_user_level as $key => $value) : ?>
              <option value="<?= $key; ?>"
                <?php if ($this->getObjectVariable($this->filters, 'user_level') ==  $key) { echo "selected";} ?>>
                <?= $value; ?></option>
              <?php endforeach ?>
            </select>
          </label>
        </div>
        <div class="col-2">
          <label>User</label>
          <label class="input-group">
            <div class="input-group-prepend">
              <span class="input-group-text input-icono fondo-verde "><i class="fas fa-pencil-alt"></i></span>
            </div>
            <input type="text" class="form-control" name="user_user"
              value="<?php echo $this->getObjectVariable($this->filters, 'user_user') ?>"></input>
          </label>
        </div>
        <div class="col-2">
          <label>&nbsp;</label>
          <button type="submit" class="btn btn-block btn-azul"> <i class="fas fa-filter"></i> Filter</button>
        </div>
        <div class="col-2">
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
			if ($this->totalpages < 10) {
				$paginainicial = 1;
				$paginafinal = $this->totalpages;
			}
			else {
				if ($this->page<5) {
					$paginainicial = 1;
					$paginafinal = 9;
				}
				else if ($this->page > ($this->totalpages-4)) {
					$paginainicial = $this->totalpages-9;
					$paginafinal = $this->totalpages;
				}
				else {
					$paginainicial = $this->page-3;
					$paginafinal = $this->page+3;
				}
			}
	    	$url = $this->route;
	        if ($this->totalpages > 1) {
	            if ($this->page != 1)
	                echo '<li class="page-item" ><a class="page-link"  href="'.$url.'?page='.($this->page-1).'"> &laquo; Previous </a></li>';
	            for ($i=$paginainicial;$i<=$paginafinal;$i++) {
	                if ($this->page == $i)
	                    echo '<li class="active page-item"><a class="page-link">'.$this->page.'</a></li>';
	                else
	                    echo '<li class="page-item"><a class="page-link" href="'.$url.'?page='.$i.'">'.$i.'</a></li>  ';
	            }
	            if ($this->page != $this->totalpages)
	                echo '<li class="page-item"><a class="page-link" href="'.$url.'?page='.($this->page+1).'">Next &raquo;</a></li>';
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
        <div class="col-3 text-end">
          <div class="texto-paginas">Records per page:</div>
        </div>
        <div class="col-1">
          <select class="form-control form-control-sm selectpagination">
            <option value="20" <?php if($this->pages == 20){ echo 'selected'; } ?>>20</option>
            <option value="30" <?php if($this->pages == 30){ echo 'selected'; } ?>>30</option>
            <option value="50" <?php if($this->pages == 50){ echo 'selected'; } ?>>50</option>
            <option value="100" <?php if($this->pages == 100){ echo 'selected'; } ?>>100</option>
          </select>
        </div>
        <div class="col-3">
          <div class="text-end"><a class="btn btn-sm btn-success" href="<?php echo $this->route."\manage"; ?>"> <i
                class="fas fa-plus-square"></i> Create New</a></div>
        </div>
      </div>
    </div>
    <div class="content-table">
      <table class=" table table-striped  table-hover table-administrator text-left">
        <thead>
          <tr>
            <td>State</td>
            <td>Creation Date</td>
            <td>Names</td>
            <td>Level</td>
            <td>User</td>
            <td width="100"></td>
          </tr>
        </thead>
        <tbody>
          <?php foreach($this->lists as $content){ ?>
          <?php $id =  $content->user_id; ?>
          <tr>
            <td><?= $this->list_user_state[$content->user_state];?></td>
            <td><?=$content->user_date;?></td>
            <td><?=$content->user_names;?></td>
            <td><?= $this->list_user_level[$content->user_level];?></td>
            <td><?=$content->user_user;?></td>
            <td class="text-end">
              <div>
                <?php if ($_SESSION['kt_login_level'] == 1) { ?><a class="btn btn-azul btn-sm"
                  href="<?php echo $this->route;?>/manage?id=<?= $id ?>" data-bs-toggle="tooltip" data-placement="top"
                  title="Edit"><i class="fas fa-pen-alt"></i></a><?php } ?>
                <?php if ($_SESSION['kt_login_level'] == 1) { ?><span data-bs-toggle="tooltip" data-placement="top"
                  title="Delete"><a class="btn btn-rojo btn-sm" data-bs-toggle="modal"
                    data-bs-target="#modal<?= $id ?>"><i class="fas fa-trash-alt"></i></a></span><?php } ?>
              </div>
              <!-- Modal -->
              <div class="modal fade text-left" id="modal<?= $id ?>" tabindex="-1" role="dialog"
                aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h4 class="modal-title" id="myModalLabel">Delete Record</h4>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                          aria-hidden="true">&times;</span></button>
                    </div>
                    <div class="modal-body">
                      <div class="">Are you sure you want to delete this record?</div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                      <a class="btn btn-danger"
                        href="<?php echo $this->route;?>/delete?id=<?= $id ?>&csrf=<?= $this->csrf;?><?php echo ''; ?>">Delete</a>
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
    <input type="hidden" id="csrf" value="<?php echo $this->csrf ?>"><input type="hidden" id="page-route"
      value="<?php echo $this->route; ?>/changepage">
  </div>
  <div align="center">
    <ul class="pagination justify-content-center">
      <?php
			if ($this->totalpages < 10) {
				$paginainicial = 1;
				$paginafinal = $this->totalpages;
			}
			else {
				if ($this->page<5) {
					$paginainicial = 1;
					$paginafinal = 9;
				}
				else if ($this->page > ($this->totalpages-4)) {
					$paginainicial = $this->totalpages-9;
					$paginafinal = $this->totalpages;
				}
				else {
					$paginainicial = $this->page-3;
					$paginafinal = $this->page+3;
				}
			}
	    	$url = $this->route;
	        if ($this->totalpages > 1) {
	            if ($this->page != 1)
	                echo '<li class="page-item" ><a class="page-link"  href="'.$url.'?page='.($this->page-1).'"> &laquo; Previous </a></li>';
	            for ($i=$paginainicial;$i<=$paginafinal;$i++) {
	                if ($this->page == $i)
	                    echo '<li class="active page-item"><a class="page-link">'.$this->page.'</a></li>';
	                else
	                    echo '<li class="page-item"><a class="page-link" href="'.$url.'?page='.$i.'">'.$i.'</a></li>  ';
	            }
	            if ($this->page != $this->totalpages)
	                echo '<li class="page-item"><a class="page-link" href="'.$url.'?page='.($this->page+1).'">Next &raquo;</a></li>';
	        }
	  	?>
    </ul>
  </div>
</div>