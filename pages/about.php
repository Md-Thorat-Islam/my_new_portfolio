<?php
/**
 * Created by PhpStorm.
 * User: Tourat
 * Date: 21-Apr-22
 * Time: 12:13 AM
 */

$result=$db->query("SELECT a.name,b.position,b.lives_in_id,b.from_id,b.gender,b.curent_service_company, b.joining_date,b.leaves_date,b
.discription,b.date_of_birth From users a,about b where a.id=b.user_id ORDER BY b.id DESC");
list($name,$position,$lives_in_id,$from_id,$gender,$curent_service_company,$joining_date,$leaves_date,$discription,
    $date_of_birth)
    =$result->fetch_row();

$dateOfBirth = $date_of_birth;
$today = date("Y-m-d");
$diff = date_diff(date_create($dateOfBirth), date_create($today));
$from_array=[1=>"Jamalpur"]
?>

<div class="vg-page page-about" id="about">
	<div class="container py-3">
		<div class="row">
			<div class="col-lg-4 py-2">
				<div id="#cf" class="img-place wow fadeInUp">
					<img class="bottom" src="assets/img/my.jpg" alt="">
<!--					<img class="top" src="assets/img/mY2.jpg" alt="">-->
				</div>
			</div>
			<div class="col-lg-7 offset-lg-1 wow fadeInRight">
				<h1 class="fw-light"><?php echo $name;?></h1>
				<h5 class="fg-theme mb-3"><?php echo $position;?></h5>
				<p class="text-muted"><?php echo $discription;?></p>
				<ul class="theme-list">
					<li><b>From:</b>&ensp;<?php echo $from_array[$from_id];?></li>
					<li><b>Lives In:</b>&ensp;<?php echo $district_array[$lives_in_id];?></li>
					<li><b>Age:</b>&ensp;<?php echo $diff->format('%y');?></li>
					<li><b>Gender:</b> Male</li>
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

