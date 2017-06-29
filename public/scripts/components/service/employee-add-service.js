'use strict';

function EmployeeAddService() {
	this.$loader = new Loader('#service-loader');
}

$.extend(EmployeeAddService.prototype, Service.prototype, {

	addEmployee: function(params) {

		var serviceUrl = 'http://cleanic.scienceontheweb.net/cleanic/public/api/funcionario-add.php',
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