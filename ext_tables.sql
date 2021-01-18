#
# Table structure for table 'tx_daycarecenters_domain_model_kita'
#
CREATE TABLE tx_daycarecenters_domain_model_kita (
	title varchar(255) DEFAULT '' NOT NULL,
	path_segment varchar(2048) DEFAULT '' NOT NULL,
	leader varchar(255) DEFAULT '' NOT NULL,
	places varchar(30) DEFAULT '' NOT NULL,
	street varchar(255) DEFAULT '' NOT NULL,
	house_number varchar(255) DEFAULT '' NOT NULL,
	zip varchar(255) DEFAULT '' NOT NULL,
	city varchar(255) DEFAULT '' NOT NULL,
	email varchar(255) DEFAULT '' NOT NULL,
	website varchar(255) DEFAULT '' NOT NULL,
	amount_of_groups varchar(255) DEFAULT '' NOT NULL,
	space_offered varchar(255) DEFAULT '' NOT NULL,
	food_supply tinyint(1) DEFAULT '0' NOT NULL,
	food_info text NOT NULL,
	food_prices text NOT NULL,
	closing_days varchar(255) DEFAULT '' NOT NULL,
	logo int(11) DEFAULT '0' NOT NULL,
	images int(11) DEFAULT '0' NOT NULL,
	response_times text NOT NULL,
	facebook varchar(255) DEFAULT '' NOT NULL,
	twitter varchar(255) DEFAULT '' NOT NULL,
	instagram varchar(255) DEFAULT '' NOT NULL,
	additional_informations text NOT NULL,
	earliest_opening_time int(11) DEFAULT '0' NOT NULL,
	latest_opening_time int(11) DEFAULT '0' NOT NULL,
	earliest_age int(11) DEFAULT '0' NOT NULL,
	latest_age int(11) DEFAULT '0' NOT NULL,
	holder int(11) unsigned DEFAULT '0',
	care_form int(11) unsigned DEFAULT '0',
	district int(11) unsigned DEFAULT '0',
	telephones int(11) unsigned DEFAULT '0' NOT NULL,
);

#
# Table structure for table 'tx_daycarecenters_domain_model_holder'
#
CREATE TABLE tx_daycarecenters_domain_model_holder (
	title varchar(255) DEFAULT '' NOT NULL,
	contact_person varchar(255) DEFAULT '' NOT NULL,
	street varchar(255) DEFAULT '' NOT NULL,
	house_number varchar(255) DEFAULT '' NOT NULL,
	zip varchar(255) DEFAULT '' NOT NULL,
	city varchar(255) DEFAULT '' NOT NULL,
	telephone varchar(255) DEFAULT '' NOT NULL,
	fax varchar(255) DEFAULT '' NOT NULL,
	email varchar(255) DEFAULT '' NOT NULL,
	website varchar(255) DEFAULT '' NOT NULL,
	logo text,
);

#
# Table structure for table 'tx_daycarecenters_domain_model_careform'
#
CREATE TABLE tx_daycarecenters_domain_model_careform (
	title varchar(255) DEFAULT '' NOT NULL,
	description text NOT NULL,
	kita int(11) unsigned DEFAULT '0' NOT NULL,
);

#
# Table structure for table 'tx_daycarecenters_domain_model_district'
#
CREATE TABLE tx_daycarecenters_domain_model_district (
	district varchar(255) DEFAULT '' NOT NULL,
);

#
# Table structure for table 'tx_daycarecenters_domain_model_telephone'
#
CREATE TABLE tx_daycarecenters_domain_model_telephone (
	telephone varchar(255) DEFAULT '' NOT NULL,
	kita int(11) unsigned DEFAULT '0' NOT NULL,
);
