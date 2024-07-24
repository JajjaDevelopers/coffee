$(document).ready(function () {

  const reloadPage=()=>{
    setTimeout(function () {
      location.reload();
    }, 3000);
  }
  $(document).on("click", ".activate", function (event) {
    event.preventDefault();
    var schoolId = $(this).attr("activate");
    axios
      .post(`/developers/admin/addition/${schoolId}`)
      .then((response) => {
        toastr.success(response.data.success);
        reloadPage()
      })
      .catch((err) => {
          toastr.success("Sorry, operation failed");
      });
  });
  $(document).on("click", ".deactivate", function (event) {
    event.preventDefault();
    var schoolId = $(this).attr("deactivate");
    axios
      .delete(`/developers/admin/addition/${schoolId}`)
      .then((response) => {
        toastr.success(response.data.success);
        reloadPage()
      })
      .catch((err) => {
        toastr.success("Sorry, operation failed");
      });
  });
});
