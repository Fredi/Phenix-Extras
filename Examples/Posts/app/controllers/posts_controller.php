<?php
class PostsController extends ApplicationController
{
	public function index()
	{
		// Returns an array with all posts or none if empty
		$posts = Posts::all();

		// Set the variable to use in the view
		$this->set('posts', $posts);
	}

	public function show($params)
	{
		// Find one based on the 'id' parameter from the route
		$post = Posts::find_one($params['id']);

		// Set the variable to use in the view
		$this->set('post', $post);
	}

	public function add()
	{
		// Create an instance of the Posts model
		$post = Posts::create();

		// Set the variable to use in the view
		$this->set('post', $post); 
	}

	public function edit($params)
	{
		// Create an instance of the Posts model and find one based
		// on the 'id' parameter from the route
		$post = Posts::find_one($params['id']);

		// Set the variable to use in the view
		$this->set('post', $post);
	}

	public function create()
	{
		// Create an instance of the Posts model and sets the model
		// fields with the data sent within the POST request
		$post = Posts::create($this->params['posts']);

		// If the save() method return true then we redirect to
		// the post 'show' page setting a flash message
		if ($post->save() === true)
			$this->redirect('/posts/'.$post->id, 'Post was successfully created.');
		// On fail we get an instance of the Posts model with the data
		// our user tried to save, so we want to render the 'add' view 
		// using this data in the form
		else
		{
			$this->set('post', $post);
			$this->action = 'add';
		}
	}

	public function update($params)
	{
		// Create an instance of the Posts model and find one based
		// on the 'id' parameter from the route
		if ($post = Posts::find_one($params['id']))
		{
			// If the save() method return true then we redirect to
			// the post 'show' page and set a flash message
			if ($post->save($this->params['posts']) === true)
				$this->redirect('/posts/'.$post->id, 'Post successfully updated.');
			// On fail we get an instance of the Posts model with the data
			// our user tried to update, so we want to render the 'edit' view 
			// using this data in the form
			else
			{
				$this->set('post', $post);
				$this->action = 'edit';
			}
		}
		// The post doesn't exist we redirect to the post listing
		// setting a flash message
		else
			$this->redirect('/posts', "The post you tried to update doesn't exist.");
	}

	public function destroy($params)
	{
		// Create an instance of the Posts model and find one based
		// on the 'id' parameter from the route
		if ($post = Posts::find_one($params['id']))
		{
			// Delete the post and redirect to the post listing
			$post->delete();
			$this->redirect('/posts');
		}
		// The post doesn't exist we redirect to the post listing
		// setting a flash message
		else
			$this->redirect('/posts', "The post you tried to update doesn't exist.");
	}
}
