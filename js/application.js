/* Filters the table by city */
function handleSearch(query) {
  const cities = document.querySelectorAll('[data-search="city"]');

  if (query === '' || query === null) {
    cities.forEach(city => city.closest('tr').classList.remove('hidden'));
    cities.forEach(city => city.innerHTML = city.dataset.searchValue);
  } else {
    cities.forEach(city => {
      const cityText = city.dataset.searchValue.toLowerCase();
      const isVisible = cityText.includes(query.toLowerCase());
      city.innerHTML = cityText.replaceAll(query.toLowerCase(), `<mark>${query.toLowerCase()}</mark>`);
      city.closest('tr').classList.toggle('hidden', !isVisible);
    })
  }
}

/* Submits the form to create a new user */
function handleCreate(e) {
  e.preventDefault();
  const form = e.target;
  const formData = new FormData(form);
  const data = Object.fromEntries(formData.entries());

  fetch('/create.php', {
    method: 'POST',
    headers: {
      'Content-Type': 'application/x-www-form-urlencoded'
    },
    body: new URLSearchParams(data),
  }).then(response => {
    if (response.ok) {
      // Add the new user to the table element.
      //
      // But for the sake of simplicity, we'll just reload the page>
      window.location.reload();
    }
  })}

document.addEventListener('DOMContentLoaded', () => {
  const form = document.getElementById('create_user');

  if (form.dataset.ajax === 'true') {
    form.addEventListener('submit', handleCreate);
  }
})
