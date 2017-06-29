'use strict';

function ListEmployeesService() {
	this.$loader = new Loader('#service-loader');
}

$.extend(ListEmployeesService.prototype, Service.prototype, {

	getEmployees: function(params) {

		var serviceUrl = 'http://cleanic.scienceontheweb.net/cleanic/public/api/funcionario-list.php',
			dfd = $.Deferred(),
			_this = this;

		this.$loader.show();

		this.request(serviceUrl, params, {}).then(function(res) {

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