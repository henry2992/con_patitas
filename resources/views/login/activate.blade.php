@extends("layouts.app")

@section("contents")

    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 margin-left-20">
                    <h1><b>Activate Your Tag or Collar</b></h1>
                    <hr/>
                <p>
                    So glad you are here! Let's get your tag or collar linked to your pet. But first, we need to know if you are an Existing User or a New User.
                </p>

                <br>
                <p><b>Existing User </b>- if you previously purchased something from our website or activated a tag, collar or card</p>
                <p><b>New User</b> - you've never been on our site before (typically registering a pet license or purchased from a "brick & mortar" retailer)</p>
                <br>
                <a href="{{url("signup")}}" class="btn btn-primary">New User</a>
                <a href="{{url("login")}}" class="btn btn-success">Existing User</a>
                  <div class="margin-top-20"></div>
                    <p>
                        (Not sure? Start with "New User" and if it says your account exists, come back to Con Patitas.com/activate and select "Existing User" -- or ask our Support Team for help.)
                    </p>
                    <hr/>
                    <p>
                        <b>Need more help? Watch our How To videos</b>: http://Con Patitas.com/How-To-Videos
                    </p>
                    <br>

                    <ul>
                        <li><a href="#" >How to create an account"</a></li>
                        <li><a href="#">How to add a pet"</a></li>
                        <li><a href="#">How to link a tag"</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
@endsection