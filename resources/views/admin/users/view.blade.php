@extends("admin/layout.app")

@section("contents")

    <section id="middle">
        <div id="content" class="dashboard padding-20">

            <div id="panel-1" class="panel panel-default">
                <div class="panel-heading">
							<span class="title elipsis">
                                <h3><strong>USERS</strong></h3> <!-- panel title -->
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
                                                    <th>FirstName</th>
                                                    <th>LastName</th>
                                                    <th>EmailAddress</th>
                                                    <th>Gender</th>
                                                    <th>Country</th>
                                                    <th>PetCount</th>
                                                    <th>Active</th>
                                                    <th></th>

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
                                                    <td><a href="#" class="btn btn-primary">Email</a>
                                                    <a href="#" class="btn btn-success">Edit</a>
                                                    <a href="#" class="btn btn-danger">Remove</a> </td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        {{--start pagenations--}}
                                        <div class="text-center">
                                            <ul class="pagination">
                                                <li><a href="#">«</a></li>
                                                <li class="active"><a href="#">1</a></li>
                                                <li><a href="#">2</a></li>
                                                <li><a href="#">3</a></li>
                                                <li><a href="#">4</a></li>
                                                <li><a href="#">5</a></li>
                                                <li><a href="#">»</a></li>
                                            </ul>
                                        </div>
                                        {{--end pagenation--}}
                                    </div><!-- /TAB 1 CONTENT -->
                                </div>
                                <!-- /tabs content -->
                            </div>
                            <!-- /panel content -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push("css")
    <style>
        .panel-body td{
            text-align: center;
            line-height:35px !important;
        }
    </style>
@endpush