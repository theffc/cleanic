'use strict';

function ListSchedulesService() {
	this.$loader = new Loader('#service-loader');
}

$.extend(ListSchedulesService.prototype, Service.prototype, {

	getSchedules: function(params) {

		var serviceUrl = '/cleanic/public/api/agendamentos-list.php',
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