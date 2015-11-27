<?php

if (!defined('APPPATH'))
    exit('No direct script access allowed');

/**
 * helpers/forms_helper.php
 *
 * Functions to help with form generation
 *
 * @author		JLP
 * @copyright           Copyright (c) 2010-2014, James L. Parry
 *                      Used by Galiano Island Chamber of Commerce, with permission
 * ------------------------------------------------------------------------
 */

/**
 * Construct a form row to edit a combo box field.
 * 
 * @param string $label Descriptive label for the control
 * @param string $name ID and name of the control; s/b the same as the RDB table column
 * @param string $value Initial value for the control
 * @param mixed $options Array of key/value pairs for the combobox
 * @param string $explain Help text for the control
 * @param int $maxlen Maximum length of the value, characters
 * @param int $size width in ems of the input control
 * @param boolean $disabled True if non-editable
 */
if (!function_exists('makeComboField')) {

    function makeComboField($label, $name, $value, $options, $explain = "", $maxlen = 40, $size = 25, $disabled = false) {
        $CI = &get_instance();
        $parms = array(
            'label' => $label,
            'name' => $name,
            'value' => htmlentities($value, ENT_COMPAT, 'UTF-8'),
            'explain' => $explain,
            'maxlen' => $maxlen,
            'size' => $size,
            'disabled' => ($disabled ? 'disabled="disabled"' : '')
        );

        $choices = array();
        foreach ($options as $val => $display) {
            //var_dump($display);
            $row = array(
                'val' => $display['id'],
                'selected' => ($val == $value) ? 'selected="true"' : '',
                'display' => htmlentities($display['name'])
            );
            $choices[] = $row;
        }
        $parms['options'] = $choices;

        return $CI->parser->parse('_fields/combofield', $parms, true);
    }

}