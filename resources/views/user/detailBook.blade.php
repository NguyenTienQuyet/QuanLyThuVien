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
							@foreach($list as $book)
							<a href="#" class="primary-btn text-uppercase" id="borrow" book_id="{{$book->id}}">Borrow</a>
							@endforeach
						</div>
					</div>
				</div>	
			</section>
			<!-- End course-details Area -->

<div class="modal fade" id="myModal-borrow" author="dialog">
    <div class="modal-dialog">

        <!-- <form id="form-author"> -->
            <!-- {{csrf_field()}} -->
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title"> Borrow Book</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-xs-12">
                            <!-- PAGE CONTENT BEGINS -->
                            <div class="col-sm-9" >
                                <div class="form-group" >
                                    <label class="col-sm-4 control-label no-padding-right" for="form-field-1" style="margin-top: 22px;">Quantity:</label>

                                    <div class="col-sm-7">
                                        <input type="text" placeholder="Enter quantity book ..." class="form-control"  name="quantity" id="quantity" style="width: 350px; margin-top: 15px;"/>
                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>

                </div>  
                <br/>
                <div class="modal-footer">
                	<input type="hidden" name="borrow_book_id" id="borrow_book_id" value="">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                    <button class="btn btn-info" type="submit" id="borrow_book">
                        <i class="ace-icon fa fa-check bigger-110"></i>
                        Ok
                    </button>
                </div>
            </div>
        <!-- </form> -->
    </div>
</div>
					    			
@endsection