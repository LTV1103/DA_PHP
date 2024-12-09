//tb hết phiên
const urlParams = new URLSearchParams(window.location.search);
if (urlParams.has("status") && urlParams.get("status") === "timeout") {
  alert("Phiên đăng nhập đã hết! Vui lòng đăng nhập lại.");
}
//lỗi error rehister
if (urlParams.has("error")) {
  const errorCode = urlParams.get("error");

  switch (errorCode) {
    case "emailInvalid":
      alert("Trùng email");
      break;
    case "email":
      alert("Vui lòng nhập đúng định dạng email");
      break;
    case "pass":
      alert("Tối thiểu 8 ký tự");
      break;
    default:
      alert("Đã xảy ra lỗi");
      break;
  }
  setTimeout(function() {
    urlParams.delete("error");
    window.history.pushState({}, '', window.location.pathname + urlParams.toString());
  }, 1000); // 1000ms = 1 giây
}

document.addEventListener("DOMContentLoaded", () => {
  const urlParams = new URLSearchParams(window.location.search);
  const message = urlParams.get("message");

  if (message) {
    const noti = document.getElementById("notification");
    const messages = {  
      success: "Thêm thành công",
      delSuccess: "Xóa thành công",
      update: "Sửa thành công",
      error: "Lỗi: Không thể cập nhật cơ sở dữ liệu!",
      empty: "Vui lòng nhập tên danh mục!",
    };

    noti.textContent = messages[message] || "Đã xảy ra lỗi!";

    noti.classList.remove("hidden");

    setTimeout(() => {
      noti.classList.add("hidden");
      const newUrl =
        window.location.pathname +
        (action ? `?action=${action}&query=${query || ""}` : "");
      window.history.replaceState({}, "", newUrl);
    }, 2000);
  }
});

//xác nhận xóa
document.querySelectorAll(".delete-btn").forEach(function (btn) {
  btn.addEventListener("click", function (event) {
    if (!confirm("Bạn có chắc chắn muốn xóa?")) {
      event.preventDefault();
    }
  });
});
