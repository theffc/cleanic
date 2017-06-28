'use strict';

function ListDoctorsService() {
	this.$loader = new Loader('#service-loader');
}

$.extend(ListDoctorsService.prototype, Service.prototype, {

	getDoctors: function(params) {

		var serviceUrl = '/cleanic/public/api/medico-list.php',
			dfd = $.Deferred(),
			_this = this;

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