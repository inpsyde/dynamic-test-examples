<?php # -*- coding: utf-8 -*-

namespace Inpsyde\DynamicTestExamples\Sort;

/**
 * Interface NumericArrayValueSequencer
 *
 * Sorts a list of numeric elements.
 * 
 * @package Inpsyde\DynamicTestExamples\Sort
 */
interface NumericArrayValueSequencer {

	/**
	 * @param array $elements
	 *
	 * @return array|FALSE
	 */
	public function sort( array $elements );
}