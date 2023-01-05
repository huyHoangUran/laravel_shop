
@props(['s'])

<x-card>
    <div class="flex">
        <img
            class="hidden w-48 mr-6 md:block"
            src="{{ $s->logo?asset('storage/'.$s->logo):asset('/images/no-image.png') }}"
            alt=""
        />
        <div>
            <h3 class="text-2xl">
                <a href=" /listings/{{ $s->id  }}">{{ $s->title }}</a>
            </h3>
            <div class="text-xl font-bold mb-4">{{ $s->company }}</div>
            <x-listing-tags :tagsCsv="$s->tags"/>
            <div class="text-lg mt-4">
                <i class="fa-solid fa-location-dot"></i> {{ $s->location }}
            </div>
        </div>
    </div>
</x-card>