export default defineNuxtRouteMiddleware(() => {
  const prefix = "http://127.0.0.1:8000/api/";
  const cookie = useCookie("token");

  fetch(prefix + "auth", {
    method: "GET",
    headers: {
      "Content-Type": "application/json",
      Authorization: "Bearer " + cookie.value,
    },
  }).then((res) => {
    if (res.status !== 300) {
      return navigateTo("/login");
    } else {
      return navigateTo("/admin");
    }
  });
});
