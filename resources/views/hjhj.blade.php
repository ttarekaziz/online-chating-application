@extends('layouts.website')
@section('content')
        
        <!--================Banner Area =================-->
        <section class="banner_area">
            <div class="container">
                <div class="banner_content">
                    <h3 title="Blog"><img class="left_img" src="img/banner/t-left-img.png" alt="">Active Members<img class="right_img" src="img/banner/t-right-img.png" alt=""></h3>

                </div>
            </div>
        </section>
        <!--================End Banner Area =================-->
        
        <!--================Blog grid Area =================-->
        <section class="blog_grid_area">
            <div class="container">

                <div class="row">
                    <div class="col-md-8">
                        <div class="blog_grid_inner">
                        @foreach($search as $data)
                            <div class="blog_grid_item">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="blog_grid_img">
                                            <img src="{{asset('uploads/candidate/'.$data->image)}}" alt="">
                                            <div class="blog_share_area">
                                                <!-- <a href="#"><i class="mdi mdi-comment-multiple-outline"></i>16</a>
                                                <a href="#"><i class="fa fa-heart" aria-hidden="true"></i>95</a>
                                                <a href="#"><i class="fa fa-share-alt" aria-hidden="true"></i>Share</a> -->
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        
                                        <div class="blog_grid_content">
											
											@php
                            $id=Session::get('id');
                            $user=App\Register:: where('id',$id)->first();
                        @endphp
                        @if($id)
                        <li>			
									<a href="{{route('timeline', ['id'=>$data->id])}}" class="btn btn-warning"><h3>{{$data->name}} </h3></a></li>
                        @else
                        
						<h3>{{$data->name}} </h3>
                        @endif
						
                    </ul>
											
											
											
											
								

											
                                            
                                            <div class="blog_grid_date">
                                                <a href="#">Member ID</a>
                                                <a href="#">{{$data->id}}</a>
                                            </div>
                                        
                                            <table class="table" style="margin-bottom: -3px;">
                                                <tr>
                                                    <th>Age</th>
                                                    <th>Religion</th>
                                                    <th>Marital Status</th>
                                                </tr>
                                                <tr>
                                                    <td>{{Carbon\Carbon::parse($data->birthday)->age}}</td>
                                                    <td>{{$data->religious}}</td>
                                                    <td>{{$data->marital}}</td>
                                                </tr>

                                                 <tr>
                                                    <th>Height</th>
                                                    <td>{{$data->height}}</td>
                                                </tr>
                                                <tr>
                                                    <th>Location</th>
                                                    <td>{{$data->country}}</td>
                                                </tr>

                                            </table>
											
											
											
											
											
											<ul class="nav navbar-nav navbar-right">
                       
												 @php
                            $id=Session::get('id');
                            $user=App\Register:: where('id',$id)->first();
                        @endphp
                        @if($id)	
							@foreach($connection as $connections)

                       		@if($data->id!=$connections->second_id || $connection->id!=$connections->first_id)
												
											

                                  <form action="{{route('sentrequest',['id'=>$data->id])}}" method="POST" role="form" enctype="multipart/form-data">
   @method('post')
 @csrf
									              <input type="hidden" name="second_id" value="{{$data->id}}">
									  <input type="hidden" name="second_name" value="{{$data->name}}">
									  <input type="hidden" name="first_name" value="{{$user->name}}">



 
 <button type="submit" class="btn btn-primary">Sent Request</button>
</form>
												@endif
												@endforeach			
											
						
                        @else
                        <li><a class="popup-with-zoom-anim" href="#small-dialog"><i class="mdi mdi-key-variant"></i>Login</a></li>
                        <li><a class="popup-with-zoom-anim" href="#register_form" class="popup-with-zoom-anim"><i class="fa fa-user-plus"></i>Registration</a></li>
						
                        @endif
						
                    </ul>
											
									
											
											
											
											
											
											
											
								

                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                          
                        @endforeach
                    </div>
                    </div>
                </div>


                <div class="pagination_area">
                    <a class="prev" href="#">Previous</a>
                    <a class="arrow_left" href="#"><i class="fa fa-angle-left"></i></a>
                    <a class="arrow_right" href="#"><i class="fa fa-angle-right"></i></a>
                    <a class="next" href="#">Next</a>
                </div>
            </div>
        </section>
        <!--================End Blog grid Area =================-->
        
@stop