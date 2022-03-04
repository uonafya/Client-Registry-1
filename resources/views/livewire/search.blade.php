{{-- <div>
    If your happiness depends on money, you will never be happy with yourself.
</div> --}}

<div>
    <input type="text" wire:model="searchPatient" placeholder="search client" />
    <ul>
        @foreach ($patients as $patient)
        <li>
            <p>{{$patient->fname}}</p>
        </li>
        @endforeach
    </ul>
</div>