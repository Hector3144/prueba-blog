@extends('layauts.app')

@section('title', 'index')

@section('content')



@if (auth()->check())
@if(auth()->user()->view_id==1)

<label>Buscar por fecha
<input id="search" type="search" placeholder="YYYY-MM-DD" autocomplete="off">
</label>
<section id="busca">
    @include('partial.post')
</section>
@endif
@endif


<script>
 const searchInput = document.getElementById('search');
 const resultContainer = document.getElementById('busca');

 if (searchInput && resultContainer) {
    let debounce;

    searchInput.addEventListener('input', function (event) {
      clearTimeout(debounce);
      debounce = setTimeout(() => {
        fetch(`/search?q=${encodeURIComponent(event.target.value)}`)
          .then(res => res.text())
          .then(html => {
            resultContainer.innerHTML = html;
          });
      }, 250);
    });
 }
</script>


@endsection

