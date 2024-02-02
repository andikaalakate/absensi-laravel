document.addEventListener('DOMContentLoaded', function () {
  const btnScanQR = document.getElementById('btn-scan-qr');
  const previewKamera = document.getElementById('previewKamera');
  const swapCamera = document.getElementById('swapCamera');
  const scanNav = document.getElementById('scanNav');

  let selectedDeviceId = null;
  const codeReader = new ZXing.BrowserMultiFormatReader();
  let scanning = false;

  btnScanQR.addEventListener('click', function () {
    initScanner();
  });

  swapCamera.addEventListener('click', function () {
    trackQRCode();
  });

  window.addEventListener('resize', function () {
    if (window.innerWidth <= 768) {
      selectedDeviceId = videoInputDevices[1].deviceId;
      trackQRCode();
    }
  });

  scanNav.addEventListener('click', function () {
    previewKamera.classList.toggle('scanAktif');
    scanning = previewKamera.classList.contains('scanAktif');

    if (scanning) {
      // Jika kamera aktif, inisialisasi scanner
      initScanner();
    } else {
      // Jika kamera tidak aktif, hentikan pemindaian
      codeReader.stopContinuousDecode();
    }
  });

  navigator.mediaDevices.getUserMedia({ video: true })
    .then(function (stream) {
      previewKamera.srcObject = stream;
      previewKamera.play();
    })
    .catch(function (err) {
      console.error('Error accessing camera:', err);
    });

  // Sembunyikan elemen kamera saat pertama kali
  previewKamera.style.display = 'none';

  function initScanner() {
    codeReader
      .listVideoInputDevices()
      .then(videoInputDevices => {
        if (videoInputDevices.length > 0) {
          // Default kamera belakang jika lebar layar <= 768px
          selectedDeviceId = window.innerWidth <= 768 ? videoInputDevices[1].deviceId : videoInputDevices[0].deviceId;

          codeReader
            .decodeOnceFromVideoDevice(selectedDeviceId, 'previewKamera')
            .then(result => {
              if (result) {
                // Jika ada QR terbaca, langsung pergi ke halaman web
                window.location.href = result.text;
              } else {
                // Jika tidak ada QR terbaca, tampilkan pesan SweetAlert
                if (scanning) {
                  swal("Tidak ada QR yang terbaca!", "", "warning");
                }
              }
              codeReader.reset();
            })
            .catch(err => console.error(err));
        } else {
          alert("Camera not found!");
        }
      })
      .catch(err => console.error(err));
  }

  function trackQRCode() {
    codeReader.stopContinuousDecode();

    codeReader
      .decodeFromInputVideoDeviceContinuously(selectedDeviceId, 'previewKamera', (result, error, controls) => {
        if (result) {
          // Jika ada QR terbaca, langsung pergi ke halaman web
          window.location.href = result.text;
        } else {
          // Jika tidak ada QR terbaca, tampilkan pesan ToastAlert
          if (scanning) {
            swal("Tidak ada QR yang terbaca!", "", "warning");
          }
        }
        if (error) {
          console.error(error);
        }
      });
  }
});
