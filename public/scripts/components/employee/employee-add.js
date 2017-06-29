'use strict';

function EmployeeAdd($holder) {
	this.$holder = $($holder || document.body);
	this.$employeeSpec = null;
	this.$employeeStreet = null;
	this.$employeeNeighborhood = null;
	this.$employeeCity = null;
	this.cepService = new CepService();
	this.employeeAddService = new EmployeeAddService();
	this.helper = new HelperFs();
};

EmployeeAdd.prototype = {

	addSpecField: function() {
		var $specInput;
		$specInput = this.$employeeSpec.find('input');
		this.$employeeSpec.removeClass('hidden');
		this.$employeeSpec.removeAttr('novalidate');
		$specInput.attr('required', true);
	},

	removeSpecField: function() {
		var $specInput;
		$specInput = this.$employeeSpec.find('input');
		this.$employeeSpec.addClass('hidden');
		this.$employeeSpec.attr('novalidate', 'novalidate');
		$specInput.removeAttr('required');
	},

	removeCepData: function() {
		this.$employeeStreet.val('');
		this.$employeeNeighborhood.val('');
		this.$employeeCity.val('');
	},

	onGetCepInfoError: function(message) {
		this.removeCepData();
	},

	setCepData: function(data) {
		this.$employeeStreet.val(data['logradouro']);
		this.$employeeNeighborhood.val(data['bairro']);
		this.$employeeCity.val(data['cidade']);
	},

	onGetCepInfoSuccess: function(data) {
		this.setCepData(data);
	},

	getCepParams(cep) {
		return JSON.stringify({
			'cep': cep
		});
	},

	retrieveCepInfo: function(cep) {
		var params;
		params = this.getCepParams(cep);
		this.cepService.getCepInfo(params)
			.then($.proxy(this.onGetCepInfoSuccess, this), $.proxy(this.onGetCepInfoError, this));
	},

	onChangeCEP: function(event) {
		var $element = $(event.target),
			cep = $element.val();

		if (cep.length >= 1) {
			this.retrieveCepInfo(cep);
		}
	},

	onAddEmployeeError: function(message) {
		$('#error-modal').modal('show');
	},

	onAddEmployeeSuccess: function(data) {
		$('#success-modal').modal('show');
	},

	doAddEmployee: function($form) {
		var params;
		params = JSON.stringify(this.helper.serializeFormJson($form));

		this.employeeAddService.addEmployee(params)
			.then($.proxy(this.onAddEmployeeSuccess, this), $.proxy(this.onAddEmployeeError, this));
	},

	onSubmitNewEmployee: function(event) {
		var $element;
		event.preventDefault();
		$element = $(event.target);
		this.doAddEmployee($element);
	},

	onChangeEmployeeJob: function(event) {
		var $element
		$element = $(event.target);
		$element.val() === 'Medico'? this.addSpecField() : this.removeSpecField();
	},

	bindEvents: function() {
		this.$holder.on('change', '[data-employee-job]', $.proxy(this.onChangeEmployeeJob, this));

		this.$holder.on('submit', '[data-register-employee-form]', $.proxy(this.onSubmitNewEmployee, this));

		this.$holder.on('change', '[data-employee-cep]', $.proxy(this.onChangeCEP, this));
	},

	setMaximumBirthday: function() {
		var $dateField = $('#employee-birthday');

		$dateField.prop('max', function() {
        	return new Date().toJSON().split('T')[0];
    	});
	},

	setEmployeeElements: function() {
		this.$employeeSpec = this.$holder.find('[data-employee-spec]');
		this.$employeeStreet = this.$holder.find('[data-employee-street]');
		this.$employeeNeighborhood = this.$holder.find('[data-employee-neighborhood]');
		this.$employeeCity = this.$holder.find('[data-employee-city]');
	},

	init: function() {
		this.setEmployeeElements();
		this.setMaximumBirthday();
		this.bindEvents();
	}
};