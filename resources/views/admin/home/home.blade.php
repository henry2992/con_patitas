@extends("admin/layout.home")

@section("contents")

    <section id="middle">
        <div id="content" class="dashboard padding-20">

            <div id="panel-1" class="panel panel-default">
                <div class="panel-heading">
							<span class="title elipsis">
								<strong>Dashboard</strong> <!-- panel title -->
							</span>

                    <!-- right options -->
                    <ul class="options pull-right list-inline">
                        <li><a href="#" class="opt panel_colapse" data-toggle="tooltip" title="Colapse" data-placement="bottom"></a></li>
                        <li><a href="#" class="opt panel_fullscreen hidden-xs" data-toggle="tooltip" title="Fullscreen" data-placement="bottom"><i class="fa fa-expand"></i></a></li>
                    </ul>
                    <!-- /right options -->

                </div>

                <!-- panel content -->
                <div class="panel-body">

                    <div id="charts" class="fullwidth height-250"></div>

                </div>
                <!-- /panel content -->

                <!-- panel footer -->
                <div class="panel-footer">

                    <!--
                        .md-4 is used for a responsive purpose only on col-md-4 column.
                        remove .md-4 if you use on a larger column
                    -->
                    <ul class="easypiecharts list-unstyled" >
                        <li class="clearfix" style="padding-left: 40px;padding-right: 40px;">
                            <span class="stat-number">{{$data['currentMonthUsers']- $data['lastMonthUsers'] }}</span>
                            <span class="stat-title">New Users than Last Month</span>

                            <span class="easyPieChart" data-percent="{{$data['increasePercent']}}" data-easing="easeOutBounce" data-barColor="#F8CB00" data-trackColor="#dddddd" data-scaleColor="#dddddd" data-size="60" data-lineWidth="4">
										<span class="percent"></span>
									</span>
                        </li>
                        {{--<li class="clearfix">--}}
                            {{--<span class="stat-number">60%</span>--}}
                            {{--<span class="stat-title">Total Returning Customers</span>--}}

                            {{--<span class="easyPieChart" data-percent="10" data-easing="easeOutBounce" data-barColor="#F86C6B" data-trackColor="#dddddd" data-scaleColor="#dddddd" data-size="60" data-lineWidth="4">--}}
										{{--<span class="percent"></span>--}}
									{{--</span>--}}
                        {{--</li>--}}
                        {{--<li class="clearfix" style="padding-left: 40px;padding-right: 40px;">--}}
                            {{--<span class="stat-number">12%</span>--}}
                            {{--<span class="stat-title">New Users Than Last Month</span>--}}

                            {{--<span class="easyPieChart" data-percent="12" data-easing="easeOutBounce" data-barColor="#98AD4E" data-trackColor="#dddddd" data-scaleColor="#dddddd" data-size="60" data-lineWidth="4">--}}
										{{--<span class="percent"></span>--}}
									{{--</span>--}}
                        {{--</li>--}}
                        <li class="clearfix">
                            <span class="stat-number">{{$data['reports']->found}}</span>
                            <span class="stat-title">Found Dogs than Last Month by This Website</span>

                            <span class="easyPieChart" data-percent="{{($data['reports']->found/$data['reports']->missing)*100}}" data-easing="easeOutBounce" data-barColor="#0058AA" data-trackColor="#dddddd" data-scaleColor="#dddddd" data-size="60" data-lineWidth="4">
										<span class="percent"></span>
                            </span>
                        </li>
                    </ul>

                </div>
                <!-- /panel footer -->

            </div>
            <!-- /PANEL -->

            <!-- BOXES -->
            <div class="row">

                <!-- Feedback Box -->
                <div class="col-md-2 col-sm-4">

                    <!-- BOX -->
                    <div class="box info"><!-- default, danger, warning, info, success -->

                        <div class="box-title"><!-- add .noborder class if box-body is removed -->
                            <h4><a href="#">{{$data['pets']->pet_count}} Total Pets</a></h4>
                            <small class="block"></small>
                            <i class="fa fa-comments"></i>
                        </div>

                        <div class="box-body text-center">
									<span class="sparkline" data-plugin-options='{"type":"bar","barColor":"#ffffff","height":"35px","width":"100%","zeroAxis":"false","barSpacing":"2"}'>
										331,265,456,411,367,319,402,312,300,312,283,384,372,269,402,319,416,355,416,371,423,259,361,312,269,402,327
									</span>
                        </div>

                    </div>
                    <!-- /BOX -->

                </div>

                <!-- Profit Box -->
                <div class="col-md-2 col-sm-4">

                    <!-- BOX -->
                    <div class="box warning"><!-- default, danger, warning, info, success -->

                        <div class="box-title"><!-- add .noborder class if box-body is removed -->
                            <h4>{{$data['pets']->user_count}} Total Users</h4>
                            <small class="block"></small>
                            <i class="fa fa-bar-chart-o"></i>
                        </div>

                        <div class="box-body text-center">
									<span class="sparkline" data-plugin-options='{"type":"bar","barColor":"#ffffff","height":"35px","width":"100%","zeroAxis":"false","barSpacing":"2"}'>
										331,265,456,411,367,319,402,312,300,312,283,384,372,269,402,319,416,355,416,371,423,259,361,312,269,402,327
									</span>
                        </div>

                    </div>
                    <!-- /BOX -->

                </div>

                <!-- Orders Box -->
                <div class="col-md-2 col-sm-4">

                    <!-- BOX -->
                    <div class="box default"><!-- default, danger, warning, info, success -->

                        <div class="box-title"><!-- add .noborder class if box-body is removed -->
                            <h4>{{$data['reports']->found}} Total Found Dogs</h4>
                            <small class="block"></small>
                            <i class="fa fa-shopping-cart"></i>
                        </div>

                        <div class="box-body text-center">
									<span class="sparkline" data-plugin-options='{"type":"bar","barColor":"#ffffff","height":"35px","width":"100%","zeroAxis":"false","barSpacing":"2"}'>
										331,265,456,411,367,319,402,312,300,312,283,384,372,269,402,319,416,355,416,371,423,259,361,312,269,402,327
									</span>
                        </div>

                    </div>
                    <!-- /BOX -->
                </div>

                <!-- Online Box -->
                <div class="col-md-2 col-sm-4">

                    <!-- BOX -->
                    <div class="box success"><!-- default, danger, warning, info, success -->

                        <div class="box-title"><!-- add .noborder class if box-body is removed -->
                            <h4>{{$data['onlineUserCount']}} Online Users</h4>
                            <small class="block">&nbsp;</small>
                            <i class="fa fa-globe"></i>
                        </div>

                        <div class="box-body text-center">
									<span class="sparkline" data-plugin-options='{"type":"bar","barColor":"#ffffff","height":"35px","width":"100%","zeroAxis":"false","barSpacing":"2"}'>
										331,265,456,411,367,319,402,312,300,312,283,384,372,269,402,319,416,355,416,371,423,259,361,312,269,402,327
									</span>
                        </div>

                    </div>
                    <!-- /BOX -->
                </div>
                <div class="col-md-2 col-sm-4">

                    <!-- BOX -->
                    <div class="box danger"><!-- default, danger, warning, info, success -->

                        <div class="box-title"><!-- add .noborder class if box-body is removed -->
                            <h4>{{$data['reports']->missing}} Missing pets</h4>
                            <small class="block">&nbsp;</small>
                            <i class="fa fa-globe"></i>
                        </div>

                        <div class="box-body text-center">
									<span class="sparkline" data-plugin-options='{"type":"bar","barColor":"#ffffff","height":"35px","width":"100%","zeroAxis":"false","barSpacing":"2"}'>
										331,265,456,411,367,319,402,312,300,312,283,384,372,269,402,319,416,355,416,371,423,259,361,312,269,402,327
									</span>
                        </div>

                    </div>
                    <!-- /BOX -->
                </div>
            </div>
            <!-- /Missing box -->

        </div>
        <!-- /BOXES -->

            <div class="row">

                <div class="col-md-6">

                    <div id="panel-2" class="panel panel-default">
                        <div class="panel-heading">
									<span class="title elipsis">
										<strong>New Orders</strong> <!-- panel title -->
									</span>

                            <!-- tabs nav -->
                            <ul class="nav nav-tabs pull-right">
                                <li class="active"><!-- TAB 1 -->
                                    <a href="#ttab1_nobg" data-toggle="tab">Top Sales</a>
                                </li>
                                <li class=""><!-- TAB 2 -->
                                    <a href="#ttab2_nobg" data-toggle="tab">Most Visited</a>
                                </li>
                            </ul>
                            <!-- /tabs nav -->

                        </div>

                        <!-- panel content -->
                        <div class="panel-body">

                            <!-- tabs content -->
                            <div class="tab-content transparent">

                                <div id="ttab1_nobg" class="tab-pane active"><!-- TAB 1 CONTENT -->

                                    <div class="table-responsive">
                                        <table class="table table-striped table-hover table-bordered">
                                            <thead>
                                            <tr>
                                                <th>Product Name</th>
                                                <th>Price</th>
                                                <th>Sold</th>
                                                <th></th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <td colspan="4" class="text-align"><h1 style="margin:0 !important;">Coming Soon !</h1></td>
                                            </tr>
                                            {{--<tr>--}}
                                                {{--<td><a href="#">Apple iPhone 5 - 32GB</a></td>--}}
                                                {{--<td>$612.50</td>--}}
                                                {{--<td>789</td>--}}
                                                {{--<td><a href="#" class="btn btn-default btn-xs btn-block">View</a></td>--}}
                                            {{--</tr>--}}
                                            {{--<tr>--}}
                                                {{--<td><a href="#">Allview Ax4 Nano - Cortex A7 Dual-Core 1.30GHz, 7"</a></td>--}}
                                                {{--<td>$215.50</td>--}}
                                                {{--<td>3411</td>--}}
                                                {{--<td><a href="#" class="btn btn-default btn-xs btn-block">View</a></td>--}}
                                            {{--</tr>--}}
                                            {{--<tr>--}}
                                                {{--<td><a href="#">Motorola Droid 4 XT894 - 16GB - Black </a></td>--}}
                                                {{--<td>$878.50</td>--}}
                                                {{--<td>784</td>--}}
                                                {{--<td><a href="#" class="btn btn-default btn-xs btn-block">View</a></td>--}}
                                            {{--</tr>--}}
                                            {{--<tr>--}}
                                                {{--<td><a href="#">Intel Core i5-4460, 3.2GHz</a></td>--}}
                                                {{--<td>$42.33</td>--}}
                                                {{--<td>3556</td>--}}
                                                {{--<td><a href="#" class="btn btn-default btn-xs btn-block">View</a></td>--}}
                                            {{--</tr>--}}
                                            {{--<tr>--}}
                                                {{--<td><a href="#">Samsung Galaxy Note 3 </a></td>--}}
                                                {{--<td>$655.00</td>--}}
                                                {{--<td>3987</td>--}}
                                                {{--<td><a href="#" class="btn btn-default btn-xs btn-block">View</a></td>--}}
                                            {{--</tr>--}}
                                            {{--<tr>--}}
                                                {{--<td><a href="#">HyperX FURY Blue 8GB, DDR3, 1600MHz</a></td>--}}
                                                {{--<td>$19.50</td>--}}
                                                {{--<td>2334</td>--}}
                                                {{--<td><a href="#" class="btn btn-default btn-xs btn-block">View</a></td>--}}
                                            {{--</tr>--}}
                                            {{--<tr>--}}
                                                {{--<td><a href="#">Gigabyte NVIDIA GeForce GT 730</a></td>--}}
                                                {{--<td>$122.00</td>--}}
                                                {{--<td>3499</td>--}}
                                                {{--<td><a href="#" class="btn btn-default btn-xs btn-block">View</a></td>--}}
                                            {{--</tr>--}}
                                            </tbody>
                                        </table>

                                        <a class="size-12" href="#">
                                            <i class="fa fa-arrow-right text-muted"></i>
                                            More Top Sales
                                        </a>
                                    </div>

                                </div><!-- /TAB 1 CONTENT -->

                                <div id="ttab2_nobg" class="tab-pane"><!-- TAB 2 CONTENT -->

                                    <div class="table-responsive">
                                        <table class="table table-striped table-hover table-bordered">
                                            <thead>
                                            <tr>
                                                <th>Product Name</th>
                                                <th>Price</th>
                                                <th>Sold</th>
                                                <th></th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <td><a href="#">Motorola Droid 4 XT894 - 16GB - Black </a></td>
                                                <td>$878.50</td>
                                                <td>784</td>
                                                <td><a href="#" class="btn btn-default btn-xs btn-block">View</a></td>
                                            </tr>
                                            <tr>
                                                <td><a href="#">Gigabyte NVIDIA GeForce GT 730</a></td>
                                                <td>$122.00</td>
                                                <td>3499</td>
                                                <td><a href="#" class="btn btn-default btn-xs btn-block">View</a></td>
                                            </tr>
                                            <tr>
                                                <td><a href="#">HyperX FURY Blue 8GB, DDR3, 1600MHz</a></td>
                                                <td>$19.50</td>
                                                <td>2334</td>
                                                <td><a href="#" class="btn btn-default btn-xs btn-block">View</a></td>
                                            </tr>
                                            <tr>
                                                <td><a href="#">Intel Core i5-4460, 3.2GHz</a></td>
                                                <td>$42.33</td>
                                                <td>3556</td>
                                                <td><a href="#" class="btn btn-default btn-xs btn-block">View</a></td>
                                            </tr>
                                            <tr>
                                                <td><a href="#">Samsung Galaxy Note 3 </a></td>
                                                <td>$655.00</td>
                                                <td>3987</td>
                                                <td><a href="#" class="btn btn-default btn-xs btn-block">View</a></td>
                                            </tr>
                                            <tr>
                                                <td><a href="#">Apple iPhone 5 - 32GB</a></td>
                                                <td>$612.50</td>
                                                <td>789</td>
                                                <td><a href="#" class="btn btn-default btn-xs btn-block">View</a></td>
                                            </tr>
                                            <tr>
                                                <td><a href="#">Allview Ax4 Nano - Cortex A7 Dual-Core 1.30GHz, 7"</a></td>
                                                <td>$215.50</td>
                                                <td>3411</td>
                                                <td><a href="#" class="btn btn-default btn-xs btn-block">View</a></td>
                                            </tr>
                                            </tbody>
                                        </table>

                                        <a class="size-12" href="#">
                                            <i class="fa fa-arrow-right text-muted"></i>
                                            More Most Visited
                                        </a>

                                    </div>

                                </div><!-- /TAB 1 CONTENT -->
                            </div>
                            <!-- /tabs content -->
                        </div>
                        <!-- /panel content -->
                    </div>
                    <!-- /PANEL -->
                </div>

                <div class="col-md-6">

                    <div id="panel-3" class="panel panel-default">
                        <div class="panel-heading">
									<span class="title elipsis">
										<strong>RECENT ACTIVITIES</strong> <!-- panel title -->
									</span>
                        </div>
                        <!-- panel content -->
                        <div class="panel-body">

                            <ul class="list-unstyled list-hover slimscroll height-300" data-slimscroll-visible="true">

                                <li>
                                    <span class="label label-danger"><i class="fa fa-bell-o size-15"></i></span>
                                    Urgent task: add new theme to fastassets/admin
                                </li>

                                <li>
                                    <span class="label label-success"><i class="fa fa-user size-15"></i></span>
                                    <a href="#">5 pending memership</a>
                                </li>

                                <li>
                                    <span class="label label-warning"><i class="fa fa-comment size-15"></i></span>
                                    <a href="#">24 New comments that needs your approval</a>
                                </li>

                                <li>
                                    <span class="label label-default"><i class="fa fa-briefcase size-15"></i></span>
                                    No work for tomorrow &ndash; everyone is free!
                                </li>

                                <li>
                                    <span class="label label-info"><i class="fa fa-shopping-cart size-15"></i></span>
                                    You have new 3 orders unprocessed
                                </li>

                                <li>
                                    <span class="label label-success"><i class="fa fa-bar-chart-o size-15"></i></span>
                                    Generate the finance report for the previous year
                                </li>

                                <li>
                                    <span class="label label-success bg-black"><i class="fa fa-cogs size-15"></i></span>
                                    CentOS server need a kernel update
                                </li>

                                <li>
                                    <span class="label label-warning"><i class="fa fa-file-excel-o size-15"></i></span>
                                    <a href="#">XCel finance report for 2014 released</a>
                                </li>

                                <li>
                                    <span class="label label-danger"><i class="fa fa-bell-o size-15"></i></span>
                                    Power grid is off. Moving to solar backup.
                                </li>

                                <li>
                                    <span class="label label-warning"><i class="fa fa-comment size-15"></i></span>
                                    <a href="#">24 New comments that need your approval</a>
                                </li>

                                <li>
                                    <span class="label label-default"><i class="fa fa-briefcase size-15"></i></span>
                                    No work for tomorrow &ndash; everyone is free!
                                </li>

                                <li>
                                    <span class="label label-info"><i class="fa fa-shopping-cart size-15"></i></span>
                                    You have new 3 orders unprocessed
                                </li>

                                <li>
                                    <span class="label label-success"><i class="fa fa-bar-chart-o size-15"></i></span>
                                    Generate the finance report for the previous year
                                </li>

                                <li>
                                    <span class="label label-success bg-black"><i class="fa fa-cogs size-15"></i></span>
                                    CentOS server need a kernel update
                                </li>
                                <li>
                                    <span class="label label-warning"><i class="fa fa-file-excel-o size-15"></i></span>
                                    <a href="#">XCel finance report for 2014 released</a>
                                </li>

                                <li>
                                    <span class="label label-danger"><i class="fa fa-bell-o size-15"></i></span>
                                    Power grid is off. Moving to solar backup.
                                </li>
                            </ul>
                        </div>
                        <!-- /panel content -->

                        <!-- panel footer -->
                        <div class="panel-footer">
                            <a href="#"><i class="fa fa-arrow-right text-muted"></i> View Activities Archive</a>
                        </div>
                        <!-- /panel footer -->
                    </div>
                    <!-- /PANEL -->
                </div>
            </div>
        </div>
    </section>
@endsection

@push("js")
<!-- PAGE LEVEL SCRIPT -->
<script src="{{asset('assets/admin/assets/js/highcharts.js')}}" ></script>
<script type="text/javascript">



    $('#charts').highcharts({

        title: {
            text: 'The Monthly Subscription Users'
        },

        subtitle: {
            text: '2017'
        },
        yAxis: {
            title: {
                text: 'Number of Users'
            }
        },
        legend: {
            layout: 'vertical',
            align: 'right',
            verticalAlign: 'middle'
        },

        plotOptions: {
            series: {
                pointStart: 1
            }
        },
        series: [{
            name: 'Subscription Users',
            data: [
                    <?php foreach($data['monthlyUserCount'] as $user) { ?>
                {
                    color: 'rgba(247, 114, 114, 0.4)',
                    y: <?php echo $user; ?>

                },
                <?php } ?>
            ]
        }]
    });
</script>
@endpush