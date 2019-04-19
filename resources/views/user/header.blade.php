<div class="header-top">
	<div class="container">
		<div class="row">
			<div class="col-lg-6 col-sm-6 col-8 header-top-left no-padding">
				<ul>
				<li><a href="#"><i class="fa fa-facebook"></i></a></li>
				<li><a href="#"><i class="fa fa-twitter"></i></a></li>
				<li><a href="#"><i class="fa fa-dribbble"></i></a></li>
				<li><a href="#"><i class="fa fa-behance"></i></a></li>
				</ul>			
			</div>

			

			<div class="col-lg-6 col-sm-6 col-4 header-top-right no-padding">
				<a href="{{route('register')}}"><span class="lnr lnr-phone-handset"></span> <span class="text"><b><u>Register</u></b></span></a>
				<a href="{{route('login')}}"><span class="lnr lnr-envelope"></span> <span class="text"><b><u>Login</u></b></span></a>			
			</div>
		</div>			  					
	</div>
	</div>
	<div class="container main-menu">
	<div class="row align-items-center justify-content-between d-flex">
      <div id="logo">
        <a href="{{route('homePage')}}"><img style="height: 50px; width: 50px;" src="../frontend/img/logo1.png" alt="" title="" /><h3 style="color: white; margin-left: 70px; margin-top: -28px;">Library</h3></a>
      </div>

    <div class="col-lg-4  col-md-6 col-sm-6">
		<div class="single-footer-widget">
			
			<div class="" id="mc_embed_signup">
				 <form target="_blank" action="https://spondonit.us12.list-manage.com/subscribe/post?u=1462626880ade1ac87bd9c93a&amp;id=92a4423d01" method="get">
				  <div class="input-group">
				    <input type="text" class="form-control" name="EMAIL" placeholder="Enter Data Search ... " onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Data Search ... '" required="" type="email">
				    <div class="input-group-btn">
				      <button class="btn btn-default" type="submit">
				        <span class="lnr lnr-arrow-right"></span>
				      </button>    
				    </div>
				    	<div class="info"></div>  
				  </div>
				</form> 
			</div>
		</div>
	</div>

      <nav id="nav-menu-container">
        @include('user.menu')
      </nav><!-- #nav-menu-container -->		    		
	</div>
</div>