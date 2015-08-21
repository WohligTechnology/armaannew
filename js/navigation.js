var admin_url = "http://www.armaanfrozenfoods.com/admin/index.php/";
var adminbase = "http://www.armaanfrozenfoods.com/admin/";
var imgpath = adminbase + "uploads/";
var navigationservice = angular.module('navigationservice', [])

.factory('NavigationService', function ($http) {
    var navigation = [{
            name: "About Us",
            classis: "active",
            link: "#/aboutus",
            subnav: []
    }, {
            name: "Products",
            active: "active",
            link: "#/product/1",
            classis: "",
            subnav: []
    },
        {
            name: "Media",
            active: "active",
            link: "#/media",
            classis: "",
            subnav: []
            }
    ,
        {
            name: "Available at",
            active: "active",
            link: "#/availableat",
            classis: "",
            subnav: []
    },
        {
            name: "Contact",
            active: "active",
            link: "#/contact",
            classis: "",
            subnav: []
    },
        {
            name: "Feedback",
            active: "active",
            link: "#/feedback",
            classis: "",
            subnav: []
    } ];
    
  
            
    return {
           getproducttype: function () {
            return $http.get(admin_url + 'json/getproducttype', {});
        },  
        getmedia: function () {
            return $http.get(admin_url + 'json/getmedia', {});
        },
         viewprojectbyprojecttype: function (producttype,callback) {
//            var projecttype = 0;
            return $http.get(admin_url + 'json/viewprojectbyprojecttype?producttype=' + producttype, {}).success(callback);
        }, 
        getsingleproductdetail: function (id,callback) {
//            var projecttype = 0;
            return $http.get(admin_url + 'json/getproductbyid?id=' + id, {}).success(callback);
        },
        getnav: function () {
            return navigation;
        },
        addfeedback: function (feedback,callback) {
//            var projecttype = 0;
            feedback.recaptcha=$("#g-recaptcha-response").val();
            console.log(feedback.recaptcha);
            return $http.get(admin_url + 'json/checkcaptcha?name=' + feedback.name +'&email='+feedback.email+'&phone='+feedback.phone+'&feedback='+feedback.feedback+'&address1='+feedback.address1+'&address2='+feedback.address2 +'&city='+feedback.city+'&country='+feedback.country+'&postcode='+feedback.postcode+'&g-recaptcha-response='+feedback.recaptcha, {}).success(callback);
        }, 
//         addfeedback: function (feedback) {
//            return $http({
//                url: admin_url + "json/addfeedback",
//                method: "POST",
//                data: {
//                    'name': feedback.name,
//                    'email': feedback.email,
//                    'phone': feedback.phone,
//                    'feedback': feedback.feedback,
//                    'address1': feedback.address1,
//                    'address2': feedback.address2,
//                    'city': feedback.city,
//                    'country': feedback.country,
//                    'postcode': feedback.postcode
//                }
//            });
//        },
        makeactive: function (menuname) {
            for (var i = 0; i < navigation.length; i++) {
                if (navigation[i].name == menuname) {
                    navigation[i].classis = "active";
                } else {
                    navigation[i].classis = "";
                }
            }
            return menuname;
        },

    }
});