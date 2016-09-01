<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.2.24/angular.min.js"></script>

<div class="col-md-12" >
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Simple Full Width Table</h3>
        </div>

        <div class="box-body no-padding">
            <table class="table" ng-app="myApp" ng-controller="customersCtrl">
                <tr ng-repeat="obj in doctors">
                    <th style="width: 10px">{{ obj.User.id}} </th>
                    <th>{{ obj.User.first_name}}</th>
                    <th>{{ obj.User.email}}</th>
                    <th> <a ng-click="delete(obj.User.id, $index)">Delete</a></th
                </tr>
            </table>
        </div>

    </div>

</div>






<script>
    var app = angular.module('myApp', []);
    app.controller('customersCtrl', function ($scope, $http) {
        var data =<?php echo json_encode($res); ?>;
        $scope.doctors = data;
        console.log($scope.doctors);


        $scope.delete = function (deletingId, index) {

            $http.get("delete/" + deletingId)
                    .success(function (data) {
                        $scope.doctors.splice(index, 1);
                    })
        }



    });



</script>
