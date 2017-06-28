'use strict';

function LoginService() {

}

$.extend(LoginService.prototype, Service.prototype, {

	loginUser: function(params) {

		var serviceUrl = '/cleanic/public/api/login.php',
			dfd = $.Deferred();

		this.request(serviceUrl, params, { method: 'POST' }).then(function(res) {

			if (res.wasSuccessful) {
				dfd.resolve(res.data);
			}
			else {
				dfd.reject(res.message);
			}
		});

		return dfd.promise();
	}
});