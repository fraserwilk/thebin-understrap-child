
// Ticker scroll and interval.
document.addEventListener('DOMContentLoaded', function() {
    var tickers = document.querySelectorAll('.ticker');
    var interval = 4000; // Change this value (in ms) for your desired speed

    tickers.forEach(function(ticker) {
        var items = ticker.querySelectorAll('.ticker-item');
        if (items.length === 0) return;

        var current = 0;
        items[current].classList.add('active');

        setInterval(function() {
            items[current].classList.remove('active');
            current = (current + 1) % items.length;
            items[current].classList.add('active');
        }, interval);
    });
});
