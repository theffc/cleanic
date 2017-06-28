'use strict';

function RegisterEmployee($holder) {
	this.$holder = $($holder || document.body);
	this.$employeeSpec = null;
};

RegisterEmployee.prototype = {

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

	onChangeCEP: function(event) {

	},

	onSubmitNewEmployee: function(event) {
		var $element;
		event.preventDefault();
		$element = $(event.target);
	},

	onChangeEmployeeJob: function(event) {
		var $element
		$element = $(event.target);
		$element.val() === 'Médico'? this.addSpecField() : this.removeSpecField();
	},

	bindEvents: function() {
		this.$holder.on('change', '[data-employee-job]', $.proxy(this.onChangeEmployeeJob, this));

		this.$holder.on('submit', '[data-register-employee-form]', $.proxy(this.onSubmitNewEmployee, this));

		this.$holder.on('change', '[data-employee-cep]', $.proxy(this.onChangeCEP, this));
	},

	setEmployeeSpec: function() {
		this.$employeeSpec = this.$holder.find('[data-employee-spec]');
	},

	init: function() {
		this.setEmployeeSpec();
		this.bindEvents();
	}
};