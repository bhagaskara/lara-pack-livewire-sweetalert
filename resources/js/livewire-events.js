document.addEventListener("livewire:init", () => {
    Livewire.on("SwalInfo", (event) => {
        Swal.fire({
            icon: event[0],
            title: event[1],
            text: event[2],
        });
    });

    Livewire.on("SwalConfirm", (event) => {
        Swal.fire({
            icon: event[0],
            title: event[1],
            text: event[2],
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: event[3],
            cancelButtonText: event[4],
        }).then((result) => {
            if (result.value) {
                Livewire.dispatch(event[5]);
            } else {
                Livewire.dispatch(event[6]);
            }
        });
    });
})