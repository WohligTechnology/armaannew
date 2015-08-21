angular.module('phonecatControllers', ['templateservicemod', 'navigationservice', 'ngDialog', 'ngSanitize', 'angular-flexslider'])

.controller('AboutusCtrl', function ($scope, TemplateService, NavigationService, $timeout) {
    //Used to name the .html file
    $scope.template = TemplateService.changecontent("aboutus");
    $scope.menutitle = NavigationService.makeactive("About Us");
    TemplateService.title = $scope.menutitle;
    $scope.navigation = NavigationService.getnav();
    $scope.slidesabout = [
        'img/slider/slider1.jpg',
        'img/slider/slider2.jpg',
        'img/slider/slider3.jpg',
        'img/slider/slider4.jpg',
        'img/slider/slider5.jpg'
    ];

})

.controller('AvailableatCtrl', function ($scope, TemplateService, NavigationService) {
    $scope.template = TemplateService.changecontent("availableat");
    $scope.menutitle = NavigationService.makeactive("Available at");
    TemplateService.title = $scope.menutitle;
    $scope.navigation = NavigationService.getnav();
})

.controller('ContactCtrl', function ($scope, TemplateService, NavigationService) {
    $scope.template = TemplateService.changecontent("contact");
    $scope.menutitle = NavigationService.makeactive("Contact");
    TemplateService.title = $scope.menutitle;
    $scope.navigation = NavigationService.getnav();
})

.controller('MediaCtrl', function ($scope, TemplateService, NavigationService, ngDialog) {
    $scope.template = TemplateService.changecontent("media");
    $scope.menutitle = NavigationService.makeactive("Media");
    TemplateService.title = $scope.menutitle;
    $scope.navigation = NavigationService.getnav();
    $scope.hidenav = 'hidenav';
    $scope.slidesabout = [

'img/gallery/DSC_2443.jpg',
'img/gallery/DSC_2504.jpg',
'img/gallery/DSC_2737.jpg',
'img/gallery/DSC_2803.jpg',
'img/gallery/DSC_2891.jpg',
'img/gallery/DSC_2983.jpg',
'img/gallery/DSC_2471.jpg',
'img/gallery/DSC_2528.jpg',
'img/gallery/DSC_2644.jpg',
'img/gallery/DSC_2777.jpg',
'img/gallery/DSC_2852.jpg',
'img/gallery/DSC_2945.jpg',
'img/gallery/DSC_3024.jpg'
    ];

    $scope.openModal = function (s) {
        console.log(s);
        $scope.dialogimage = s;
        ngDialog.open({
            template: 'views/content/imagepopup.html',
            scope: $scope
        });
    }

    $scope.toBigImage = function (med) {
            $scope.bigmedia = med.video;
        }
        //get images
    var getmediasuccess = function (data, status) {
        console.log(data);
        $scope.media = data;
        $scope.bigmedia = data[0].video;
        console.log(data);
    }
    NavigationService.getmedia().success(getmediasuccess);

    //    $scope.media = [{
    //        name: "first image",
    //        image: "gGJfbcDNI0A"
    // }, {
    //        name: "second image",
    //        image: "SipKS7W1Xd8"
    // }, {
    //        name: "third image",
    //        image: "-JKtWOqARa4"
    // }]
})

