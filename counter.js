export function setupCounter(element) {
  let counter = 0
  const setCounter = (count) => {
    counter = count
    element.innerHTML = `count is ${counter}`
  }
  element.addEventListener('click', () => setCounter(counter + 1))
  setCounter(0)
}



export function changebutton(){
  const headerButton = document.querySelector('.header-button');
  const buttonAll = document.querySelector('.button-all');
  const iconprof = document.querySelector('.button-all__icon');
  
  headerButton.addEventListener('mouseover', () => {
    buttonAll.style.backgroundColor = '#722ED1';
    buttonAll.style.color = '#FFFFFF';
  });
  
  headerButton.addEventListener('mouseout', () => {
    buttonAll.style.backgroundColor = 'inherit';
    buttonAll.style.color = 'inherit';
  });

}