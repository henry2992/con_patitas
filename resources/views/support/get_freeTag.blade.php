@extends('layouts.app')

@section('contents')

    <section style="padding:20px 0">
        <div class="container">
            <div class="row">
                <div class="col-md-12 margin-right-10">
                    <img src="{{asset('assets/images/banner2.png')}}" class="img-responsive"/>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12 text-align margin-top-20">
                    <h1>Get a Free 2017 "Smart" Pet ID Tag</h1>
                    <h3>(Limited time offer - ends 5/31/2017 - or while supplies last - U.S. Only)</h3>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12 margin-top-20 padding-20">
                    <h5>Get a free dog ID tag (or, free cat ID tag) for a limited time. (Or, upgrade to a higher-end tag or collar).</h5>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12 margin-top-20 padding-20">
                    <div class="col-md-6 margin-bottom-30">
                        <div>
                            <img src="{{asset('assets/images/tag-profile.png')}}" class="img-responsive free-tag" style="margin-bottom:20px !important;" />
                            <p>Option 1: Free Tag - Get your free tag by clicking the button below and using coupon code FREETAG at checkout. (Sorry: U.S. customers only)</p>
                        </div>
                        <div class="text-align margin-top-20">
                             <a href="#" class="buttons purple" style="color:#fff;"><span><i class="fa fa-tags"></i></span>Free Tag</a>
                            <hr/>
                        </div>
                    </div>
                    <div class="col-md-6 margin-bottom-30">
                        <div>
                            <img src="{{asset('assets/images/array.png')}}" class="img-responsive free-tag margin-bottom-10" style="margin-bottom:40px !important;" />
                            <p>Option 2: Upgrade with a $14.95 discount - Use coupon code FREETAG and apply it toward any regularly priced Con Patitas premium tag. Click the button below to see your options and make sure to use coupon FREETAG at checkout.*</p>
                        </div>
                        <div class="text-align margin-top-20">
                            <a href="#" class="buttons purple" style="color:#fff;"><span><i class="fa fa-tags"></i></span>Full Catolog</a><br>
                            <p>(Note: the button above goes to our full catalog and includes both eligible and in-eligible products. See the note below for details of what qualifies).</p>
                            <hr/>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12 padding-20>
                    <ul>
                        <li>Free* aluminum ID tag (black, medium-sized) - links to a free profile at Con Patitas.com</li>
                        <li>24x7 "Found Pet Hotline" toll-free phone number (staffed by human beings, not automated) (also part of our free, Basic service)</li>
                        <li>Stores / displays critical data (unlimited emergency phone numbers, microchip/license/rabies tag #s, medications, insurance, etc.)</li>
                        <li>Encrypted & safe - you control what is shown and when - 128-bit encryption throughout</li>
                    </ul>
                </div>
            </div>

        <div class="row">
            <div class="col-md-12 margin-top-20 padding-20">
                <div class="col-md-3">
                    <img class="img-responsive" src="{{asset('assets/images/business-insider.gif')}}" style="max-height:240px" />
                </div>
                <div class="col-md-3">
                    <img class="img-responsive" src="{{asset('assets/images/dogfancy-small.png')}}" style="max-height:240px"/>
                </div>
                <div class="col-md-3">
                    <img class="img-responsive" src="{{asset('assets/images/2014-petbusiness.png')}}" style="max-height:240px"/>
                </div>
                <div class="col-md-3">
                    <img class="img-responsive" src="{{asset('assets/images/aspca-small.jpg')}}" style="max-height:240px"/>
                </div>
            </div>
        </div>
        </div>
    </section>
@endsection