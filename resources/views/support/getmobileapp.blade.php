@extends("layouts.app")

@section("contents")

    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 margin-left-20">
                    <h1><b>Get Mobile APP</b></h1>
                    <hr/>


                </div>

                <div class="col-md-12 margin-left-20">
                    <div class="col-md-8">
                        <p>
                            <b>Get Con Patitas's mobile app:</b>
                        </p>

                        <ul>
                            <li>Mobile Access - use your smartphone instead of your desktop</li>
                            <li>Tips & Tails - articles, news, stories</li>
                            <li>Get Social - Con Patitas's Facebook, Twitter, Instagram and more</li>
                            <li>Videos! - YouTube & Vimeo videos</li>
                            <li>PetLoverGeek - podcasts & live radio</li>
                            <li>Monthly specials and more!</li>
                        </ul>
                        <p>Get It Now !</p>
                    </div>

                    <div class="col-md-4">
                        <img src="{{asset('assets/images/pethub-app.jpg')}}" width="150" height="200">
                    </div>
                </div>

                <div class="col-md-12 margin-left-20 text-align">
                    <div>
                        <a href="https://play.google.com/store/apps/details?id=com.bf.app438317"><img src="{{asset("assets/images/google-play.png")}}" class="img-responsive" style="max-width: 200px;"/></a>
                    </div>
                    <div>
                        <a href="https://itunes.apple.com/us/app/pethub.com/id1158861773"><img src="{{asset("assets/images/appleapp_0.png")}}" class="img-responsive" style="max-width: 200px;"/></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection