<div class="modal fade" id="update_modal<?php echo $row['idEmployee']?>"aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<form method="POST" action="">
				<div class="modal-header">
					<h3 class="modal-title">Edit</h3>
				</div>
				<div class="modal-body">
					<div class="col-md-2"></div>
					<div class="col-md-8">
						<div class="form-group">
						
						<input type="hidden" name="idEmployee" value="<?php echo $row['idEmployee']?>"/><label>Absence</label>
							<input type="number" name="" value="" class="form-control" /><label>Total hours</label>
							<input type ="number" name="Vacation" value="<?php echo $row['Vacation'] ?>" class="form-control" /><label>Vacation </label>
							<input type="number" name="" value="" class="form-control" /><label>Illegal Absence</label>
							<input type="number" name="" value="" class="form-control" />
						</div>
					</div>
				</div>
				<div style="clear:both;"></div>
				<div class="modal-footer"  >
					<button name="update" class="btn btn-primary" style="position:absolute;left:10px;" ><span class="glyphicon glyphicon-edit"></span>Update</button>
					<button class="btn btn-danger" type="button" data-dismiss="modal" style="position:relative;right:320px;"><span class="glyphicon glyphicon-remove"></span>Close</button>
				</div>
				</div>
			</form>
		</div>
	</div>
</div>
