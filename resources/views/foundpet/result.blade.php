@extends("layouts.app")
@section("contents")

    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-11 col-sm-11 margin-left-10">
                    @if(!is_null($data) && !is_null($user))
                        <header>
                            <h1> <b>{{$data->name ? $data->name :'Unknown'}}</b></h1>
                        </header>
                        <fieldset>
                            <div class="col-md-12 nopadding">
                                <hr/>
                                <div class="col-md-6 nopadding" id="xx">
                                    @if($data->avatar)
                                      <img src="{{asset($data->avatar)}}" class="responsive for-pet-image"/>
                                    @else
                                      <img src="{{asset('assets/images/dog-avatar.jpg')}}" class="responsive for-pet-image" style="max-width:300px !important" />
                                    @endif
                                </div>
                                <div class="col-md-6" >
                                    <h3><b>Información de contacto </b></h3>
                                    <hr/>
                                     <div class="col-md-6"><b>Dueño</b> : </div>
                                     <div class="col-md-6"> {{$user->firstname.' '.$user->lastname}}</div>
                                    <br>
                                    <div class="col-md-6"><b>Número de teléfono</b> : </div>
                                    <div class="col-md-6"> {{$user->country.' '.$user->phonenumber}}</div>
                                    <br><br>
                                    <div class="col-md-6">
                                        <button class="btn btn-primary" id="email_owner" data-value="{{$user->id}}">
                                            <i class="fa fa-mail-forward"></i>Mandar un e-mail al dueño
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <hr/>
                            <div class="col-md-12 margin-top-20 padding-20 geolocation margin-bottom-20">
                                <div class="col-md-10 ">
                                        <p><b>¿Estoy perdido, puedes ayudarme?</b><br>
                                            ¿Mandar ubicación mi ubicación a mi dueño para que pueda encontrarme? ¡SI!
                                        </p>
                                </div>
                                <div class="col-md-2">
                                    <button id="gps_location" class="btn btn-success"><i class="fa fa-location-arrow"></i> Yes</button>
                                </div>

                            </div>
                            {{--   Send SMS   --}}

                            <div class="col-md-12 margin-top-20 padding-20 margin-bottom-20">
                                <div class="col-md-12">
                                    <h3>Enviar un mensaje SMS</h3>
                                    <hr/>
                                </div>

                                <div class="col-md-12">
                                    <form id="smsForm" method="post">
                                        <input type="hidden" name="_token" value="{{csrf_token()}}" />
                                        <input type="hidden" id="userId" data-value="{{$user->id}}" />

                                       <div class="col-md-2">
                                           <select id="country_code" name="country_code" class="form-control">
                                               <option value="">Selecciona el país</option>
                                               <option  value="93">Afghanistan ‪(93)‬</option>
                                               <option  value="355" >Albania ‪(355)‬</option>
                                               <option  value="213" >Algeria ‪(213)‬</option>
                                               <option  value="1" >American Samoa ‪(1)‬</option>
                                               <option  value="376">Andorra ‪(376)‬</option>
                                               <option  value="244" >Angola ‪(244)‬</option>
                                               <option  value="1" >Anguilla ‪(1)‬</option>
                                               <option  value="1" >Antigua and Barbuda ‪(1)‬</option>
                                               <option  value="54" >Argentina ‪(54)‬</option>
                                               <option  value="374" >Armenia ‪(374)‬</option>
                                               <option  value="297" >Aruba ‪(297)‬</option>
                                               <option  value="247">Ascension ‪(247)‬</option>
                                               <option  value="61" >Australia ‪(61)‬</option>
                                               <option  value="672">Australian External Territories ‪(672)‬</option>
                                               <option  value="43">Austria ‪(43)‬</option>
                                               <option  value="994">Azerbaijan ‪(994)‬</option>
                                               <option  value="1">Bahamas ‪(1)‬</option>
                                               <option  value="973">Bahrain ‪(973)‬</option>
                                               <option  value="880">Bangladesh ‪(880)‬</option>
                                               <option  value="1">Barbados ‪(1)‬</option>
                                               <option  value="375">Belarus ‪(375)‬</option>
                                               <option  value="32" >Belgium ‪(32)‬</option>
                                               <option  value="501">Belize ‪(501)‬</option>
                                               <option  value="229" >Benin ‪(229)‬</option>
                                               <option  value="1" >Bermuda ‪(1)‬</option>
                                               <option  value="975" >Bhutan ‪(975)‬</option>
                                               <option  value="591" >Bolivia ‪(591)‬</option>
                                               <option  value="387">Bosnia and Herzegovina ‪(387)‬</option>
                                               <option  value="267">Botswana ‪(267)‬</option>
                                               <option  value="55">Brazil ‪(55)‬</option>
                                               <option  value="1" >British Virgin Islands ‪(1)‬</option>
                                               <option  value="673">Brunei Darussalam ‪(673)‬</option>
                                               <option  value="359">Bulgaria ‪(359)‬</option>
                                               <option  value="226" >Burkina Faso ‪(226)‬</option>
                                               <option  value="257">Burundi ‪(257)‬</option>
                                               <option  value="855">Cambodia ‪(855)‬</option>
                                               <option  value="237" >Cameroon ‪(237)‬</option>
                                               <option  value="1" >Canada ‪(1)‬</option>
                                               <option  value="238">Cape Verde ‪(238)‬</option>
                                               <option  value="1" >Cayman Islands ‪(1)‬</option>
                                               <option  value="236" >Central African Republic ‪(236)‬</option>
                                               <option  value="235">Chad ‪(235)‬</option>
                                               <option  value="56" >Chile ‪(56)‬</option>
                                               <option  value="86" >China ‪(86)‬</option>
                                               <option  value="57">Colombia ‪(57)‬</option>
                                               <option  value="269">Comoros ‪(269)‬</option>
                                               <option  value="242" >Congo ‪(242)‬</option>
                                               <option  value="682" >Cook Islands ‪(682)‬</option>
                                               <option  value="506" >Costa Rica ‪(506)‬</option>
                                               <option  value="225">Cote dÕIvoire ‪(225)‬</option>
                                               <option  value="385" >Croatia ‪(385)‬</option>
                                               <option  value="53" >Cuba ‪(53)‬</option>
                                               <option  value="357" >Cyprus ‪(357)‬</option>
                                               <option  value="420">Czech Republic ‪(420)‬</option>
                                               <option  value="243" >Democratic Republic of the Congo ‪(243)‬</option>
                                               <option  value="45" >Denmark ‪(45)‬</option>
                                               <option  value="246">Diego Garcia ‪(246)‬</option>
                                               <option  value="253">Djibouti ‪(253)‬</option>
                                               <option  value="1">Dominica ‪(1)‬</option>
                                               <option  value="1">Dominican Republic ‪(1)‬</option>
                                               <option  value="670">East Timor ‪(670)‬</option>
                                               <option  value="593" >Ecuador ‪(593)‬</option>
                                               <option  value="20" >Egypt ‪(20)‬</option>
                                               <option  value="503">El Salvador ‪(503)‬</option>
                                               <option  value="240">Equatorial Guinea ‪(240)‬</option>
                                               <option  value="291">Eritrea ‪(291)‬</option>
                                               <option  value="372" >Estonia ‪(372)‬</option>
                                               <option  value="251" >Ethiopia ‪(251)‬</option>
                                               <option  value="500" >Falkland Islands ‪(500)‬</option>
                                               <option  value="298">Faroe Islands ‪(298)‬</option>
                                               <option  value="679" >Fiji ‪(679)‬</option>
                                               <option  value="358">Finland ‪(358)‬</option>
                                               <option  value="33" >France ‪(33)‬</option>
                                               <option  value="594" >French Guiana ‪(594)‬</option>
                                               <option  value="689" >French Polynesia ‪(689)‬</option>
                                               <option  value="241" >Gabon ‪(241)‬</option>
                                               <option  value="220" >Gambia ‪(220)‬</option>
                                               <option  value="995" >Georgia ‪(995)‬</option>
                                               <option  value="49" >Germany ‪(49)‬</option>
                                               <option  value="233">Ghana ‪(233)‬</option>
                                               <option  value="350" >Gibraltar ‪(350)‬</option>
                                               <option  value="30" >Greece ‪(30)‬</option>
                                               <option  value="299" >Greenland ‪(299)‬</option>
                                               <option  value="1" >Grenada ‪(1)‬</option>
                                               <option  value="590">Guadeloupe ‪(590)‬</option>
                                               <option  value="1" >Guam ‪(1)‬</option>
                                               <option  value="502" >Guatemala ‪(502)‬</option>
                                               <option  value="224" >Guinea ‪(224)‬</option>
                                               <option  value="245" > ‪(245)‬</option>
                                               <option  value="592" >Guyana ‪(592)‬</option>
                                               <option  value="509">Haiti ‪(509)‬</option>
                                               <option  value="504">Honduras ‪(504)‬</option>
                                               <option  value="852" >Hong Kong ‪(852)‬</option>
                                               <option  value="36" >Hungary ‪(36)‬</option>
                                               <option  value="354">Iceland ‪(354)‬</option>
                                               <option  value="91" >India ‪(91)‬</option>
                                               <option  value="62" >Indonesia ‪(62)‬</option>
                                               <option  value="98" >Iran ‪(98)‬</option>
                                               <option  value="964" >Iraq ‪(964)‬</option>
                                               <option  value="353" >Ireland ‪(353)‬</option>
                                               <option  value="972" >Israel ‪(972)‬</option>
                                               <option  value="39" >Italy ‪(39)‬</option>
                                               <option  value="1">Jamaica ‪(1)‬</option>
                                               <option  value="81" >Japan ‪(81)‬</option>
                                               <option  value="962" >Jordan ‪(962)‬</option>
                                               <option  value="7" >Kazakhstan ‪(7)‬</option>
                                               <option  value="254" >Kenya ‪(254)‬</option>
                                               <option  value="686">Kiribati ‪(686)‬</option>
                                               <option  value="965" >Kuwait ‪(965)‬</option>
                                               <option  value="996" >Kyrgyzstan ‪(996)‬</option>
                                               <option  value="856" >Laos ‪(856)‬</option>
                                               <option  value="371" >Latvia ‪(371)‬</option>
                                               <option  value="961" >Lebanon ‪(961)‬</option>
                                               <option  value="266">Lesotho ‪(266)‬</option>
                                               <option  value="231" >Liberia ‪(231)‬</option>
                                               <option  value="218" >Libya ‪(218)‬</option>
                                               <option  value="423" >Liechtenstein ‪(423)‬</option>
                                               <option  value="370" >Lithuania ‪(370)‬</option>
                                               <option  value="352" >Luxembourg ‪(352)‬</option>
                                               <option  value="853" >Macao ‪(853)‬</option>
                                               <option  value="389" >Macedonia ‪(389)‬</option>
                                               <option  value="261" >Madagascar ‪(261)‬</option>
                                               <option  value="265" >Malawi ‪(265)‬</option>
                                               <option  value="60" >Malaysia ‪(60)‬</option>
                                               <option  value="960" >Maldives ‪(960)‬</option>
                                               <option  value="223" >Mali ‪(223)‬</option>
                                               <option  value="356" >Malta ‪(356)‬</option>
                                               <option  value="692" >Marshall Islands ‪(692)‬</option>
                                               <option  value="596" >Martinique ‪(596)‬</option>
                                               <option  value="222" >Mauritania ‪(222)‬</option>
                                               <option  value="230">Mauritius ‪(230)‬</option>
                                               <option  value="52" >Mexico ‪(52)‬</option>
                                               <option  value="691" >Micronesia ‪(691)‬</option>
                                               <option  value="373">Moldova ‪(373)‬</option>
                                               <option  value="377" >Monaco ‪(377)‬</option>
                                               <option  value="976" >Mongolia ‪(976)‬</option>
                                               <option  value="382">Montenegro ‪(382)‬</option>
                                               <option  value="1" >Montserrat ‪(1)‬</option>
                                               <option  value="212" >Morocco ‪(212)‬</option>
                                               <option  value="258" >Mozambique ‪(258)‬</option>
                                               <option  value="95" >Myanmar ‪(95)‬</option>
                                               <option  value="264" >Namibia ‪(264)‬</option>
                                               <option  value="674" >Nauru ‪(674)‬</option>
                                               <option  value="977" >Nepal ‪(977)‬</option>
                                               <option  value="31" >Netherlands ‪(31)‬</option>
                                               <option  value="599" > ‪(599)‬</option>
                                               <option  value="687" >New Caledonia ‪(687)‬</option>
                                               <option  value="64" >New Zealand ‪(64)‬</option>
                                               <option  value="505" >Nicaragua ‪(505)‬</option>
                                               <option  value="227" >Niger ‪(227)‬</option>
                                               <option  value="234" >Nigeria ‪(234)‬</option>
                                               <option  value="683" >Niue ‪(683)‬</option>
                                               <option  value="850" >North Korea ‪(850)‬</option>
                                               <option  value="1" >Northern Mariana Islands ‪(1)‬</option>
                                               <option  value="47" >Norway ‪(47)‬</option>
                                               <option  value="968" >Oman ‪(968)‬</option>
                                               <option  value="92" >Pakistan ‪(92)‬</option>
                                               <option  value="680" >Palau ‪(680)‬</option>
                                               <option  value="970" >Palestine ‪(970)‬</option>
                                               <option  value="507" >Panama ‪(507)‬</option>
                                               <option  value="675" >Papua New Guinea ‪(675)‬</option>
                                               <option  value="595" >Paraguay ‪(595)‬</option>
                                               <option  value="51" >Peru ‪(51)‬</option>
                                               <option  value="63" >Philippines ‪(63)‬</option>
                                               <option  value="48" >Poland ‪(48)‬</option>
                                               <option  value="351" >Portugal ‪(351)‬</option>
                                               <option  value="1" >Puerto Rico ‪(1)‬</option>
                                               <option  value="974">Qatar ‪(974)‬</option>
                                               <option  value="262">Reunion ‪(262)‬</option>
                                               <option  value="40" >Romania ‪(40)‬</option>
                                               <option  value="7" >Russia ‪(7)‬</option>
                                               <option  value="250" >Rwanda ‪(250)‬</option>
                                               <option  value="290" >Saint Helena ‪(290)‬</option>
                                               <option  value="1">Saint Kitts and Nevis ‪(1)‬</option>
                                               <option  value="1">Saint Lucia ‪(1)‬</option>
                                               <option  value="508" >Saint Pierre and Miquelon ‪(508)‬</option>
                                               <option  value="1" >Saint Vincent and Grenadines ‪(1)‬</option>
                                               <option  value="685" >Samoa ‪(685)‬</option>
                                               <option  value="378">San Marino ‪(378)‬</option>
                                               <option  value="239">Sao Tome and Principe ‪(239)‬</option>
                                               <option  value="966" >Saudi Arabia ‪(966)‬</option>
                                               <option  value="221">Senegal ‪(221)‬</option>
                                               <option  value="381" >Serbia ‪(381)‬</option>
                                               <option  value="248" >Seychelles ‪(248)‬</option>
                                               <option  value="232" >Sierra Leone ‪(232)‬</option>
                                               <option  value="65" >Singapore ‪(65)‬</option>
                                               <option  value="421" >Slovakia ‪(421)‬</option>
                                               <option  value="386" >Slovenia ‪(386)‬</option>
                                               <option  value="677" >Solomon Islands ‪(677)‬</option>
                                               <option  value="252" >Somalia ‪(252)‬</option>
                                               <option  value="27" >South Africa ‪(27)‬</option>
                                               <option  value="82" >South Korea ‪(82)‬</option>
                                               <option  value="34" >Spain ‪(34)‬</option>
                                               <option  value="94" >Sri Lanka ‪(94)‬</option>
                                               <option  value="249" >Sudan ‪(249)‬</option>
                                               <option  value="597" >Suriname ‪(597)‬</option>
                                               <option  value="268" >Swaziland ‪(268)‬</option>
                                               <option  value="46" >Sweden ‪(46)‬</option>
                                               <option  value="41" >Switzerland ‪(41)‬</option>
                                               <option  value="963" >Syria ‪(963)‬</option>
                                               <option  value="886" >Taiwan ‪(886)‬</option>
                                               <option  value="992" >Tajikistan ‪(992)‬</option>
                                               <option  value="255" >Tanzania ‪(255)‬</option>
                                               <option  value="66" >Thailand ‪(66)‬</option>
                                               <option  value="228" >Togo ‪(228)‬</option>
                                               <option  value="690" >Tokelau ‪(690)‬</option>
                                               <option  value="676" >Tonga ‪(676)‬</option>
                                               <option  value="1" >Trinidad and Tobago ‪(1)‬</option>
                                               <option  value="216" >Tunisia ‪(216)‬</option>
                                               <option  value="90" >Turkey ‪(90)‬</option>
                                               <option  value="993" >Turkmenistan ‪(993)‬</option>
                                               <option  value="1" >Turks and Caicos Islands ‪(1)‬</option>
                                               <option  value="688" >Tuvalu ‪(688)‬</option>
                                               <option  value="1" >US Virgin Islands ‪(1)‬</option>
                                               <option  value="256" >Uganda ‪(256)‬</option>
                                               <option  value="380" >Ukraine ‪(380)‬</option>
                                               <option  value="971" >United Arab Emirates ‪(971)‬</option>
                                               <option  value="44" >United Kingdom ‪(44)‬</option>
                                               <option  value="1"  >United States ‪(1)‬</option>
                                               <option  value="598" >Uruguay ‪(598)‬</option>
                                               <option  value="998" >Uzbekistan ‪(998)‬</option>
                                               <option  value="678" >Vanuatu ‪(678)‬</option>
                                               <option  value="379" >Vatican City ‪(379)‬</option>
                                               <option  value="58" >Venezuela ‪(58)‬</option>
                                               <option  value="84" >Vietnam ‪(84)‬</option>
                                               <option  value="681" >Wallis and Futuna ‪(681)‬</option>
                                               <option  value="967">Yemen ‪(967)‬</option>
                                               <option  value="260" >Zambia ‪(260)‬</option>
                                               <option  value="263" >Zimbabwe ‪(263)‬</option>
                                           </select plac name>
                                       </div>
                                       <div class="col-md-3">
                                           <input type="text" id="phone_number" class="form-control" name="phone_number" placeholder="Número de teléfono del dueño"/>
                                       </div>

                                        <div class="col-md-5">
                                            <textarea class="form-control" id="sms_contents" name="sms_contents" style="height: 200px;"></textarea>
                                        </div>
                                       <div class="col-md-2">
                                            <a href="javascript:void(0);" class="btn btn-success" id="send_sms">
                                                <span style="height:100%"><i class="fa fa-send"></i>
                                                </span>
                                                Mandar SMS
                                            </a>

                                           {{--<button type="submit">send</button>--}}
                                       </div>
                                    </form>
                                </div>
                            </div>
                            {{--    End SMS     --}}

                            <br>
                            <div class="padding-20"> </div>
                            <h3><b>Información importante de la mascota</b></h3>
                            <hr/>
                            <div class="row margin-bottom-6">
                                <div class="col col-md-4">Raza</div>
                                <div class="col col-md-4">{{$data->breed ? $data->breed : ''}}</div>
                            </div>

                            <div class="margin-bottom-6 row">
                                <div class="col col-md-4"> Género</div>
                                <div class="col col-md-8">{{$data->gender==1 ? 'Masculino' : 'Femenino'}}</div>
                            </div>

                            <div class="margin-bottom-10 row">
                                <div class="col col-md-4">
                                        Fecha de nacimiento
                                </div>
                                <div class="col col-md-2">
                                        {{$data->birth}}
                                </div>
                            </div>
                            {{--weight --}}

                            <div class="margin-bottom-10 row">
                                <div class="col col-md-4">
                                        Peso
                                </div>

                                <div class="col col-md-3">
                                  @if($data->weight)
                                      {{$data->weight}}
                                      {{$data->unit == 1 ? 'kg' :'lb'}}
                                  @endif
                                </div>
                            </div>
                            {{--end weight--}}
                            {{--Start Rabies Tag --}}
                            <div class="margin-bottom-10 row">
                                <div class="col col-md-4">
                                     Certificado de rabia
                                </div>
                                <div class="col col-md-4">
                                    {{$data->rabiestag ? $data->rabiestag:''}}
                                    {{--- Expires 05/12/2018--}}
                                </div>
                            </div>
                            {{--End rabies tag--}}

                            {{--Start Additional Information --}}
                            <br>
                            <div class="padding-20"> </div>
                            <h3><b>Información adicional</b></h3>
                            <hr/>
                            <div class="margin-bottom-10 row">
                                <div class="col col-md-4">
                                        Descripción física
                                </div>
                                <div class="col col-md-4">
                                    {{$data->additinal_color ? $data->additional_color :''}}
                                </div>
                            </div>
                            {{--Start Medical Information --}}
                            <div class="margin-bottom-10 row">
                                <div class="col col-md-4">
                                    Información médica, comportamiento u otra información
                                </div>
                                <div class="col col-md-4">
                                   {{$data->additinal_medical ? $data->additional_medical :''}}
                                </div>
                            </div>
                            {{--End Medical Information --}}

                            {{--Start Municipal license--}}
                            <br>
                            <div class="padding-20"> </div>
                            <h3><b>Municipal License</b></h3>
                            <hr/>
                            
                            {{--End Municipal License--}}

                            {{--Start Pet Medication  --}}
                            <br>
                            {{--<div class="padding-20"> </div>--}}
                            {{--<h3><b>Provider</b></h3>--}}
                            {{--<hr/>--}}
                            {{--<div class="margin-bottom-10 row">--}}
                                {{--<div class="col col-md-4">--}}
                                    {{--<a href="#">{{$data->provider}}</a>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        </fieldset>
                    <!-- /register form -->
                        @else
                            <div class="row text-align">
                                <div class="col-md-12">
                                    <h2><b>No hay una mascota registrada en este sitio web.</b></h2>
                                </div>
                                <div class="col-md-12">
                                    <hr/>
                                </div>
                            </div>
                        @endif
                </div>
            </div>
        </div>
    </section>

{{--        Alert modal     --}}
@if(!is_null($data) && !is_null($user))
<div class="modal fade" id="details_popup" tabindex="-2" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>

            <div class="modal-body">

            </div>
            <div class="modal-footer">
                <button type="button"  class="btn btn-default close_popup" data-dismiss="modal">Cerca</button>
            </div>

        </div>
    </div>
</div>
{{--        Alert modal     --}}
{{--        email modal     --}}

<div class="modal fade" id="email_popup" tabindex="-2" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>

            <div class="modal-body">
                <div class="col-md-12 margin-top-40">
                <form id="email_form">
                    <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                    <div class="form-group">
                        <label for="email_addr">Your Email address:</label>
                        <input type="email" class="form-control" id="email_addr" name="email_addr" required>
                    </div>
                    <div class="form-group">
                        <label for="email_contents">Contents:</label>
                        <textarea class="form-control" id="email_contents" name="email_contents" required></textarea>
                    </div>


                </form>
                </div>
            </div>
            <div class="modal-footer"  style="padding: 1px 15px;border-top: 0">
                <button type="submit" class="btn btn-default"  data-value="" id="send_email">Enviar</button>
                <button type="button"  class="btn btn-default close_popup" data-dismiss="modal">Cerca</button>
            </div>

        </div>
    </div>
</div>
{{--        Alert modal     --}}
<div class="modal fade" id="location_popup" tabindex="-2" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>

            <div class="modal-body">
                <div class="col-md-12 margin-top-40">
                    <form id="location_form">
                        <div class="form-group">
                            <label for="email_contents">Leave your detail message:</label>
                            <input type="hidden" id="location_info" data-lat="" data-lng="" />
                            <input type="hidden" id="is_updated" />
                            <textarea class="form-control" id="location_contents" name="location_contents" required></textarea>
                        </div>
                    </form>
                </div>
            </div>
            <div class="modal-footer"  style="padding: 1px 15px;border-top: 0">
                <button type="submit" class="btn btn-default"  data-value="{{$data->id}}" data-user="{{$user->id}}" id="send_location">Enviar</button>
                <button type="button"  class="btn btn-default close_popup" data-dismiss="modal">Cerca</button>
            </div>

        </div>
    </div>
</div>
@endif
@endsection
@push('css')

@endpush
@push("js")

<script src="{{asset('assets/js/jquery.validation.min.js')}}"></script>
        <script>


            var x= $("#location_info");

            $(function(){
                var lat;var lng;


                $("#email_owner").click(function(){

                    $("#send_email").data('value',$(this).data('value'));
                    $("#email_popup").modal("show");

                });

                $("#send_email").click(function(e){

                    $("#email_form").submit();

                });


                /*                    */
                $("#gps_location").click(function(){

//                    $("#location_popup").modal('show');

                    //getLocation();
                    delayModal(); ///show detectng modal
                    showPosition();
                    //setTimeout(showPopup,5000);
                });

                $("#send_location").click(function(){

                    $("#location_form").submit();
                });

                /*                    */

                $("#email_form").submit(function(e) {
                    e.preventDefault();
                }).validate({
                    rules: {
                        email_addr: {
                            required: true,
                            email: true,
                        },
                        email_contents: {
                            required: true,
                            minlength: 30
                        }
                    },
                    message: {
                        email_addr :{
                            required:"Please endter your email.",
                            email : "please enter correct email."
                        },
                        email_contents : {
                            required : "please enter the contents",
                            minlength : "Please enter more than 30 words."
                        }
                    },
                    submitHandler: function(form) {

                        $.ajax({
                            url:'{{route('emailOwner')}}',
                            method:'post',
                            data:{
                                id:  $("#send_email").data('value'),
                                email:$("#email_addr").val(),
                                contents:$("#email_contents").val()
                            },
                            success:function(data){
                                console.log(data);

                                $("#email_popup .modal-body").html();
                                $("#email_popup").modal('hide');
                                $("#details_popup .modal-body").html("<h4>"+data+"</h4><br><b>Thank you<b>");
                                $("#details_popup").modal("show");
                            }
                        });
                        return false;
                    }
                });

                $("#location_form").submit(function(e) {
                    e.preventDefault();
                }).validate({
                    rules: {
                        location_contents: {
                            required: true
                        }
                    },
                    message: {
                        location_contents : {
                            required : "please enter detail contents",
                        }
                    },
                    submitHandler: function(form) {

                        $.ajax({
                            url:'{{route('sendLocation')}}',
                            method:'post',
                            dataType:'json',
                            data:{
                                is_updated:$("#is_updated").val(),
                                user_id:  $("#send_location").data('user'),
                                pet_id:$("#send_location").data('value'),
                                contents:$("#location_contents").val(),
                                lat:x.data('lat'),
                                lng:x.data('lng')
                            },
                            success:function(data){
                                console.log(data);
                                if(data.is_updated != ""){
                                    $("#is_updated").val(data.is_updated);
                                }
                                $("#location_popup .modal-body").html();
                                $("#location_popup").modal('hide');
                                $("#details_popup .modal-body").html("<h4>"+data.msg+"</h4><br><b>Thank you<b>");
                                $("#details_popup").modal("show");
                            }
                        });
                        return false;
                    }
                });

            });

            function getLocation() {

                if (navigator.geolocation) {
                    navigator.geolocation.getCurrentPosition(showPosition,showError);
                } else {
                   alert('your browser does not support to get your location.');
                }
            }
            
            
            
            
            
            
            /////
            var getCurrentPosition = function() {
		  var deferred = $.Deferred();
		
		  if (navigator.geolocation) {
		    navigator.geolocation.getCurrentPosition(deferred.resolve, deferred.reject);
		  } else {
		    deferred.reject({
		      error: 'browser doesn\'t support geolocation'
		    });
		  }
		
		  return deferred.promise();
		};
            /////
            function showPosition() {
            
            
            var userPositionPromise = getCurrentPosition();

			userPositionPromise.then(function(data) {
			  console.log(data);
			         x.data('lat',data.coords.latitude);
               			 x.data('lng',data.coords.longitude);
               			 showPopup();
			  })
			  .fail(function(error) {
			    console.log('err');
			    showError(error);
			    // show error for user
			   // alert('Your browser does not support this feature or check net work connection status');
			  });
               
            }

            function showError(error) {
                switch(error.code) {
                    case error.PERMISSION_DENIED:
                        x.innerHTML = "User denied the request for Geolocation."
                        break;
                    case error.POSITION_UNAVAILABLE:
                        x.innerHTML = "Location information is unavailable."
                        break;
                    case error.TIMEOUT:
                        x.innerHTML = "The request to get user location timed out."
                        break;
                    case error.UNKNOWN_ERROR:
                        x.innerHTML = "An unknown error occurred."
                        break;
                }
            }

            function delayModal(){
                $("body").addClass("loading");
            }

            function showPopup(){
                $("body").removeClass("loading");
                $("#location_popup").modal('show');
            }

            /*      Send SMS    */
            $("#send_sms").click(function(){
                $("#smsForm").submit();

            });

            $("#smsForm").submit(function(e){
                e.preventDefault();
            }).validate({

                rules: {
                    country_code: {
                        required: true
                    },
                    phone_number:{
                        required : true,
                        number : true
                    },
                    sms_contents:{
                        required : true,
                        minlength:30
                    }
                },
                message: {
                    sms_contents : {
                        minlength : "please enter a message more than 30 letters",
                    }
                },
                submitHandler: function(form) {
                    var country_code = $("#country_code").val();
                    var phone_number = $("#phone_number").val();
                    var userId = $("#userId").data('value');
                    var smsContents = $("#sms_contents").val();
                    delayModal();
                    $.ajax({
                        url:'{{url('pets/sendsms')}}',
                        method:'post',
                        dataType:'json',
                        data:{
                            country_code:country_code,
                            phone_number:phone_number,
                            userId:userId,
                            smsContents:smsContents
                        },
                        success:function(data){

                            console.log(data);
                            $("body").removeClass("loading");
                            $("#details_popup .modal-body").html("<h4>"+data+"</h4><br><b>Thank you<b>");
                            $("#details_popup").modal("show");

                        }
                    });

                    return false;
                }});
            /*  End Send SMS    */
        </script>
@endpush
