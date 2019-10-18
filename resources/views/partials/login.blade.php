<div id="loginModal" class="modal fade">
	<div class="modal-dialog modal-login">
		<div class="modal-content">
			<form action="{{ route('home') }}" method="post">
				{{ csrf_field() }}
				<div class="modal-header">				
					<h4 class="modal-title">Login</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<div class="modal-body">				
					<div class="form-group">
						<label>Código</label>
						<input type="text" class="form-control" required="required" name="escola">
					</div>
					<div class="form-group">
						<div class="clearfix">
							<label>Senha</label>
						</div>
						<input type="password" class="form-control" required="required">
					</div>
				</div>
				<div class="modal-footer">
					<input type="submit" class="btn btn-primary pull-right" value="Entrar">
				</div>
			</form>
		</div>
	</div>
</div>