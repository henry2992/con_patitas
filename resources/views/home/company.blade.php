@extends("layouts.app")

@section("contents")

    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-11 col-sm-11 margin-left-10">
                    <div class="col-md-10">
                        <h1><b>How Con Patitas Works</b></h1>
                        <hr/>
                        <p>
                            Watch the video below to learn more about Con Patitas or visit the shop to get your own Con Patitas Digital ID tag!
                        </p>
                    </div>

                    <div class="col-md-12">
                        <h3>
                            <b>How does it work ?</b>
                        </h3>
                    </div>

                    <div class="col-md-12 nopadding">
                        <div class="col-md-6">
                            <p>
                                A physical ID tag that links to FREE online profile for your pet. That profile can have any information you want, including multiple emergency contacts, license & rabies tag numbers, microchip data, critical medications, and much more.
                            </p>
                            <br>
                            <br>
                            <h3>
                                <b>When someone finds your pet they can get it home in 4 ways</b>
                            </h3>
                            <ul>
                                <li>Scanning a QR code</li>
                                <li>Typing in the tag's web address</li>
                                <li>Tapping the tag with a newer smartphone</li>
                                <li>Or calling Con Patitas’s 24-hour " Found Pet Hotline "</li>
                            </ul>
                        </div>


                            <div class="col-md-8 youtube-video">
                                <iframe allowfullscreen="" style="width: 100%;height:300px;max-width: 400px" frameborder="0" src="https://www.youtube.com/embed/mMU84MIPpi4"></iframe>
                            </div>

                        <div class="col-md-11 text-align" style="position: relative;">
                            <hr/><br>
                            <a href="#" class="btn btn-primary">Buy Now</a>
                        </div>
                    </div>


                    <div class="col-md-12 nopadding">
                        <div class="margin-top-40"></div>
                        <div class="col-md-7">
                            <h3>Have More Questions ?</h3>
                            <br>
                            <ul>
                                <li>Visit the <a href="#">FAQ Page</a></li>
                                <li><a href="#">Contact us </a>directly</li>
                                <li>Check out our cool selection of ID tags & collars in the <a href="#">Shop</a></li>
                            </ul>
                        </div>

                        <div class="col-md-5">
                            <img src="{{asset("assets/images/How-it-works.jpg")}}" class="img-responsive" style="max-width: 400px"/>
                        </div>
                    </div>

                </div>



            </div>
        </div>
    </section>
@endsection