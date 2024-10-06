@if (session('message_type')==='success')
<div id="alert-message"
  class="flex items-center p-4 mb-4 transition-opacity duration-300 ease-in-out text-green-800 border-t-4 border-green-300 bg-green-50 dark:text-green-400 dark:bg-gray-800 dark:border-green-800"
  role="alert">
  {{ session('message') }}
</div>
@endif
@if (session('message_type')==='error')
<div id="alter-message"
  class="flex items-center p-4 mb-4 transition-opacity duration-300 ease-in-out text-red-800 border-t-4 border-red-300 bg-red-50 dark:text-red-400 dark:bg-gray-800 dark:border-red-800"
  role="alert">
  {{ session('message') }}
</div>
@endif

@section('scripts')
<script text="text/javascript">
  $(document).ready(function () {
        setTimeout(() => {
            $('#alert-message').addClass('opacity-0');
            setTimeout(() => {
              $('#alert-message').remove();
            }, 300);
        }, 2500);
    });
</script>
@endsection