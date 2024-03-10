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
