'use strict';

function ListContacts($holder) {
	this.$holder = $($holder || document.body);
	this.$listContactsElement = null;
};

ListContacts.prototype = {

	onClickListContactsTab: function() {
		//TODO populate table
		//Initialize Loader
	},

	bindEvents: function() {
		this.$holder.on('click', '[data-list-contacts-button]', $.proxy(this.onClickListContactsTab, this));
	},

	setListContactsElement: function() {
		this.$listContactsElement = this.$holder.find('[data-list-contacts-table]');
	},

	init: function() {
		this.setListContactsElement();
		this.bindEvents();
	}
};