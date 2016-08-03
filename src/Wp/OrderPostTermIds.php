<?php # -*- coding: utf-8 -*-

namespace Inpsyde\DynamicTestExamples\Wp;

use
	Inpsyde\DynamicTestExamples\Sort,
	WP_Post;

/**
 * Class OrderPostTermIds
 *
 * This class depends on a WP_Post and a sequencer to sort the IDs of the posts terms .
 * This isn't a good example for proper OOP design at all, remember this should just show how
 * to write unit tests and how to use mocks.
 *
 * @package Inpsyde\DynamicTestExamples\Wp
 */
class OrderPostTermIds {

	/**
	 * @var Sort\NumericArrayValueSequencer
	 */
	private $sequencer;

	/**
	 * @var WP_Post
	 */
	private $post;

	/**
	 * @param WP_Post                         $post
	 * @param Sort\NumericArrayValueSequencer $sequencer
	 */
	public function __construct( WP_Post $post, Sort\NumericArrayValueSequencer $sequencer ) {

		$this->post      = $post;
		$this->sequencer = $sequencer;
	}

	/**
	 * @return array
	 */
	public function get_ordered_term_ids() {

		$term_ids = wp_get_object_terms(
			[ 'category', 'post_tag' ],
			$this->post->ID,
			[
				'fields' => 'ids'
			]
		);
		$term_ids = array_map( 'intval', $term_ids );

		return $this->sequencer->sort( $term_ids );
	}
}