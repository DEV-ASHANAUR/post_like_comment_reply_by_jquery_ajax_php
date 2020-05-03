	<?php include 'page_header.php'; ?>
			<!-- boby section -->
			<div class="container mt-4">

			
			<!-- <p class="emoji-picker-container">
				<textarea class="form-control" data-emojiable="true"
				data-emoji-input="unicode" type="text" name="detalis"
				id="detai" placeholder="Add a Message">  </textarea>
			</p> -->
			
			
				<div class="row">
					<div class="col-md-3 mb-3">
						<div class="main bg-white">
							<div class="bg-back"><!--imgbg--></div>
							<div class="full">
								<div class="im" style="background-image: url(<?php if(!empty($db_photo)){echo "upload/".$db_photo;}else{echo 'img/default.jpg';}?>);">
								
								</div>
								<div class="user-space">
									<h3 class='text-center'><?php if(!empty($name)){echo $name;} ?></h3>
									<h5 class="be-like pl-1 pr-1"><?php if(!empty($db_about)){echo $db_about;}else{echo 'Description';} ?></h5>
								</div>
								<div class="followling border border-red">
									<h5 class="be-like">Following</h5>
									<h5 class="be-like">34</h5>
								</div>
								<div class="followling border border-red">
									<h5 class="be-like">Followers</h5>
									<h5 class="be-like">100</h5>
								</div>
								<div class="followling border border-red">
										<h5 class="be-like"><a class=" btn text-danger" href="#">View Profile</a></h5>
								</div>
							</div>
						</div>	
					</div>
					<div class="col-md-6">
						<div class="middle mb-3">
							<div class="prob p-2" style="background-image: url(<?php if(!empty($db_photo)){echo "upload/".$db_photo;}else{echo 'img/default.jpg';}?>);">
									<span class='ml-5'><?php if(!empty($name)){echo ' '.$name;} ?></span>
							</div>
							<div class="p-2">
								<form id="data" method="post" enctype="multipart/form-data">
									<input type="file" id="file" name="file" class="form-control mb-2">
									<input type="hidden" name="uid" value="<?php echo $db_id; ?>">

									<input type="text" id="title" class="form-control mb-2" name="title" placeholder="Title Here..">

									<textarea name="detalis" id="detalis" class="form-control mb-2"placeholder="Write Something What's Your Mind.."></textarea>
									
									<input type="submit" name="submit" id="upload" class="btn btn-primary mt-2 mb-2 ml-2" value="Post">
								</form>
							</div>
						</div>
						<!-- post start -->
						<div class="content border mb-5 show">
							<!-- post start show -->
							
							<!-- post show end -->
						</div>
					</div>

					<!-- post end -->

					<div class="col-md-3">
						<div class="full1">
							<div class="im1">
								<img class="rounded-circle img-thumbnail m-auto" src="img/12.jpg" alt="photo">
							</div>
							<div class="pt-5">
								<h3 class='text-center'>Track Time on Workwise</h3>
								<h5 class="be-like">Pay only for the Hours worked</h5>
							</div>
							<div class="followling border border-red">
								<h5 class="be-like"><a class=" btn text-danger" href="#">Sign In</a></h5>
							</div>			
						</div>
						<div class="top-profile mt-3">
							<div class="full2 p-2">
								<div class="header">
									<h4 class="text-center">Top Profile</h2>
										<input type="text" class="form-control mb-2" id="myInput" onkeyup="myFunction()" placeholder="Search for names.." title="Type in a name">
								</div>
								<div class="profile">
									<table id="myTable">
										<tr>
											<td>
												<div class="main border">
													<div class="bac_pro"  style="background-image: url('img/12.jpg');">
														
													</div>
													<div class="name">
														<h5 class="text-center">Islam</h5>
														<p class="text-center text-mute">Graphic Designer</p>
													</div>
													<div class="follow pl-5 pr-5">
														<a href="#" class="bb btn btn-primary">Follow</a>
													</div>
													<div class="viewprofile border p-2 mt-2">
														<a href="#" class="bb btn btn-danger">View Profile</a>
													</div>
												</div>
											</td>
										</tr>
										<tr>
											<td>
												<div class="main border">
													<div class="bac_pro"  style="background-image: url('img/12.jpg');">
														
													</div>
													<div class="name">
														<h5 class="text-center">Ashanur</h5>
														<p class="text-center text-mute">Graphic Designer</p>
													</div>
													<div class="follow pl-5 pr-5">
														<a href="#" class="bb btn btn-primary">Follow</a>
													</div>
													<div class="viewprofile border p-2 mt-2">
														<a href="#" class="bb btn btn-danger">View Profile</a>
													</div>
												</div>
											</td>
										</tr>
										
									</table>
								</div>
							</div>
						</div>

					</div>
				</div>
			</div>
			<!-- footer -->
		<?php include 'page.footer.php';?>