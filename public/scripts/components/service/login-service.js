'use strict';

function LoginService() {
	this.$loader = new Loader('#service-loader');
}

$.extend(LoginService.prototype, Service.prototype, {

	loginUser: function(params) {

		var serviceUrl = 'http://cleanic.scienceontheweb.net/cleanic/public/api/login.php',
			dfd = $.Deferred(),
			_this = this;

		this.$loader.show();

		this.request(serviceUrl, params, { method: 'POST' }).then(function(res) {

			_this.$loader.hide();

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