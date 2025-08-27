@if (session('success'))
    <script>
        toaster('{{ session('success') }}', 'green');
    </script>
@endif
@if (session('error'))
    <script>
        toaster('{{ session('error') }}', 'red');
    </script>
@endif