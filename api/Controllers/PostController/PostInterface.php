<?php
namespace Api\Controllers\PostController;

interface PostInterface
{
	public function index();
	public function edit();
	public function delete();
}