function fetchGOTQuote() {
  fetch(gotQuotes.ajax_url + '?action=get_got_quote')
      .then(response => response.json())
      .then(data => {
          if (data.success) {
              document.getElementById('got-quote-box').innerText =
                  `"${data.data.quote}"\n— ${data.data.character}`;
          } else {
              document.getElementById('got-quote-box').innerText = "Failed to fetch quote.";
          }
      })
      .catch(() => {
          document.getElementById('got-quote-box').innerText = "Error occurred.";
      });
}

// Fetch immediately and then every 5 seconds
fetchGOTQuote();
setInterval(fetchGOTQuote, 5000);