.controller('ProductCtrl', function ($scope, TemplateService, NavigationService, $location, $stateParams) {
        $scope.template = TemplateService.changecontent("product");
        $scope.menutitle = NavigationService.makeactive("Products");
        TemplateService.title = $scope.menutitle;
        $scope.navigation = NavigationService.getnav();

        $scope.hidenav = 'hidenav';
        var productid = $stateParams.id;
        console.log(productid);

        var viewprojectbyprojecttypesuccess = function (data, status) {
            $scope.product = data.queryresult;
            console.log($scope.product);
        }

        $scope.getmultipleproducts = function (id) {
            NavigationService.viewprojectbyprojecttype(id, viewprojectbyprojecttypesuccess);
            $scope.currentactive = id;
        }
        if ($stateParams.id) {
            $scope.getmultipleproducts($stateParams.id);
        }
        //		if (productid != 1) {
        //			$scope.getmultipleproducts = function (id) {
        //				console.log("in if");
        //				NavigationService.viewprojectbyprojecttype(productid, viewprojectbyprojecttypesuccess);
        //			}
        //		} else {
        //			console.log("in else");
        //			$scope.getmultipleproducts = function (id) {
        //				NavigationService.viewprojectbyprojecttype(id, viewprojectbyprojecttypesuccess);
        //			}
        //		}

        // GET PRODUCTS SIDE MENU
        $scope.productlist = {};
        console.log($scope.productlist);
        var getproducttypesuccess = function (data, status) {
            $scope.productlist = data;
            console.log(data);
            $scope.getmultipleproducts(data[0].id);
        }
        NavigationService.getproducttype().success(getproducttypesuccess);


        // GET MULTIPLE PRODUCTS


        $scope.getsingleproductdetail = function (id) {
            $location.url("/product-info/" + id);
        }


    })
    .controller('ProductinfoCtrl', function ($scope, TemplateService, NavigationService, $stateParams, $location) {
        $scope.template = TemplateService.changecontent("productinfo");
        $scope.menutitle = NavigationService.makeactive("productinfo");
        TemplateService.title = $scope.menutitle;
        $scope.navigation = NavigationService.getnav();
        $scope.hidenav = 'hidenav';
        // get single product detail
        console.log($stateParams.id);
        var getsingleproductdetailsuccess = function (data, status) {
            $scope.singleproductdetail = data;
            console.log($scope.singleproductdetail);
        }
        NavigationService.getsingleproductdetail($stateParams.id, getsingleproductdetailsuccess);
        $scope.getmultipleproducts = function (id) {
            $location.url("/product/" + id);
        }

        //get menu
        var getproducttypesuccess = function (data, status) {
            $scope.productlist = data;
        }
        NavigationService.getproducttype().success(getproducttypesuccess);
    })
    .controller('FeedbackCtrl', function ($scope, TemplateService, NavigationService, ngDialog) {
        $scope.template = TemplateService.changecontent("feedback");
        $scope.menutitle = NavigationService.makeactive("Feedback");
        TemplateService.title = $scope.menutitle;
        $scope.navigation = NavigationService.getnav();
        $scope.feedback = [];
        var getfeedbackdetailscallback = function (data, status) {
            if (data == "This is a spam") {
                console.log("The captcha is missing or wrong!");
                ngDialog.open({
                    template: 'views/content/captchapopup.html'
                });
            } else {
                console.log("success" + data);
                ngDialog.open({
                    template: 'views/content/feedpopup.html'
                });
                $scope.feedback = {};
            }
        }
        $scope.getfeedbackdetails = function (feedback) {
            $scope.allvalidation = [{
                field: $scope.feedback.name,
                validation: ""
            }, {
                field: $scope.feedback.email,
                validation: ""
            }, {
                field: $scope.feedback.feedback,
                validation: ""
            }];
            var check = formvalidation($scope.allvalidation);
            //        if (navigator.network.connection.type == Connection.none) {
            //            var myPopup = $ionicPopup.show({
            //                title: 'No Internet Connection',
            //                scope: $scope,
            //            });
            //            $timeout(function () {
            //                myPopup.close(); //close the popup after 3 seconds for some reason
            //            }, 1500);
            //        } else {
            if (check) {
                $scope.feedback = feedback;
                console.log($scope.feedback);
                //                NavigationService.addfeedback($scope.feedback).success(getfeedbackdetailscallback);
                NavigationService.addfeedback($scope.feedback, getfeedbackdetailscallback);

            } else {
                console.log("Invalid");
            }
        }
    })


.controller('headerctrl', function ($scope, TemplateService, $rootScope, $timeout) {
    $scope.template = TemplateService;

})

.controller('sliderctrl', function ($scope, TemplateService) {
    $scope.template = TemplateService;

    $scope.slides = [
        'img/slider/1.jpg',
        'img/slider/2.jpg',
        'img/slider/3.jpg',
        'img/slider/4.jpg',
        'img/slider/5.jpg',
        'img/slider/6.jpg',
        'img/slider/7.jpg',
        'img/slider/8.jpg'
    ];
});