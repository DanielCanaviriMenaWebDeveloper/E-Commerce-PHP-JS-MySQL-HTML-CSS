<?php
    include_once 'Layouts/general/header.php';
?>
                <title>Mi perfil | Ecommerce</title>
                <!-- Content Header (Page header) -->

<!-- Modal para Agregar Direcciones -->
<div class="modal fade" id="modal_direcciones" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Agregar Dirección</h5>

				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<!-- <form id="form-direccion"> -->
				<div class="modal-body">
					<!-- Form -->
					<form id="form-direccion">
						<!-- select Departamento -->
						<div class="form-group">
							<label for="departamento">Departamento: </label>
							<select name="departamento" id="departamento" class="form-control" style="width:100%" required>
								<!-- <option>La Paz</option>
								<option>Oruro</option>
								<option>Potosi</option> -->
							</select>
						</div>

						<!-- select Provincia -->
						<div class="form-group">
							<label for="provincia">Provincia: </label>
							<select name="provincia" id="provincia" class="form-control" style="width:100%" required></select>
						</div>

						<!-- select Distrito -->
						<div class="form-group">
							<label for="distrito">Distrito: </label>
							<select name="distrito" id="distrito" class="form-control" style="width:100%" required></select>
						</div>

						<!-- imput Dirección -->
						<div class="form-group">
							<label for="direccion">Direccion: </label>
							<input name="direccion" id="direccion" class="form-control" placeholder="Ingrese su dirección" required>
						</div>

						<!-- input Referencia -->
						<div class="form-group">
							<label for="referencia">Referencia: </label>
							<input name="referencia" id="referencia" class="form-control" placeholder="Ingrese alguna referencia">
						</div>
					<!-- </form> -->
				</div>

				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
					<button type="submit" class="btn btn-primary">Crear Dirección</button>
				</div>
			</form>
		</div>
	</div>
</div>
<!-- / Modal para Agregar Direcciones -->

<!-- Modal para Editar Datos Personales -->
<div class="modal fade" id="modal_datos" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Editar Datos Personales</h5>

				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<!-- <form id="form-direccion"> -->
				<div class="modal-body">
					<!-- Formulario  -->
					<!-- El atributo enctype nos permite enviar archivos como fotos entre otros mediante el formulario  -->
					<form id="form-datos" enctype="multipart/form-data">
						<!-- imput Nombres -->
						<div class="form-group">
							<label for="nombres_mod">Nombres: </label>
							<input type="text" name="nombres_mod" id="nombres_mod" class="form-control" placeholder="Ingrese nombres">
						</div>

						<!-- input Apellidos -->
						<div class="form-group">
							<label for="apellidos_mod">Apellidos: </label>
							<input type="text" name="apellidos_mod" id="apellidos_mod" class="form-control" placeholder="Ingrese apellidos">
						</div>

						<!-- input DNI -->
						<div class="form-group">
							<label for="dni_mod">DNI: </label>
							<input type="text" name="dni_mod" id="dni_mod" class="form-control" placeholder="Ingrese DNI">
						</div>

						<!-- input Email -->
						<div class="form-group">
							<label for="email_mod">Email: </label>
							<input type="text" name="email_mod" id="email_mod" class="form-control" placeholder="Ingrese email">
						</div>

						<!-- input Teléfono -->
						<div class="form-group">
							<label for="telefono_mod">Teléfono: </label>
							<input type="text" name="telefono_mod" id="telefono_mod" class="form-control" placeholder="Ingrese teléfono">
						</div>

						<!-- Imagen -->
						<div class="form-group">
							<label for="exampleInputFile">Avatar</label>
					
							<div class="input-group">
								<div class="custom-file">
									<input type="file" class="custom-file-input" name = "avatar_mod">
									<label class="custom-file-label" for="exampleInputFile">Seleccione un Avatar</label>
								</div>

								<!-- <div class="input-group-append">
									<span class="input-group-text">Upload</span>
								</div> -->
							</div>
						</div>
				</div>


				

				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
					<button type="submit" class="btn btn-primary">Guardar</button>
				</div>
			</form>
		</div>
	</div>
</div>
<!-- / Modal para Editar Datos Personales -->

