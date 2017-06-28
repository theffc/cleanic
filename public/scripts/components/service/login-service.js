'use strict';

function LoginService() {

}

$.extend(LoginService.prototype, Service.prototype, {

	loginUser: function(params) {

		var serviceUrl = '/cleanic/public/api/login.php',
			dfd = $.Deferred();

		this.request(serviceUrl, params, { method: 'POST' }).then(function(data) {

			dfd.resolve(data);
		});

		return dfd.promise();
	}
});