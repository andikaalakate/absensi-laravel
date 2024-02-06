document.addEventListener("DOMContentLoaded", function () {
  const allowedLatitude = 3.5930435906897427;
  const allowedLongitude = 98.7360079819932;
  const allowedRadius = 20;
  const timeout = 10000;

  function haversine(lat1, lon1, lat2, lon2) {
    const R = 6371e3;
    const φ1 = (lat1 * Math.PI) / 180;
    const φ2 = (lat2 * Math.PI) / 180;
    const Δφ = ((lat2 - lat1) * Math.PI) / 180;
    const Δλ = ((lon2 - lon1) * Math.PI) / 180;

    const a =
      Math.sin(Δφ / 2) * Math.sin(Δφ / 2) +
      Math.cos(φ1) * Math.cos(φ2) * Math.sin(Δλ / 2) * Math.sin(Δλ / 2);

    const c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1 - a));

    const distance = R * c;
    return distance;
  }

  function checkLocationPermission() {
    return new Promise((resolve, reject) => {
      navigator.permissions
      .query({ name: "geolocation" })
      .then((permissionStatus) => {
        if (permissionStatus.state === "granted") {
          resolve();
        } else if (permissionStatus.state === "prompt") {
          Swal.fire({
            title: "Izin Lokasi",
            text: 'Untuk menggunakan fitur ini, kami memerlukan akses lokasi Anda. Klik "Izinkan" pada prompt izin lokasi yang muncul.',
            showCancelButton: true,
            confirmButtonText: "Izinkan",
            cancelButtonText: "Tidak Izinkan",
          }).then((result) => {
            if (result.isConfirmed) {
              resolve();
            } else {
              reject(new Error("Permission denied"));
            }
          });
        } else {
          reject(new Error("Permission denied"));
        }
      });
    });
  }

  function checkLocation() {
    checkLocationPermission()
    .then(() => {
      navigator.geolocation.getCurrentPosition(
        function (position) {
          const userLatitude = position.coords.latitude;
          const userLongitude = position.coords.longitude;

          const distance = haversine(
            userLatitude,
            userLongitude,
            allowedLatitude,
            allowedLongitude
          );

          if (distance > allowedRadius) {
            Swal.fire({
              icon: "error",
              title: "Akses Ditolak!",
              text: "Maaf, Anda berada di luar area yang diperbolehkan untuk mengakses halaman ini.",
              confirmButtonText: "OK",
            }).then(() => {
              history.back();
            });
          }
        },
        function (error) {
          console.error("Gagal mendapatkan lokasi:", error);

          if (error.code === 1) {
            Swal.fire({
              icon: "error",
              title: "Akses Ditolak!",
              text: "Anda perlu mengizinkan akses lokasi untuk menggunakan fitur ini.",
              confirmButtonText: "OK",
            }).then(() => {
              checkLocationPermission();
              checkLocation();
              history.back();
            });
          }
        },
        { timeout }
      );
    })
    .catch((error) => {
      console.error("Permission denied:", error);
      Swal.fire({
        icon: "error",
        title: "Akses Ditolak!",
        text: "Anda perlu mengizinkan akses lokasi untuk menggunakan fitur ini.",
        confirmButtonText: "OK",
      }).then(() => {
        checkLocationPermission();
        checkLocation();
        history.back();
      });
    });
  }

  checkLocation();
});
