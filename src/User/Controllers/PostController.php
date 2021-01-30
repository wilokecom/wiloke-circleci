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
			]
		]);
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
