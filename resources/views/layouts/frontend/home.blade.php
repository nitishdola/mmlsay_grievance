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
						
						<a href="{{ route('grievance.track') }}" target="_blank" class="btn btn-solid-border btn-icon btn-round-full">TRACK YOUR GRIEVANCE  <i class="icofont-simple-right ml-2  "></i></a>
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
		<div class="row">
			<div class="col-lg-12">
				<div class="section-title">
					<h2>ABOUT MMLSAY</h2>
					<div class="divider mx-auto my-4"></div>
					<p>Mukhya Mantri Lok Sevak Arogya Yojana(MMLSAY) is a medical reimbursement scheme of the State Government which aims at providing medical reimbursement to Government employees including Government pensioners and their dependents at CGHS rates.
</p>
<p>

Under Mukhya Mantri Lok Sevak Arogya Yojana, registration and medical reimbursement of Government employees, their dependents and Government pensioners and their spouses will be done through an online IT portal. This IT portal will be with end to end functioning. The address of the portal is https://mmlsay.assam.gov.in. Registration and reimbursement process can be done either by self or through assistance of the District Kiosks located in Medical Colleges/District Hospitals/ Offices of the Joint Director of Health Services. Certain information like Aadhaar Number, Contact Number and family details will have to be provided at the time of registration. For submitting claims, bank details and documents related to treatment in the concerned hospital are to be uploaded.</p>
				</div>
			</div>
		</div>
	</div>
</section>
@stop