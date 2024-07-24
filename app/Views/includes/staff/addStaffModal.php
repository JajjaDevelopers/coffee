<!-- Teacher Addition Modal -->
<div class="modal fade" id="addTeacher" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
	aria-labelledby="staticBackdropLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-xl-12 col-xxl-12 col-sm-12">
						<div class="card">
							<div class="card-header">
								<h5 class="card-title text-center" id="staffAddition">Add New Staff</h5>
							</div>
							<div class="card-body">
								<form id='teacherAdd' action="<?=base_url('teachers/add')?>" method="post"
									enctype="multipart/form-data">
									<input type="hidden" class="id">
									<div class="row">
										<div class="col-lg-4 col-md-4 col-sm-12">
											<div class="form-group">
												<label class="form-label">First Name</label>
												<input type="text" id='first_name' class="form-control">
											</div>
										</div>
										<div class="col-lg-4 col-md-4 col-sm-12">
											<div class="form-group">
												<label class="form-label">Middle Name</label>
												<input type="text" class="form-control" id='middle_name'>
											</div>
										</div>
										<div class="col-lg-4 col-md-4 col-sm-12">
											<div class="form-group">
												<label class="form-label">Surname</label>
												<input type="text" class="form-control" id='surname'>
											</div>
										</div>
										<div class="col-lg-4 col-md-4 col-sm-12">
											<div class="form-group">
												<label class="form-label">Date of Birth</label>
												<input id='dob' type="date" class="form-control">
											</div>
										</div>
										<div class="col-lg-4 col-md-4 col-sm-12">
											<div class="form-group">
												<label class="form-label">Email Address</label>
												<input type='text' id="email" class=" form-control">
											</div>
										</div>
										<div class="col-lg-4 col-md-4 col-sm-12">
											<div class="form-group">
												<label class="form-label">Role</label>
												<select class="form-select" id='role'>
													<option value="">---Select Role---</option>
													<?php foreach($roles as $role):?>
													<option value='<?=$role['name'];?>'><?=$role['name'];?></option>
													<?php endforeach;?>
												</select>
											</div>
										</div>
										<div class="col-lg-4 col-md-4 col-sm-12">
											<div class="form-group">
												<label class="form-label">Nationality</label>
												<select id="nationality" class="form-select">
													<option value="">---Select Nationality---</option>
													<option value="DZ">Algeria</option>
													<option value="AO">Angola</option>
													<option value="BJ">Benin</option>
													<option value="BW">Botswana</option>
													<option value="BF">Burkina Faso</option>
													<option value="BI">Burundi</option>
													<option value="CM">Cameroon</option>
													<option value="CV">Cape Verde</option>
													<option value="CF">Central African Republic</option>
													<option value="TD">Chad</option>
													<option value="KM">Comoros</option>
													<option value="CG">Congo</option>
													<option value="CD">Democratic Republic of the Congo</option>
													<option value="DJ">Djibouti</option>
													<option value="EG">Egypt</option>
													<option value="GQ">Equatorial Guinea</option>
													<option value="ER">Eritrea</option>
													<option value="ET">Ethiopia</option>
													<option value="GA">Gabon</option>
													<option value="GM">Gambia</option>
													<option value="GH">Ghana</option>
													<option value="GN">Guinea</option>
													<option value="GW">Guinea-Bissau</option>
													<option value="CI">Ivory Coast</option>
													<option value="KE">Kenya</option>
													<option value="LS">Lesotho</option>
													<option value="LR">Liberia</option>
													<option value="LY">Libya</option>
													<option value="MG">Madagascar</option>
													<option value="MW">Malawi</option>
													<option value="ML">Mali</option>
													<option value="MR">Mauritania</option>
													<option value="MU">Mauritius</option>
													<option value="YT">Mayotte</option>
													<option value="MA">Morocco</option>
													<option value="MZ">Mozambique</option>
													<option value="NA">Namibia</option>
													<option value="NE">Niger</option>
													<option value="NG">Nigeria</option>
													<option value="RE">Reunion</option>
													<option value="RW">Rwanda</option>
													<option value="ST">Sao Tome and Principe</option>
													<option value="SN">Senegal</option>
													<option value="SC">Seychelles</option>
													<option value="SL">Sierra Leone</option>
													<option value="SO">Somalia</option>
													<option value="ZA">South Africa</option>
													<option value="SS">South Sudan</option>
													<option value="SD">Sudan</option>
													<option value="SZ">Eswatini</option>
													<option value="TZ">Tanzania</option>
													<option value="TG">Togo</option>
													<option value="TN">Tunisia</option>
													<option value="UG">Uganda</option>
													<option value="EH">Western Sahara</option>
													<option value="ZM">Zambia</option>
													<option value="ZW">Zimbabwe</option>
												</select>
											</div>
										</div>
										<div class="col-lg-4 col-md-4 col-sm-12">
											<div class="form-group">
												<label class="form-label">Place of Residence</label>
												<input type="text" class="form-control" id='address'>
											</div>
										</div>
										<div class="col-lg-4 col-md-4 col-sm-12">
											<div class="form-group">
												<label class="form-label">Phone Contact</label>
												<input type="text" class="form-control" id='phone'>
											</div>
										</div>
										<div class="col-lg-4 col-md-4 col-sm-12">
											<div class="form-group">
												<label class="form-label">Staff ID NIN</label>
												<input type="text" class="form-control" id='nin'>
											</div>
										</div>
										<div class="col-lg-4 col-md-4 col-sm-12">
											<div class="form-group">
												<label class="form-label">Gender</label>
												<select class="form-select" id='gender'>
														<option value="">---Select Gender---</option>
													<option value="Male">Male</option>
													<option value="Female">Female</option>
												</select>
											</div>
										</div>
										<div class="col-lg-4 col-md-4 col-sm-12">
											<div class="form-group">
												<label class="form-label">Password</label>
												<div class="d-flex">
														<input type="password" value="12345678" class="form-control" name='pwdview' placeholder="" id='password'>
														<button class='btn btn-sm btn-info pwdView text-white' type='button'><i class="la la-eye"></i></button>
												</div>
											</div>
										</div>
										<div class="col-lg-6 col-md-6 col-sm-12">
											<div class="form-group">
												<label class="form-label">Title</label>
												<select class="form-select" id='title'>
													<option value="">---Select---</option>
													<option value="Mr.">Mr</option>
													<option value="Mrs.">Mrs</option>
													<option value="Eng.">Eng</option>
													<option value="Dr.">Dr</option>
													<option value="Rev.">Rev</option>
												</select>
											</div>
										</div>
										<div class="col-lg-6 col-md-6 col-sm-12">
											<div class="form-group">
												<label class="form-label"> Photo</label>
												<input type="file" class="form-control" id='photo'>
											</div>
										</div>
									</div>
								</form>

							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="modal-footer register">
				<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
				<button id='addTeacherBtn' type="button" class="btn btn-primary addBtn">Save</button>
			</div>
			<div class="modal-footer update" style='display:none'>
				<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
				<button id='updateTeacherBtn' type="button" class="btn btn-primary updateBtn">Update</button>
			</div>
		</div>
	</div>
</div>