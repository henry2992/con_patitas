@extends("layouts.app")

@section("contents")

    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-sm-8 margin-left-30">
                    <h1><b>MemberShip Upgrade</b></h1>
                    <hr/>
                </div>

                <div class="col-md-10 margin-left-30 margin-top-20">
                    <h5><b>PetHub Account Level</b> : Basic (Free)</h5>
                    <hr/>
                    <h4>Your are attempting to use a Premium Feature</h4>
                    <p>
                        The Report Missing feature allows you to broadcast your pet's profile to animal shelters within a 50-mile radius of where your pet was last seen.
                        Our list is comprised of over 10,000 shelters in North America (U.S. & Canada).
                        For less than $3/month* you get this feature and many more. (more info)
                    </p>
                    <br>
                    <br>
                    <label>* Subscription options include monthly, annual and lifetime.</label>
                </div>

                {{--More Help section--}}

                <div class="col-md-10 margin-left-30 margin-top-20">
                    <h1><b>More Help</b></h1>
                    <hr/>
                    <p>
                        We rely on people subscribing to our Premium features so that we can provide benefits to our users and their companion animals and avoid sending or showing you advertisments on our site. In addition to the services we provide,
                        please also consider the free service below to help you get your pet home again.
                    </p>
                </div>

                <div class="col-md-10 margin-left-30 margin-top-20">
                    <div class="col-md-4 nopadding">
                        <img class="responsive" src="{{asset("assets/images/hlp-logo-120.jpg")}}" width="200" height="200" />
                    </div>
                    <div class="col-md-8">
                        <p>Our friends at <b>Helping Lost Pets (HeLP)</b> provide yet another, free way to get the word out about your lost pet.
                            To make use of their incredible service, go to HelpingLostPets.com.
                        </p>
                        <br>
                        <a href="http://www.helpinglostpets.com/v2/EditPet.aspx?sc=11" class="btn btn-primary" target="_blank">
                            Get Help
                        </a>
                    </div>
                </div>
                {{--End More help section--}}
                <div class="col-md-10 margin-left-30 margin-top-20">
                    <hr/>
                    <p>Other sites we like but with whom we do not have a formal partnership or relationship are listed below.  As much as any service would like to be the end-all,
                        be-all solution, there is no such thing available and so it behooves us to point you to additional resources:
                    </p>
                    <div class="margin-top-20"></div>
                    <ul>
                        <li><a href="craigslist.com">craigslist.com</a> - a good resource to search for your pet</li>
                        <li><a href="fidofinder.com">fidofinder.com</a> - lost dog database for the U.S., Canada and United Kingdom</li>
                        <li><a href="findtoto.com">findtoto.com</a> - "missing pet alert" system for lost, stolen and found pets</li>
                        <li><a href="lostmydoggie.com">lostmydoggie.com</a> - fax and email "animal alerts"</li>
                        <li><a href="lostmykitty.com">lostmykitty.com</a> - the feline version of lostmydoggie.com</li>
                        <li><a href="missingpet.net">missingpet.net</a> - non-profit site with network of volunteers</li>
                        <li><a href="petharbor.com">petharbor.com</a> - browser adoptable, lost and found pets in the local area</li>
                        <li><a href="tabbytracker.com">tabbytracker.com</a> - lost cat database listing lost and found felines</li>
                    </ul>
                    <br>
                    <p>
                        <span class="red-mark"><b>Warning</b></span>: the above links are not affiliated with nor endorsed by PetHub - use them at your own risk. We are working to give you as many options
                        as we can to help you re-unite with your four-legged loved one. No matter what service you use, always meet your pet's rescuer in a public place and take a trusted friend with you.
                        If they say that they will want a reward, alert law enforcement to when and where you are meeting this person --
                        they may want to have a further discussion with them and verify there is not a pattern of this person kidnapping animals for financial gain.
                    </p>

                    <hr/>
                </div>
            </div>
        </div>
    </section>
@endsection