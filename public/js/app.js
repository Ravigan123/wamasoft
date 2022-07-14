$(".delete_all").click(function () {
    const id = $(this).data("id");
    const token = $('meta[name="csrf-token"]').attr("content");
    $.ajax({
        method: "DELETE",
        url: "http://127.0.0.1:8000/" + id,
        data: {
            id: id,
            _token: token,
        },
    })
        .done(() => {
            window.location.reload();
        })
        .fail((response) => {
            alert("ERROR");
            console.log(response);
        });
});

$(".delete").click(function () {
    const id = $(this).data("id");
    const token = $('meta[name="csrf-token"]').attr("content");
    $.ajax({
        method: "DELETE",
        url: "http://127.0.0.1:8000/del/" + id,
        data: {
            id: id,
            _token: token,
        },
    })
        .done(() => {
            window.location.reload();
        })
        .fail((response) => {
            alert("ERROR");
            console.log(response);
        });
});
