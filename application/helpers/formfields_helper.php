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
 *  Construct a text input.
 * 
 * @param string $label Descriptive label for the control
 * @param string $name ID and name of the control; s/b the same as the RDB table column
 * @param mixed $value Initial value for the control
 * @param string $explain Help text for the control
 * @param int $maxlen Maximum length of the value, characters
 * @param int $size width in ems of the input control
 * @param boolean $disabled True if non-editable
 */
if (!function_exists('makeTextField')) {

    function makeTextField($label, $name, $value, $explain = "", $maxlen = 40, $size = 25, $disabled = false) {
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
        return $CI->parser->parse('_fields/textfield', $parms, true);
    }

}

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
            $row = array(
                'val' => $val,
                'selected' => ($val == $value) ? 'selected="true"' : '',
                'display' => htmlentities($display)
            );
            $choices[] = $row;
        }
        $parms['options'] = $choices;

        return $CI->parser->parse('_fields/combofield', $parms, true);
    }

}

/**
 * Make a submit button.
 * 
 * @param string $label Label to appear on the button
 * @param string $title "Tooltip" text 
 * @param string $css_extras Extra CSS class information
 */
if (!function_exists('makeSubmitButton')) {

    function makeSubmitButton($label, $title, $css_extras = "") {
        $CI = &get_instance();
        $parms = array(
            'label' => $label,
            'title' => $title,
            'css_extras' => $css_extras
        );
        return $CI->parser->parse('_fields/submit', $parms, true);
    }

}

/**
 * Construct a form row to edit a large field.
 * 
 * @param <type> $label
 * @param <type> $name
 * @param <type> $value
 * @param <type> $explain
 * @param <type> $maxlen
 * @param <type> $size
 * @param <type> $rows 
 */
if (!function_exists('makeTextArea')) {

    function makeTextArea($label, $name, $value, $explain = "", $maxlen = 40, $size = 25, $rows = 5, $disabled = false) {
        $height = (int) (strlen($value) / 80) + 1;
        if ($rows < $height)
            $rows = $height;
        $CI = &get_instance();
        $parms = array(
            'label' => $label,
            'name' => $name,
            'value' => htmlentities($value, ENT_COMPAT, 'UTF-8'),
            'explain' => $explain,
            'maxlen' => $maxlen,
            'size' => $size,
            'rows' => $rows,
            'disabled' => ($disabled ? 'disabled="disabled"' : '')
        );
        return $CI->parser->parse('_fields/textarea', $parms, true);
    }

}

/**
 * Construct an HTML snippet to present an image.
 * 
 * @param <type> $label
 * @param <type> $name
 * @param <type> $explain
 */
if (!function_exists('showImage')) {

    function showImage($label, $name, $width = 120, $height = 80) {
        $CI = &get_instance();
        $parms = array(
            'label' => $label,
            'name' => $name,
            'width' => $width,
            'height' => $height
        );
        return $CI->parser->parse('_fields/x_submitted', $parms, true);
    }

}

/* End of file */
