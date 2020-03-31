<div class="col-lg-7 col-md-7 col-sm-7 table-responsive">
    <table class="table table-condensed">
        <tr>
            <td width="250">Name</td>
            <th>{{$roles->name}}</th>
        </tr>
        <tr>
            <td>Description</td>
            <th>{{$roles->description}}</th>
        </tr>
    </table>
    <section>
        <h3>
            Permissions:
        </h3>
    </section>
    <?php
    $permissionList = '';
    $prefix = 1;?>
    <div class="row">
        @foreach ($permissions as $permissionId => $display_name)
            <div class="col-xs-4">
                <?php
                $permissionList = '';
                $permissionList .= $prefix.'. '.$display_name;
                $prefix += 1;
                echo $permissionList;
                ?>
            </div>
        @endforeach
    </div>
</div>