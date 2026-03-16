const logo = document.querySelector('.icon-bg');

window.addEventListener('scroll', () => {
  const scrollY = window.scrollY;
  const minScale = 1; // awal
  const maxScale = 1.5; // membesar sedikit
  const scrollRange = 300;

  let newScale = minScale + (maxScale - minScale) * (scrollY / scrollRange);
  if(newScale > maxScale) newScale = maxScale;
  if(newScale < minScale) newScale = minScale;

  logo.style.transform = `scale(${newScale})`;
});