<?php # -*- coding: utf-8 -*-

namespace Inpsyde\DynamicTestExamples\Wp;

use
	Inpsyde\DynamicTestExamples\Sort,
	MonkeryTestCase,
	Mockery,
	Brain\Monkey;

/**
 * Class OrderPostTermIdsTest
 *
 * We have to use Mockery and BrainMonkey here, so we extend
 * MonkeryTestCase\BrainMonkeyWpTestCase which takes care about
 * setting them up correctly.
 *
 * @package Inpsyde\DynamicTestExamples\Wp
 */
class OrderPostTermIdsTest extends MonkeryTestCase\BrainMonkeyWpTestCase {

	/**
	 * @see OrderPostTermIds::get_ordered_term_ids()
	 */
	public function test_get_ordered_term_ids() {

		// Define some test data
		$post_ID          = 42;
		$raw_term_IDs     = [ '12', '16', '5' ];
		$int_term_IDs     = [ 12, 16, 5 ];
		$sorted_term_IDs  = $int_term_IDs;
		sort( $sorted_term_IDs );

		// Create a mock of 'WP_Post', note, WP_Post doesn't need to be declared
		$wp_post_mock     = Mockery::mock( 'WP_Post' );
		$wp_post_mock->ID = $post_ID;

		// Create a mock of
		$sequencer_mock = Mockery::mock( Sort\NumericArrayValueSequencer::class );
		// Configure the mock to expect a method call to 'sort()'...
		$sequencer_mock
			->shouldReceive( 'sort' )
			->once()
			->with( $int_term_IDs ) // ... expect the parameter
			->andReturn( $sorted_term_IDs ); // ... and return this value

		// Configure the mock of the function 'wp_get_object_terms'
		Monkey::functions()
			->expect( 'wp_get_object_terms' )
			->once()
			->with(
				$post_ID,
				[ 'category', 'post_tag' ],
				[ 'fields' => 'ids' ]
			)
			->andReturn( $raw_term_IDs );

		$testee = new OrderPostTermIds( $wp_post_mock, $sequencer_mock );

		$this->assertSame(
			$sorted_term_IDs,
			$testee->get_ordered_term_ids()
		);
	}
}
