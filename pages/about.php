<?php
/**
 * Created by PhpStorm.
 * User: Tourat
 * Date: 21-Apr-22
 * Time: 12:13 AM
 */
$result=$db->query("SELECT a.name,a.father_name,a.mother_name,a.nationality,a.primary_mobile,a.secondary_mobile,a.email,a.dob,a.gender_id,a.marital_status_id,a.nid,a
.religion_id,
a.home_town_divisions_id,
a.home_town_districts_id,
a.home_town_upazilas_id,
a.current_location_divisions_id,
a.current_location_districts_id,
a.current_location_upazilas_id,
b.description,a.status
FROM users a, myself_tb b
WHERE  a.id=b.users_id
");
$data=list(
$name,//0
$father_name,//1
$mother_name,//2
$nationality,//3
$primary_mobile,//4
$secondary_mobile,//5
$email,//6
$date_of_birth,//7
$gender,//8
$marital,//9
$nid,//10
$religion,//11
$home_town_divisions_id,//12
$home_town_districts_id,//13
$home_town_upazilas_id,//14
$current_location_divisions_id,//15
$current_location_districts_id,//16
$current_location_upazilas_id,//17
$description,//18
$status//19
)=$result->fetch_row();
// echo "<pre>";
// print_r($data);
$dateOfBirth = $date_of_birth;
$today = date("Y-m-d");
$diff = date_diff(date_create($dateOfBirth), date_create($today));
?>
<div class="vg-page page-about" id="about">
	<div class="container py-2">
		<div class="row">
			<div class="col-lg-4 py-2">
				<div id="#cf" class="img-place wow fadeInUp">
					<img class="bottom" src="assets/img/my.jpg" alt="Your Image Not Found">
				</div>
			</div>
			<div class="col-lg-7 offset-lg-1 wow fadeInRight">
				<h1 class="fw-light"><b><?php echo $name;?></b>
				</h1>
				<h5 class="fg-theme mb-2 text-justify" style="letter-spacing: -1px"> 
					<?php echo $description;?>
				</h5>
				<p class="text-muted"><?php ?></p>
				<ul class="theme-list">
					<li><b>From&ensp;:</b>&ensp;<?php echo districts($data[13]);?>
					</li>
					<li><b>Lives In&ensp;:</b>&ensp;<?php echo districts($data[16])?>
					</li>
					<li><b>Nationality&ensp;:</b>&ensp;<?php echo $data[3];?></li>
					<li><b>Age&ensp;:</b>&ensp;<?php echo $diff->format('%y');?></li>
					<li><b>Gender&ensp;:</b>&ensp;<?php echo $gender_array[$data[8]];?></li>
					<li><b>Religion&ensp;:</b>&ensp;<?php echo $religion_array[$data[11]];?></li>
					<li><b>Marital Status&ensp;:</b>&ensp;<?php echo $maritalStatus_array[$data[9]];?></li>
				</ul>
			
				<button class="btn btn-theme-outline">Download CV</button>
			</div>
		</div>
	</div>
	<div class="container py-5">
		<h1 class="text-center fw-normal wow fadeIn">My Skills</h1>
		<div class="row py-3">
			<div class="col-md-6">
				<div class="px-lg-3">
					<h4 class="wow fadeInUp">Coding skills</h4>
					<div class="progress-wrapper wow fadeInUp">
						<span class="caption">JavaScript</span>
						<div class="progress">
							<div class="progress-bar" role="progressbar" style="width: 86%;" aria-valuenow="96"
                                 aria-valuemin="0" aria-valuemax="100">86%</div>
						</div>
					</div>
					<div class="progress-wrapper wow fadeInUp">
						<span class="caption">PHP</span>
						<div class="progress">
							<div class="progress-bar" role="progressbar" style="width: 80%;" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100">80%</div>
						</div>
					</div>
					<div class="progress-wrapper wow fadeInUp">
						<span class="caption">HTML + CSS</span>
						<div class="progress">
							<div class="progress-bar" role="progressbar" style="width: 100%;" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100">100%</div>
						</div>
					</div>
					<div class="progress-wrapper wow fadeInUp">
						<span class="caption">Phyton</span>
						<div class="progress">
							<div class="progress-bar" role="progressbar" style="width: 90%;" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100">90%</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-6">
				<div class="px-lg-3">
					<h4 class="wow fadeInUp">Design Skills</h4>
					<div class="progress-wrapper wow fadeInUp">
						<span class="caption">UI / UX Design</span>
						<div class="progress">
							<div class="progress-bar" role="progressbar" style="width: 92%;" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100">92%</div>
						</div>
					</div>
					<div class="progress-wrapper wow fadeInUp">
						<span class="caption">Web Design</span>
						<div class="progress">
							<div class="progress-bar" role="progressbar" style="width: 99%;" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100">99%</div>
						</div>
					</div>
					<div class="progress-wrapper wow fadeInUp">
						<span class="caption">Logo Design</span>
						<div class="progress">
							<div class="progress-bar" role="progressbar" style="width: 79%;" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100">79%</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="container pt-5">
		<div class="row">
			<div class="col-md-6 wow fadeInRight">
				<h2 class="fw-normal">Education</h2>
				<ul class="timeline mt-4 pr-md-5">
					<li>
						<div class="title">2010</div>
						<div class="details">
							<h5>Specialize of course</h5>
							<small class="fg-theme">University of Study</small>
							<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered</p>
						</div>
					</li>
					<li>
						<div class="title">2009</div>
						<div class="details">
							<h5>Specialize of course</h5>
							<small class="fg-theme">University of Study</small>
							<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered</p>
						</div>
					</li>
					<li>
						<div class="title">2008</div>
						<div class="details">
							<h5>Specialize of course</h5>
							<small class="fg-theme">University of Study</small>
							<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered</p>
						</div>
					</li>
				</ul>
			</div>
			<div class="col-md-6 wow fadeInRight" data-wow-delay="200ms">
				<h2 class="fw-normal">Experience</h2>
				<ul class="timeline mt-4 pr-md-5">
					<li>
						<div class="title">2017 - Current</div>
						<div class="details">
							<h5>Specialize of course</h5>
							<small class="fg-theme">University of Study</small>
							<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered</p>
						</div>
					</li>
					<li>
						<div class="title">2014</div>
						<div class="details">
							<h5>Specialize of course</h5>
							<small class="fg-theme">University of Study</small>
							<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered</p>
						</div>
					</li>
					<li>
						<div class="title">2011</div>
						<div class="details">
							<h5>Specialize of course</h5>
							<small class="fg-theme">University of Study</small>
							<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered</p>
						</div>
					</li>
				</ul>
			</div>
		</div>
	</div>
</div>

