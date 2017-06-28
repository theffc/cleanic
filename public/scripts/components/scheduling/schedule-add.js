'use strict';

function ScheduleAdd($holder) {
	this.$holder = $($holder || document.body);
	this.doctorSpecsService = new DoctorSpecsService();
	this.listDoctorsService = new ListDoctorsService();
	this.availableTimeService = new AvailableTimeService();
};

ScheduleAdd.hoursDict = {
	'CincoTarde': '17:00',
	'DezManha': '10:00',
	'DuasTarde': '14:00',
	'MeioDia': '12:00',
	'NoveManha': '09:00',
	'OitoManha': '08:00',
	'OnzeManha': '11:00',
	'QuatroTarde': '16:00',
	'TresTarde': '15:00',
	'UmaTarde': '13:00'
};

ScheduleAdd.prototype = {

	setHoursOptions: function(data) {
		var $element = $('#scheduling-time');
		$element.empty();

		$element.append('<option value=""></option>');
		for (var i = 0; i < data.length; i++) {
			$element.append('<option value="' + data[i] + '">' + data[i] + '</option>');
		}
	},

	onGetAvailableTimeError: function(message) {
		$('#error-modal').modal('show');
	},

	onGetAvailableTimeSuccess: function(data) {
		var key,
			availableHours = [];

		for (key in ScheduleAdd.hoursDict) {
			if (ScheduleAdd.hoursDict.hasOwnProperty(key)) {
				if (data[key]) {
					availableHours.push(ScheduleAdd.hoursDict[key]);
				}
			}
		}
		this.setHoursOptions(availableHours);
	},

	resetHoursField: function() {
		var $hoursField = $('#scheduling-time');

		$hoursField.empty();
		$hoursField.append('<option value=""></option>');
	},

	getAvailableHoursParams: function(date) {
		var $doctor = $('#scheduling-doctor'),
			doctorId = $doctor.find('option[value="' + $doctor.val() + '"]').data('id');

		return JSON.stringify({
			'dataAgendamento': date,
			'idMedico': doctorId
		});
	},

	retrieveAvailableHours: function(date) {
		var doctorName = $('#scheduling-doctor').val(),
			params;

		if (doctorName !== '') {
			params = this.getAvailableHoursParams(date);
			this.availableTimeService.getAvailableTimes(params)
				.then($.proxy(this.onGetAvailableTimeSuccess, this), $.proxy(this.onGetAvailableTimeError, this));
		}
		else {
			this.resetHoursField();
		}
	},

	setAvailableHours: function(date) {
		date !== ''? this.retrieveAvailableHours(date) : this.resetHoursField();
	},

	onChangeScheduleDate: function(event) {
		var $element;
		$element = $(event.target);
		this.setAvailableHours($element.val());
	},

	onListDoctorsError: function(message) {
		$('#error-modal').modal('show');
	},

	onListDoctorsSuccess: function(data) {
		var $element = $('#scheduling-doctor');
		$element.empty();

		$element.append('<option value=""></option>');
		for (var i = 0; i < data.length; i++) {
			$element.append(
				'<option data-id="' + data[i]['idFunc'] + '" value="' + data[i]['nomeFunc'] + '">' + data[i]['nomeFunc'] + '</option>'
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

		$('#scheduling-date').on('change', $.proxy(this.onChangeScheduleDate, this));
	},

	init: function() {
		this.bindEvents();
	}
};