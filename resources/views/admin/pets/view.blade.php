@extends("admin/layout.app")

@section("contents")

    <section id="middle">
        <div id="content" class="dashboard padding-20">

            <div id="panel-1" class="panel panel-default">
                <div class="panel-heading">
							<span class="title elipsis">
                                <h3><strong>Pets</strong></h3> <!-- panel title -->
							</span>
                </div>

                <div class="panel-body">
                    <div class="row">

                        <div class="col-md-12">

                                <!-- panel content -->
                                <div class="panel-body">

                                    <!-- tabs content -->
                                    <div class="tab-content transparent">

                                        <div id="ttab1_nobg" class="tab-pane active"><!-- TAB 1 CONTENT -->

                                            <div class="table-responsive">
                                                <table class="table table-striped table-hover table-bordered">
                                                    <thead>
                                                    <tr>
                                                        <th></th>
                                                        <th>NAME</th>
                                                        <th>TYPE</th>
                                                        <th>GENDER</th>
                                                        <th>BIRTH</th>
                                                        <th>WEIGHT</th>
                                                        <th>SPAY/NEUTER</th>
                                                        <th>RABIES TAG</th>
                                                        <th>LICENSE</th>
                                                        <th>MUNICIPAL LICENSE</th>
                                                        <th>MICROCHIP ID</th>
                                                        <th>PHYSICAL DESC</th>
                                                        <th>ADDITIONAL INFO</th>
                                                        <th>MISSING</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <tr>
                                                        <td>1</td>
                                                        <td>$612.50</td>
                                                        <td>789</td>
                                                        <td>789</td>
                                                        <td>789</td>
                                                        <td>789</td>
                                                        <td>789</td>
                                                        <td>789</td>
                                                        <td>789</td>
                                                        <td>789</td>
                                                        <td>789</td>
                                                        <td>789</td>
                                                        <td>789</td>
                                                        <td><a href="#" class="btn btn-default btn-xs btn-block">View</a></td>
                                                    </tr>
                                                    </tbody>
                                                </table>

                                                <a class="size-12" href="#">
                                                    <i class="fa fa-arrow-right text-muted"></i>
                                                    More Top Sales to activity our  
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
                    </div>
                    {{--End table view--}}
                </div>
            </div>
        </div>
    </section>
@endsection