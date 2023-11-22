function updateGreeting() {
    var greetingElement = document.getElementById('greeting');
    var currentTime = new Date().getHours();

    if (currentTime >= 5 && currentTime < 12) {
      greetingElement.textContent = 'Selamat Pagi!';
    } else if (currentTime >= 12 && currentTime < 18) {
      greetingElement.textContent = 'Selamat Siang!';
    } else if (currentTime >= 18 && currentTime < 24) {
      greetingElement.textContent = 'Selamat Sore!';
    } else {
      greetingElement.textContent = 'Selamat Malam!';
    }
  }

  // Panggil fungsi pertama kali untuk mengatur ucapan selamat
  updateGreeting();

  // Atur interval agar fungsi dipanggil setiap satu menit
  setInterval(updateGreeting, 60000);
