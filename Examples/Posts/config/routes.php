<?php
// root
Phenix::get('/', 'posts');

// our RESTful routes to the posts controller
Phenix::get('/posts', 'posts');
Phenix::get('/posts/new', 'posts#add');
Phenix::post('/posts', 'posts#create');
Phenix::get('/posts/:id', 'posts#show');
Phenix::get('/posts/:id/edit', 'posts#edit');
Phenix::put('/posts/:id', 'posts#update');
Phenix::delete('/posts/:id', 'posts#destroy');
