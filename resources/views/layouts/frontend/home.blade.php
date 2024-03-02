@extends('layouts.frontend.master')
  
@section('content')

<!-- Slider Start -->
<section class="banner">
	<div class="container">
		<div class="row">
			<div class="col-lg-6 col-md-12 col-xl-7">
				<div class="block">
					<div class="divider mb-3"></div>
					<span class="text-uppercase text-sm letter-spacing "></span>
					<h1 class="mb-3 mt-3">BOTTOM UP REDRESS MECHANISM</h1>
					
					<p class="mb-4 pr-5">GRIEVANCE AGAINST MMLSAY SERVICE.</p>
					<div class="btn-container ">
						<a href="{{ route('grievance.raise') }}" target="_blank" class="btn btn-main-2 btn-icon btn-round-full">REGISTER YOUR GRIEVANCE  <i class="icofont-simple-right ml-2  "></i></a>
						
						<a href="appoinment.html" target="_blank" class="btn btn-solid-border btn-icon btn-round-full">TRACK YOUR GRIEVANCE  <i class="icofont-simple-right ml-2  "></i></a>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<section class="features">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="feature-block d-lg-flex">
					<div class="feature-item mb-5 mb-lg-0">
						<div class="feature-icon mb-4">
							<i class="icofont-surgeon-alt"></i>
						</div>
						<h4 class="mb-3">SUBMISSION</h4>
						<p class="mb-4">Grievance can be lodged by any stakeholder of MMLSAY Eligible beneficiaries.</p>
					</div>
				
					<div class="feature-item mb-5 mb-lg-0">
						<div class="feature-icon mb-4">
							<i class="icofont-ui-clock"></i>
						</div>
						<h4 class="mb-3">ASSESMENT</h4>
						<p class="mb-4">Grievance will be reviewd by MMLSAY official.</p>
					</div>
				
					<div class="feature-item mb-5 mb-lg-0">
						<div class="feature-icon mb-4">
							<i class="icofont-support"></i>
						</div>
						<span>REDRESSAL</span>
						<p>Grievance raised will be resolved with 10 Days .</p>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>


<section class="section testimonial-2 gray-bg">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-lg-7">
				<div class="section-title text-center">
					<h2>ABOUT MMLSAY GRIEVANCE RESDRESSAL PORTAL</h2>
					<div class="divider mx-auto my-4"></div>
					<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum..</p>
				</div>
			</div>
		</div>
	</div>
</section>
@stop