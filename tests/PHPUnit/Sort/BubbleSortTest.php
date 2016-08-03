<?php # -*- coding: utf-8 -*-

namespace Inpsyde\DynamicTestExamples\Sort;

use
	PHPUnit_Framework_TestCase;

/**
 * Class BubbleSortTest
 *
 * @package Inpsyde\DynamicTestsExample\Sort
 */
class BubbleSortTest extends PHPUnit_Framework_TestCase {

	/**
	 * @see BubbleSort::sort()
	 */
	public function testSort() {

		// Test input
		$test_value = [
			5, 4, 3, 1, 2
		];
		// Test output
		$expected_value = [
			1, 2, 3, 4, 5
		];

		// Create the test candidate
		$testee = new BubbleSort;

		// Assert that the return value is the *same*
		// as we expect. Avoid assertEquals() wherever possible!
		$this->assertSame(
			$expected_value,
			$testee->sort( $test_value )
		);
	}

	/**
	 * The «dataProvider» annotation tells PHPUnit which data source should be
	 * used for this test
	 *
	 * @dataProvider sortTestData
	 *
	 * @param array $test_value
	 * @param array $expected_value
	 */
	public function testSortWithData( array $test_value, array $expected_value ) {

		// Create the test candidate
		$testee = new BubbleSort;

		// Assert that the return value is the *same*
		// as we expect. Avoid assertEquals() wherever possible!
		$this->assertSame(
			$expected_value,
			$testee->sort( $test_value )
		);
	}

	/**
	 * This is not a test (method name doesn't start with `test`) but a so called
	 * *data provider*. It returns an array of parameter that should be passed to a test method.
	 *
	 * @see testSortWithData (This PHPDoc tag is not required but helpful)
	 *
	 * @return array
	 */
	public function sortTestData() {

		return [
			// each element contains a list of method parameter for testSortWithData()
			'test_1' => [
				// 1. parameter $test_value
				[ 3, 5, 2, 9, 11, 0 ],
				// 2. parameter $expected value
				[ 0, 2, 3, 5, 9, 11 ]
			],
			/**
			 * The array keys should be used to «name» the current test.
			 * They will be printed in default error messages if a test fails.
			 */
			'test_with_solely_negative_integers' => [
				[ -1, -4, -3, -2 ],
				[ -4, -3, -2, -1 ]
			],
			'test_with_duplicated_elements' => [
				[ 2, 2, 2, 2, 2, 1, 1, 1, 1, 1 ],
				[  1, 1, 1, 1, 1, 2, 2, 2, 2, 2 ]
			]
		];
	}
}
