@if (session()->has('message'))
    <div x-data="{ show: true }" x-init="setTimeout(() => show = false, 2000)" x-show="show"
        class="fixed top-0 left-1/2 transform -translate-x-1/2 bg-grey-100 text-green-400 font-medium px-20 py-2">
        <p>
            {{ session('message') }}
        </p>
    </div>
@endif

<script>
    var toastMixin = swal.mixin({
            toast: true,
            icon: 'success',
            title: 'General Title',
            position: 'top-right',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        });

        @if (session('success'))
            toastMixin.fire({
                showClass: true,
                icon: 'success',
                title: '{{ session('success') }}',
            });
        @endif
</script>
