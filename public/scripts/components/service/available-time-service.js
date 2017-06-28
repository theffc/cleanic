'use strict';

function AvailableTimeService() {
	this.$loader = new Loader('#service-loader');
}

$.extend(AvailableTimeService.prototype, Service.prototype, {

	getAvailableTimes: function(params) {

		var serviceUrl = '/cleanic/public/api/agendamentos-disponiveis-medico.php',
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