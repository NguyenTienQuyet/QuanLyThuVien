@extends('user.master')
@section('content')
		  
			<!-- start banner Area -->
	<!-- 		<section class="banner-area relative about-banner" id="home">	
				<div class="overlay overlay-bg"></div>
				<div class="container">				
					<div class="row d-flex align-items-center justify-content-center">
						<div class="about-content col-lg-12">
							<h1 class="text-white">
								Popular Courses		
							</h1>	
							<p class="text-white link-nav"><a href="index.html">Home </a>  <span class="lnr lnr-arrow-right"></span>  <a href="courses.html"> Popular Courses</a></p>
						</div>	
					</div>
				</div>
			</section> -->
			<!-- End banner Area -->	

			<!-- Start course-details Area -->
			<section class="course-details-area pt-120">
				<div class="container">
					<div class="row">
						<div class="col-lg-8 left-contents">
							<div class="main-image">
								<img class="img-fluid" src="../frontend/img/m-img.jpg" alt="">
							</div>
							<div class="jq-tab-wrapper" id="horizontalTab">
	                            <div class="jq-tab-menu">
	                                <div class="jq-tab-title active" data-tab="1">Objectives</div>
	                                <div class="jq-tab-title" data-tab="2">Eligibility</div>
	                                <div class="jq-tab-title" data-tab="3">Course Outline</div>
	                                <div class="jq-tab-title" data-tab="4">Comments</div>
	                                <div class="jq-tab-title" data-tab="5">Reviews</div>
	                            </div>
	                           
	                        </div>
						</div>
						<div class="col-lg-4 right-contents">
							<ul>
								<li>
									<a class="justify-content-between d-flex" href="#">
										@foreach($list as $book)
										<p id="{{$book->title}}"><b style="color: black;">Title:</b></p> 
										
										<span class="or">{{$book->title}}</span>
										@endforeach
									</a>
								</li>
								<li>
									<a class="justify-content-between d-flex" href="#">
										<p><b style="color: black;">Author:</b></p>
										@foreach($listA as $author)
											<span style="margin-left: 10px;"><a href="{{route('listBookOfAuthor', $author->id)}}" id="{{$author->id}}">{{$author->name}}</a></span>
										@endforeach
									</a>
								</li>
								<li>
									<a class="justify-content-between d-flex" href="#">
										<p><b style="color: black;">Genre:</b></p>
										@foreach($listG as $genre)
										<span style="margin-left: 10px;"><a id="{{$genre->id}}" href="{{route('listBookOfGenre', $genre->id)}}" >{{$genre->genreType}}</a></span>
										@endforeach
									</a>
								</li>
								<li>
									<a class="justify-content-between d-flex" href="#">
										<p><b style="color: black;">Publisher:</b></p>
										<span><a id="{{$book->publisher_id}}" href="{{route('book', $book->publisher_id)}}">{{$book->publisherName}}</a></span>
									</a>
								</li>
								<li>
									<a class="justify-content-between d-flex" href="#">
										<p><b style="color: black;">Published Year:</b></p>
										@foreach($list as $book)
										<span>{{$book->publishedYear}}</span>
										@endforeach
									</a>
								</li>
							</ul>
							<a href="#" class="primary-btn text-uppercase">Borrow</a>
						</div>
					</div>
				</div>	
			</section>
			<!-- End course-details Area -->
					    			
@endsection