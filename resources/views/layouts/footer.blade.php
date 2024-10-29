<footer class="footer">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6">
                <script>
                    document.write(new Date().getFullYear())
                </script> © Visit Haram.
            </div>
            <div class="col-sm-6">
                <div class="text-sm-end d-none d-sm-block">
                    Design & Develop by Hashed System
                </div>
            </div>
        </div>
    </div>
</footer>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>


<script type="text/javascript"
        src="https://cdn.jsdelivr.net/npm/node-snackbar@latest/src/js/snackbar.min.js"></script>
<link rel="stylesheet" type="text/css"
      href="https://cdn.jsdelivr.net/npm/node-snackbar@latest/dist/snackbar.min.css" />
<script>
    let Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        //timer: 6100,
        showCloseButton: true,
        //timerProgressBar: true,
        didOpen: (toast) => {
            toast.addEventListener('mouseenter', Swal.stopTimer)
            toast.addEventListener('mouseleave', Swal.resumeTimer)
        }
    })
    @if(session()->has('success'))
        Snackbar.show({
            pos: 'bottom-center',
            text: `{{ session()->get('success') }}`,
        backgroundColor: '#556d33',
        actionTextColor: '#fff',
        });
    @endif
</script>
