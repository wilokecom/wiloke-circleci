<?php


namespace WilokeCircleci\User\Controllers;


class PostController
{
	public function __construct()
	{
		add_action('rest_api_init', [$this, 'registerAPI']);
	}

	public function registerAPI()
	{
		register_rest_route('wiloke/v1', 'posts', [
			[
				'methods'  => 'GET',
				'callback' => [$this, 'getPosts']
			],
			[
				'methods'  => 'POST',
				'callback' => [$this, 'createPost']
			]
		]);
	}

	/**
	 * @param \WP_REST_Request $oRequest
	 * @return array
	 */
	public function createPost(\WP_REST_Request $oRequest): array
	{
		$aParam = array_merge($oRequest->get_params(), [
			'post_type'   => 'post',
			'post_status' => 'publish',
			'post_author' => get_current_user_id()
		]);

		$id = wp_insert_post($aParam);

		if (is_wp_error($id)) {
			return [
				'status' => 'error',
				'msg'    => $id->get_error_message()
			];
		}

		return [
			'status' => 'success',
			'id'     => $id
		];
	}

	public function getPosts(): array
	{
		$query = new \WP_Query([
			'post_type'      => 'post',
			'posts_per_page' => 1,
			'author'         => get_current_user_id()
		]);

		$aPosts = [];
		if ($query->have_posts()) {
			while ($query->have_posts()) {
				$query->the_post();

				$aPosts[] = [
					'title' => $query->post->post_title
				];
			}
		}

		return $aPosts;
	}
}
