angular.module('starter.controllers', [])

.controller('DashCtrl', function($scope, $http, $state, $rootScope) {
    $scope.details = {};
    $scope.login = function() {
        if ($scope.details.username == undefined || $scope.details.password == undefined){
            $scope.response = "Username and password are required";
        }
        else {
            $http({
            method: 'GET',
            url: 'http://sarabsingh.cloudapp.net/login.php',
            params: {user: $scope.details.username, pass: $scope.details.password}
        }).success(function(data) {
            if (data == 'Username and a password is incorrect')
                {
                    $scope.response = "Username and password didnt match"
                }
            else {
                delete $rootScope.patients;
                $rootScope.patients = data;
            $state.go('tab.chats');
            }
            
        }).error (function(data) {
            $scope.response = "Failed";
        })
        }
        
                   
    }
})

.controller('ChatsCtrl', function($scope, Chats, $http, $rootScope) {
  // With the new view caching in Ionic, Controllers are only called
  // when they are recreated or on app start, instead of every page change.
  // To listen for when this page is active (for example, to refresh data),
  // listen for the $ionicView.enter event:
  //
  //$scope.$on('$ionicView.enter', function(e) {
  //});
    
  
  $scope.chats = Chats.all();
  $scope.remove = function(chat) {
    Chats.remove(chat);
  };
    
    /*$scope.patient = function() {
        $http({
            method: 'GET',
            url: 'http://sarabsingh.cloudapp.net/Patients.php',
        }).success(function(data) {
            $scope.chats = data;
            Chats.set(data);
        }).error (function(data) {
            $scope.response = "Failed";
        });
                   
    }*/
    
    $scope.chats = $rootScope.patients;
    Chats.set($rootScope.patients);
    
    //$scope.patient();
    
})

.controller('ChatDetailCtrl', function($scope, $stateParams, Chats) {
  $scope.chat = Chats.get($stateParams.chatId);
})





.controller('AccountCtrl', function($scope) {
  $scope.settings = {
    enableFriends: true
  };
});
