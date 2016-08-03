<?php # -*- coding: utf-8 -*-

namespace Inpsyde\DynamicTestExamples\Sort;

/**
 * Class BubbleSort
 *
 * implements the bubble sort algorithm
 *
 * @package Inpsyde\DynamicTestExamples\Sort
 */
class BubbleSort implements NumericArrayValueSequencer {

	/**
	 * @param array $elements
	 *
	 * @return array|FALSE
	 */
	public function sort( array $elements ) {

		$list = array_values( $elements );

		if ( count( $list ) < 2 )
			return $list;

		$length = count( $list );
		do {
			$last_switch = 1;
			for ( $i = 0; $i < $length - 1; $i++ ) {

				if ( $list[ $i ] > $list[ $i + 1 ] ) {
					$last_switch = $i + 1;
					$tmp = $list[ $i ];
					$list[ $i ] = $list[ $i + 1 ];
					$list[ $i + 1 ] = $tmp;
				}
			}
			$length = $last_switch;
		} while ( $last_switch > 1 );

		return $list;
	}

}