<!DOCTYPE html>
<head>
<title>AngularJs</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
   <!-- <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.7.5/angular.min.js"></script>-->
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.6/angular.min.js"></script>
</head>
<body ng-app="myapp" >
<div ng-controller="myctrl" ng-init="displaydata()">
<div style="width:70%;margin:0 auto;">
<div class="panel panel-primary">
<div class="panel-heading">
<h3 style="text-align:center;">AngularJS</h3>
</div>
<div class="panel-body" style="text-align:center;">
<label>First Name</label>
<input type="text" ng-model="firstname"><br><br>
<label>Last Name</label>
<input type="text" ng-model="lastname"><br><br>
<input type="button" ng-click="insertuser()" value="{{btnname}}" class="btn btn-primary" />
<br><br>
<table class="table table-border" ng-hide="datatable">
<tr>
<th style="text-align:center;">Serial number</th>
<th style="text-align:center;">First Name</th>
<th style="text-align:center;">Last Name</th>
<th style="text-align:center;">Edit</th>
<th style="text-align:center;">Delete</th>
</tr>
<tr ng-repeat="x in names">
<td>{{x.id}} </td>
<td>{{x.firstname}} </td>
<td>{{x.lastname}} </td>
<td><button ng-click="updatedata(x.id,x.firstname,x.lastname)" class="btn btn-primary">Update</button></td>
<td><button ng-click="deletedata(x.id)" class="btn btn-danger">Delete</button></td>
</tr>
</table>
</div>
</div>
</div>
</div>
</body>
</html>
<script>
var app=angular.module("myapp",[]);
app.controller("myctrl",function($scope,$http){
$scope.datatable = true;
$scope.btnname="Add";
$scope.insertuser = function(){
$http.post(
"insert.php",
{'firstname':$scope.firstname,'lastname':$scope.lastname,'id':$scope.id,'btnname':$scope.btnname}
).success(function(data){
alert(data);
$scope.firstname=null;
$scope.lastname=null;
$scope.btnname="Add";
$scope.datatable = false;
$scope.displaydata();
});
},
$scope.displaydata = function(){
    $http.get("display.php").success(function(data){
        if(data){
             $scope.names = data; 
        }else{
       $scope.datatable = true;
        }
      
    });
},
$scope.deletedata = function(id){
    if(confirm("Are you sure want to delete the data..??")){
        $http.post("delete.php",{"id":id}).success(function(data){
           alert(data);
            $scope.displaydata();
        });
    }else{
        return false;
    }
},
$scope.updatedata = function(id,firstname,lastname){
    $scope.id=id;
    $scope.firstname=firstname;
    $scope.lastname=lastname;
    $scope.btnname="Update";
}
});
</script>