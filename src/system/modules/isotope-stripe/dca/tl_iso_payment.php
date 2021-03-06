<?php

/**
* Stripe Payment Module for Isotope eCommerce for Contao Open Source CMS
*
*
* @copyright  RobMarshall. GbR 2014
* @author     RobMarshall. GbR <hallo@wangaz.com>
* @package    isotope-stripe
 */


/**
 * Palettes
 */
$GLOBALS['TL_DCA']['tl_iso_payment']['palettes']['stripe'] = str_replace('{price_legend', '{gateway_legend},wirecard_customer_id,wirecard_secret,wirecard_contact;{price_legend', $GLOBALS['TL_DCA']['tl_iso_payment']['palettes']['cash']);


/**
 * Fields
 */
array_insert($GLOBALS['TL_DCA']['tl_iso_payment']['fields'], 0, array(
	'stripe_failure_order_status'	=> array(
		'label'             => &$GLOBALS['TL_LANG']['tl_iso_payment']['stripe_failure_order_status'],
		'exclude'           => true,
		'inputType'         => 'select',
		'foreignKey'        => \Isotope\Model\OrderStatus::getTable().'.name',
		'options_callback'	=> array('\Isotope\Backend', 'getOrderStatus'),
		'eval'              => array('mandatory'=>true, 'includeBlankOption'=>true, 'tl_class'=>'w50'),
		'sql'               => "int(10) NOT NULL default '0'",
		'relation'          => array('type'=>'hasOne', 'load'=>'lazy'),
    ),
	'stripe_customer_id'			=> array(
		'label'				=> &$GLOBALS['TL_LANG']['tl_iso_payment']['stripe_customer_id'],
		'exclude'			=> true,
		'inputType'			=> 'text',
		'eval'				=> array('mandatory' => true, 'maxlength' => 16, 'rgxp' => 'alnum', 'tl_class' => 'w50'),
		'sql'				=> "varchar(16) NOT NULL default '0'",
	),
	'stripe_secret'				=> array(
		'label'				=> &$GLOBALS['TL_LANG']['tl_iso_payment']['wirecard_secret'],
		'exclude'			=> true,
		'inputType'			=> 'text',
		'eval'				=> array('mandatory' => true, 'maxlength' => 64, 'rgxp' => 'alnum', 'tl_class' => 'w50'),
		'sql'				=> "varchar(64) NOT NULL default '0'",
	),
	'stripe_contact'		=> array(
		'label'             => &$GLOBALS['TL_LANG']['tl_iso_payment']['stripe_contact'],
		'exclude'           => true,
		'inputType'         => 'pageTree',
		'foreignKey'        => 'tl_page.title',
		'eval'              => array('mandatory' => true, 'fieldType' => 'radio', 'tl_class' => 'clr'),
		'sql'               => "int(10) unsigned NOT NULL default '0'",
		'relation'          => array('type'=>'hasOne', 'load'=>'lazy'),
	),
));
