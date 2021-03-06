(function () {

    var laroute = (function () {

        var routes = {

            absolute: false,
            rootUrl: 'http://localhost',
            routes : [{"host":null,"methods":["GET","HEAD"],"uri":"oauth\/authorize","name":null,"action":"\Laravel\Passport\Http\Controllers\AuthorizationController@authorize"},{"host":null,"methods":["POST"],"uri":"oauth\/authorize","name":null,"action":"\Laravel\Passport\Http\Controllers\ApproveAuthorizationController@approve"},{"host":null,"methods":["DELETE"],"uri":"oauth\/authorize","name":null,"action":"\Laravel\Passport\Http\Controllers\DenyAuthorizationController@deny"},{"host":null,"methods":["POST"],"uri":"oauth\/token","name":null,"action":"\Laravel\Passport\Http\Controllers\AccessTokenController@issueToken"},{"host":null,"methods":["GET","HEAD"],"uri":"oauth\/tokens","name":null,"action":"\Laravel\Passport\Http\Controllers\AuthorizedAccessTokenController@forUser"},{"host":null,"methods":["DELETE"],"uri":"oauth\/tokens\/{token_id}","name":null,"action":"\Laravel\Passport\Http\Controllers\AuthorizedAccessTokenController@destroy"},{"host":null,"methods":["POST"],"uri":"oauth\/token\/refresh","name":null,"action":"\Laravel\Passport\Http\Controllers\TransientTokenController@refresh"},{"host":null,"methods":["GET","HEAD"],"uri":"oauth\/clients","name":null,"action":"\Laravel\Passport\Http\Controllers\ClientController@forUser"},{"host":null,"methods":["POST"],"uri":"oauth\/clients","name":null,"action":"\Laravel\Passport\Http\Controllers\ClientController@store"},{"host":null,"methods":["PUT"],"uri":"oauth\/clients\/{client_id}","name":null,"action":"\Laravel\Passport\Http\Controllers\ClientController@update"},{"host":null,"methods":["DELETE"],"uri":"oauth\/clients\/{client_id}","name":null,"action":"\Laravel\Passport\Http\Controllers\ClientController@destroy"},{"host":null,"methods":["GET","HEAD"],"uri":"oauth\/scopes","name":null,"action":"\Laravel\Passport\Http\Controllers\ScopeController@all"},{"host":null,"methods":["GET","HEAD"],"uri":"oauth\/personal-access-tokens","name":null,"action":"\Laravel\Passport\Http\Controllers\PersonalAccessTokenController@forUser"},{"host":null,"methods":["POST"],"uri":"oauth\/personal-access-tokens","name":null,"action":"\Laravel\Passport\Http\Controllers\PersonalAccessTokenController@store"},{"host":null,"methods":["DELETE"],"uri":"oauth\/personal-access-tokens\/{token_id}","name":null,"action":"\Laravel\Passport\Http\Controllers\PersonalAccessTokenController@destroy"},{"host":null,"methods":["GET","HEAD"],"uri":"api\/v1\/users","name":"users.api.index","action":"App\Http\Controllers\Api\UsersController@index"},{"host":null,"methods":["POST"],"uri":"api\/v1\/users","name":"users.api.store","action":"App\Http\Controllers\Api\UsersController@store"},{"host":null,"methods":["DELETE"],"uri":"api\/v1\/users\/{id}","name":"users.api.destroy","action":"App\Http\Controllers\Api\UsersController@destroy"},{"host":null,"methods":["GET","HEAD"],"uri":"api\/v1\/users\/{id}","name":"users.api.show","action":"App\Http\Controllers\Api\UsersController@show"},{"host":null,"methods":["PUT"],"uri":"api\/v1\/users\/{id}","name":"users.api.update","action":"App\Http\Controllers\Api\UsersController@update"},{"host":null,"methods":["PUT"],"uri":"api\/v1\/users\/profile-update\/{id}","name":"users.api.update.general.info","action":"App\Http\Controllers\Api\UsersController@updateGeneralInfo"},{"host":null,"methods":["PUT"],"uri":"api\/v1\/users\/user-password-update\/{id}","name":"users.api.update.password","action":"App\Http\Controllers\Api\UsersController@updatePassword"},{"host":null,"methods":["PUT"],"uri":"api\/v1\/users\/user-billing-update\/{id}","name":"users.api.update.billing","action":"App\Http\Controllers\Api\UsersController@updateBillingDetails"},{"host":null,"methods":["GET","HEAD"],"uri":"api\/v1\/users\/{id}\/orders","name":"users.api.orders","action":"App\Http\Controllers\Api\OrdersController@getUsersOrders"},{"host":null,"methods":["GET","HEAD"],"uri":"api\/v1\/roles","name":"roles.api.index","action":"App\Http\Controllers\Api\RolesController@index"},{"host":null,"methods":["GET","HEAD"],"uri":"api\/v1\/teams","name":"teams.api.index","action":"App\Http\Controllers\Api\TeamsController@index"},{"host":null,"methods":["POST"],"uri":"api\/v1\/thesis","name":"thesis.api.store","action":"App\Http\Controllers\Api\ThesisController@store"},{"host":null,"methods":["GET","HEAD"],"uri":"api\/v1\/thesis\/{id}","name":"thesis.api.show","action":"App\Http\Controllers\Api\ThesisController@show"},{"host":null,"methods":["PUT"],"uri":"api\/v1\/thesis\/{id}","name":"thesis.api.update","action":"App\Http\Controllers\Api\ThesisController@update"},{"host":null,"methods":["POST"],"uri":"api\/v1\/thesis\/upload","name":"thesis.api.upload","action":"App\Http\Controllers\Api\UploadController@upload"},{"host":null,"methods":["GET","HEAD"],"uri":"api\/v1\/order","name":"orders.api.index","action":"App\Http\Controllers\Api\OrdersController@index"},{"host":null,"methods":["POST"],"uri":"api\/v1\/order","name":"orders.api.store","action":"App\Http\Controllers\Api\OrdersController@store"},{"host":null,"methods":["GET","HEAD"],"uri":"api\/v1\/order\/{id}","name":"orders.api.show","action":"App\Http\Controllers\Api\OrdersController@show"},{"host":null,"methods":["POST"],"uri":"api\/v1\/order\/paid\/{id}","name":"orders.api.paid","action":"App\Http\Controllers\Api\OrdersController@changePaid"},{"host":null,"methods":["POST"],"uri":"api\/v1\/order\/generuj-csv\/{id}","name":"admin.generate.csv","action":"App\Http\Controllers\Api\CsvController@generateCsv"},{"host":null,"methods":["POST"],"uri":"api\/v1\/gopay","name":"gopay.api.create.payment","action":"App\Http\Controllers\Api\GopayController@payment"},{"host":null,"methods":["GET","HEAD"],"uri":"api\/v1\/gopay","name":"gopay.api.status","action":"App\Http\Controllers\Api\GopayController@getStatus"},{"host":null,"methods":["GET","HEAD"],"uri":"impersonate\/take\/{id}","name":"impersonate","action":"\Lab404\Impersonate\Controllers\ImpersonateController@take"},{"host":null,"methods":["GET","HEAD"],"uri":"impersonate\/leave","name":"impersonate.leave","action":"\Lab404\Impersonate\Controllers\ImpersonateController@leave"},{"host":null,"methods":["GET","HEAD"],"uri":"\/","name":"home","action":"App\Http\Controllers\LandingPageController@index"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/objednavky","name":"admin.orders.index","action":"App\Http\Controllers\Admin\Orders\OrderController@index"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/objednavky\/{id}","name":"admin.orders.show","action":"App\Http\Controllers\Admin\Orders\OrderController@show"},{"host":null,"methods":["GET","HEAD"],"uri":"uzivatel","name":"users.index","action":"App\Http\Controllers\Users\UsersController@index"},{"host":null,"methods":["GET","HEAD"],"uri":"uzivatel\/zmena-udaju\/{id}","name":"users.show","action":"App\Http\Controllers\Users\UsersController@show"},{"host":null,"methods":["GET","HEAD"],"uri":"uzivatel\/objednavka\/{orderId}","name":"users.order.show","action":"App\Http\Controllers\Users\UsersController@showOrder"},{"host":null,"methods":["GET","HEAD"],"uri":"thesis","name":"thesis.index","action":"App\Http\Controllers\Thesis\ThesisController@index"},{"host":null,"methods":["GET","HEAD"],"uri":"thesis\/return","name":"thesis.return","action":"App\Http\Controllers\Thesis\ThesisController@returnIt"},{"host":null,"methods":["GET","HEAD"],"uri":"thesis\/notify","name":"thesis.notify","action":"App\Http\Controllers\Thesis\ThesisController@notify"},{"host":null,"methods":["GET","HEAD"],"uri":"login\/facebook","name":"facebook.login","action":"App\Http\Controllers\Auth\FacebookAuthController@redirectToProvider"},{"host":null,"methods":["GET","HEAD"],"uri":"login\/facebook\/callback","name":"facebook.login.callback","action":"App\Http\Controllers\Auth\FacebookAuthController@handleProviderCallback"},{"host":null,"methods":["GET","HEAD"],"uri":"login\/google","name":"google.login","action":"App\Http\Controllers\Auth\GoogleAuthController@redirectToProvider"},{"host":null,"methods":["GET","HEAD"],"uri":"login\/google\/callback","name":"google.login.callback","action":"App\Http\Controllers\Auth\GoogleAuthController@handleProviderCallback"},{"host":null,"methods":["GET","HEAD"],"uri":"logout","name":"users.logout","action":"\App\Http\Controllers\Auth\LoginController@customLogout"},{"host":null,"methods":["GET","HEAD"],"uri":"login","name":"login","action":"App\Http\Controllers\Auth\LoginController@showLoginForm"},{"host":null,"methods":["POST"],"uri":"login","name":null,"action":"App\Http\Controllers\Auth\LoginController@login"},{"host":null,"methods":["POST"],"uri":"logout","name":"logout","action":"App\Http\Controllers\Auth\LoginController@logout"},{"host":null,"methods":["GET","HEAD"],"uri":"register","name":"register","action":"App\Http\Controllers\Auth\RegisterController@showRegistrationForm"},{"host":null,"methods":["POST"],"uri":"register","name":null,"action":"App\Http\Controllers\Auth\RegisterController@register"},{"host":null,"methods":["GET","HEAD"],"uri":"password\/reset","name":"password.request","action":"App\Http\Controllers\Auth\ForgotPasswordController@showLinkRequestForm"},{"host":null,"methods":["POST"],"uri":"password\/email","name":"password.email","action":"App\Http\Controllers\Auth\ForgotPasswordController@sendResetLinkEmail"},{"host":null,"methods":["GET","HEAD"],"uri":"password\/reset\/{token}","name":"password.reset","action":"App\Http\Controllers\Auth\ResetPasswordController@showResetForm"},{"host":null,"methods":["POST"],"uri":"password\/reset","name":null,"action":"App\Http\Controllers\Auth\ResetPasswordController@reset"}],
            prefix: '',

            route : function (name, parameters, route) {
                route = route || this.getByName(name);

                if ( ! route ) {
                    return undefined;
                }

                return this.toRoute(route, parameters);
            },

            url: function (url, parameters) {
                parameters = parameters || [];

                var uri = url + '/' + parameters.join('/');

                return this.getCorrectUrl(uri);
            },

            toRoute : function (route, parameters) {
                var uri = this.replaceNamedParameters(route.uri, parameters);
                var qs  = this.getRouteQueryString(parameters);

                if (this.absolute && this.isOtherHost(route)){
                    return "//" + route.host + "/" + uri + qs;
                }

                return this.getCorrectUrl(uri + qs);
            },

            isOtherHost: function (route){
                return route.host && route.host != window.location.hostname;
            },

            replaceNamedParameters : function (uri, parameters) {
                uri = uri.replace(/\{(.*?)\??\}/g, function(match, key) {
                    if (parameters.hasOwnProperty(key)) {
                        var value = parameters[key];
                        delete parameters[key];
                        return value;
                    } else {
                        return match;
                    }
                });

                // Strip out any optional parameters that were not given
                uri = uri.replace(/\/\{.*?\?\}/g, '');

                return uri;
            },

            getRouteQueryString : function (parameters) {
                var qs = [];
                for (var key in parameters) {
                    if (parameters.hasOwnProperty(key)) {
                        qs.push(key + '=' + parameters[key]);
                    }
                }

                if (qs.length < 1) {
                    return '';
                }

                return '?' + qs.join('&');
            },

            getByName : function (name) {
                for (var key in this.routes) {
                    if (this.routes.hasOwnProperty(key) && this.routes[key].name === name) {
                        return this.routes[key];
                    }
                }
            },

            getByAction : function(action) {
                for (var key in this.routes) {
                    if (this.routes.hasOwnProperty(key) && this.routes[key].action === action) {
                        return this.routes[key];
                    }
                }
            },

            getCorrectUrl: function (uri) {
                var url = this.prefix + '/' + uri.replace(/^\/?/, '');

                if ( ! this.absolute) {
                    return url;
                }

                return this.rootUrl.replace('/\/?$/', '') + url;
            }
        };

        var getLinkAttributes = function(attributes) {
            if ( ! attributes) {
                return '';
            }

            var attrs = [];
            for (var key in attributes) {
                if (attributes.hasOwnProperty(key)) {
                    attrs.push(key + '="' + attributes[key] + '"');
                }
            }

            return attrs.join(' ');
        };

        var getHtmlLink = function (url, title, attributes) {
            title      = title || url;
            attributes = getLinkAttributes(attributes);

            return '<a href="' + url + '" ' + attributes + '>' + title + '</a>';
        };

        return {
            // Generate a url for a given controller action.
            // laroute.action('HomeController@getIndex', [params = {}])
            action : function (name, parameters) {
                parameters = parameters || {};

                return routes.route(name, parameters, routes.getByAction(name));
            },

            // Generate a url for a given named route.
            // laroute.route('routeName', [params = {}])
            route : function (route, parameters) {
                parameters = parameters || {};

                return routes.route(route, parameters);
            },

            // Generate a fully qualified URL to the given path.
            // laroute.route('url', [params = {}])
            url : function (route, parameters) {
                parameters = parameters || {};

                return routes.url(route, parameters);
            },

            // Generate a html link to the given url.
            // laroute.link_to('foo/bar', [title = url], [attributes = {}])
            link_to : function (url, title, attributes) {
                url = this.url(url);

                return getHtmlLink(url, title, attributes);
            },

            // Generate a html link to the given route.
            // laroute.link_to_route('route.name', [title=url], [parameters = {}], [attributes = {}])
            link_to_route : function (route, title, parameters, attributes) {
                var url = this.route(route, parameters);

                return getHtmlLink(url, title, attributes);
            },

            // Generate a html link to the given controller action.
            // laroute.link_to_action('HomeController@getIndex', [title=url], [parameters = {}], [attributes = {}])
            link_to_action : function(action, title, parameters, attributes) {
                var url = this.action(action, parameters);

                return getHtmlLink(url, title, attributes);
            }

        };

    }).call(this);

    /**
     * Expose the class either via AMD, CommonJS or the global object
     */
    if (typeof define === 'function' && define.amd) {
        define(function () {
            return laroute;
        });
    }
    else if (typeof module === 'object' && module.exports){
        module.exports = laroute;
    }
    else {
        window.laroute = laroute;
    }

}).call(this);

