@extends('layouts.horizontalDetachedLayoutMaster')

@section('title', 'Meta Equipes')

@section('vendor-style')
  <style>
    .content-wrapper, .app-content {
      padding: 0 !important;
    }

    .header-navbar-shadow {
      display: none !important;;
    }

  </style>
@endsection
@section('content')
  <div class="content-body">
    <img src="{{ $image }}" alt="" class="img-fluid">
  </div>
@endsection
@section('vendor-script')
  <!-- vendor files -->
  <script src="{{ asset(mix('vendors/js/ui/prism.min.js')) }}"></script>
@endsection
