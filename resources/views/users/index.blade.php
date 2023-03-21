@extends('components.layout')
@section('content')
    {{-- Include the component if it exists --}}
    @includeIf('components.tab', ['tab' => $activeTab])
    <div class="tab-content">
        @if ($activeTab === 'users')
            @includeIf('components.table.table-feature', ['title' => 'Users', 'excel_export_route' => 'user/export/'])
        @elseif ($activeTab === 'service_providers')
            @includeIf('components.table.table-feature', ['title' => 'Service Provider', 'excel_export_route' => 'serviceprovider/export/'])

        @endif
    </div>
    @if ($activeTab === 'users')
@includeIf('components.table.table', ['refTable' => $users])
    @elseif ($activeTab === 'service_providers')
        @includeIf('components.table.table', ['refTable' => $service_providers)
    @endif
    <div class="container text-[10px]">
        {{ $paginator->links() }}
    </div>
@push('scripts')



<script>
    $(document).ready(function() {
        $('a[data-toggle="tab"]').on('click', function(e) {
            e.preventDefault();
            var tab = $(this).data('tab');
            $.get('{{ route('users.index') }}', { tab: tab }, function(data) {
                $('#tab-content').html(data);
            });
        });
    });

    const taskBox = document.querySelector('.task_box');
    gsap.to(taskBox, {
        duration:2,
        x: 200,
    });
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/push.js/1.0.12/push.min.js"></script>

@endpush
@endsection
