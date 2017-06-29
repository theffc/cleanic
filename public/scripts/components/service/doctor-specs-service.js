'use strict';

function DoctorSpecsService() {
	this.$loader = new Loader('#service-loader');
}

$.extend(DoctorSpecsService.prototype, Service.prototype, {

	getSpecs: function(params) {

		var serviceUrl = 'http://cleanic.scienceontheweb.net/cleanic/public/api/especialidades-list.php',
			dfd = $.Deferred(),
			_this = this;

		this.request(serviceUrl, params, {}).then(function(res) {

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