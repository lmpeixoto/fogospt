@extends('app')

@section('content')
    <main role="main" class="mb-auto margin-top-10">
        <div class="container">
            <div class="col-12">
                <h1>@lang('includes.menu.warnings')</h1>
            </div>
            <div class="row">
                @foreach($data as $warning)
                    <div class="col-12">
                      <div class="card">
                        <div style="background-color: #F45E29; color: white;"  class="card-header">
                        {{ $warning['label'] }}
                        </div>
                        <div class="card-body">
                        <h4 class="card-title">{{ $warning['text'] }}</h4>
                        </div>
                      </div>
                    </div>
                @endforeach
            </div>
        </div>
    </main>
@endsection

@push('scripts')
@endpush
