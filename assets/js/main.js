angular.module('myApp',['ngRoute']);

angular
.module('myApp')
.directive('fileModel', ['$parse', function ($parse) {
    return {
        restrict: 'A',
        link: function(scope, element, attrs) {
            var model = $parse(attrs.fileModel);
            var modelSetter = model.assign;
            
            element.bind('change', function(){
                scope.$apply(function(){
                    modelSetter(scope, element[0].files[0]);
                    console.log(scope.myFile);
                });
            });
        }
    };
}])


.directive('enterKey', function () {
    return function (scope, element, attrs) {
        element.bind("keydown keypress", function (event) {
            if(event.which === 13) {
                scope.$apply(function (){
                    scope.$eval(attrs.myEnter);
                });

                event.preventDefault();
            }
        });
    };
})


.service('sentData', function($http){
    var sentData = this;
    
    sentData.post = function(file,data,uploadUrl){
         var fd = new FormData();
         fd.append('file', file);
         fd.append('dishName', data.dishName);
         fd.append('why',data.why);
         fd.append('name',data.name);
         fd.append('email',data.email);
         fd.append('tel',data.tel);
         fd.append('country',data.country);
         fd.append('age',data.age);
         fd.append('male',data.male);
         fd.append('female',data.female);
         fd.append('terms',data.terms);
         return $http.post(
          uploadUrl,
          fd,
          {
            transformRequest: angular.identity,
            headers: {'Content-Type': undefined}
          });
    };
    
      sentData.login = function(user, password, url){
          console.log(user);
        return $http.post(url,{'username':user,'password':password})
    }



    sentData.getGallery = function(userId, token,start){
        return $http.post('http://192.185.183.189/~webapplication/index.php/gallery',{'userid':userId,'token':token,'start' : start});

    };

sentData.logout = function(userId, token){
      return $http.post('http://192.185.183.189/~webapplication/index.php/logout',{'userid':userId,'token':token});
    }

   sentData.getImages = function(userId, token,searchTerm,start){
      return $http.post('http://192.185.183.189/~webapplication/index.php/gallery/search',{'userid':userId,'token':token,'searchTerm':searchTerm,'start' : start});
    }

    
    return sentData;

})
.controller('MainCtrl', function($scope, $rootScope,$location){

    $scope.getCookie = function(cname) {
    var name = cname + "=";
    var ca = document.cookie.split(';');
    for(var i = 0; i <ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0)==' ') {
            c = c.substring(1);
        }
        if (c.indexOf(name) == 0) {
            return c.substring(name.length,c.length);
        }
    }
    return "";
   };

  $scope.userId = $scope.getCookie('userid');
   $scope.token = $scope.getCookie('token');
   $scope.start=0;
   $scope.images = [];
   $scope.user = {};
   
  $rootScope.$on('$routeChangeStart', function(event, next, current) {
    console.log(next);
    console.log(current);
    if (( next === 'gallery' || current=== 'gallery' ) && (!$scope.userid || !$scope.token)) {
       $location.path('/login');
    }
  });
 
})





.controller('RegisterCtrl', function($scope, sentData){
$scope.data = {};
$scope.onFormSubmit = function(){
  var file = $scope.myFile;
  console.dir(file);
  var uploadUrl = "http://192.185.183.189/~webapplication/index.php/registration/user"
    sentData.post(file,$scope.data, uploadUrl).then(function(resp){
            console.log(resp);
            $scope.registerStatus ="Sucessfully Registered ";
           for(prop in $scope.data) {
if($scope.data.hasOwnProperty(prop)){
   $scope.data[prop] = '';
}}



        },
        function(resp){
            console.log(resp);
           $scope.registerStatus ="Registration has failed,Try again ";

         
        });
}

$scope.clear = function () {
        var inputs = angular.element(document.querySelector('#userForm')).children();
        angular.forEach(inputs, function (value) {
            value.value="";
        });

    };


})
.controller('LoginCtrl', function($scope,sentData,$location){

var url = 'http://192.185.183.189/~webapplication/index.php/login';
$scope.onFormSubmit = function(){
     sentData.login($scope.user.username,$scope.user.password,url).then(function(httpResp){
        $scope.data = httpResp.data;
        console.log($scope.data);
       console.log($scope.data.token);
         if($scope.data.token)
        {
        document.cookie = ['token=',$scope.data.token,';'].join('');
  document.cookie = ['userid=',$scope.data.userid,';'].join('');
        console.log(document.cookie);
        $location.path('/gallery');
        }
        else
        {
           //$location.path('/login');
           $scope.loginStatus ="Wrong Username and Password!Try again ";
        }     
    });
};

})

.controller('GalleryCtrl', function($scope,sentData,$location){
    
       if (!$scope.userId || !$scope.token){
      $location.path('/login');
    }


   sentData.getGallery($scope.userId,$scope.token,$scope.start).then(function(resp){
      $scope.images = resp.data.images;
      console.log(resp.data.images);
   });


    $scope.logout = function(){
    sentData.logout($scope.userId,$scope.token).then(function(resp){
     console.log(resp);
      $location.path('/login');


    })

   };
   
     $scope.searchImages = function(){
    sentData.getImages($scope.userId,$scope.token,$scope.searchTerm,$scope.start).then(function(resp){
     $scope.images = resp.data.images;
      console.log(resp.data.images);
     


    })

   };

  $scope.getImages = function(n){
    return $scope.images.slice(0,n);
   }
   

})



.config(['$routeProvider', 

  function( $routeProvider) {

  // Define routes 
  $routeProvider.
    when('/register', 
        { templateUrl: 'http://192.185.183.189/~webapplication/partials/registration.html',
controller: 'RegisterCtrl'}).

   when('/login', 
        { templateUrl: 'http://192.185.183.189/~webapplication/partials/login.html',
          controller: 'LoginCtrl'}).
/*
     when('/collageframe',
     { templateUrl: 'partial/collageframe.html',
        controller: UsersDetailCtrl}).

*/

      when('/gallery',
        { templateUrl: 'http://192.185.183.189/~webapplication/partials/gallery.html',
          controller: 'GalleryCtrl'}).

    otherwise({redirectTo: 'register'});


}]);