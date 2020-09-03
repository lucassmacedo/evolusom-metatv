{{-- Vendor Scripts --}}
<script src="{{ asset(mix('vendors/js/vendors.min.js')) }}"></script>
<script src="{{ asset(mix('vendors/js/ui/prism.min.js')) }}"></script>
<script src="{{ asset(mix('vendors/js/charts/chart.min.js')) }}"></script>
@yield('vendor-script')
{{-- Theme Scripts --}}
<script src="{{ asset(mix('js/core/app-menu.js')) }}"></script>
<script src="{{ asset(mix('js/core/app.js')) }}"></script>
<script src="{{ asset(mix('js/scripts/components.js')) }}"></script>
<script src="{{ asset(mix('js/scripts/charts/chart-chartjs.js')) }}"></script>

{{--<script src="{{ asset(mix('js/scripts/footer.js')) }}"></script>--}}
<script>
   window.next = "{{ $next ?? route($next)  }}";
</script>
{{-- page script --}}
@yield('page-script')
