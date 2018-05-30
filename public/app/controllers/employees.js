app.controller('menusController', function($scope, $http, API_URL) {
    //retrieve employees listing from API
    $http.get(API_URL + "menu")
        .success(function(response) {
            $scope.menus = response;
        });

    //show modal form
    $scope.toggle = function(modalstate, id) {
        $scope.modalstate = modalstate;

        switch (modalstate) {
            case 'add':
                $scope.form_title = "Thêm Menu";
                $http.get(API_URL + 'menu/')
                    .success(function(response) {
                        console.log(response);
                        $scope.menu = response;
                    });
                break;
            case 'edit':
                $scope.form_title = "Sửa Menu";
                $scope.id = id;
                $http.get(API_URL + 'menu/' + id)
                    .success(function(response) {
                        console.log(response);
                        $scope.menu = response;
                    });
                break;
            default:
                break;
        }
        console.log(id);
        $('#myModal').modal('show');
    }

    //save new record / update existing record
    $scope.save = function(modalstate, id) {
        var url = API_URL + "menu";

        //append employee id to the URL if the form is in edit mode
        if (modalstate === 'edit'){
            url += "/" + id;
        }
        $http({
            method: 'POST',
            url: url,
            data: $.param($scope.menu),
            headers: {'Content-Type': 'application/x-www-form-urlencoded'}
        }).success(function(response) {
            console.log(response);
            alert(response);
            location.reload();
        }).error(function(response) {
            console.log(response);
            alert('Không thể thực thi được. Bạn vui lòng điền lại thông tin');
        });
    }

    //delete record
    $scope.confirmDelete = function(id) {
        var isConfirmDelete = confirm('Are you sure you want this record?');
        if (isConfirmDelete) {
            $http({
                method: 'DELETE',
                url: API_URL + 'menu/' + id
            }).
            success(function(data) {
                console.log(data);
                alert(data);
                location.reload();
            }).
            error(function(data) {
                console.log(data);
                alert('data');
            });
        } else {
            return false;
        }
    }
});
