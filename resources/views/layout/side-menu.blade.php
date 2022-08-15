@extends('../layout/main')

@section('head')
    @yield('subhead')
@endsection

@section('content')
    @include('../layout/components/mobile-menu')
    <div class="content">
        @include('../layout/components/top-bar')
        @yield('subcontent')
    </div>
@endsection
