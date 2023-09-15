export default defineNuxtRouteMiddleware(() => {
  if (process.client) {
    const prefix = "http://127.0.0.1:8000/api/";

    fetch(prefix + "auth", {
      method: "GET",
      headers: {
        "Content-Type": "application/json",
        Authorization: "Bearer " + localStorage.getItem("token"),
      },
    }).then((res) => {
      if (res.status !== 300) {
        return navigateTo("/login");
      } else {
        return navigateTo("/admin");
      }
    });
  }
});
