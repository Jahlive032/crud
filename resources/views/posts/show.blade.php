@extends("layouts.app")
@section("title", $post->title)
@section("content")

	<div class="article_container">
		<h1>Titre: {{ $post->title }}</h1>

		<img src="{{ asset('storage/'.$post->picture) }}" alt="Image de couverture" style="max-width: 300px;">

		<div>Description: {{ $post->content }}</div>

		<p><a href="{{ route('posts.index') }}" title="Retourner aux articles" >Retourner aux posts</a></p>
	</div>

@endsection