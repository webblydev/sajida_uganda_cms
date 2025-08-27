<!--Main Start-->
<!-- ==== js Dependencies Start ==== -->

<script src="{{ asset('assets/vendors/vendor-min.js') }}"></script>
<script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
<!-- ==== js Dependencies End ==== -->
<!-- Main js -->
<script src="{{ asset('assets/js/main.js') }}"></script>
<!--Custom js use development purpose-->
<script src="{{ asset('assets/js/custom.js') }}"></script>
<!-- Fontawesome -->
<script src="https://kit.fontawesome.com/c108160789.js" crossorigin="anonymous"></script>
<script type='text/javascript' src='https://cdn.jsdelivr.net/npm/toastify-js'></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/gsap.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/ScrollTrigger.min.js"></script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script>
        document.getElementById("currentYear").textContent = new Date().getFullYear();
    function toaster(message, class_name) {
        Toastify({
            newWindow: !0,
            text: message,
            position: "right",
            style: {
                background: class_name
            },
            stopOnFocus: !0,
            duration: "4000"
        }).showToast();
    }
</script>
