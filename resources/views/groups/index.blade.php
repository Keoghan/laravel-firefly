@extends('firefly::layouts.app')

@section('hero')
<header class="hero">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="d-flex justify-content-between align-items-center">
                    <h1>{{ __('Groups') }}</h1>

                    @if (Auth::check() && Auth::user()->can('create', Firefly\Group::class))
                        <button type="button" class="btn btn-yellow" @click.prevent="toggleModal('newGroup')">
                            {{ __('Add Group') }}
                        </button>
                    @endif
                </div>

                <p>{{ __('Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quis quos aut sequi totam ducimus nihil, vitae repellendus expedita quas nemo.') }}</p>
            </div>
        </div>
    </div>
</header>
@endsection

@section('content')
<div class="container">
    <div class="row">
        @if (! count($groups))
            <div class="col">
                <div class="alert alert-yellow">
                    {{ __('Uh oh, there are no groups.') }}
                </div>
            </div>
        @endif

        @foreach ($groups as $group)
            <div class="col-sm-6 col-md-4 col-lg-2">
                <a href="{{ route('firefly.group.show', $group) }}" class="btn btn-lg" style="background-color: {{ $group->color }};">
                    {{ $group->name }}
                </a>
            </div>
        @endforeach

        <div class="pagination">
            {!! $groups->links() !!}
        </div>
    </div>
</div>
@endsection

@section('modals')
@include('firefly::modals.new-group')
@endsection
