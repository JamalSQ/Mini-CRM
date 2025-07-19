<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    {{-- Select2 CSS --}}
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    <!-- DataTables CSS (Bootstrap 5 styled) -->
    <link href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" rel="stylesheet">

    <!-- Your custom CSS -->
    <link href="{{asset('css/style.css')}}" rel="stylesheet" />

    <title>starting file</title>
</head>

<body>
    <x-layouts.header />
    <x-layouts.sidebar />

    <div class="col-md-10 p-0">
        {{ $slot }}
    </div>
    </div>

    <!-- Scripts (at bottom in correct order) -->
    <!-- jQuery first -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

    <!-- DataTables JS - Core library first -->
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <!-- DataTables Bootstrap 5 integration -->
    <script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>

    {{-- Select2 JS (MUST be loaded after jQuery) --}}
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <!-- Font Awesome -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/js/fontawesome.min.js"></script>

    <!-- Your custom scripts -->
    <script src="{{asset('js/style.js')}}"></script>
    <script src="{{asset('js/custom.js')}}"></script>
    @stack('scripts')

    <script>
        $(document).ready(function() {
            $('#clients-table').DataTable({
                "responsive": true,
                "pageLength": 10,
                "ordering": true,
                "searching": true,
                "lengthChange": true,
                "info": true,
                "autoWidth": false
            });

            function formatClientOption(client) {
                if (!client.id) {
                    return client.text;
                }
                var companyName = $(client.element).data('company-name') || client.companyName;
                var contactName = $(client.element).data('contact-name') || client.contactName;

                if (!contactName && !companyName) {
                    return client.text;
                }

                var $container = $(
                    '<div class="py-1">' +
                    '<strong class="text-dark">' + contactName + '</strong><br>' +
                    '<small class="text-muted">' + companyName + '</small>' +
                    '</div>'
                );
                return $container;
            }

            $('#clientId').select2({
                theme: 'bootstrap-5', // THIS IS KEY for the outline and styling
                templateResult: formatClientOption,
                templateSelection: function(client) {
                    if (!client.id) {
                        return client.text;
                    }
                    var contactName = $(client.element).data('contact-name') || client.contactName;
                    var companyName = $(client.element).data('company-name') || client.companyName;
                    return contactName + ' (' + companyName + ')';
                },
                escapeMarkup: function(markup) {
                    return markup;
                }
            });
        });
    </script>
</body>

</html>