<!-- Modal para Editar Password -->
<div class="modal fade" id="modal_contra" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Cambiar contraseña</h5>

				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
				<div class="modal-body">
					<!-- Formulario  -->
					<form id="form-contra">
						<!-- imput Contraseña Actual -->
						<div class="form-group">
							<label for="pass_old">Contraseña actual</label>
							<input type="password" name="pass_old" id="pass_old" class="form-control" placeholder="Ingrese contraseña actual">
						</div>

						<!-- input Nuevo Password -->
						<div class="form-group">
							<label for="pass_new">Nueva contraseña </label>
							<input type="password" name="pass_new" id="pass_new" class="form-control" placeholder="Ingrese nueva contraseña">
						</div>

						<!-- input Repetir Password -->
						<div class="form-group">
							<label for="pass_repeat">Repetir nueva contraseña</label>
							<input type="password" name="pass_repeat" id="pass_repeat" class="form-control" placeholder="Confirmar nueva contraseña">
						</div>
				</div>

				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
					<button type="submit" class="btn btn-primary">Actualizar información</button>
				</div>
			</form>
		</div>
	</div>
</div>
<!-- / Modal para Editar Datos Personales-->


<!-- Main content -->
<section class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-4">
				<!-- Profile Image -->
				<!--
				<div class="card card-primary card-outline">
					<div class="card-body box-profile">
						<div class="text-center">
							<img class="profile-user-img img-fluid img-circle"	src="../../dist/img/user4-128x128.jpg" alt="User profile picture">
						</div>

						<h3 class="profile-username text-center">Nina Mcintire</h3>

						<p class="text-muted text-center">Software Engineer</p>

						<ul class="list-group list-group-unbordered mb-3">
							<li class="list-group-item">
								<b>Followers</b> <a class="float-right">1,322</a>
							</li>
							<li class="list-group-item">
								<b>Following</b> <a class="float-right">543</a>
							</li>
							<li class="list-group-item">
								<b>Friends</b> <a class="float-right">13,287</a>
							</li>
						</ul>

						<a href="#" class="btn btn-primary btn-block"><b>Follow</b></a>
					</div>
				</div>
				-->

				<!-- Widget: user widget style 1 -->
				<div class="card card-widget widget-user shadow">
					<!-- Add the bg color to the header using any of the bg-* classes -->
					<div class="widget-user-header bg-info">
						<h3 id="username" class="widget-user-username"></h3>

						<h5 id="tipo_usuario" class="widget-user-desc"></h5>
					</div>

					<div class="widget-user-image">
						<img id="avatar_perfil" class="img-circle elevation-2" src="" alt="User Avatar">
					</div>

					<div class="card-footer">
						<div class="row">
							<div class="col-sm-4 border-right">
								<div class="description-block">
									<h5 class="description-header">3,200</h5>
									
									<span class="description-text">SALES</span>
								</div><!-- /.description-block -->
							</div><!-- /.col -->
							
							<div class="col-sm-4 border-right">
								<div class="description-block">
									<h5 class="description-header">13,000</h5>
									
									<span class="description-text">FOLLOWERS</span>
								</div><!-- /.description-block -->
							</div><!-- /.col -->

							<div class="col-sm-4">
								<div class="description-block">
									<h5 class="description-header">35</h5>
									
									<span class="description-text">PRODUCTS</span>
								</div><!-- /.description-block -->
							</div><!-- /.col -->
						</div><!-- /.row -->
					</div>
				</div><!-- /.widget-user -->

				<!-- About Me Box 
				<div class="card card-primary">
					<div class="card-header">
						<h3 class="card-title">About Me</h3>
					</div>
				
					<div class="card-body">
						<strong><i class="fas fa-book mr-1"></i> Education</strong>

						<p class="text-muted">
							B.S. in Computer Science from the University of Tennessee at Knoxville
						</p>

						<hr>

						<strong><i class="fas fa-map-marker-alt mr-1"></i> Location</strong>

						<p class="text-muted">Malibu, California</p>

						<hr>

						<strong><i class="fas fa-pencil-alt mr-1"></i> Skills</strong>

						<p class="text-muted">
							<span class="tag tag-danger">UI Design</span>
							<span class="tag tag-success">Coding</span>
							<span class="tag tag-info">Javascript</span>
							<span class="tag tag-warning">PHP</span>
							<span class="tag tag-primary">Node.js</span>
						</p>

						<hr>

						<strong><i class="far fa-file-alt mr-1"></i> Notes</strong>

						<p class="text-muted">
							Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam fermentum enim neque.
						</p>
					</div>
					
				</div>-->

				<!-- Card Mis dátos personales -->
				<div class="card card-light d-flex flex-fill">
					<div class="card-header border-bottom-0">
						<strong>Mis datos personales</strong>

						<div class="card-tools">
							<button type="button" class="editar_datos btn btn-tool" data-bs-toggle="modal" data-bs-target="#modal_datos">
								<i class="fas fa-pencil-alt"></i>
							</button>
						</div> 
					</div>

					<div class="card-body pt-0 mt-3">
						<div class="row">
							<div class="col-8">
								<h2 id="nombres" class="lead"><b></b></h2>
					
								<!-- <p class="text-muted text-sm"><b>About: </b> Web Designer / UX / Graphic Artist / Coffee Lover </p> -->
					
								<ul class="ml-4 mb-0 fa-ul text-muted">
									<li class="small"><span class="fa-li"><i class="fas fa-address-card"></i></span> DNI:  <span id="dni"></span></li>
									
									<li class="small"><span class="fa-li"><i class="fas fa-at"></i></span> Email: <span id="email"></span></li>

									<li class="small"><span class="fa-li"><i class="fas fa-lg fa-phone"></i></span> Teléfono: <span id="telefono"></span></li>
								</ul>
							</div>

							<div class="col-4 text-center">
								<img src="../Util/img/datos_personales.png" alt="user-avatar" class="img-circle img-fluid">
							</div>
						</div>
					</div>
					
					<div class="card-footer">
						<button class="btn btn-warning btn-block" data-bs-toggle="modal" data-bs-target="#modal_contra">Cambiar contraseña</button>
					</div>
					
				</div>
				<!-- / Card Mis dátos personales -->

				<!-- Card Mis direcciones de envio -->
				<div class="card card-light d-flex flex-fill">
					<div class="card-header border-bottom-0">
						<strong>Mis direcciones de envio</strong>

						<div class="card-tools">
							<button type="button" class="btn btn-tool" data-bs-toggle="modal" data-bs-target="#modal_direcciones">
								<i class="fas fa-plus"></i>
							</button>
						</div> 
					</div>

					<div id="direcciones" class="card-body pt-0 mt-3">
						<!-- Card de Direcciones generado dinamicamente desde mi_perfil.js -->
						<!-- <div class="row">
							<div class="col-8">
								<h2 class="lead"><b>Nicole Pearson</b></h2>
					
								<p class="text-muted text-sm"><b>About: </b> Web Designer / UX / Graphic Artist / Coffee Lover </p>
					
								<ul class="ml-4 mb-0 fa-ul text-muted">
									<li class="small"><span class="fa-li"><i class="fas fa-lg fa-building"></i></span> Address: Demo Street 123, Demo City 04312, NJ</li>
									
									<li class="small"><span class="fa-li"><i class="fas fa-lg fa-phone"></i></span> Phone #: + 800 - 12 12 23 52</li>
								</ul>
							</div>

							<div class="col-4 text-center">
								<img src="../Util/img/direcciones_envio.png" alt="user-avatar" class="img-circle img-fluid">
							</div>
						</div> -->
					</div>
				</div>
				<!-- / Card Mis direcciones de envio -->

				<!-- Card Mis tarjetas de pago -->
				<div class="card card-light d-flex flex-fill">
					<div class="card-header border-bottom-0">
						<strong>Mis tarjetas de pago</strong>

						<div class="card-tools">
							<button type="button" class="btn btn-tool">
								<i class="fas fa-plus"></i>
							</button>
						</div> 
					</div>

					<div class="card-body pt-0 mt-3">
						<div class="row">
							<div class="col-8">
								<h2 class="lead"><b>Nicole Pearson</b></h2>
					
								<p class="text-muted text-sm"><b>About: </b> Web Designer / UX / Graphic Artist / Coffee Lover </p>
					
								<ul class="ml-4 mb-0 fa-ul text-muted">
									<li class="small"><span class="fa-li"><i class="fas fa-lg fa-building"></i></span> Address: Demo Street 123, Demo City 04312, NJ</li>
									
									<li class="small"><span class="fa-li"><i class="fas fa-lg fa-phone"></i></span> Phone #: + 800 - 12 12 23 52</li>
								</ul>
							</div>

							<div class="col-4 text-center">
								<img src="../Util/img/tarjetas.jpg" alt="user-avatar" class="img-circle img-fluid">
							</div>
						</div>
					</div>
				</div>
				<!-- / Card Mis tarjetas de pago -->
			</div><!-- /.col-md-4 -->

			<div class="col-md-8">
				<div class="card">
					<div class="card-header p-2">
						<ul class="nav nav-pills">
							<li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Activity</a></li>
							<li class="nav-item"><a class="nav-link" href="#timeline" data-toggle="tab">Timeline</a></li>
							<li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Settings</a></li>
						</ul>
					</div><!-- /.card-header -->

					<div class="card-body">
						<div class="tab-content">
							<div class="active tab-pane" id="activity">
								<!-- Post -->
								<div class="post">
									<div class="user-block">
										<img class="img-circle img-bordered-sm" src="../../dist/img/user1-128x128.jpg" alt="user image">

										<span class="username">
											<a href="#">Jonathan Burke Jr.</a>
											<a href="#" class="float-right btn-tool"><i class="fas fa-times"></i></a>
										</span>

										<span class="description">Shared publicly - 7:30 PM today</span>
									</div><!-- /.user-block -->
									
									<p>
										Lorem ipsum represents a long-held tradition for designers,
										typographers and the like. Some people hate it and argue for
										its demise, but others ignore the hate as they create awesome
										tools to help create filler text for everyone from bacon lovers
										to Charlie Sheen fans.
									</p>

									<p>
										<a href="#" class="link-black text-sm mr-2"><i class="fas fa-share mr-1"></i> Share</a>

										<a href="#" class="link-black text-sm"><i class="far fa-thumbs-up mr-1"></i> Like</a>

										<span class="float-right">
											<a href="#" class="link-black text-sm">
												<i class="far fa-comments mr-1"></i> Comments (5)
											</a>
										</span>
									</p>

									<input class="form-control form-control-sm" type="text" placeholder="Type a comment">
								</div><!-- /.post -->

								<!-- Post -->
								<div class="post clearfix">
									<div class="user-block">
										<img class="img-circle img-bordered-sm" src="../../dist/img/user7-128x128.jpg" alt="User Image">

										<span class="username">
											<a href="#">Sarah Ross</a>

											<a href="#" class="float-right btn-tool"><i class="fas fa-times"></i></a>
										</span>

										<span class="description">Sent you a message - 3 days ago</span>
									</div><!-- /.user-block -->
									
									<p>
										Lorem ipsum represents a long-held tradition for designers,
										typographers and the like. Some people hate it and argue for
										its demise, but others ignore the hate as they create awesome
										tools to help create filler text for everyone from bacon lovers
										to Charlie Sheen fans.
									</p>

									<form class="form-horizontal">
										<div class="input-group input-group-sm mb-0">
											<input class="form-control form-control-sm" placeholder="Response">

											<div class="input-group-append">
												<button type="submit" class="btn btn-danger">Send</button>
											</div>
										</div>
									</form>
								</div><!-- /.post -->

								<!-- Post -->
								<div class="post">
									<div class="user-block">
										<img class="img-circle img-bordered-sm" src="../../dist/img/user6-128x128.jpg" alt="User Image">

										<span class="username">
											<a href="#">Adam Jones</a>

											<a href="#" class="float-right btn-tool"><i class="fas fa-times"></i></a>
										</span>

										<span class="description">Posted 5 photos - 5 days ago</span>
									</div><!-- /.user-block -->

									<div class="row mb-3">
										<div class="col-sm-6">
											<img class="img-fluid" src="../../dist/img/photo1.png" alt="Photo">
										</div><!-- /.col -->

										<div class="col-sm-6">
											<div class="row">
												<div class="col-sm-6">
													<img class="img-fluid mb-3" src="../../dist/img/photo2.png" alt="Photo">

													<img class="img-fluid" src="../../dist/img/photo3.jpg" alt="Photo">
												</div><!-- /.col -->

												<div class="col-sm-6">
													<img class="img-fluid mb-3" src="../../dist/img/photo4.jpg" alt="Photo">

													<img class="img-fluid" src="../../dist/img/photo1.png" alt="Photo">
												</div><!-- /.col -->
											</div><!-- /.row -->
										</div><!-- /.col -->
									</div><!-- /.row -->

									<p>
										<a href="#" class="link-black text-sm mr-2"><i class="fas fa-share mr-1"></i> Share</a>

										<a href="#" class="link-black text-sm"><i class="far fa-thumbs-up mr-1"></i> Like</a>
											
										<span class="float-right">
											<a href="#" class="link-black text-sm">
												<i class="far fa-comments mr-1"></i> Comments (5)
											</a>
										</span>
									</p>

									<input class="form-control form-control-sm" type="text" placeholder="Type a comment">
								</div><!-- /.post -->
							</div><!-- /.tab-pane -->

							<div class="tab-pane" id="timeline">
								<!-- The timeline -->
								<div class="timeline timeline-inverse">
									<!-- timeline time label -->
									<div class="time-label">
										<span class="bg-danger">
											10 Feb. 2014
										</span>
									</div><!-- /.timeline-label -->

									<!-- timeline item -->
									<div>
										<i class="fas fa-envelope bg-primary"></i>

										<div class="timeline-item">
											<span class="time"><i class="far fa-clock"></i> 12:05</span>

											<h3 class="timeline-header"><a href="#">Support Team</a> sent you an email</h3>

											<div class="timeline-body">
												Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles,
												weebly ning heekya handango imeem plugg dopplr jibjab, movity
												jajah plickers sifteo edmodo ifttt zimbra. Babblely odeo kaboodle
												quora plaxo ideeli hulu weebly balihoo...
											</div>

											<div class="timeline-footer">
												<a href="#" class="btn btn-primary btn-sm">Read more</a>

												<a href="#" class="btn btn-danger btn-sm">Delete</a>
											</div>
										</div>
									</div><!-- END timeline item -->
									
									<!-- timeline item -->
									<div>
										<i class="fas fa-user bg-info"></i>

										<div class="timeline-item">
											<span class="time"><i class="far fa-clock"></i> 5 mins ago</span>

											<h3 class="timeline-header border-0">
												<a href="#">Sarah Young</a> accepted your friend request
											</h3>
										</div>
									</div><!-- END timeline item -->
									
									<!-- timeline item -->
									<div>
										<i class="fas fa-comments bg-warning"></i>

										<div class="timeline-item">
											<span class="time"><i class="far fa-clock"></i> 27 mins ago</span>

											<h3 class="timeline-header"><a href="#">Jay White</a> commented on your post</h3>

											<div class="timeline-body">
												Take me to your leader!
												Switzerland is small and neutral!
												We are more like Germany, ambitious and misunderstood!
											</div>

											<div class="timeline-footer">
												<a href="#" class="btn btn-warning btn-flat btn-sm">View comment</a>
											</div>
										</div>
									</div><!-- END timeline item -->

									<!-- timeline time label -->
									<div class="time-label">
										<span class="bg-success">
											3 Jan. 2014
										</span>
									</div><!-- /.timeline-label -->

									<!-- timeline item -->
									<div>
										<i class="fas fa-camera bg-purple"></i>

										<div class="timeline-item">
											<span class="time"><i class="far fa-clock"></i> 2 days ago</span>

											<h3 class="timeline-header"><a href="#">Mina Lee</a> uploaded new photos</h3>

											<div class="timeline-body">
												<img src="https://placehold.it/150x100" alt="...">
												<img src="https://placehold.it/150x100" alt="...">
												<img src="https://placehold.it/150x100" alt="...">
												<img src="https://placehold.it/150x100" alt="...">
											</div>
										</div>
									</div><!-- END timeline item -->
									
									<div>
										<i class="far fa-clock bg-gray"></i>
									</div>
								</div>
							</div><!-- /.tab-pane -->

							<div class="tab-pane" id="settings">
								<form class="form-horizontal">
									<div class="form-group row">
										<label for="inputName" class="col-sm-2 col-form-label">Name</label>
                        
										<div class="col-sm-10">
											<input type="email" class="form-control" id="inputName" placeholder="Name">
										</div>
									</div>

									<div class="form-group row">
										<label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                        
										<div class="col-sm-10">
											<input type="email" class="form-control" id="inputEmail" placeholder="Email">
										</div>
									</div>

									<div class="form-group row">
										<label for="inputName2" class="col-sm-2 col-form-label">Name</label>

										<div class="col-sm-10">
											<input type="text" class="form-control" id="inputName2" placeholder="Name">
										</div>
									</div>

									<div class="form-group row">
										<label for="inputExperience" class="col-sm-2 col-form-label">Experience</label>

										<div class="col-sm-10">
											<textarea class="form-control" id="inputExperience" placeholder="Experience"></textarea>
										</div>
									</div>

									<div class="form-group row">
										<label for="inputSkills" class="col-sm-2 col-form-label">Skills</label>
										
										<div class="col-sm-10">
											<input type="text" class="form-control" id="inputSkills" placeholder="Skills">
										</div>
									</div>

									<div class="form-group row">
										<div class="offset-sm-2 col-sm-10">
											<div class="checkbox">
												<label>
													<input type="checkbox"> I agree to the <a href="#">terms and conditions</a>
												</label>
											</div>
										</div>
									</div>

									<div class="form-group row">
										<div class="offset-sm-2 col-sm-10">
											<button type="submit" class="btn btn-danger">Submit</button>
										</div>
									</div>
								</form>
							</div><!-- /.tab-pane -->
						</div><!-- /.tab-content -->
					</div><!-- /.card-body -->
				</div><!-- /.card -->
			</div><!-- /.col-md-8 -->
		</div><!-- /.row -->
	</div><!-- /.container-fluid -->
</section>
<!-- /.content -->

<?php 
    include_once 'Layouts/general/footer.php';
?>

<script src="mi_perfil.js"></script>
