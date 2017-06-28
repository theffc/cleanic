'use strict';

function ScheduleAddService() {
	this.$loader = new Loader('#service-loader');
}

$.extend(ScheduleAddService.prototype, Service.prototype, {

	addSchedule: function(params) {

		var serviceUrl = '/cleanic/public/api/agendamento-add.php',
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