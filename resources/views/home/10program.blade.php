@extends("layouts.app")

@section("contents")

    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-10 margin-left-20">
                    <div class="col-md-11 margin-left-20">
                        <h1><b>Con Patitas's 10-10  Program</b></h1>
                        <hr/>

                        <h4>
                            <b>Con Patitas is proud to offer a fundraising program that not only helps non-profits generate support in their fundraising efforts, but also offers the fastest and most comprehensive solution to get lost pets home.</b>
                        </h4>
                    </div>

                    <div class="col-md-11">
                        <div class="col-md-9">
                            <h4>
                                <b>
                                    Qualified organizations will receive the benefits of:
                                </b>
                            </h4>

                            <br>
                            <ul>
                                <li>Bulk purchase of Con Patitas Digital ID tags at far below wholesale cost.</li>
                                <li>Purchased tags can be re-sold, raffled or included as part of adoption kits</li>
                                <li>"10-10" Gift Certificates<a href="#note1"> [1]</a></li>
                                <li>Customizable tags for large scale fundraising<a href="#note2">[2]</a></li>
                                <li>Raffle and auction packages for special fundraising events</li>
                            </ul>
                        </div>
                        <div class="col-md-2 margin-top-40">
                            <img class="img-responsive" src="{{asset("assets/images/preventative pet.png")}}" width="200"/>
                        </div>

                    </div>

                    <div class="col-md-11">
                        <hr/>
                        <div class="col-md-9">
                                <h4>
                                    <b>
                                        In order to be considered for the Con Patitas 10-10 Program, your organization must meet certain qualifications and requirements, including:
                                    </b>
                                </h4>

                            <ul>
                                <li>Verified non-profit status</li>
                                <li>Creation and maintenance of a free Con Patitas.com business account</li>
                                <li>Commitment to distribute Con Patitas ID tags purchased through the program and ensuring that the provided PDF instructions(insert link to PDF here) are included with the tag</li>
                            </ul>
                        </div>
                        <div class="col-md-2 margin-top-40">
                            <img class="img-responsive" src="{{asset("assets/images/chris-tag-transparent.png")}}" width="200" />
                        </div>
                    </div>


                    <div class="col-md-11">
                        <hr/>
                        <p>
                            For a printable information sheet about our 10-10 program <a href="#">CLICK HERE</a>
                        </p>

                        <br>
                        <p>
                            To download an application for our 10-10 program <a href="#">CLICK HERE</a>
                        </p>
                        <br>
                        <p id="note1">
                            [1] Organizations are given a unique code for a $10 Gift Certificate off all Con Patitas products and services, on a printable PDF gift certificate that may be sold or included as part of adoption kits. Each financial quarter, Con Patitas will give the organization 10% of net sales produced through the voucher/gift certificate code in the form of a cash donation.
                        </p>
                        <br>
                        <p id="note2">
                            [2] Minimum purchase required for customized tags. Customized fundraising packages for bulk purchases greater than 1500 tags available for highly qualified organizations.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection