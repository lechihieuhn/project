<!DOCTYPE html>
<html lang="en" ng-app="menuRecords">
<head>
	<meta charset="UTF-8">
	<title>Menu đa cấp</title>

	<link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
</head>
<body>

<h2 style="text-align: center;">Quản lý menu</h2>
<center><span>{{ Auth::user()->email }}</span>
<a href="{{ route('logout') }}"
            onclick="event.preventDefault();
                     document.getElementById('logout-form').submit();">
            Đăng xuất
        </a></center>

    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        {{ csrf_field() }}
    </form>
<div class="container" ng-controller="menusController">

    <!-- Table-to-load-the-data Part -->
    <table class="table">
        <thead>
        <tr>
            <th>ID</th>
            <th>Tên Menu</th>
            <th><button id="btn-add" class="btn btn-success btn-xs" ng-click="toggle('add', 0)">Thêm menu mới</button></th>
        </tr>
        </thead>
        <tbody>
        <tr ng-repeat="menu in menus">
            <td>@{{  menu.id }}</td>
            <td>@{{ menu.name }}</td>
            <td>
                <button class="btn btn-info btn-xs btn-detail" ng-click="toggle('edit', menu.id)">Cập nhật</button>
                <button class="btn btn-danger btn-xs btn-delete" ng-click="confirmDelete(menu.id)">Xóa</button>
            </td>
        </tr>
        </tbody>
    </table>
    <!-- End of Table-to-load-the-data Part -->
    <!-- Modal (Pop up when detail button clicked) -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                    <h4 class="modal-title" id="myModalLabel">@{{form_title}}</h4>
                </div>
                <div class="modal-body">
                    <form name="frmEmployees" class="form-horizontal" novalidate="">

                        <div class="form-group error">
                            <label for="inputEmail3" class="col-sm-3 control-label">Tên menu</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control has-error" id="name" name="name" placeholder="Menu" value="@{{name}}"
                                       ng-model="menu.name" ng-required="true">
                                    <span class="help-inline" ng-show="frmEmployees.name.$invalid && frmEmployees.name.$touched">Tên menu không để trống</span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-3 control-label">Menu cha</label>
                            <div class="col-sm-9">
                                <select ng-model="menu.parent_id" ng-options="menu2.id as menu2.name for menu2 in menus">
                                    <option value="">--Menu gốc--</option>
                                        {{-- @foreach($options->options as $key => $option)
                                            <option value="{{ $key }}" @if($default == $key && $selected_value === NULL){{ 'selected="selected"' }}@endif @if($selected_value == $key){{ 'selected="selected"' }}@endif>{{ $option }}</option>
                                        @endforeach --}}
                                </select>
                            </div>
                        </div>

                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" id="btn-save" ng-click="save(modalstate, id)" ng-disabled="frmEmployees.$invalid">Chấp nhận</button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Load Javascript Libraries (AngularJS, JQuery, Bootstrap) -->
<script src="{{ asset('app/lib/angular/angular.min.js') }}"></script>
<script src="{{ asset('js/jquery.min.js') }}"></script>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>

<!-- AngularJS Application Scripts -->
<script src="{{ asset('app/app.js') }}"></script>
<script src="{{ asset('app/controllers/employees.js') }}"></script>
	
</body>
</html>