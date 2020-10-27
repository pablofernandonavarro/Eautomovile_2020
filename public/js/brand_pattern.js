let model = document.getElementById('pattern_id');
let brand = document.getElementById('brand');
model.addEventListener('change',(e) => {
  fetch(`http://localhost:8000/api-brands/${e.target.value}`)
  .then(response => response.json())
  .then(data => brand.value = data.brand_name)
  
  .catch(error => console.log(error))
});