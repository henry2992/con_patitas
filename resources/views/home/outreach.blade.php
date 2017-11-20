@extends("layouts.app")

@section("contents")

    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-14 col-sm-14 margin-left-10">

                    <div class="col-md-5 margin-left-10">
                        <img class="img-responsive" src="{{asset("assets/images/non-profit.jpg")}}" width="300"/>
                    </div>
                    <div class="col-md-6 margin-left-10">
                        <h1><b>Con Patitas's 10-10 Animal Non-Profit Support Program</b></h1>
                        <hr/>

                        <p>
                            <b>
                                Qualified non-profit rescue & shelter organizations can use Con Patitas tags and Con Patitas's partners' tags for terrific fundraising opportunities:
                            </b>
                        </p>

                        <br>
                        <ul>
                            <li>Earn affiliate revenue</li>
                            <li>Discounts on wholesale bulk purchases</li>
                            <li>Special discount codes to share with your social media community</li>
                            <li>Product donations for special events</li>
                        </ul>

                        <br>
                        <br>
                        <p>
                            <b>Ask us about our deep discounts for animal non-profits on custom artwork tags!</b>
                        </p>
                        <br>
                        <h5><b>
                                <a href="#">See why Con Patitas is the most comprehensive solution available</a>
                            </b>
                        </h5>
                        <p>
                            <b>
                                To get started or learn more about how Con Patitas can help your animal non-profit organization,<a href="{{url("contactus")}}">contact us.</a>
                            </b>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection