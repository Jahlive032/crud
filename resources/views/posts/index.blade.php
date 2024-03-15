@extends("layouts.app")
@section("title", "Tous les articles")
@section("content")

	<div class="article_container">
		<h1>Listes des articles</h1>

		<p>
			<!-- Lien pour créer un nouvel article : "posts.create" -->
			<button class="create_post"><a href="{{ route('posts.create') }}" title="Créer un article" >Créer un nouveau post</a></button>
		</p>

		<!-- Le tableau pour lister les articles/posts -->
		<table border="1" class="board_post">
			<thead>
				<tr>
					<th>Titre</th>
					<th colspan="2" >Opérations</th>
				</tr>
			</thead>
			<tbody>
				<!-- On parcourt la collection de Post -->
				@foreach ($posts as $post)
				<tr>
					<td>
						<!-- Lien pour afficher un Post : "posts.show" -->
						<a href="{{ route('posts.show', $post) }}" title="Lire l'article" ><center>{{ $post->title }}</center></a>
					</td>
					<td>
						<!-- Lien pour modifier un Post : "posts.edit" -->
						<button><a href="{{ route('posts.edit', $post) }}" title="Modifier l'article" >Modifier</a></button>
					</td>
					<td>
						<!-- Formulaire pour supprimer un Post : "posts.destroy" -->
						<form method="POST" action="{{ route('posts.destroy', $post) }}" >
							<!-- CSRF token -->
							@csrf
							<!-- <input type="hidden" name="_method" value="DELETE"> -->
							@method("DELETE")
							<input type="submit" value="Supprimer" class="delete_input">
						</form>
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
	
@endsection