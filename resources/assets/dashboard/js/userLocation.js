var div = document.getElementById("location");

        function getLocation() {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(showPosition, showError);
            } else {
                div.innerHTML = "The Browser Does not Support Geolocation";
            }
        }

        function showPosition(position) {
            var latitude = position.coords.latitude;
            var longitude = position.coords.longitude;

            // Panggil fungsi untuk menampilkan peta statis sebagai iframe
            showStaticMap(latitude, longitude);
        }

        function showError(error) {
            if (error.PERMISSION_DENIED) {
                div.innerHTML = "The User has denied the request for Geolocation. Please enable location services.";
            }
        }

        function showStaticMap(latitude, longitude) {
            // URL untuk mendapatkan peta statis dari Google Maps
            var staticMapUrl = `https://maps.google.com/maps?q=${latitude},${longitude}&z=15&output=embed`;

            // Tampilkan peta statis sebagai iframe di elemen dengan ID 'location'
            var iframe = document.createElement("iframe");
            iframe.setAttribute("width", "100%");
            iframe.setAttribute("height", "100%");
            iframe.setAttribute("frameborder", "0");
            iframe.setAttribute("style", "border:0;");
            iframe.setAttribute("src", staticMapUrl);

            div.appendChild(iframe);
        }

        getLocation();