@extends('frontend.home_layout')

@section('content')
 <!-- Inne Page Banner Area Start Here -->
        <!-- =======================* Section Start *===================== -->
        <section class="contact section-padding">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8">
                        {{ Session::get('msg') }}
                        <h2 class="section-title">Customer Review</h2>
                        <form method="post" class="form-row mt-5" action="{{URL::to('/reviews')}}" method="post" enctype="multipart/form-data">
                            {{csrf_field()}}
                            <div class="col-lg-6">
                                <fieldset class="form-group">
                                    <label for="user_name" class="d-none">Name</label>
                                    <input type="text" class="form-control form-control-lg" name="user_name" id="user_name"
                                        required placeholder="Name">
                                </fieldset>
                            </div>
                            <div class="col-lg-6">
                                <fieldset class="form-group">
                                    <label for="user_designation" class="d-none">Designation</label>
                                    <input type="text" class="form-control form-control-lg" name="user_designation" id="user_designation"
                                        required placeholder="Designation">
                                </fieldset>
                            </div>
                            <div class="col-lg-6">
                                <fieldset class="form-group">
                                    <label for="rating" class="d-none">Rating</label>
                                    <input type="text" class="form-control form-control-lg" name="rating" id="rating"
                                        required placeholder="Rating out of 10">
                                </fieldset>
                            </div>
                            <div class="col-lg-6">
                                <fieldset class="form-group">
                                    <label for="user_image" class="d-none">Profile Picture</label>
                                    <input type="file" class="form-control form-control-lg" name="user_image" id="user_image"
                                        required >
                                </fieldset>
                            </div>
                            <div class="col-lg-12">
                                <fieldset class="form-group">
                                    <label for="review_description" class="d-none">Review in detail</label>
                                    <textarea class="form-control" name="review_description" id="review_description" rows="5" required
                                        placeholder="Review in detail"></textarea>
                                </fieldset>
                            </div>
                            <div class="col-lg-12 text-lg-right">
                                <button type="submit" class="btn btn-primary">Add Review</button>
                            </div>
                        </form>
                    </div>
                    <div class="col-lg-4 mt-5 mt-lg-0">
                        <ul class="contact-info">
                            <li class="contact-info-item phone">
                                <h3 class="contact-info-title text-uppercase">Phone</h3>
                                <p><a href="tel:518-420-4264">+88 01591 146 725</a></p>
                                <p><a href="tel:518-698-1920">+88 01841 776 552</a></p>
                            </li>
                            <li class="contact-info-item email">
                                <h3 class="contact-info-title text-uppercase">E-Mail</h3>
                                <p><a href="mailto:info@samplemail.com">amityapartment2019@gmail.com</a></p>
                                <p><a href="mailto:support@samplemail.com">amityapartment2019@gmail.com</a></p>
                            </li>
                            <li class="contact-info-item address">
                                <h3 class="contact-info-title text-uppercase">Address</h3>
                                <p>Shovonur Villa<br>
                                    Plot no #06, Shyamoli R/A,<br>
                                    Chittagong - 4200<br>
                                    Phone : +88 031 2522570</p>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>
        <!-- =======================* Section End *======================= -->

        <style type="text/css">
			.template-main-menu a{
		        color: black !important;
		    }

		</style>
@endsection