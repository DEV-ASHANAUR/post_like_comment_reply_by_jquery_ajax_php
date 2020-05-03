<?php include 'page_header.php'; 
	if(isset($_GET['id'])){
		$giv_id = $_GET['id'];
		$user_show = $obj->get_user($user_id);
		if($user_show->num_rows>0){
		while($row = $user_show->fetch_object()){
			
			$mydb_id = $row->user_id;
			$my_name = $row->user_name;
			$my_photo = $row->user_photo;
			$my_email = $row->user_email;
			$my_about = $row->user_about;
			$my_birth = $row->user_birth;
			$my_link = $row->user_link;
			$my_add = $row->user_address;
		}
	}
	}


?>
<?php
      if(isset($_SESSION['msg']['pro_up_sus'])){
          ?>
              <script type="text/javascript">
                  Swal.fire(
                      'Good Job!',
                      '<?php echo Flass_data::show_error();?>',
                      'success'
                      );
              </script>
          <?php
        }
      ?>
      <?php
            if(isset($_SESSION['msg']['pro_up_error'])){
                ?>
                    <script type="text/javascript">
                        Swal.fire({
                                icon: 'error',
                                title: 'Oops...',
                                text: '<?php echo Flass_data::show_error();?>'
                            })
                    </script>
                <?php
            }
        ?>
	
			<!-- boby section -->
			<div class="container mt-4">
				<div class="row">
					<div class="col-md-3 mb-3">
						<div class="main bg-white">
							<div class="bg-back"><!--imgbg--></div>
							<div class="full">
								<div class="im" style="background-image: url(<?php if(!empty($my_photo)){echo "upload/".$my_photo;}else{echo 'img/default.jpg';}?>);">
								
								</div>
								
								<div class="user-space p-2">
									<h3 class='text-center'><?php if(!empty($my_name)){echo $my_name;}else{echo 'Mr.jhon';}?></h3>
									<h5 class="text-center"><?php if(!empty($my_about)){echo $my_about;}else{echo 'Drescription';}?></h5>
									
								</div>

								<div class="pl-2 pb-4">
									<?php if(!empty($my_add)){?>
									<span><i class="fa fa-map-marker" aria-hidden="true"></i><?php if(!empty($my_add)){echo ' '.$my_add;}else{echo 'Address';}?></span>
									<?php }
									if(!empty($my_link)){?>
									<span><i class="fa fa-location-arrow" aria-hidden="true"></i> <a href="<?php if(!empty($my_link)){echo $my_link;} ?>" target="_blank"><?php if(!empty($my_link)){echo $my_link;}else{echo 'Website Link';}?></a></span>
								<?php }?>
								</div>

								<!-- <div class="followling border border-red">
									<h5 class="be-like">Following</h5>
									<h5 class="be-like">34</h5>
								</div>
								<div class="followling border border-red">
									<h5 class="be-like">Followers</h5>
									<h5 class="be-like">100</h5>
								</div>
								<div class="followling border border-red">
										<h5 class="be-like"><a class=" btn text-danger" href="#">View Profile</a></h5>
								</div> -->
							</div>
						</div>	
					</div>
					<section>
						<div class="container mb-5">
							<!-- <div class="feature-box mt-40 mb-30">
								<h2 class="ml-0">Profile</h2>
							</div> -->
							<div class="tab-head">
								<ul class="nav price-nav " id="myTab" role="tablist">
									<li class="nav-item">
										<a class="nav-link active d-flex align-items-center" id="home-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="home" aria-selected="true">
											Profile
										</a>
									</li>
									<li class="nav-item">
										<a class="nav-link d-flex align-items-center" id="profile-tab" data-toggle="tab" href="#followers" role="tab" aria-controls="profile" aria-selected="false">
											Followers<sup><span class="badge badge-info">23</span></sup>
										</a>  
									</li>
									<li class="nav-item">
										<a class="nav-link d-flex align-items-center" id="profile-tab" data-toggle="tab" href="#following" role="tab" aria-controls="profile" aria-selected="false">
											following <sup><span class="badge badge-info">23</span></sup>
										</a>  
									</li>
									<li class="nav-item">
										<a class="nav-link  d-flex align-items-center" id="home-tab" data-toggle="tab" href="#account" role="tab" aria-controls="home" aria-selected="true">
											account
										</a>
									</li>
								</ul>
								
								<div class="tab-content" id="myTabContent">
									<!-- profile setting div start -->
									<div class="tab-pane fade show active" id="profile" role="tabpanel" aria-labelledby="home-tab">
										<form action="update_profile.php" method="post" enctype="multipart/form-data" id="uploadForm">
										<div class="row">
											<div class="col-md-12">
												<div class="row ">
													<div class="col-md-6 mt-2">
														<label for="photo">Upload Photo</label>
														<input type="file" name="file" id="file" class="form-control">

														<input type="hidden" name="picture" value="<?php if(isset($my_photo)){echo $my_photo;}?>"/>
													</div>
													<div class="col-md-6 mt-3" id="test">
														<img class="img-fluid img-thumbnail" width="150px" height="150px" src="<?php if(isset($my_photo)){echo "upload/".$my_photo;}?>" alt="">
                        							</div>
												</div>
												<label for="name">Name :</label>
												<input type="text" class="form-control mb-2" name="name" value="<?php if(isset($my_name)){echo $my_name;}?>">

												<label for="name">Email :</label>
												<input type="email" class="form-control mb-2" name="email" value="<?php if(isset($my_email)){echo $my_email;}?>">

												<label for="name">Date Of Birth :</label>
												<input type="text" class="form-control mb-2" name="birth" value="<?php if(isset($my_birth)){echo $my_birth;}?>">

												<label for="name">Website Link :</label>
												<input type="text" class="form-control mb-2" name="link" value="<?php if(isset($my_link)){echo $my_link;}?>">

												<label for="name">Address :</label>
												<input type="text" class="form-control mb-2" name="address" value="<?php if(isset($my_add)){echo $my_add;}?>">

												<label for="name">About Yourself :</label>
												<textarea name="about" class="form-control mb-2" id="" cols="10" rows="5"><?php if(isset($my_about)){echo $my_about;}?></textarea>
												<input type="hidden" name="hid" value="<?php echo $mydb_id;?>">

												<input type="submit" name="submit" class="btn btn-success w-100 mb-2 mt-2" />
											</div>
											</form>	
										</div>
									</div>
									<!-- profile setting div End -->
									<div class="tab-pane fade" id="followers" role="tabpanel" aria-labelledby="profile-tab">
										<div class="row">
											followers
										</div>
									</div>
									<div class="tab-pane fade" id="following" role="tabpanel" aria-labelledby="profile-tab">
										<div class="row">
											following
										</div>
									</div>
									<div class="tab-pane fade" id="account" role="tabpanel" aria-labelledby="profile-tab">
										<div class="row">
											account
										</div>
									</div>
								</div>
							</div>
						</div>
					</section>
						

					</div>
				</div>
			</div>
			<?php include 'setting_fotter.php';?>
		
			
		