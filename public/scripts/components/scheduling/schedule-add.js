'use strict';

function ScheduleAdd($holder) {
	this.$holder = $($holder || document.body);
	this.doctorSpecsService = new DoctorSpecsService();
	this.listDoctorsService = new ListDoctorsService();
};

ScheduleAdd.prototype = {

	onSubmitNewSchedule: function(event) {
		var $element;
		event.preventDefault();
		$element = $(event.target);
	},

	onGetSpecsError: function(message) {
		$('#error-modal').modal('show');
	},

	onGetSpecsSuccess: function(data) {
		console.log(data);
	},

	getRetrieveMedicSpecsParams: function() {
		return {};
	},

	retrieveMedicSpecs: function() {
		var params = this.getRetrieveMedicSpecsParams();
		this.doctorSpecsService.getSpecs(params)
			.then($.proxy(this.onGetSpecsSuccess, this), $.proxy(this.onGetSpecsError, this));
	},

	onClickScheduleAddTab: function() {
		this.retrieveMedicSpecs();
	},

	bindEvents: function() {
		this.$holder.on('click', '[data-schedule-add-button]', $.proxy(this.onClickScheduleAddTab, this));

		this.$holder.on('submit', '[data-schedule-add-form]', $.proxy(this.onSubmitNewSchedule, this));
	},

	init: function() {
		this.bindEvents();
	}
};