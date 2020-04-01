<div class="container">
    <div class="row">
        <div class="col-xs-12 col-sm-8 col-md-6 col-lg-8 col-xs-offset-0 col-sm-offset-0 col-md-offset-1 toppad"
             style="padding-top: 10px">
            <div class="panel panel-info">
                @if (\Session::has('success'))
                    <div class="alert alert-success">
                        <ul>
                            <li>{!! \Session::get('success') !!}</li>
                        </ul>
                    </div>
                @endif
                <div class="panel-heading">
                    <h3 class="panel-title">{!! Auth::user()->first_name  !!}{!! Auth::user()->last_name  !!}</h3>
                </div>
                <div class="panel-body">
                    <div class="row">

                        <div class=" col-md-9 col-lg-9 ">
                            <table class="table table-user-information">
                                <tbody>
                                <tr>
                                    <td>Name:</td>
                                    <td>{!! Auth::user()->first_name  !!}{!! Auth::user()->last_name  !!}</td>
                                </tr>

                                <tr>
                                    <td>Email</td>
                                    <td><a href="mailto:{{Auth::user()->email}}">{{Auth::user()->email}}</a></td>
                                </tr>

                                <tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
