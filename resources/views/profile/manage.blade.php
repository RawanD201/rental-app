@extends('layouts.body-main', ['title' => __('titles.profile.manage')])

@section('body-main')

    <div class="body-main py-12 flex flex-col gap-2 min-w-[1280px]">
        @include('layouts.flashes.index-message')

        <div class="index-header w-full">
            <div class="name-container w-[20%]">
                <span>{{ __('index.admin.table.name') }}</span>
            </div>
            <div class="desc-container w-[20%]">
                <span>{{ __('index.admin.table.username') }}</span>
            </div>
            <div class="updated-at-container w-[20%]">
                <span>{{ __('index.admin.table.updated_at') }}</span>
            </div>
            <div class="created-at-container w-[20%]">
                <span>{{ __('index.admin.table.created_at') }}</span>
            </div>
            <div class="action-container w-[20%]">
                <span>{{ __('index.admin.table.actions') }}</span>
            </div>
            <div class="create-container w-[20%]">
                <a href="{{ route('profile.create') }}">
                    <div class="icon">
                        <i class="fas fa-plus-circle"></i>
                    </div>
                    <div class="text">
                        <span>{{ __('index.admin.actions.create') }}</span>
                    </div>
                </a>
            </div>
        </div>
        @forelse ($users as $user)
            @if ($user->username === auth()->user()->username)
                <div class="index-content !bg-cBlue-100/20">
                @else
                    <div class="index-content">
            @endif
            <div class="name-container w-[20%]">
                <span>{{ $user->name }}</span>
            </div>
            <div class="desc-container w-[20%]">
                <span>{{ $user->username }}</span>
            </div>
            <div class="updated-at-container w-[20%]">
                <span>{{ $user->updated_at }}</span>
            </div>
            <div class="created-at-container w-[20%]">
                <span>{{ $user->created_at }}</span>
            </div>
            <div class="action-container w-[20%]">
                <form action="{{ route('profile.edit', ['user' => $user->id]) }}" method="post">
                    @method('get')
                    @csrf
                    <button type="submit" class="edit" title="{{ __('index.admin.actions.edit') }}">
                        <i class="fas fa-pencil"></i>
                    </button>
                </form>
                <form action="{{ route('profile.destroy', ['user' => $user->id]) }}" method="post">
                    @method('delete')
                    @csrf
                    <button type="submit" class="delete" title="{{ __('index.admin.actions.delete') }}">
                        <i class="fas fa-trash"></i>
                    </button>
                </form>
            </div>
    </div>
@empty
    <div class="no-content">
        <span>{{ __('content.no_content') }}</span>
    </div>
    @endforelse
    {{ $users->links() }}

    </div>

@endsection


@section('footerClass', 'min-w-[1280px]')
