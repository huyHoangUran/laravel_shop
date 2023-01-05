<x-layout>
{{-- <h1>this is page listing</h1> --}}
@include('partials._hero')

@include('partials._search')

<div class="lg:grid lg:grid-cols-2 gap-4 space-y-4 md:space-y-0 mx-4">

@unless(count($students)== 0 )

@foreach ($students as $s) 

<x-listing-card :s="$s"/>

@endforeach
@else
<h1>No DATA</h1>

@endunless
</div>
<div class="mt-6 p-4">
    {{ $students->links() }}
</div>
</x-layout>