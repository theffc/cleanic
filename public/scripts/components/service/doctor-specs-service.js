'use strict';

function DoctorSpecsService() {
	this.$loader = new Loader('#service-loader');
}

$.extend(DoctorSpecsService.prototype, Service.prototype, {

	getSpecs: function(params) {

		var serviceUrl = '/cleanic/public/api/especialidades-list.php',
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