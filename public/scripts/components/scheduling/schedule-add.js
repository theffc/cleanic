'use strict';

function ScheduleAdd($holder) {
	this.$holder = $($holder || document.body);
	this.doctorSpecsService = new DoctorSpecsService();
	this.listDoctorsService = new ListDoctorsService();
};

ScheduleAdd.prototype = {

	onListDoctorsError: function(message) {
		$('#error-modal').modal('show');
	},

	onListDoctorsSuccess: function(data) {
		var $element = $('#scheduling-doctor');
		$element.empty();

		$element.append('<option value=""></option>');
		for (var i = 0; i < data.length; i++) {
			$element.append(
				'<option value="' + data[i]['nomeFunc'] + '">' + data[i]['nomeFunc'] + '</option>'
			);
		}
	},

	getMedicListParams: function(specialty) {
		return JSON.stringify({
			'speciality': specialty
		});
	},

	retrieveMedicList: function(specialty) {
		var params = this.getMedicListParams(specialty);
		this.listDoctorsService.getDoctors(params)
			.then($.proxy(this.onListDoctorsSuccess, this), $.proxy(this.onListDoctorsError, this));
	},

	onChangeSpecialty: function(event) {
		var $element,
			value;
		$element = $(event.target);
		value = $element.val();

		value !== ''? this.retrieveMedicList(value) : this.resetDoctorField();
	},

	onSubmitNewSchedule: function(event) {
		var $element;
		event.preventDefault();
		$element = $(event.target);
	},

	onGetSpecsError: function(message) {
		$('#error-modal').modal('show');
	},

	setMedicSpecs: function(data) {
		var $element = $('#scheduling-specialty');
		$element.empty();

		$element.append('<option value=""></option>');
		for (var i = 0; i < data.length; i++) {
			$element.append('<option value="' + data[i] + '">' + data[i] + '</option>');
		}
	},

	onGetSpecsSuccess: function(data) {
		this.setMedicSpecs(data);
	},

	getRetrieveMedicSpecsParams: function() {
		return {};
	},


	retrieveMedicSpecs: function() {
		var params = this.getRetrieveMedicSpecsParams();
		this.doctorSpecsService.getSpecs(params)
			.then($.proxy(this.onGetSpecsSuccess, this), $.proxy(this.onGetSpecsError, this));
	},

	resetDoctorField: function() {
		var $doctorField = $('#scheduling-doctor');

		$doctorField.empty();
		$doctorField.append('<option value=""></option>');
	},

	resetFields: function() {
		this.resetDoctorField();
	},

	onClickScheduleAddTab: function() {
		this.retrieveMedicSpecs();
		this.resetFields();
	},

	bindEvents: function() {
		this.$holder.on('click', '[data-schedule-add-button]', $.proxy(this.onClickScheduleAddTab, this));

		this.$holder.on('submit', '[data-schedule-add-form]', $.proxy(this.onSubmitNewSchedule, this));

		$('#scheduling-specialty').on('change', $.proxy(this.onChangeSpecialty, this));
	},

	init: function() {
		this.bindEvents();
	}
};