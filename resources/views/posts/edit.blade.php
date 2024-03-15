@extends("layouts.app")
@section("title", "Editer un post")
@section("content")

	<div class="article_container">
		<h1>Editer un post</h1>

		<!-- Si nous avons un Post $post -->
		@if (isset($post))

		<!-- Le formulaire est géré par la route "posts.update" -->
		<form method="POST" action="{{ route('posts.update', $post) }}" enctype="multipart/form-data" >

			<!-- <input type="hidden" name="_method" value="PUT"> -->
			@method('PUT')

		@else

		<!-- Le formulaire est géré par la route "posts.store" -->
		<form method="POST" action="{{ route('posts.store') }}" enctype="multipart/form-data" >

		@endif

			<!-- Le token CSRF -->
			@csrf
			
			<p>
				<label for="title" >Titre</label><br/>

				<!-- S'il y a un $post->title, on complète la valeur de l'input -->
				<input type="text" name="title" value="{{ isset($post->title) ? $post->title : old('title') }}"  id="title" placeholder="Le titre du post" >

				<!-- Le message d'erreur pour "title" -->
				@error("title")
				<div>{{ $message }}</div>
				@enderror
			</p>

			<!-- S'il y a une image $post->picture, on l'affiche -->
			@if(isset($post->picture))
			<p>
				<span>Couverture actuelle</span><br/>
				<img src="{{ asset('storage/'.$post->picture) }}" alt="image de couverture actuelle" style="max-height: 200px;" >
			</p>
			@endif

			<p>
				<label for="picture" >Couverture</label><br/>
				<input type="file" name="picture" id="picture" >

				<!-- Le message d'erreur pour "picture" -->
				@error("picture")
				<div>{{ $message }}</div>
				@enderror
			</p>
			<p>
				<label for="content" >Contenu</label><br/>

				<!-- S'il y a un $post->content, on complète la valeur du textarea -->
				<textarea name="content" id="content" lang="fr" rows="10" cols="30" placeholder="Le contenu du post" >{{ isset($post->content) ? $post->content : old('content') }}</textarea>

				<!-- Le message d'erreur pour "content" -->
				@error("content")
				<div>{{ $message }}</div>
				@enderror
			</p>

			<input type="submit" name="valider" value="Valider" >

		</form>
	</div>

@endsection